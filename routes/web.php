<?php

use App\Http\Middleware\CekLogin;
use App\Http\Middleware\CekLogout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CuttingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware(CekLogin::class);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware(CekLogout::class);;
Route::post('/login', [LoginController::class, 'login']);  

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware(CekLogin::class);


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//product
Route::get('/product', [ProductController::class, 'view'])->name('product')->middleware(CekLogin::class);
Route::get('/product/detailStock/{id}', [ProductController::class, 'detailStock'])->name('detailStock')->middleware(CekLogin::class);
Route::post('/product/addStok', [ProductController::class, 'addStok'])->name('addStok')->middleware(CekLogin::class);
Route::get('/product/detail/{id}', [ProductController::class, 'detailStokProduct'])->name('detailStokProduct')->middleware(CekLogin::class);



//request
Route::get('/request', [RequestController::class, 'view'])->name('request')->middleware(CekLogin::class);
Route::get('/request/add', [RequestController::class, 'post'])->name('request.add')->middleware(CekLogin::class);
Route::post('/request/save', [RequestController::class, 'save'])->name('request.save')->middleware(CekLogin::class);
Route::get('/request/edit/{id}', [RequestController::class, 'put'])->name('request.edit')->middleware(CekLogin::class);
Route::get('/request/detail/add/{id}', [RequestController::class, 'detailAdd'])->name('request.detail.add')->middleware(CekLogin::class);
Route::post('/request/update/{requestId}', [RequestController::class, 'detailPut'])->name('detail.update')->middleware(CekLogin::class);

Route::delete('/request/delete/{id}', [RequestController::class, 'delete'])->name('request.delete')->middleware(CekLogin::class);
Route::get('/request/detail/{id}', [RequestController::class, 'detail'])->name('request.detail')->middleware(CekLogin::class);

Route::get('/request/{id}/print', [RequestController::class, 'printBon'])->name('request.print');


//cutting
Route::get('/cutting', [CuttingController::class, 'view'])->name('cutting')->middleware(CekLogin::class);
Route::get('/cutting/detail/{id}', [CuttingController::class, 'detail'])->name('cutting.detail')->middleware(CekLogin::class);
Route::get('/cutting/edit/{id}', [CuttingController::class, 'put'])->name('cutting.edit')->middleware(CekLogin::class);
Route::post('/cutting/approve/{id}', [CuttingController::class, 'approve'])->name('cutting.approve')->middleware(CekLogin::class);
Route::get('/cutting/{id}/print', [CuttingController::class, 'printCutting'])->name('cutting.print');


//buyying
Route::get('/buying', [BuyController::class,'view'])->name('buying')->middleware(CekLogin::class);
Route::post('/buying/add', [BuyController::class,'add'])->name('buying.add')->middleware(CekLogin::class);
Route::get('/buying/detail/{id}', [BuyController::class,'detailBuy'])->name('buying.detail')->middleware(CekLogin::class);
Route::get('/buying/done/{id}', [BuyController::class,'done'])->name('buying.done')->middleware(CekLogin::class);
