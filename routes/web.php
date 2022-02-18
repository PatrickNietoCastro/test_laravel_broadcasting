<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('welcome');
//})->middleware('auth');
});

//Route::get('login', function () { return view('login'); })->name('login');
//Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//Route::post('authenticate', [LoginController::class, 'authenticate']);

Route::get('/fire', function () {
    $message1 = "{'very': 'important meta data'}";
    $message2 = "{'very': 'insignificant useless information'}";
    event(new \App\Events\TestEvent($message1));
    broadcast(new \App\Events\TestEvent($message2))->toOthers();

    return 'ok';
//})->middleware('auth');
});

