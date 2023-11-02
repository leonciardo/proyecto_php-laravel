<?php
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

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
Route::middleware(['auth'])->group(function () {

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/save_producto', [DashboardController::class, 'save_producto'])->name('save.producto');
Route::post('/guardar_producto', [DashboardController::class, 'guardar_producto'])->name('guardar.producto');
Route::delete('/delete_producto/{id}', [DashboardController::class, 'delete_producto'])->name('delete.producto');
Route::get('/edit_producto/{id}', [DashboardController::class,'edit_producto'])->name('edit.producto');
Route::put('/update_producto/{id}', [DashboardController::class,'update_producto'])->name('update.producto');
Route::get('/aboutme', [DashboardController::class, 'aboutme'])->name('aboutme');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

});
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');*/
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);



