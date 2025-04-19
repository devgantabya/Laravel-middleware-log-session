<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function() {
    Route::get('/members', [MemberController::class, 'members'])->name('members');
    Route::get('/member', [MemberController::class, 'member'])->name('member');
    Route::get('/memberid/{id}', [MemberController::class, 'memberId'])->name('member.id');
});

Route::get('/throttletest', [MemberController::class, 'throttleTest'])->middleware('throttle:2,1')->name('throttletest'); //throttle:request/minute


Route::get('demo1', [SessionController::class, 'demo1']);
Route::get('demo2', [SessionController::class, 'demo2']);
Route::get('demo3', [SessionController::class, 'demo3']);
Route::get('demo4', [SessionController::class, 'demo4']);

require __DIR__.'/auth.php';
