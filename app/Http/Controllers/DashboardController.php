<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard
    public function dashboard(){
        $members = User::where('isAdmin', 1)->get();
        return view('dashboard.dashboard', compact('members'));
    }

    // Member Controller
    public function memberCreate(){
        return view('dashboard.member_create');
    }

    public function memberStore(){
        //
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
