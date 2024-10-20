<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function dashboard(){
        return view('member.dashboard');
    }

    public function edit(){
        return view('member.edit');
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
