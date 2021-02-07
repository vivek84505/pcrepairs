<?php

use Illuminate\Support\Facades\Route;
use App\Helpers;

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
 

Route::get('/', 'Usercontroller@login');
Route::post('/loginprocess', 'Usercontroller@loginprocess')->name('loginprocess');

Route::group(['middleware' => 'authmiddleware'], function(){

    Route::get('/dashboard', 'DashboardController@index');


} );
