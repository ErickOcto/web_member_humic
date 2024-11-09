<?php

namespace App\Http\Controllers;

use App\Models\ProjectGallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $totalDepartments = DB::table('users')->distinct()->count('department');
        $totalFaculties = DB::table('users')->distinct()->count('faculty');
        $totalBranches = DB::table('users')->distinct()->count('branch');

        $usersGroupedByYear = DB::table('users')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as total_members'))
            ->groupBy('year')
            ->get();

        $activeUsersGroupedByYear = DB::table('users')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as active_members'))
            ->where('status', true)
            ->groupBy('year')
            ->get();

        $projects = ProjectGallery::where('status', 'Approved')->get();

        return view('welcome', compact('totalDepartments', 'totalFaculties', 'totalBranches', 'activeUsersGroupedByYear', 'usersGroupedByYear', 'projects'));
    }





    public function about(){
        $userOne = User::wherePosition(1)->whereStatus(1)->where('isAdmin', 0)->get();
        $userTwo = User::wherePosition(2)->whereStatus(1)->where('isAdmin', 0)->get();
        $userThree = User::wherePosition(3)->whereStatus(1)->where('isAdmin', 0)->get();
        return view('pages.about', compact('userOne', 'userTwo', 'userThree'));
    }

    public function contact(){
        return view('pages.contact');
    }

    public function statistics(){
        $totalDepartments = DB::table('users')->distinct()->count('department');
        $totalFaculties = DB::table('users')->distinct()->count('faculty');
        $totalBranches = DB::table('users')->distinct()->count('branch');

        $usersGroupedByYear = DB::table('users')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as total_members'))
            ->groupBy('year')
            ->get();

        $activeUsersGroupedByYear = DB::table('users')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as active_members'))
            ->where('status', true)
            ->groupBy('year')
            ->get();

        $totalActive = DB::table('users')->where('status', 1)->count();

        return view('pages.statistics', compact('totalDepartments', 'totalFaculties', 'totalBranches', 'activeUsersGroupedByYear', 'usersGroupedByYear', 'totalActive'));
    }

    public function project_gallery(){
        $projects = ProjectGallery::where('status', 'Approved')->get();
        return view('pages.project_gallery', compact('projects'));
    }
}
