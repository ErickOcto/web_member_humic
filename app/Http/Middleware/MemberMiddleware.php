<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MemberMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !Auth::user()->isAdmin) {
            return $next($request);
        }

        return redirect()->route('home')->with(['error' => 'Anda tidak memiliki akses sebagai member.']);
    }
}
