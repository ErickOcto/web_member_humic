<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\EduBackground;
use App\Models\ProjectGallery;
use App\Models\User;
use App\Models\UserAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function dashboard(){
        $userId = Auth::user()->id;

        $unread = UserAnnouncement::where('user_id', $userId)->where('status', 0)->get();

        return view('member.dashboard', compact('unread'));
    }

    public function seen($id){
        $user = UserAnnouncement::where('user_id', Auth::user()->id)
                        ->where('announcement_id', $id)
                        ->where('status', 0)->first();
        $user->update([
            'status' => 1
        ]);
        return redirect()->back();
    }

    public function edit(Request $request, $id){
        return view('member.edit');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'NIP' => 'required|string|max:20',
            'faculty' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'handphone' => 'required|string|max:15|regex:/^[0-9]+$/',
            'birthday' => 'required|date',
            'gender' => 'required|in:1,0',
            'religion' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'level' => 'required|array',
            'level.*' => 'required|string',
            'major' => 'required|array',
            'major.*' => 'required|string',
            'institution' => 'required|array',
            'institution.*' => 'required|string',
        ]);

        $member = User::findOrFail($id);

        $member->name = $validatedData['name'];
        $member->NIP = $validatedData['NIP'];
        $member->faculty = $validatedData['faculty'];
        $member->department = $validatedData['department'];
        $member->handphone = $validatedData['handphone'];
        $member->birthday = $validatedData['birthday'];
        $member->gender = $validatedData['gender'];
        $member->religion = $validatedData['religion'];
        $member->address = $validatedData['address'];

        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $path = $profilePicture->store('profile_pictures', 'public');
            $member->profile_picture = $path;
        }

        $member->save();

        $userId = $member->id;

        EduBackground::where('user_id', $userId)->delete();

        $educationData = [];
        foreach ($request->level as $index => $level) {
            $educationData[] = [
                'user_id' => $userId,
                'level' => $level,
                'major' => $request->major[$index],
                'institution' => $request->institution[$index],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        EduBackground::insert($educationData);

        return redirect()->back()->with(['success' => 'Profile berhasil diperbarui']);
    }

    public function pg(){
        $items = ProjectGallery::where('user_id', Auth::user()->id)->get();
        return view('member.pg', compact('items'));
    }

    public function pgAdd(){
        return view('member.pg_add');
    }

    public function pgStore(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $path = $thumbnail->store('projects', 'public');
            $validatedData['thumbnail'] = $path;
        }

        $validatedData['user_id'] = Auth::user()->id;

        ProjectGallery::create($validatedData);

        return redirect()->back()->with(['success' => 'Project berhasil ditambahkan']);
    }

    public function announcement(){
        $announcements = Announcement::all();
        return view('member.announcement', compact('announcements'));
    }
}
