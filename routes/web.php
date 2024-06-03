<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/welcome', function () {
    return view('welcome');
})->name("welcome");

Route::get('/products/solarcell', function () {
    return view('customer.products.solarcell');
})->name("solarcell");
Route::get('/products/cctv', function () {
    return view('customer.products.cctv');
})->name("cctv");
Route::get('/products/evcharge', function () {
    return view('customer.products.evcharge');
})->name("evcharge");
Route::get('/products/accesscontrol', function () {
    return view('customer.products.accesscontrol');
})->name("accesscontrol");
Route::get('/products/network', function () {
    return view('customer.products.network');
})->name("network");


Route::get('/calculate', function () {
    return view('customer.calculate');
})->name("calculate");

Route::get('/article', function () {
    return view('customer.article');
})->name("article");
Route::get('/review', function () {
    return view('customer.review');
})->name("review");
Route::get('/about', function () {
    return view('customer.about');
})->name("about");
Route::get('/candidate', function () {
    return view('customer.candidate');
})->name("candidate");



//admin
Route::get('/admin', function () {
    return view('admin.auth.login');
})->name("admin");

Route::get('/admin/view', function () {
    return view('admin.index');
})->name("admin.index");

Route::get('/admin/register/view', function () {
    return view('admin.registerCampaign.view');
})->name("admin.registerCampaign.view");