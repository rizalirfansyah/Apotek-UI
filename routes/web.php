<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

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
    return view('dashboard');
})->name('dashboard');

Route::resource('transaction', TransactionController::class);
Route::resource('medicine', ObatController::class);
Route::resource('category', CategoryController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('user', UserController::class);

Route::post('user/search', [UserController::class, 'search'])->name('user.search');
Route::post('/register', [UserController::class, 'store'])->name('register');
Route::get('register-form', [UserController::class, 'registerform']);
Route::get('login-form', [UserController::class, 'loginform']);

Route::get('/login_admin', function (Request $request) {
    $response = Http::post('http://Rizal:8005/user/login', [
        'username' => 'admin',
        'password' => 'admin123',
    ]);

    if ($response->successful()) {
        $data = $response->json();

        $request->session()->put('token', $data['token']);

        return redirect()->route('dashboard')
            ->with('success', 'Login berhasil');
    } else {
        return redirect()->route('dashboard')
            ->with('error', 'Akun tidak terdaftar');
    }
})->name('login_admin');

Route::get('/login_cashier', function (Request $request) {
    $response = Http::post('http://Rizal:8005/user/login', [
        'username' => 'cashier',
        'password' => 'cashier123',
    ]);

    if ($response->successful()) {
        
        $data = $response->json();

        $request->session()->put('token', $data['token']);

        return redirect()->route('dashboard')
            ->with('success', 'Login berhasil');
    } else {
        return redirect()->route('dashboard')
            ->with('error', 'Akun tidak terdaftar');
    }
})->name('login_cashier');

Route::get('/register', function () {
    $response = Http::post('http://Rizal:8005/user/register', [
        'nik' => '1201190034',
        'username' => 'cashier',
        'password' => 'cashier123',
    ]);

    if ($response->successful()) {
        return redirect()->route('dashboard')
            ->with('success', 'Akun berhasil terdaftar');
    } else {
        return redirect()->route('dashboard')
            ->with('error', 'Akun tidak terdaftar');
    }
})->name('register');

Route::get('/logout', function (Request $request) {

    $data['token'] = "null";

    $request->session()->put('token', $data['token']);

    return redirect()->route('dashboard')
            ->with('success', 'Logout berhasil');
})->name('logout');


