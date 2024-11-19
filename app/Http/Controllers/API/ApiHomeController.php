<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProjectGallery;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiHomeController extends Controller
{
    public function homeApi()
    {
        $totalDepartments = DB::table('users')->distinct()->count('department');
        $totalFaculties = DB::table('users')->distinct()->count('faculty');
        $totalBranches = DB::table('users')->distinct()->count('branch');

    // Get users grouped by the year they were created
    $usersGroupedByYear = DB::table('users')
        ->select(DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as total_members'))
        ->groupBy('year')
        ->get();

    // Get active users grouped by the year they were created
    $activeUsersGroupedByYear = DB::table('users')
        ->select(DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(*) as active_members'))
        ->where('status', true)
        ->groupBy('year')
        ->get();

    // Count total active users
    $totalActive = DB::table('users')->where('status', 1)->count();

    // Return the data as JSON
    return response()->json([
        'totalDepartments' => $totalDepartments,
        'totalFaculties' => $totalFaculties,
        'totalBranches' => $totalBranches,
        'usersGroupedByYear' => $usersGroupedByYear,
        'activeUsersGroupedByYear' => $activeUsersGroupedByYear,
        'totalActive' => $totalActive,
    ]);

    }
    public function about(): JsonResponse
    {
        $userOne = User::wherePosition(1)->whereStatus(1)->where('isAdmin', 0)->get();
        $userTwo = User::wherePosition(2)->whereStatus(1)->where('isAdmin', 0)->get();
        $userThree = User::wherePosition(3)->whereStatus(1)->where('isAdmin', 0)->get();

        return response()->json([
            'userOne' => $userOne,
            'userTwo' => $userTwo,
            'userThree' => $userThree,
        ]);
    }

    public function memberDetail($id): JsonResponse
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    public function getApprovedProjects()
    {
        // Retrieve all approved projects
        $projects = ProjectGallery::where('status', 'Approved')->get();

        // Return the projects as a JSON response
        return response()->json([
            'success' => true,
            'data' => $projects
        ], 200);
    }

}
