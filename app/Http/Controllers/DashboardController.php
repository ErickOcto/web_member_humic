<?php

namespace App\Http\Controllers;

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

    // Project Gallery

    public function projectGallery(){
        return view('dashboard.project_gallery');
    }

    public function projectGalleryApproval(){
        return view('dashboard.project_gallery_approval');
    }

    public function memberHistory(){
        return view('dashboard.member_history');
    }
}
