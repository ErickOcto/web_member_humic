<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\EduBackground;
use App\Models\ProjectGallery;
use App\Models\User;
use App\Models\UserAnnouncement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiMemeberController extends Controller
{
    public function getDashboard()
    {
        $userId = Auth::id();
        $unread = UserAnnouncement::where('user_id', $userId)->where('status', 0)->get();

        return response()->json(['unread_announcements' => $unread]);
    }

    // Mark a specific announcement as seen
    public function markSeen($id)
    {
        $user = UserAnnouncement::where('user_id', Auth::id())
                                ->where('announcement_id', $id)
                                ->where('status', 0)
                                ->first();
        if ($user) {
            $user->update(['status' => 1]);
            return response()->json(['message' => 'Announcement marked as seen']);
        }

        return response()->json(['error' => 'Announcement not found or already seen'], 404);
    }

    // Get details for editing member profile
    public function getMemberDetails($id)
    {
        $member = User::findOrFail($id);
        return response()->json(['member' => $member]);
    }

    // Update member profile
    public function updateMemberProfile(Request $request, $id)
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

        $member->update($validatedData);

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

        return response()->json(['message' => 'Profile updated successfully']);
    }

    // Get user's project gallery items
    public function getProjectGallery()
    {
        $items = ProjectGallery::where('user_id', Auth::id())->get();
        return response()->json(['project_gallery' => $items]);
    }

    // Add a new project gallery item
    public function addProjectGalleryItem(Request $request)
    {
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

        $validatedData['user_id'] = Auth::id();

        ProjectGallery::create($validatedData);

        return response()->json(['message' => 'Project added successfully']);
    }

    public function getAnnouncements()
    {
        $announcements = Announcement::all();
        return response()->json(['announcements' => $announcements]);
    }
}
