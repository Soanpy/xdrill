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


Route::get('/','ViewController@index')->name('index');

Route::get('/login','ViewController@admin')->name('login.page');
Route::post('/login','UserController@login')->name('login');
Route::get('/register','ViewController@register')->name('register.page');
Route::post('/register','UserController@register')->name('register');

Route::get('/user/usuarios/ativos','ViewController@userUsersAtivos')->name('user.users.ativos');
Route::get('/user/usuarios/inativos','ViewController@userUsersInativos')->name('user.users.inativos');
Route::get('/user/usuario','ViewController@userUsersPerfil')->name('user.dados.user.criado');

Route::middleware(['user'])->prefix('system')->group(function(){
    //VIEW ROUTES
    Route::get('/dashboard','ViewController@systemDashboard')->name('dashboard');
    Route::get('/profile','ViewController@systemUserProfile')->name('user.profile');
    Route::get('/well/{well_id}','ViewController@userWell')->name('user.well');
    Route::get('/register/well','ViewController@userRegisterWell')->name('user.register.well');
    Route::get('/wells','ViewController@userWells')->name('user.pocos');
    Route::get('/create/zone','ViewController@createZone')->name('create.zone');
    Route::get('/zones','ViewController@zones')->name('zones');
    
    //POST ROUTES
    Route::post('/register/well','UserController@registerWell')->name('register.well');
    Route::post('/update/user/data','UserController@updatePersonalUserData')->name('user.update.data');
    Route::post('/update/user/password','UserController@updateUserPassword')->name('user.update.password');
    Route::post('/update/user/address','UserController@updateUserAddress')->name('user.update.address');
    Route::post('/register/well','UserController@registerWell')->name('register.well');
    Route::post('/register/zone','UserController@createZone')->name('register.zone');
    Route::post('/edit/zone', 'UserController@updateZone')->name('edit.zone.name');
    Route::post('/import/well/data', 'UserController@importWellData')->name('import.well.data');
    
    //ACTION GET ROUTES
    Route::get('/well/status/{well_id}','UserController@wellStatus')->name('well.status');
    Route::get('/logout','UserController@userLogout')->name('logout');
    Route::get('/json/depth/wob/{well_id}','AjaxController@graphDepthWobAjax')->name('json.depth_wob');
});

//AJAX buscas
Route::get('/json/countries','AjaxController@countriesAjax')->name('json.countries');
Route::get('/json/zones','AjaxController@zonesAjax')->name('json.zones');
