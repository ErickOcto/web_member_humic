<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\BroadcastAnnouncement;
use App\Models\Announcement;
use App\Models\AnnouncementImage;
use App\Models\LoginHistory;
use App\Models\ProjectGallery;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiDashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $page = $request->input('page', 1);
        $limit = $request->input('limit', 10);
        $search = $request->input('search');
        $faculty = $request->input('faculty');
        $department = $request->input('department');
        $branch = $request->input('branch');

        $query = \App\Models\User::query();

        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('username', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }
        if ($faculty) {
            $query->where('faculty', $faculty)->whereNotNull('faculty');
        }
        if ($department) {
            $query->where('department', $department)->whereNotNull('department');
        }
        if ($branch) {
            $query->where('branch', $branch)->whereNotNull('branch');
        }
        $members = $query->orderBy('id', 'asc')->paginate($limit, ['*'], 'page', $page);

        return response()->json([
            'success' => true,
            'message' => 'List Data Users',
            'data' => $members->items(),
            'total' => $members->total(),
            'current_page' => $members->currentPage(),
            'last_page' => $members->lastPage(),
        ], 200);
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

    public function memberStore(Request $request){
        if($request->password != $request->retype_password){
            return response()->json(['error' => 'Member gagal ditambahkan, periksa input Anda.'], 400);
        }

        try {
            $validated = $request->validate([
                'branch' => 'required|string',
                'password' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'username' => 'required|string|unique:users,username',
                'name' => 'required|string',
                'position' => 'required|integer|in:1,2,3',
                'position_name' => 'required|string'
            ]);

            // Tambahkan hash pada password
            $validated['password'] = bcrypt($validated['password']);

            // Simpan user
            $user = User::create($validated);

            return response()->json(['success' => 'Member sukses ditambahkan', 'user' => $user], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Member gagal ditambahkan, Email atau Username sudah digunakan', 'errors' => $e->errors()], 422);
        }
    }

    public function memberDestroy($id){
        $user = User::findOrFail($id);
        $user->status = 0;
        $user->save();
        $user->delete();

        return response()->json(['success' => $user->name . ' sukses dihapus']);
    }

    public function storeAnnouncement(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'uploaded_files' => 'required|array',
            'uploaded_files.*' => 'file|mimes:jpg,jpeg,png,gif|max:4096',
        ]);

        $announcement = Announcement::create([
            'title' => $validatedData['title'],
            'desc' => $validatedData['description'],
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
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

        return response()->json([
            'status' => 'success',
            'message' => 'Announcement created successfully.',
            'announcement' => $announcement,
        ], 201);
    }

    public function getProjectGallery()
    {
        $items = ProjectGallery::all();

        return response()->json([
            'success' => true,
            'data' => $items
        ], 200);
    }

    public function getProjectGalleryById($id)
    {
        $item = ProjectGallery::find($id);

        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Project gallery not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $item
        ], 200);
    }

    public function updateProjectMemberStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string',
            'status' => 'required|in:Approved,Rejected,Need Revision,Waiting',
        ]);

        $item = ProjectGallery::find($id);

        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Project gallery not found'
            ], 404);
        }

        $item->update([
            'comment' => $validatedData['comment'],
            'status' => $validatedData['status'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status and comment updated successfully',
            'data' => $item
        ], 200);
    }

    public function memberHistoryAPI(Request $request)
    {
        $query = LoginHistory::with('user');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                ->orWhere('username', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $entries = $request->input('entries', 10);

        $order = $request->input('order', 'desc');

        $query->orderBy('login_at', $order);

        $users = $query->paginate($entries)->appends($request->all());

        return response()->json($users, 200);
    }

    public function changeMemberStatusApi($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->status = !$user->status;
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Status of member ' . $user->name . ' has been successfully changed.',
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'status' => $user->status
                ]
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the status',
                'error' => $e->getMessage()
            ], 500);
        }
    }



}
