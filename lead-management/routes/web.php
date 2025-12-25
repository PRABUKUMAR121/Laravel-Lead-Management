<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Leadcontroller;
use App\Http\Controllers\Registercontroller;
use App\Http\Middleware\roleMiddleware;
use App\Http\Controllers\telecallercontroller;
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


Route::middleware(['loginmiddle'])->group(function()
{


Route::get('/add-lead', function () {
    return view('concept.pages.add_lead');
});



Route::post('/add-lead',[Leadcontroller::class,'save']);

Route::middleware(['role'])->get('/lead-list',[Leadcontroller::class,'list']);

Route::get('/lead/edit/{id}',[Leadcontroller::class,'edit']);

Route::post('/lead/edit/{id}',[Leadcontroller::class,'update']);

Route::get('/lead/delete/{id}',[Leadcontroller::class,'delete']);






Route::get('/add-tm',[Registercontroller::class,'tm_add']);

Route::post('/add-tm',[Registercontroller::class,'tm_store']);

Route::get('/tm-list',[Registercontroller::class,'tm_list']);

});


Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('concept.index');
});

Route::get('/register',function()
{
    return view('concept.pages.register');

});

Route::post('/register',[Registercontroller::class,'register']);

Route::view('/login','concept.pages.login');

Route::post('/login',[Registercontroller::class,'login']);


Route::resource('telecallers',telecallercontroller::class);