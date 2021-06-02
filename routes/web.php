<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailsController;
use App\Models\SalesManDetail;
use Illuminate\Support\Facades\DB;
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
});

Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
 Route::get('/login',[AdminController::class,'loginForm']);
 Route::post('/login',[AdminController::class,'store'])->name('admin.login');
});




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
	//$details =SalesManDetail::all();

	$details = DB::table('details')->latest()->paginate(3);
   
    return view('admindashboard',compact('details'));
})->name('admindashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//sales man details

Route::get('/details/all',[DetailsController::class,'AllDetail'])->name('all.salespersons');

Route::post('/store/details',[DetailsController::class,'StoreDetail'])->name('store.details');


Route::get('/detail/edit/{id}',[DetailsController::class,'DetailEdit']);

Route::get('/detail/update/{id}',[DetailsController::class,'DetailUpdate']);
Route::get('/detail/delete/{id}',[DetailsController::class,'DetailDelete']);


