<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationFormController;
use App\Http\Controllers\ApplicantList;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\filterResume;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\classifyResume;

Route::get('/', function () {
    return view('homepage.index');
});

//home page
Route::group([], function () {
    Route::get('/about', [HomePage::class, 'about'])->name('about');
    Route::get('/listing', [HomePage::class, 'listing'])->name('listing');
});


//user
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

});


// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/user/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/user/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/upload', [ApplicationFormController::class, 'index'])->name('upload.index');
    Route::get('/upload/create', [ApplicationFormController::class, 'create'])->name('upload.create');
    Route::post('/upload/create', [ApplicationFormController::class, 'store'])->name('upload.store');
    Route::get('/upload/edit/{id}', [ApplicationFormController::class, 'edit'])->name('upload.edit');
    Route::put('/upload/edit/{id}', [ApplicationFormController::class, 'update'])->name('upload.update');
    Route::delete('/upload/delete/{id}', [ApplicationFormController::class, 'delete'])->name('upload.delete');
});


//admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('/admin/dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard/view/{id}', [ApplicantList::class, 'index'])->name('admin.dashboard.view');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/jobs', [JobPostingController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [JobPostingController::class, 'create'])->name('jobs.create');
    Route::post('/jobs/create', [JobPostingController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/view/{id}', [JobPostingController::class, 'view'])->name('jobs.view');
    Route::get('/jobs/edit/{id}', [JobPostingController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/update/{id}', [JobPostingController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/delete/{id}', [JobPostingController::class, 'delete'])->name('jobs.delete');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/organization', [OrganizationController::class, 'index'])->name('organization.index');
    Route::post('/organization/store', [OrganizationController::class, 'store'])->name('organization.store');
    Route::get('/organization/view/{id}', [OrganizationController::class, 'view'])->name('organization.view');
    Route::get('/organization/edit/{id}', [OrganizationController::class, 'edit'])->name('organization.edit');
    Route::put('/organization/update/{id}', [OrganizationController::class, 'update'])->name('organization.update');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/filter', [filterResume::class, 'index'])->name('resume.index');
    Route::get('/admin/filter', [filterResume::class, 'filter'])->name('resume.filter');
    Route::post('/admin/filter/results', [filterResume::class, 'filterResults'])->name('filter.results');
});

require __DIR__ . '/auth.php';
