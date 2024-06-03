<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Phattarachai\LineNotify\Facade\Line;

use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/spacial-offer', function (Request $request) {
    Line::send("\nสนใจสิทธิพิเศษ\nชื่อ: {$request->name}\nเบอร์: {$request->tel}\nLineID: {$request->line_id}\nEmail: {$request->email}");
    return redirect()->back()->with('success', 'Your request has been sent successfully.');
})->name('user.spacial-offer');


Route::post('/candidate-form', function (Request $request) {
    Line::send("\nสนใจสมัครงาน\nชื่อ: {$request->name}\nเบอร์: {$request->tel}\nLineID: {$request->line_id}\nEmail: {$request->email}\nตำแหน่ง: {$request->position}");
    return redirect()->back() - with('success', 'ส่งคำขอสมัครสำเร็จ.');
})->name('candidate-form');

Route::post('/package-form', function (Request $request) {
    Line::send("\nสนใจคำนวณพลังงานแสงอาทิตย์\nชื่อ: {$request->packageform_name}\nเบอร์: {$request->packageform_tel}\nEmail: {$request->packageform_email}\nค่าไฟต่อเดือน: {$request->packageform_bill_per_month}\nช่วงเวลาใช้ไฟ: กลางวัน {$request->packageform_day_time} \t กลางคืน {$request->packageform_night_time}\nระบบไฟ: {$request->packageform_power_system}\n");
    return redirect()->back()->with('success', 'ส่งคำขอคำนวณพลังงานแสงอาทิตย์สำเร็จ.');
})->name('package-form');

Route::get('/product/cctv', 'ProductController@cctv')->name('product.cctv');
Route::get('/product/solarcell', 'ProductController@solarcell')->name('product.solarcell');
Route::get('/product/evcharge', 'ProductController@evcharge')->name('product.evcharge');
Route::get('/product/accesscontrol', 'ProductController@accesscontrol')->name('product.accesscontrol');
Route::get('/product/network', 'ProductController@network')->name('product.network');
Route::get('/product/all', 'ProductController@all')->name('product.all');
Route::post('/product/store', 'ProductController@store')->name('product.store');
Route::put('/product/update', 'ProductController@update')->name('product.update');
Route::post('/product/delete', 'ProductController@delete')->name('product.delete');
Route::get('/product/getProductById', 'ProductController@getProductById')->name('product.getProductById');


Route::get('/candidate/all', 'CandidateController@all')->name('candidate.all');
Route::get('/candidate/getCandidateById', 'CandidateController@getCandidateById')->name('candidate.getCandidateById');
Route::post('/candidate/register', 'CandidateController@register')->name('candidate.register');
Route::put('/candidate/update', 'CandidateController@update')->name('candidate.update');

Route::get('/campaign-register/all', 'CampaignRegisterController@all')->name('campaign-register.all');
Route::get('/campaign-register/getCampaignRegistersById', 'CampaignRegisterController@getCampaignRegistersById')->name('campaign-register.getCampaignRegistersById');
Route::post('/campaign-register/register', 'CampaignRegisterController@register')->name('campaign-register.register');
Route::put('/campaign-register/update', 'CampaignRegisterController@update')->name('campaign-register.update');


Route::get('/logout', function () {
    Session::flush();
    return view('admin.auth.login');
})->name('admin.logout');

Route::post('/login', 'AuthController@login')->name('login');

Route::get('/test-connection', function () {
    try {
        $data = Illuminate\Support\Facades\DB::select('SELECT * FROM products');
    } catch (\Exception $e) {
        return $e->getMessage();
    }
    return $data ? 'Connection success' : 'Connection failed';
})->name('test-connection');