<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//         'data' => [
//             [
//                 'name' => 'Arman',
//                 'nim' => 'D0221049',
//                 'angkatan' => 2021
//             ],
//             [
//                 'name' => 'Arman',
//                 'nim' => 'D0221050',
//                 'angkatan' => 2021
//             ]
//         ]
//     ]);
// });

// Route::get('users/{id}/edit', function ($id) {
//     $user = User::findOrFail($id);
//     return Inertia::render('EditUser', [
//         'user' => $user
//     ]);
// });

// Route::put('users/{id}', function () {
//     return Redirect::back()->with([
//         'message' => 'Data berhasil diupdate'
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('data-static', function () {
//     return Inertia::render('DataStatic', [
//         'data' => [
//             [
//                 'name' => 'Arman',
//                 'age' => 22,
//                 'address' => 'Sabang Subik',
//             ],
//             [
//                 'name' => 'Parif',
//                 'age' => 22,
//                 'address' => 'Lampoko',
//             ],
//         ]
//     ]);
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';




Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('form/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/validasi', function (Request $request) {
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ], [
        'email.required' => 'Email tidak boleh kosong',
        'password.required' => 'Password tidak boleh kosong'
    ]);

    $credentials = $request->only(['email', 'password']);

    if (Auth::attempt($credentials)) {
        return view('admin.dashboard');
    } else {
        return back()->with([
            'error' => 'Email atau password invalid'
        ]);
    }
})->name('validasi');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return "mahasiswa";
    }); 
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {

    Route::get('/mahasiswa', function () {
        return "mahasiswa";
    });

    
});

Route::middleware(['auth', 'role:dosen'])->group(function () {

    Route::get('/dosen', function () {
        return "mahasiswa";
    });

    
});
