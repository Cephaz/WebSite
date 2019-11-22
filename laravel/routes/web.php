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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/produit/{id}', 'ProduitController@index')->name('produit');
Route::post('/add_basket', 'ProduitController@add')->name('produit_add_basket');

Route::get('/panier', 'PanierController@index')->name('panier');
Route::post('/delete_panier', 'PanierController@delete')->name('delete_panier');
Route::get('/paiement/{id}', 'PanierController@paiement')->name('paiement');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::post('/post', 'AdminController@traitement')->name('admin_post');
Route::get('/admin_modif/{id}', 'AdminController@modif')->name('admin_modif');
Route::post('/admin_post_modif', 'AdminController@post_modif')->name('admin_post_modif');
Route::post('/admin_delete', 'AdminController@delete')->name('admin_delete');

Route::get('/profile/{id}', 'ProfileController@index')->name('profile');
Route::post('/add_profile', 'ProfileController@add')->name('add_profile');
Route::post('/add_adresse', 'ProfileController@add2')->name('add_adresse');
