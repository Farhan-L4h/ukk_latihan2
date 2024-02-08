<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/tes', function () {
    return view('tes.index');
});


// admin 
Route::controller(AdminController::class)->middleware(['auth', 'HakAkses:admin'])->group(function () {
    // view index
    Route::get('/admin', 'index')->name('admin.index');


    //  masakan
    Route::get('/admin.masakan', 'masakan')->name('admin.masakan');
    // Create
    Route::get('/admin.form-masakan', 'createmasakan')->name('masakan.simpanmasakan');
    Route::post('/admin.form-masakan.create', 'simpanmasakan')->name('masakan.simpanmasakan');
    // update masakan
    Route::get('/admin.form-masakan.create/{id}', 'editmasakan')->name('masakan.edit');
    Route::post('/admin.edit-masakan.create.update/{id}', 'updatemasakan')->name('masakan.update');
    // delete
    Route::get('/admin.edit-masakan.delete/{id}', 'deletemasakan')->name('masakan.delete');


    //  user
    Route::get('/admin.user', 'user')->name('admin.user');
    // user Edit
    Route::get('/admin.user.edit/{id}', 'edituser')->name('user.edit');
    Route::post('/admin.user.edit.update/{id}', 'userupdate')->name('user.edit.update');


    //  order
    Route::get('/admin.order', 'order')->name('admin.order');
    //  details
    Route::get('/admin.details/{order}', 'detailscreate')->name('admin.detailcreate');

    //  transaksi
    Route::get('/admin.transaksi', 'transaksi')->name('admin.transaksi');

    // print
    Route::get('/admin.transakasis.notes/{id}', 'struck')->name('admin.transaksi.notes');
    Route::get('/admin.transakasis.laporan', 'laporan')->name('admin.transaksi.laporan');
});


// user
Route::controller(UserController::class)->middleware('auth', 'HakAkses:user')->group(function () {

    // view
    Route::get('/user', 'index')->name('user.index');

    
    //  beli
    Route::get('/user.beli/{id}', 'beli')->name('user.beli');
    Route::get('/user.beli/{id}', 'beli')->name('user.beli');
    //  create
    Route::post('/user.beli.create/{id}', 'createbeli')->name('user.beli.create');

    //  //order user
    Route::get('/user.details/{no}', 'detailuser')->name('user.detail');

    //transaksi 
    Route::get('/user.transaksi/{id}', 'transaksi')->name('user.transaksi');
    Route::post('/user.transaksi.create/{id}', 'createtransaksi')->name('user.transaksi.create');
    
    
});




