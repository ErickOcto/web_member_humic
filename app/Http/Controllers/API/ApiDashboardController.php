<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\BroadcastAnnouncement;
use App\Models\Announcement;
use App\Models\AnnouncementImage;
use App\Models\ProjectGallery;
use App\Models\User;
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
            ]);

            // Tambahkan hash pada password
            $validated['password'] = bcrypt($validated['password']);

            // Simpan user
            $user = User::create($validated);

            return response()->json(['success' => 'Member sukses ditambahkan', 'user' => $user], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Member gagal ditambahkan, periksa input Anda.', 'errors' => $e->errors()], 422);
        }
    }

    public function memberDestroy($id){
        $user = User::findOrFail($id);
        $user->status = 0;
        $user->save();
        $user->delete();

        return response()->json(['success' => $user->name . ' sukses dihapus']);
    }


}
