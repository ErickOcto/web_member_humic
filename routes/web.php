<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/statistics', [HomeController::class, 'statistics'])->name('statistics');
Route::get('/project_gallery', [HomeController::class, 'project_gallery'])->name('project_gallery');

// Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Admin Panel routes
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    // Admin dashboard routes
    Route::get('/members/{id}', [DashboardController::class, 'getMemberById']);
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::put('/changeMemberStatus/{id}', [DashboardController::class, 'changeMemberStatus'])->name('changeMemberStatus');

    //manage members routes
    Route::get('/create-member', [DashboardController::class, 'memberCreate'])->name('member.create');
    Route::post('/create-member', [DashboardController::class, 'memberStore'])->name('member.store');
    Route::delete('/delete-member/{id}', [DashboardController::class, 'memberDestroy'])->name('member.destroy');

    //announcement routes
    Route::get('/create-announcement', [DashboardController::class, 'announcementCreate'])->name('announcement.create');
    Route::post('/store-announcement', [DashboardController::class, 'announcementStore'])->name('announcement.store');

    //project gallery
    Route::get('/project-gallery', [DashboardController::class, 'projectGallery'])->name('projectGallery.list');
    Route::get('/project-gallery/approval/{id}', [DashboardController::class, 'projectGalleryApproval'])->name('projectGallery.approval');
    Route::put('/updateStatusPG/{id}', [DashboardController::class, 'updateProjectMemberStatus'])->name('projectMember.update');

    //member history
    Route::get('/member-history', [DashboardController::class, 'memberHistory'])->name('member.history');
    Route::get('/login-history/download', [DashboardController::class, 'download'])->name('login-history.download');
});

// Member panel routes
Route::middleware(['auth', 'verified', 'member'])->group(function () {
    Route::get('/member/dashboard', [MemberController::class, 'dashboard'])->name('member.dashboard');
    Route::put('/member/seen/{id}', [MemberController::class, 'seen'])->name('seen');
    Route::get('/member/edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
    Route::put('/member/update/{id}', [MemberController::class, 'update'])->name('member.put');
    Route::get('member/pg', [MemberController::class, 'pg'])->name('member.pg');
    Route::get('member/pgAdd', [MemberController::class, 'pgAdd'])->name('member.pgAdd');
    Route::post('member/pgStore', [MemberController::class, 'pgStore'])->name('member.pgStore');
    Route::get('member/announcement', [MemberController::class, 'announcement'])->name('member.announcement');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
