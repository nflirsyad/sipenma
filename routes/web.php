<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\JenisAduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MhsController;
use App\Http\Livewire\PetugasCreate;
use App\Models\Petugas;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
}); 

Route::get('/login',[LoginController::class,'showLogin'])->name('login');
Route::post('/processLogin',[LoginController::class,'processLogin'])->name('processLogin');
Route::get('/processLogout',[LoginController::class,'processLogout'])->name('processLogout');

Route::group(['middleware' => ['auth:web,petugas,mahasiswa','level:1,2,3']], function(){
   
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/profile',[AdminProfileController::class,'index'])->name('profile');
    
    Route::get('/profile/edit',[AdminProfileController::class,'edit']);
    Route::post('/profile/update',[AdminProfileController::class,'update'])->name('update');
    
    Route::get('/profile/editpass',[AdminProfileController::class,'editPass']);
    Route::post('/profile/update-password',[AdminProfileController::class,'update_password'])->name('update_password');
    
    Route::get('/jenis_aduan',[JenisAduanController::class,'index'])->name('jenis_aduan');
    Route::post('/jenis_aduan/store',[JenisAduanController::class,'store'])->name('jenis_aduan.store');
    Route::get('/jenis_aduan/edit/{id}/', [JenisAduanController::class, 'edit'])->name('jenis_aduan.edit');
    Route::post('/jenis_aduan/update', [JenisAduanController::class, 'update'])->name('jenis_aduan.update');
    Route::get('/jenis_aduan/destroy/{id}/', [JenisAduanController::class, 'destroy']);
    
    Route::get('/mahasiswa/profile',[MhsController::class,'index'])->name('mhs_profile');
    Route::get('/mahasiswa/profile/edit',[MhsController::class,'mhs_edit']);
    Route::post('/mahasiswa/profile/update',[MhsController::class,'mhs_update'])->name('mhs_update');
    Route::post('/mahasiswa/profile/update-password',[MhsController::class,'mhs_update_password'])->name('mhs_update_password');
    Route::get('/mahasiswa/aduan',[MhsController::class,'aduan'])->name('mhs_aduan');
    Route::get('/mahasiswa/aduan/create',[MhsController::class,'create_aduan'])->name('create_aduan');
    Route::get('/mahasiswa/aduan/store',[MhsController::class,'store_aduan'])->name('store_aduan');

    Route::get('/petugas/profile',[PetugasController::class,'petugas_profile'])->name('petugas_profile');
    Route::get('/petugas/profile/edit',[PetugasController::class,'petugas_edit']);
    Route::post('/petugas/profile/update',[PetugasController::class,'petugas_update'])->name('petugas_update');
    Route::post('/petugas/profile/update-password',[PetugasController::class,'petugas_update_password'])->name('petugas_update_password');

    Route::resource('/petugas',PetugasController::class);
    Route::resource('/mahasiswa',MahasiswaController::class);

    
});

// Route::group(['middleware' => ['auth','web']], function(){
// });