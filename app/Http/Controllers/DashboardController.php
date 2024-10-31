<?php

namespace App\Http\Controllers;

use App\Jobs\BroadcastAnnouncement;
use App\Models\Announcement;
use App\Models\AnnouncementImage;
use App\Models\ProjectGallery;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard
    public function dashboard(){
        $members = User::where('isAdmin', 0)->get();
        return view('dashboard.dashboard', compact('members'));
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

    public function memberHistory(){
        return view('dashboard.member_history');
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


}
