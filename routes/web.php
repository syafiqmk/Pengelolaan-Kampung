<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminCategoryController;

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

Route::get('/', [GeneralController::class, "welcome"]);

// Auth Route
Route::name("auth.")->controller(AuthController::class)->group(function() {

    Route::middleware('guest')->group(function() {
        // Login
        Route::get("/login", "login")->name("login");
        Route::post("/login", "loginProcess")->name("loginProcess");
    
        // Register
        Route::get("/register", "register")->name("register");
    
        // User Registration
        Route::get("/user-regis", "selectKampung")->name("userSelectKampung");
        Route::get("/user-regis/{village}", "regisUser")->name("regisUser");
        Route::post("/user-regis", "regisUserProcess")->name("regisUserProcess");
        // Operator Registration
        Route::get("/operator-regis", "regisOperator")->name("regisOperator");
        Route::post("/operator-regis", "regisOperatorProcess")->name("regisOperatorProcess");
        // Kampung Registration
        Route::get("/kampung-regis", "regisKampung")->name('regisKampung');
        Route::post("/kampung-regis", "regisKampungProcess")->name('regisKampungProcess');
    });

    Route::post('/logout', 'logout')->name('logout');
});


// Admin Route
Route::name("admin.")->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('index');
    
    // Complaint Category
    Route::resource('/admin/category', AdminCategoryController::class);
    Route::get('/admin/get-category', [AdminController::class, 'category'])->name('get-category');

    // Kampung
    Route::get('/admin/kampung', [AdminController::class, 'kampung'])->name('kampung');
    Route::get('/admin/kampung-waiting', [AdminController::class, 'kampungWaiting'])->name('kampungWaiting');
    Route::get('/admin/kampung-granted', [AdminController::class, 'kampungGranted'])->name('kampungGranted');

    Route::get('/admin/kampung/{village}', [AdminController::class, 'detailKampung'])->name('detailKampung');
    Route::get('/admin/kampung/{village}/grant', [AdminController::class, 'grantKampung'])->name('grantKampung');
})->middleware('admin');