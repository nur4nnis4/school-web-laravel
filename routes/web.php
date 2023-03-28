<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/classes', [ClassController::class, 'index']);
    Route::get('/classes/{id}', [ClassController::class, 'show']);


    Route::controller(StudentController::class)->group(function () {

        Route::get('/students', 'index');

        // Only admin and teacher can access routes below
        Route::middleware(['must-admin-or-teacher'])->group(function () {
            Route::get('/students/{id}', 'show');

            Route::get('/student-create', 'create');
            Route::post('/student-store', 'store');

            Route::get('/student-edit/{id}', 'edit');
            Route::put('/student-update/{id}', 'update');
        });


        // Only admin can access routes below
        Route::middleware(['must-admin'])->group(function () {
            Route::get('/student-delete/{id}', 'delete');
            Route::delete('/student-destroy/{id}', 'destroy');

            Route::get('/student-trash', 'showTrash');
            Route::get('/student/{id}/restore', 'restoreTrash');
        });
    });

    Route::get('/extracurricular', [ExtracurricularController::class, 'index']);

    Route::get('/teachers', [TeacherController::class, 'index']);
    Route::get('/teachers/{id}', [TeacherController::class, 'show']);
});








// Route::get('/product', function () {
//     return 'Product';
// });

// // Basic Route
// Route::get('/friend', function () {
//     return view('friend', ['name' => 'Nisa', 'age' => '28']);
// });

// // View Route
// Route::view('/contact', 'contact', ['name' => 'Nisa', 'age' => '28']);

// // Redirect Route
// Route::redirect('/contact-us', '/contact');

// // Route Parameters

// Route::get('/user/{id}', function (string $id) {
//     return 'User ' . $id;
// });

// Route::get('/product/{id}', function (string $id) {
//     return  view('product.detail', ['id' => $id]);
// });

// // Route Prefix

// Route::prefix('admin')->group(function () {
//     Route::get('/about', function () {
//         return 'about';
//     });
//     Route::get('/contact', function () {
//         return 'contact';
//     });
// });
