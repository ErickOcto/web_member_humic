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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ApiMemeberController extends Controller
{

    public function showProfile()
    {
        $user = User::find(Auth::id());

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        $user->load('eduBackground');
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'NIP' => $user->NIP,
                'faculty' => $user->faculty,
                'department' => $user->department,
                'handphone' => $user->handphone,
                'birthday' => $user->birthday,
                'gender' => $user->gender,
                'religion' => $user->religion,
                'address' => $user->address,
                'profile_picture' => $user->profile_picture,
                'eduBackground' => $user->eduBackground, // Pastikan relasi ini benar
                'status' => $user->status,
            ]
        ]);
    }

    public function updateMemberProfile(Request $request, $id)
    {
        Log::info('Authorization Header:', [$request->header('Authorization')]);
        Log::info('Authenticated User:', [auth('sanctum')->user()]);
        Log::info('All Input:', $request->all()); // Log semua input
        Log::info('Files:', $request->file());
        if (Auth::id() != $id) {
            return response()->json(['error' => 'Unauthorized action'], 403);
        }

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

        DB::transaction(function () use ($request, $validatedData, $id) {
            $member = User::findOrFail($id);
            $member->fill($validatedData);

            if ($request->hasFile('profile_picture')) {
                if ($member->profile_picture) {
                    Storage::disk('public')->delete($member->profile_picture);
                }
                $profilePicture = $request->file('profile_picture');
                $path = $profilePicture->store('profile_pictures', 'public');
                $member->profile_picture = $path;
            }

            $member->save();

            EduBackground::where('user_id', $member->id)->delete();

            if (count($request->level) === count($request->major) && count($request->major) === count($request->institution)) {
                $educationData = [];
                foreach ($request->level as $index => $level) {
                    $educationData[] = [
                        'user_id' => $member->id,
                        'level' => $level,
                        'major' => $request->major[$index],
                        'institution' => $request->institution[$index],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
                EduBackground::insert($educationData);
            } else {
                throw new \Exception("The education data arrays are not synchronized.");
            }
        });

        return response()->json(['message' => 'Profile updated successfully'], 200);
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

        $projectGallery = ProjectGallery::create($validatedData);

        return response()->json(['message' => 'Project added successfully', 'project_gallery' => $projectGallery]);
    }


    public function getAnnouncements()
    {
        $announcements = Announcement::with('images')->orderBy('created_at', 'asc')->get();
        return response()->json(['announcements' => $announcements]);
    }

}
