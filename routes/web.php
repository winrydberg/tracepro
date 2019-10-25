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
Route::get('actors/login','ActorsController@login');
Route::get('actors/logout','ActorsController@logout');
Route::post('actors/authenticate','ActorsController@authenticate');
Route::post('actors/recordtransactions','ActorsController@recordtransactions');
Route::get('actors/getpendingtransactions/{bin}','ActorsController@getpendingtransactions');


Route::group(['prefix'=>'farmers'],function(){
    Route::get('/home','FarmersController@home');

    Route::get('/addinput','FarmersController@addinput');
    Route::post('/savefarminputs','FarmersController@savefarminputs');
    Route::get('/action/{id}/{type?}','FarmersController@farminputaction');
    Route::post('/updatefarminputs','FarmersController@updatefarminputs');
    Route::get('/inputlist','FarmersController@inputlist');

    Route::get('/farmrecords','FarmersController@farmrecords');
    Route::get('/farmrecordslist','FarmersController@farmrecordslist');
    Route::post('/savefarmrecords','FarmersController@savefarmrecords');

    Route::get('/farms','FarmersController@farms');
    Route::post('/addnewfarm','FarmersController@addnewfarm');
    Route::get('/deletefarm','FarmersController@deleteFarm');

    Route::get('/plots','FarmersController@plots');
    Route::post('/addnewplot','FarmersController@addnewplot');
    Route::get('/deleteplot','FarmersController@deletePlot');

    Route::get('/profile','FarmersController@profile');
    Route::get('/transactions','FarmersController@transactions');
});

Route::group(['prefix'=>'foodservice'],function(){
    Route::get('/home','FoodServiceController@home');
    Route::get('/receiveproduct','FoodServiceController@receiveproduct');
    Route::get('/history','FoodServiceController@history');
    Route::get('/approvals','FoodServiceController@approvals');
    Route::get('/approveorder','FoodServiceController@approveorder');
});

Route::group(['prefix'=>'packer'],function(){
    Route::get('/home','PackerController@home');
    Route::get('/profile','PackerController@profile');
    Route::get('/receiveproduct','PackerController@receiveproduct');
    Route::get('/transactions','PackerController@transactions');
});

Route::group(['prefix'=>'retailstore'],function(){
    Route::get('/home','RetailStoreController@home');
    Route::get('/profile','RetailStoreController@profile');
    Route::get('/receiveproduct','RetailStoreController@receiveproduct');
    Route::get('/transactions','RetailStoreController@transactions');
});

Route::group(['prefix'=>'manufacturer'],function(){
    Route::get('/home','ManufacturerController@home');
    Route::get('/profile','ManufacturerController@profile');
    Route::get('/receiveproduct','ManufacturerController@receiveproduct');
    Route::get('/transactions','ManufacturerController@transactions');
});


//===================================================================================
// REGULATOR ROUTES
//===================================================================================
Route::get('regulator/login', 'Regulators\RegulatoryController@login')->name('login');
Route::post('regulator/login', 'Regulators\RegulatoryController@loginAdmin');

Route::group(['middleware' => ['auth:regulator']], function () {
    Route::get('regulator/dashboard', 'Regulators\RegulatoryController@index');
    Route::get('regulator/new-actor', 'Regulators\RegulatoryController@newActor');
    Route::post('regulator/new-actor', 'Regulators\RegulatoryController@registerActor');
    Route::post('regulator/get-bin', 'Regulators\RegulatoryController@getNewBIN');
    Route::get('regulator/search-actor', 'Regulators\RegulatoryController@searchActor');
    Route::get('/regulator/admins', 'Regulators\RegulatoryController@regulatorAdmin');
    Route::get('regulator/get-passsword', 'Regulators\RegulatoryController@genDefaultPassword' );
    Route::post('regulator/new-admin', 'Regulators\RegulatoryController@newRegulatorAdmin');
    Route::get('actor/reset-password', 'Regulators\RegulatoryController@resetPassword');
    Route::post('actor/reset-password', 'Regulators\RegulatoryController@saveNewPassword');
    Route::get('regulator/logout', 'Regulators\RegulatoryController@logout');
});


//===================================================================================
// DISTRIBUTORS ROUTES
//===================================================================================
Route::get('distributor/dashboard', 'Distributor\DistributorsController@index');
Route::get('distributor/new-order', 'Distributor\DistributorsController@receiveInputs');
Route::get('distributor/new-transaction', 'Distributor\DistributorsController@newTransaction');
Route::post('distributor/new-transaction', 'Distributor\DistributorsController@saveTransaction');
Route::get('distributor/pending-transactions', 'Distributor\DistributorsController@pendingTransaction');


