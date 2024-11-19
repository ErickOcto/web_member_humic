<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class MemberMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Middleware Member Called');

        if (Auth::check()) {
            Log::info('Authenticated User:', [Auth::user()]);
            if (Auth::user()->isAdmin == 0) {
                Log::info('User has member access');
                return $next($request);
            }
            Log::info('User is not a member');
        } else {
            Log::info('User is not authenticated');
        }

        return response()->json(['error' => 'Anda tidak memiliki akses sebagai member.'], 403);
    }


}
