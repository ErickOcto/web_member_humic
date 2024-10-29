<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function dashboard(){
        return view('member.dashboard');
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
        return redirect()->back()->with(['success' => 'Profile berhasil di perbarui']);
    }

    public function pg(){
        return view('member.pg');
    }

    public function pgAdd(){
        return view('member.pg_add');
    }

    public function announcement(){
        return view('member.announcement');
    }
}
