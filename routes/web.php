<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('categories', 'ProductCategoriesController', ['except' => ['show']]);
	Route::get('categories/edit/{id}', ['as' => 'categories.edit', 'uses' => 'ProductCategoriesController@edit']);
	Route::post('categories/update/{id}', ['as' => 'categories.update', 'uses' => 'ProductCategoriesController@update']);
	Route::post('categories/destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'ProductCategoriesController@destroy']);
	Route::post('categories/store', ['as' => 'categories.store', 'uses' => 'ProductCategoriesController@store']);
	Route::post('categories/create', ['as' => 'categories.create', 'uses' => 'ProductCategoriesController@create']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('products', 'ProductsController', ['except' => ['show']]);
	Route::get('products/edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
	Route::post('products/update/{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
	Route::post('products/destroy/{id}', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
	Route::post('products/store', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
	Route::post('products/create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
	Route::post('products/variation/create', ['as' => 'products.variation.store', 'uses' => 'ProductsController@addVariation']);
	Route::post('products/variation/value/create', ['as' => 'products.variation.value.store', 'uses' => 'ProductsController@addVariationValue']);
	Route::get('products/get/values', ['as' => 'products.get.value', 'uses' => 'ProductsController@getValues']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('patients', 'patientsController', ['except' => ['show']]);
	Route::get('patients/edit/{id}', ['as' => 'patients.edit', 'uses' => 'patientsController@edit']);
	Route::post('patients/update/{id}', ['as' => 'patients.update', 'uses' => 'patientsController@update']);
	Route::post('patients/destroy/{id}', ['as' => 'patients.destroy', 'uses' => 'patientsController@destroy']);
	Route::post('patients/store', ['as' => 'patients.store', 'uses' => 'patientsController@store']);
	Route::post('patients/create', ['as' => 'patients.create', 'uses' => 'patientsController@create']);
	Route::post('patients/variation/create', ['as' => 'patients.variation.store', 'uses' => 'patientsController@addVariation']);
	Route::post('patients/variation/value/create', ['as' => 'patients.variation.value.store', 'uses' => 'patientsController@addVariationValue']);
	Route::get('patients/get/values', ['as' => 'patients.get.value', 'uses' => 'patientsController@getValues']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('brands', 'BrandsController', ['except' => ['show']]);
	Route::get('brands/edit/{id}', ['as' => 'brands.edit', 'uses' => 'BrandsController@edit']);
	Route::post('brands/update/{id}', ['as' => 'brands.update', 'uses' => 'BrandsController@update']);
	Route::post('brands/destroy/{id}', ['as' => 'brands.destroy', 'uses' => 'BrandsController@destroy']);
	Route::post('brands/store', ['as' => 'brands.store', 'uses' => 'BrandsController@store']);
	Route::post('brands/create', ['as' => 'brands.create', 'uses' => 'BrandsController@create']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('discounts', 'SpecialDiscountController', ['except' => ['show']]);
	Route::get('discount/edit/{id}', ['as' => 'discount.edit', 'uses' => 'SpecialDiscountController@edit']);
	Route::post('discount/update/{id}', ['as' => 'discount.update', 'uses' => 'SpecialDiscountController@update']);
	Route::post('discount/destroy/{id}', ['as' => 'discount.destroy', 'uses' => 'SpecialDiscountController@destroy']);
	Route::get('discount/store', ['as' => 'discount.store', 'uses' => 'SpecialDiscountController@store']);
	Route::get('discount/create', ['as' => 'discount.create', 'uses' => 'SpecialDiscountController@create']);
	Route::get('discount/addDiscount/{id}', ['as' => 'discount.add.discount', 'uses' => 'SpecialDiscountController@addDiscount']);
	Route::post('discount/data', ['as' => 'discount.data', 'uses' => 'SpecialDiscountController@anyData']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('groups', 'GroupsController', ['except' => ['show']]);
	Route::get('groups/edit/{id}', ['as' => 'groups.edit', 'uses' => 'GroupsController@edit']);
	Route::post('groups/update/{id}', ['as' => 'groups.update', 'uses' => 'GroupsController@update']);
	Route::post('groups/destroy/{id}', ['as' => 'groups.destroy', 'uses' => 'GroupsController@destroy']);
	Route::post('groups/store', ['as' => 'groups.store', 'uses' => 'GroupsController@store']);
	Route::post('groups/create', ['as' => 'groups.create', 'uses' => 'GroupsController@create']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('orders', 'OrdersController', ['except' => ['show']]);
	Route::get('orders/edit/{id}', ['as' => 'orders.edit', 'uses' => 'OrdersController@edit']);
	Route::post('orders/update/{id}', ['as' => 'orders.update', 'uses' => 'OrdersController@update']);
	Route::post('orders/destroy/{id}', ['as' => 'orders.destroy', 'uses' => 'OrdersController@destroy']);
	Route::post('orders/store', ['as' => 'orders.store', 'uses' => 'OrdersController@store']);
	Route::post('orders/create', ['as' => 'orders.create', 'uses' => 'OrdersController@create']);
});
