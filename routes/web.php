<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\dashboard\ApplicationStatusController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\JobseekerController;
use App\Http\Controllers\dashboard\JobStatusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageTemplateController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager as FacadesVoyager;
use TCG\Voyager\Voyager;

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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/', [HomeController::class, 'index'])->name('home.page');
Route::get('job/post', [JobController::class, 'form'])->name('job.form');

//about route
Route::get('about', [HomeController::class, 'about'])->name('about.page');


//contact route
Route::get('contact', [ContactController::class, 'show'])->name('contact.page');
Route::post('contact/form', [ContactController::class, 'mail'])->name('contact.mail');

//job application
Route::get('job/application/{slug}', [JobApplicationController::class, 'show'])->name('job.apply');
Route::post('job/application/{slug}', [JobApplicationController::class, 'apply'])->name('jobdetails.apply');
Route::get('job/{slug}', [JobController::class, 'jobDetail'])->name('job.detail');

Route::get('job/list/page', [JobController::class, 'list'])->name('job.lists');

Route::get('category/{slug}', [JobController::class, 'jobsByCategory'])->name('category.list');

Route::get('search', [JobController::class, 'jobsBySearch'])->name('search.job');


//page template route
Route::get('/page/{slug}', [PageTemplateController::class, 'index'])->name('page.template');




//frontend register route
Route::get('register/jobseeker', [RegisterController::class, 'showJobSeekerRegisterForm'])->name('registerform.jobseeker');
Route::post('register/jobseeker', [RegisterController::class, 'registerJobSeeker'])->name('register.jobseeker');
Route::get('register/employer', [RegisterController::class, 'showEmployerForm'])->name('registerform.employer');
Route::post('register/employer', [RegisterController::class, 'registerEmployer'])->name('register.employer');

//frontend login route
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login');



Route::middleware(['web', 'auth:jobseeker'])->group(function () {

    Route::get('dashboard/jobseeker', [LoginController::class, 'jobseekerDashboard'])->name('jobseeker.dashboard');
    Route::get('dashboard/employer', [LoginController::class, 'employerDashboard'])->name('employer.dashboard');
    //jobseeker dashboard
    Route::get('dashboard/profile', [DashboardController::class, 'showProfile'])->name('dashboard.profile');
    Route::post('dashboard/profile', [DashboardController::class, 'storeProfile'])->name('profile.store');
    Route::get('jobseeker/profile', [JobseekerController::class, 'viewProfile'])->name('jobseeker.profile');

    //edit profile
    Route::get('profile/edit', [JobseekerController::class, 'editProfile'])->name('profile.edit');
    Route::put('profile/edit', [JobseekerController::class, 'updateProfile'])->name('profile.update');

    //delete profile
    Route::delete('profile/delete', [JobseekerController::class, 'deleteProfile'])->name('profile.delete');

    Route::get('jobseeker/status', [ApplicationStatusController::class, 'show'])->name('jobseeker.status');
});

//logout route
// Route::post('logout', function () {
//     Auth::logout();
//     return redirect()->route('home.page');
// })->name('logout');
Route::post('logout', function () {
    Auth::guard('jobseeker')->logout();
    return redirect()->route('home.page')->with("info", "You have logout from dashboard.");
})->name('logout');



Route::group(['prefix' => 'admin'], function () {
    FacadesVoyager::routes();
});
