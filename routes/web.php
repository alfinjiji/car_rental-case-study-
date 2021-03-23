<?php

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
    return view('pages.index');
});

Route::get('/manage-account', function () {
    return view('pages.manage-account');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//update user details
Route::post('edit/{id}', 'profileUpdateController@edit');
//delete users in admin page
//Route::get('/admin-index','userDeleteController@index');
Route::get('delete/{id}','userDeleteController@destroy');
//insert data [car register]
Route::get('/car-register','carUploadController@insert');
Route::post('create','carUploadController@create');
//retrive car data
Route::get('/your-car/{id}','carController@index');
//car data in index page
Route::get('/','carController@show');
//car details
Route::get('/car-single','carController@details');
Route::get('/car-single/{id}','carController@car');
//delete car
Route::get('deletecar/{id}','carController@destroy');
//filter or search car
Route::get('filter','carController@filter');
//order
Route::resource('/order','orderController');
//delete order
Route::get('cancel/{id}','orderController@cancel');
//admin
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    //All the admin routes will be defined here...
    Route::get('/admin-home','HomeController@index')->name('home');
    //admin login
    Route::get('/signin', function () {
        return view('admin.login');
    });
    // customer,rental and car details in admin page
    Route::get('/admin-customer','userDeleteController@customer');
    Route::get('/admin-rental','userDeleteController@rental');
    Route::get('/admin-car','userDeleteController@car');
    Route::get('/admin-order','userDeleteController@order');
    //delete users in admin page
    Route::get('delete1/{id}','userDeleteController@destroy1');
    Route::get('delete2/{id}','userDeleteController@destroy2');
    //delete cars in admin page
    Route::get('deletecar/{id}','userDeleteController@destroycar');

    Route::namespace('Auth')->group(function(){
        
        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');
    
        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    
        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
    
    }); 
    
  });
//admin


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
