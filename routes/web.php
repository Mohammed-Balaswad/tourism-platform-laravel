<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignupController as AuthSignupController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\SuperAdmin\DestinationsController as SuperAdminDestinationController;
use App\Http\Controllers\SuperAdmin\AdminsController as SuperAdminsController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\TouristController as SuperAdminTouristController;
use App\Http\Controllers\SuperAdmin\AgencyController as SuperAdminAgencyController;
use App\Http\Controllers\SuperAdmin\ReviewController as SuperAdminReviewController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DestinationController as AdminDestinationController; 
use App\Http\Controllers\Admin\MyDestinationController;
use App\Http\Controllers\Admin\MyAgenciesController;
use \App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Tourists\ExploreController;
use App\Http\Controllers\Tourists\ProfileController;
use App\Http\Controllers\Tourists\ReviewController as TouristsReviewController;



                                //! مسار صفحة الترحيب للجميع

Route::get('/', function () {
    return view('welcome');
});

                                //! مسارات تسجيل الدخول و التسجيل

Route::get('/login', [AuthLoginController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [AuthLoginController::class, 'login'])->name('login');
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');

Route::get('/signup', [AuthSignupController::class, 'showSignupForm'])->name('signup.show');
Route::post('/signup', [AuthSignupController::class, 'register'])->name('register');





                                         //! مسارات السائح

Route::middleware(['auth' ,'role:3'])->group(function () {
    Route::get('/explore', [ExploreController::class, 'index'])->name('explore');
    Route::get('/explore/destinations/{destination}', [ExploreController::class, 'show'])->name('explore.destinations.show'); 

    Route::get('/destinations/{destination}/reviews', [TouristsReviewController::class, 'index'])->name('reviews.index');
    Route::get('/destinations/{destination}/reviews/create', [TouristsReviewController::class, 'create'])->name('reviews.create');
    Route::post('/destinations/{destination}/reviews', [TouristsReviewController::class, 'store'])->name('reviews.store');

    Route::get('/reviews/{review}', [TouristsReviewController::class, 'show'])->name('reviews.show');
    Route::get('/reviews/{review}/edit', [TouristsReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [TouristsReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [TouristsReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::get('/profile', [ProfileController::class, 'show'])->name('tourists.profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('tourists.profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('tourists.profile.update');
    
});




                                            //! مسارات الادمن

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/destinations', [AdminDestinationController::class, 'index'])->name('admin.destinations.index');

    Route::get('/admin/mydestinations', [MyDestinationController::class, 'index'])->name('admin.my_destinations.index');
    Route::get('/admin/mydestinations/create', [MyDestinationController::class, 'create'])->name('admin.my_destinations.create');
    Route::post('/admin/mydestinations', [MyDestinationController::class, 'store'])->name('admin.my_destinations.store');
    Route::get('/admin/mydestinations/{destination}', [MyDestinationController::class, 'show'])->name('admin.my_destinations.show'); 
    Route::get('/admin/mydestinations/{id}/edit', [MyDestinationController::class, 'edit'])->name('admin.my_destinations.edit');
    Route::put('/admin/mydestinations/{id}', [MyDestinationController::class, 'update'])->name('admin.my_destinations.update');
    Route::delete('/admin/mydestinations/{id}', [MyDestinationController::class, 'destroy'])->name('admin.my_destinations.destroy');

    Route::get('/admin/my_agencies', [MyAgenciesController::class, 'index'])->name('admin.my_agencies.index');


    Route::get('/admin/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews.index');
    Route::delete('/admin/reviews/{id}', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');

});



    
                                        //! مسارات السوبر ادمن

Route::middleware(['auth', 'role:1'])->group(function () {

    Route::get('/superadmin/dashboard', [SuperAdminDashboardController::class, 'index'])->name('superadmin.dashboard');

    Route::get('/superadmin/admins', [SuperAdminsController::class, 'admins'])->name('superadmin.admins');
    Route::get('/superadmin/admins/create', [SuperAdminsController::class, 'createAdmin'])->name('superadmin.admins.create');
    Route::post('/superadmin/admins/store', [SuperAdminsController::class, 'storeAdmin'])->name('superadmin.admins.store');
    Route::get('/superadmin/admins/{id}/edit', [SuperAdminsController::class, 'editAdmin'])->name('superadmin.admins.edit');
    Route::put('/superadmin/admins/{id}/update', [SuperAdminsController::class, 'updateAdmin'])->name('superadmin.admins.update');
    Route::delete('/superadmin/admins/{id}', [SuperAdminsController::class, 'destroyAdmin'])->name('superadmin.admins.delete');

    Route::get('/superadmin/destinations', [SuperAdminDestinationController::class, 'index'])->name('superadmin.destinations.index');
    Route::get('/superadmin/destinations/create', [SuperAdminDestinationController::class, 'create'])->name('superadmin.destinations.create');
    Route::post('/superadmin/destinations', [SuperAdminDestinationController::class, 'store'])->name('superadmin.destinations.store');
    Route::get('/superadmin/destinations/{destination}', [SuperAdminDestinationController::class, 'show'])->name('superadmin.destinations.show'); 
    Route::get('/superadmin/destinations/{destination}/edit', [SuperAdminDestinationController::class, 'edit'])->name('superadmin.destinations.edit');
    Route::put('/superadmin/destinations/{destination}', [SuperAdminDestinationController::class, 'update'])->name('superadmin.destinations.update');
    Route::delete('/superadmin/destinations/{destination}', [SuperAdminDestinationController::class, 'destroy'])->name('superadmin.destinations.destroy');


    Route::get('/superadmin/tourists', [SuperAdminTouristController::class, 'index'])->name('superadmin.tourists.index');
    Route::delete('/superadmin/tourists/{id}', [SuperAdminTouristController::class, 'destroy'])->name('superadmin.tourists.destroy');


    Route::get('/superadmin/agencies', [SuperAdminAgencyController::class, 'index'])->name('superadmin.agencies.index');
    Route::delete('/superadmin/agencies/{id}', [SuperAdminAgencyController::class, 'destroy'])->name('superadmin.agencies.destroy');
    Route::get('/superadmin/agencies/create', [SuperAdminAgencyController::class, 'create'])->name('superadmin.agencies.create');
    Route::post('/superadmin/agencies', [SuperAdminAgencyController::class, 'store'])->name('superadmin.agencies.store');
    Route::get('/superadmin/agencies/{id}/edit', [SuperAdminAgencyController::class, 'edit'])->name('superadmin.agencies.edit');
    Route::put('/superadmin/agencies/{id}', [SuperAdminAgencyController::class, 'update'])->name('superadmin.agencies.update');
    
    
    Route::get('/superadmin/reviews', [SuperAdminReviewController::class, 'index'])->name('superadmin.reviews.index');
    Route::delete('/superadmin/reviews/{id}', [SuperAdminReviewController::class, 'destroy'])->name('superadmin.reviews.destroy');
});
