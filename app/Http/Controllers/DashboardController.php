<?php

namespace App\Http\Controllers;

use App\Exports\LoginHistoryExport;
use App\Jobs\BroadcastAnnouncement;
use App\Models\Announcement;
use App\Models\AnnouncementImage;
use App\Models\LoginHistory;
use App\Models\ProjectGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function dashboard(Request $request) {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                  ->orWhere('NIP', 'LIKE', '%' . $search . '%')
                  ->orWhere('username', 'LIKE', '%' . $search . '%')
                  ->orWhere('email', 'LIKE', '%' . $search . '%');
            });
        }

        if ($request->filled('prodi') && $request->prodi !== 'All') {
            $query->where('department', $request->prodi);
        }

        if ($request->filled('fakultas') && $request->fakultas !== 'All') {
            $query->where('faculty', $request->fakultas);
        }

        if ($request->filled('cabang') && $request->cabang !== 'All') {
            $query->where('branch', $request->cabang);
        }

        $entries = $request->input('entries', 10);

        $members = $query->paginate($entries)->appends($request->all());

        return view('dashboard.dashboard', compact('members'));
    }

    public function getMemberById($id)
    {
        $member = User::find($id);

        if ($member) {
            return response()->json($member);
        } else {
            return response()->json(['message' => 'Member not found'], 404);
        }
    }

    // Member Controller
    public function memberCreate(){
        return view('dashboard.member_create');
    }

    public function memberStore(Request $request){
        //dd($request->all());
        if($request->password != $request->retype_password){
            return redirect()->back()->with(['error' => 'Member gagal ditambahkan, periksa input Anda.']);
        }
        try {
            $validated = $request->validate([
                'branch' => 'required|string',
                'password' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'username' => 'required|string|unique:users,username',
                'name' => 'required|string',
            ]);
            User::create($validated);
            return redirect()->back()->with(['success' => 'Member sukses ditambahkan']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->with(['error' => 'Member gagal ditambahkan, periksa input Anda.']);
        }
    }

    public function memberDestroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['success' =>  $user->name . ' sukses dihapus']);
    }

    // Announcement Controller
    public function announcementCreate(){
        return view('dashboard.announcement_create');
    }

    public function announcementStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'uploaded_files' => 'required|array',
            'uploaded_files.*' => 'file|mimes:jpg,jpeg,png,gif|max:4096'
        ]);

        $announcement = Announcement::create([
            'title' => $request->title,
            'desc' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        if ($request->hasFile('uploaded_files')) {
            foreach ($request->file('uploaded_files') as $file) {

                $path = $file->store('announcement_images', 'public');

                AnnouncementImage::create([
                    'announcement_id' => $announcement->id,
                    'image' => $path,
                ]);
            }
        }

        BroadcastAnnouncement::dispatch($announcement->id);

        return redirect()->back()->with(['success' => 'Pengumuman berhasil dibuat.']);
    }

    // Project Gallery

    public function projectGallery(){
        $items = ProjectGallery::all();
        return view('dashboard.project_gallery', compact('items'));
    }

    public function projectGalleryApproval($id){
        $item = ProjectGallery::findOrFail($id);
        return view('dashboard.project_gallery_approval', compact('item'));
    }

    public function updateProjectMemberStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string',
            'status' => 'required|in:Approved,Rejected,Need Revision,Waiting',
        ]);

        $item = ProjectGallery::findOrFail($id);

        $item->update([
            'comment' => $validatedData['comment'],
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('projectGallery.list')->with(['success' => 'Status dan komentar berhasil diperbarui']);
    }

    //Member Login History

    public function memberHistory(Request $request){
        $query = LoginHistory::with('user');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('username', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $entries = $request->input('entries', 10);

        $users = $query->paginate($entries)->appends($request->all());

        return view('dashboard.member_history', compact('users'));
    }

    public function download() {
        return Excel::download(new LoginHistoryExport, 'login_history.xlsx');
    }

}
