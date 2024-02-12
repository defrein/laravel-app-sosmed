<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaLikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [DashboardController::class,'index'])->name('dashboard');



Route::group(['prefix'=> 'ideas/', 'as' => 'ideas.'], function () {
    // Route::get('/{idea}', [IdeaController::class,'show'])->name('show');

    Route::group(['middleware' => ['auth']], function () {
        // Route::post('', [IdeaController::class,'store'])->name('store');

        // Route::get('/{idea}/edit', [IdeaController::class,'edit'])->name('edit');
        // Route::put('/{idea}/', [IdeaController::class,'update'])->name('update');
        // Route::delete('/{idea}', [IdeaController::class,'destroy'])->name('destroy');

        Route::post('/{idea}/comments', [CommentController::class,'store'])->name('comments.store');
    });
});

Route::resource('ideas', IdeaController::class)->except(['index','create', 'show'])->middleware('auth');
Route::resource('ideas', IdeaController::class)->only(['show']);
Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only('update', 'edit')->middleware('auth');
Route::resource('users', UserController::class)->only('show');

Route::get('profile', [UserController::class,'profile'])->name('profile')->middleware('auth');

Route::post('users/{user}/follow', [FollowerController::class,'follow'])->name('users.follow')->middleware('auth');
Route::post('users/{user}/unfollow', [FollowerController::class,'unfollow'])->name('users.unfollow')->middleware('auth');

Route::post('ideas/{idea}/like', [IdeaLikeController::class,'like'])->name('ideas.like')->middleware('auth');
Route::post('users/{idea}/unlike', [IdeaLikeController::class,'unlike'])->name('ideas.unlike')->middleware('auth');

Route::get('/feed', FeedController::class)->name('feed')->middleware('auth');

Route::get('/terms', function(){
    return view('terms');
})->name('terms');

Route::get('/admin', [AdminDashboardController::class,'index'])->name('admin.dashboard')->middleware(['auth', 'can:admin']);

