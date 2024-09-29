<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ServiceController;
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
Route::get('/blog/details', [HomeController::class, 'blogDetails'])->name('details');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

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
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');

    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
});