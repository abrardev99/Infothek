<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controllers\FrontendController::class, 'index']);


Route::group(['middleware' => 'auth'], function (){

    Route::get('/dashboard', Controllers\User\DashboardController::class)->name('dashboard');
    Route::view('/profile', 'user.profile')->name('profile');

    Route::resource('category', Controllers\User\CategoryController::class)->except('destroy');
    Route::resource('post', Controllers\User\PostController::class)->except('destroy');
    Route::post('post/tinymce/image', [Controllers\User\PostController::class, 'tinymceImageStore'])->name('post.tinymce-image.store');

});

//     filepond routes
Route::group(['prefix' => 'filepond'], function (){

    Route::post('/thumbnail', function (\Illuminate\Http\Request $request){
        $ctrl = new Controllers\FilePondController();
        return $ctrl->upload('thumbnail', $request);
    });
    Route::post('/attachments', function (\Illuminate\Http\Request $request){
        $ctrl = new Controllers\FilePondController();
        return $ctrl->upload('attachments', $request);
    });
    Route::delete('/', [Controllers\FilePondController::class, 'delete']);
});

Route::get('/{post}', [Controllers\FrontendController::class, 'show'])->name('single-post');
Route::get('/category/{category}', [Controllers\FrontendController::class, 'categoryPosts'])->name('category-posts');


require __DIR__.'/auth.php';
