<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\EducationController;
use App\Http\Controllers\admin\ProficiencyController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\ContactController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/resume', [HomeController::class, 'resume'])->name('resume');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{id}', [HomeController::class, 'blogDetalis'])->name('blog.details');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contacts', [HomeController::class, 'contact_admin'])->name('contact.admin');

//login

Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [AuthController::class, 'login'])->name('login');
Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
Route::get('/verify-otp', [AuthController::class, 'showOtpForm'])->name('show.otp.form');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp');
// Protected route
Route::middleware('auth')->group(function () {
    
   
    
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //profile
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/update/{id}', [ProfileController::class, 'storeProfile'])->name('profile.update');
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
    
    Route::resource('education', EducationController::class);

    Route::get('/proficiency', [ProficiencyController::class, 'index'])->name('proficiency.index');
    Route::post('/proficiency/skill', [ProficiencyController::class, 'skill_store'])->name('proficiency.skill_store');
    Route::delete('/proficiency/skills/{id}', [ProficiencyController::class, 'skills_destroy'])->name('skills.destroy');
   
    Route::post('/proficiency/exprience', [ProficiencyController::class, 'exprience_store'])->name('proficiency.exprience_store');
    Route::delete('/proficiency/exprience/{id}', [ProficiencyController::class, 'exprience_destroy'])->name('experiences.destroy');


    Route::get('/admin/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::post('/blog/add', [BlogController::class, 'store'])->name('blog.add');
    Route::get('/admin/blog/details/{id}', [BlogController::class, 'show_blog'])->name('blog.show');
    Route::put('/admin/edit/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/admin/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::get('/admin/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::delete('/admin/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

});