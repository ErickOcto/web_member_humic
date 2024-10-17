<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard
    public function dashboard(){
        return view('dashboard.dashboard');
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
