<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\kampung\ActivityController;
use App\Http\Controllers\operator\OperatorController;
use App\Http\Controllers\kampung\PengumumanController;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\kampung\InformationController;
use App\Http\Controllers\kampung\AdminKampungController;
use App\Http\Controllers\masyarakat\MasyarakatController;
use App\Http\Controllers\kampung\KampungPengaduanController;
use App\Http\Controllers\kampung\KampungMasyarakatController;
use App\Http\Controllers\kampung\KampungOperatorController;
use App\Http\Controllers\masyarakat\MasyarakatDaruratController;

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
Route::get('/403', [GeneralController::class, 'forbidden'])->name('403');
Route::get('/waiting', [GeneralController::class, 'waiting'])->name('accountWait');

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
Route::middleware('IsAdmin')->name("admin.")->group(function() {
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

    // Operator
    Route::get('/admin/operator', [AdminController::class, 'operator'])->name('operator');
    Route::get('/admin/operator-waiting', [AdminController::class, 'operatorWaiting'])->name('operatorWaiting');
    Route::get('/admin/operator-granted', [AdminController::class, 'operatorGranted'])->name('operatorGranted');

    Route::get('/admin/operator/{operator}', [AdminController::class, 'operatorDetail'])->name('operatorDetail');
    Route::get('/admin/operator/{operator}/grant', [AdminController::class, 'operatorGrant'])->name('operatorGrant');
});

// Admin Kampung route
Route::middleware('IsAdminKampung')->name('kampung.')->group(function() {
    Route::get('/kampung', [AdminKampungController::class, 'index'])->name('index');

    Route::resource('/kampung/pengumuman', PengumumanController::class);
    Route::resource('/kampung/information', InformationController::class);
    Route::resource('/kampung/activity', ActivityController::class);

    Route::controller(KampungMasyarakatController::class)->name('masyarakat.')->group(function() {
        Route::get('/kampung/masyarakat', 'index')->name('index');
        Route::get('/kampung/masyarakat-waiting', 'waiting')->name('waiting');
        Route::get('/kampung/masyarakat-granted', 'granted')->name('granted');
        Route::get('/kampung/masyarakat/{masyarakat}', 'detail')->name('detail');
        Route::get('/kampung/masyarakat/{masyarakat}/grant', 'grant')->name('grant');
    });

    Route::controller(KampungPengaduanController::class)->name('pengaduan.')->group(function() {
        Route::get('/kampung/pengaduan', 'index')->name('index');
        Route::get('/kampung/pengaduan/{category}', 'category')->name('category');
        Route::get('/kampung/pengaduan/detail/{complaint}', 'detail')->name('detail');
    });

    Route::controller(KampungOperatorController::class)->name('operator.')->group(function() {
        Route::get('/kampung/operator', 'index')->name('index');
        Route::get('/kampung/operator/tambah', 'tambah')->name('tambah');
        Route::get('/kampung/operator/tambah/{operator}', 'tambahDetail')->name('tambahDetail');
        Route::get('/kampung/operator/tambah/{operator}/process', 'tambahProcess')->name('tambahProcess');
        Route::get('/kampung/operator/{operator}', 'detail')->name('detail');
    });
});


// Masyarakat Route
Route::middleware('IsUser')->name('masyarakat.')->group(function() {
    Route::controller(MasyarakatController::class)->group(function() {
        Route::get('/masyarakat', 'index')->name('index');
    
        // Pengumuman
        Route::get('/masyarakat/pengumuman', 'pengumuman')->name('pengumuman');
        Route::get('/masyarakat/pengumuman/{pengumuman}', 'detailPengumuman')->name('pengumumanDetail');
    
        // Informasi
        Route::get('/masyarakat/informasi', 'information')->name('information');
        Route::get('/masyarakat/informasi/{information}', 'detailInformation')->name('informationDetail');
    
        // Pengaduan
        Route::name('pengaduan.')->group(function() {
            Route::get('/masyarakat/pengaduan', 'pengaduan')->name('index');
            Route::get('/masyarakat/pengaduan/baru', 'buatPengaduan')->name('create');
            Route::post('/masyarakat/pengaduan/baru', 'buatPengaduanProcess')->name('store');
            Route::get('/masyarakat/pengaduan/{complaint}', 'pengaduanDetail')->name('detail');
        });
    
        // Kegiatan
        Route::name('activity.')->group(function() {
            Route::get('/masyarakat/activity', 'kegiatan')->name('index');
            Route::get('/masyarakat/activity/{activity}', 'kegiatanDetail')->name('detail');
        });
    });

    // Emergency
    Route::controller(MasyarakatDaruratController::class)->name('darurat.')->group(function() {
        // Create Emergency
        Route::get('/masyarakat/emergency/create', 'create')->name('create');
        Route::post('/masyarakat/emergency/create-process', 'createProcess')->name('createProcess');

        // History
        Route::get('/masyarakat/emergency/history', 'history')->name('history');
        Route::get('/masyarakat/emergency/history-proses', 'historyProses')->name('historyProses');
        Route::get('/masyarakat/emergency/history-selesai', 'historySelesai')->name('historySelesai');
        Route::get('/masyarakat/emergency/history/{darurat}', 'historyDetail')->name('historyDetail');
    });
});


// Operatato Route
Route::middleware('IsOperator')->controller(OperatorController::class)->name('operator.')->group(function() {
    Route::get('/operator', 'index')->name('index');

    // Kampung
    Route::get('/operator/kampung', 'kampung')->name('kampung');
    Route::get('/operator/kampung/{village}', 'kampungDetail')->name('kampungDetail');

    // Private
    Route::get('/operator/private', 'private')->name('private');
    Route::get('/operator/private-proses', 'privateProses')->name('privateProses');
    Route::get('/operator/private-selesai', 'privateSelesai')->name('privateSelesai');
    Route::get('/operator/private/{darurat}', 'privateDetail')->name('privateDetail');
    Route::get('/operator/private/{darurat}/proses', 'proses')->name('proses');
    Route::post('/operator/private/response', 'response')->name('response');
    Route::get('/operator/private/{darurat}/selesai', 'selesai')->name('selesai');

    // Public
    Route::get('/operator/public', 'public')->name('public');
    Route::get('/operator/public/{darurat}', 'publicDetail')->name('publicDetail');
    Route::get('/operator/publikasi', 'publikasi')->name('publikasi');
    Route::get('/operator/publikasi/create', 'publikasiCreate')->name('publikasiCreate');
    Route::post('/operator/publikasi/store', 'publikasiStore')->name('publikasiStore');
    Route::get('/operator/publikasi/{publikasi}', 'publikasiDetail')->name('publikasiDetail');
});