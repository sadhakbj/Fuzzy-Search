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


$this->resource('/products', 'ProductsController', ['only' => ['index', 'create', 'store']]);
$this->post('/products/search', ['as' => 'products.search', 'uses' => 'ProductsController@search']);
$this->get('/', 'ProductsController@index');

Auth::routes();

