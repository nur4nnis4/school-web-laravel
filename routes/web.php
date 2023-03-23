<?php

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

Route::get('/', function () {
    return view('home', [
        'name' => 'Nisa',
        'role' => 'admin',
        'fruit' => ['apple', 'grape', 'rambutan', 'durian', 'banana']
    ]);
});
Route::get('/students', [StudentController::class, 'index']);
Route::get('/classes', [ClassController::class, 'index']);
Route::get('/extracurricular', [ExtracurricularController::class, 'index']);
Route::get('/teacher', [TeacherController::class, 'index']);

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
