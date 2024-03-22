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
    Route::put('/admin/profileEdit', [AdminController::class, 'update'])->name('update');

    Route::get('/admin/jobApplication', [AdminController::class, 'jobApplication'])->name('admin.jobApplication');
    Route::post('/admin/jobApplication', [AdminController::class, 'jobApplication'])->name('admin.jobApplication2');

    Route::get('/admin/editJobApplication/{ApplicationID}', [AdminController::class, 'showEditForm'])->name('showEditForm');
    Route::post('/admin/editJobApplication', [AdminController::class, 'editJobApplication'])->name('editJobApplication');
    Route::get('/admin/applicationDetails/{ApplicationId}', [AdminController::class, 'getApplicationDetails']);
    Route::get('/admin/applicationDelete/{ApplicationID}', [AdminController::class, 'applicationDelete'])->name('applicationDelete');
    Route::get('/admin/addJobApplication', [AdminController::class, 'addJobApplication']);
    Route::post('/admin/applicationStore', [AdminController::class, 'applicationStore'])->name('applicationStore');

    Route::get('/admin/applicationView/{ApplicationID}', [AdminController::class, 'applicationView'])->name('applicationView');

    Route::get('/admin/department', [AdminController::class, 'department']);
    Route::get('/admin/addDepartment', [AdminController::class, 'addDepartment']);
    Route::get('/admin/editDepartment/{id}', [AdminController::class, 'showEditDepartmentForm'])->name('showEditDepartmentForm');
    Route::post('/admin/editDepartment', [AdminController::class, 'editDepartment'])->name('editDepartment');
    Route::get('/admin/departmentDelete/{id}', [AdminController::class, 'departmentDelete'])->name('departmentDelete');
    Route::post('/admin/departmentStore', [AdminController::class, 'departmentStore'])->name('departmentStore');

    Route::get('/admin/job', [AdminController::class, 'job']);
    Route::get('admin/job/{id}', [AdminController::class, 'job'])->name('job.details');

    Route::get('/admin/OpenPositions', [AdminController::class, 'OpenPositions']);
    Route::get('/admin/addOpenPositions', [AdminController::class, 'addOpenPositions']);
    Route::post('/admin/PositionsStore', [AdminController::class, 'PositionsStore'])->name('PositionsStore');
    Route::get('/admin/PositionsDelete/{id}', [AdminController::class, 'PositionsDelete'])->name('PositionsDelete');
    Route::get('/admin/editPositions/{id}', [AdminController::class, 'showEditPositionsForm'])->name('showEditPositionsForm');
    Route::post('/admin/editPositions', [AdminController::class, 'editPositions'])->name('editPositions');


    Route::get('/admin/profilephoto', [AdminController::class, 'profilephoto'])->name('profilephoto');
    Route::post('upload', [AdminController::class, 'upload'])->name('upload');

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

