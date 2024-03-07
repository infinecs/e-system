<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Counter;
 

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('#', function () {
    return view('auth.login');
});
Route::get('/resetPassword', function () {
    return view('auth.resetPassword');
});
Route::get('clear_cache', function () {

    Artisan::call('cache:clear');

    dd("Cache is cleared");

});


 
//Login Controller Start
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/pages/errorRedirect', [LoginController::class, 'authenticate']);
Route::post('/forgotPassword', [LoginController::class, 'forgotPassword']);
Route::get('/auth/resetPasswordValidate/{token}',[LoginController::class, 'resetPasswordValidate']);
Route::post('/forgotPasswordAction', [LoginController::class, 'forgotPasswordAction'])->name('forgotPasswordAction');






//Admin Controller Start    
    Route::group(['AdminMiddleware' => 'admin'], function () {
    Route::get('/admin/index', [AdminController::class, 'index']);
    Route::get('/admin/logout', [AdminController::class, 'logout']);
    Route::get('/admin/profile/{id?}', [AdminController::class, 'profile']);
    Route::get('/admin/setting', [AdminController::class, 'setting']);
    Route::get('/admin/profileEdit', [AdminController::class, 'profileEdit']);
    Route::get('/admin/userList', [AdminController::class, 'userList']);
    Route::get('/admin/userAdd', [AdminController::class, 'userAdd']);
    Route::get('/admin/userEdit/{id?}', [AdminController::class, 'userEdit'])->name('userEdit');
    Route::post('/admin/userEditStore', [AdminController::class, 'userEditStore'])->name('userEditStore');
    Route::post('/admin/userStore', [AdminController::class, 'userStore'])->name('userStore');
    Route::get('/admin/userDelete/{id}', [AdminController::class, 'userDelete'])->name('userDelete');
    Route::get('/admin/assetList', [AdminController::class, 'assetList']);
    Route::post('/admin/assetStore', [AdminController::class, 'assetStore'])->name('assetStore');
    Route::get('/admin/assetAdd', [AdminController::class, 'assetAdd']);
    Route::post('/check-asset-tag', [AdminController::class, 'checkAssetTag']);
    Route::post('/check-serial-number', [AdminController::class, 'checkSerialNumber']);
    Route::get('/admin/assetDelete/{id}', [AdminController::class, 'assetDelete'])->name('assetDelete');
    Route::get('/admin/assetEdit/{id}', [AdminController::class, 'assetEdit'])->name('assetEdit');
    Route::post('/admin/assetEditCommit', [AdminController::class, 'assetEditCommit'])->name('assetEditCommit');
    Route::get('/admin/assetPrintPreview', [AdminController::class, 'assetPrintPreview'])->name('assetPrintPreview');
    Route::get('/admin/assetPrintPreviewContent', [AdminController::class, 'assetPrintPreviewContent'])->name('assetPrintPreviewContent');
    
    
    

    
    

});

Route::get('/counter', Counter::class);

