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
    Route::get('/contact/admin','ViewController@contactAdmin')->name('contact.admin');
    
    //POST ROUTES
    Route::post('/register/well','UserController@registerWell')->name('register.well');
    Route::post('/update/user/data','UserController@updatePersonalUserData')->name('user.update.data');
    Route::post('/update/user/password','UserController@updateUserPassword')->name('user.update.password');
    Route::post('/update/user/address','UserController@updateUserAddress')->name('user.update.address');
    Route::post('/register/well','UserController@registerWell')->name('register.well');
    Route::post('/register/zone','UserController@createZone')->name('register.zone');
    Route::post('/edit/zone', 'UserController@updateZone')->name('edit.zone.name');
    Route::post('/import/well/data', 'UserController@importWellData')->name('import.well.data');
    Route::post('/update/well/info', 'UserController@updateWellInfo')->name('update.well');
    Route::post('/send/message', 'UserController@sendUserMessage')->name('send.message');
    
    //ACTION GET ROUTES
    Route::get('/well/status/{well_id}','UserController@wellStatus')->name('well.status');
    Route::get('/logout','UserController@userLogout')->name('logout');
    Route::get('/json/depth/wob/{well_id}','AjaxController@graphDepthWobAjax')->name('json.depth_wob');
    Route::get('/json/depth/rop/{well_id}','AjaxController@graphDepthRopAjax')->name('json.depth_rop');
    Route::get('/json/depth/mse/{well_id}','AjaxController@graphDepthMseAjax')->name('json.depth_mse');
    Route::get('/json/mse/wob/{well_id}','AjaxController@graphMseWobAjax')->name('json.wob_mse');
    Route::get('/json/rop/wob/{well_id}','AjaxController@graphRopWobAjax')->name('json.rop_wob');
    Route::get('/json/ideal/mse/{well_id}','AjaxController@idealMseAjax')->name('json.ideal_mse');
    Route::get('/json/ideal/wob/{well_id}','AjaxController@idealWobAjax')->name('json.ideal_wob');
    Route::get('/json/ideal/wob2/{well_id}','AjaxController@idealWob2Ajax')->name('json.ideal_wob2');
    Route::get('/json/ideal/rop/{well_id}','AjaxController@idealRopAjax')->name('json.ideal_rop');
    Route::get('/json/zone/data/{zone_id}','AjaxController@zoneDataAjax')->name('json.zone.data');
    Route::get('/update/well/data','UserController@updateWellData')->name('update.data');
    Route::get('/view/well/data','UserController@viewUpdateDataWell')->name('update.well.data');
    Route::get('/delete/data/{data_id}','AjaxController@deleteWellData')->name('delete.well.data');
});

//AJAX buscas
Route::get('/json/countries','AjaxController@countriesAjax')->name('json.countries');
Route::get('/json/zones','AjaxController@zonesAjax')->name('json.zones');
