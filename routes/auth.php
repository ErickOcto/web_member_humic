<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // Route::get('register', [RegisteredUserController::class, 'create'])
    //     ->name('register');

    // Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});


//Mobile Authentication
Route::post('api/login', [AuthController::class, 'login'])->withoutMiddleware([VerifyCsrfToken::class]);;
Route::post('api/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->withoutMiddleware([VerifyCsrfToken::class]);;

use App\Http\Controllers\Api\ApiDashboardController;

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    // Members API
    Route::get('api/members', [ApiDashboardController::class, 'dashboard']);
    Route::get('api/members/{id}', [ApiDashboardController::class, 'getMemberById']);
    Route::post('api/members', [ApiDashboardController::class, 'memberStore'])->withoutMiddleware([VerifyCsrfToken::class]);
    Route::delete('api/members/{id}', [ApiDashboardController::class, 'memberDestroy']);


    // Announcements API
    Route::post('api/announcements', [ApiDashboardController::class, 'storeAnnouncement']); // Create a new announcement
    Route::get('api/announcements', [ApiDashboardController::class, 'getAnnouncements']); // Get all announcements

    // Project Gallery API
    Route::get('api/project-gallery', [ApiDashboardController::class, 'getProjectGallery']); // Get all project gallery items
    Route::post('api/project-gallery/{id}/approve', [ApiDashboardController::class, 'approveProjectGallery']); // Approve a project gallery item
    Route::post('api/project-gallery/{id}/status', [ApiDashboardController::class, 'updateProjectMemberStatus']); // Update project status and comments
});
