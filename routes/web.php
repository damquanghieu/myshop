<?php

use Illuminate\Support\Facades\Route;


/* |--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| */


Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    
    Route::get('home', function(){
        return view('admin.home');
    });

    Route::group(['prefix' => 'category'], function () {
        Route::get('viewcategory','CategoryController@index')->name('index.category');
        Route::get('addcategory','CategoryController@create')->name('create.category');
        Route::post('addcategory','CategoryController@store')->name('store.category');
        Route::get('editcategory/{id}','CategoryController@edit')->name('edit.category');
        Route::post('updatecategory/{id}','CategoryController@update')->name('update.category');
        Route::delete('destroycategory/{id}','CategoryController@destroy')->name('destroy.category');
    });

    Route::resource('cate', 'CategoryController');
    
    Route::group(['prefix' => 'menu'], function(){
        Route::get('viewmenu','MenuController@index')->name('menu.index');
        Route::get('addmenu','MenuController@create')->name('menu.create');
        Route::post('addmenu','MenuController@store')->name('menu.store');
        Route::get('editmenu/{id}','MenuController@edit')->name('menu.edit');
        Route::post('update/{id}','MenuController@update')->name('menu.update');
        Route::delete('destroymenu/{id}','MenuController@destroy')->name('menu.destroy');
    });
    Route::group(['prefix' => 'product'], function(){
        Route::get('viewproduct','ProductController@index')->name('product.index');
        Route::get('addproduct','ProductController@create')->name('product.create');
        Route::post('addproduct','ProductController@store')->name('product.store');
        Route::get('editproduct/{id}','ProductController@edit')->name('product.edit');
        Route::post('updateproduct/{id}','ProductController@update')->name('product.update');
        Route::get('destroyproduct/{id}','ProductController@destroy')->name('product.destroy');
    });
    Route::group(['prefix' => 'slide'], function(){
        Route::get('viewslide','SlideController@index')->name('slide.index');
        Route::get('addslide','SlideController@create')->name('slide.create');
        Route::post('addslide','SlideController@store')->name('slide.store');
        Route::get('editslide/{id}','SlideController@edit')->name('slide.edit');
        Route::post('updateslide/{id}','SlideController@update')->name('slide.update');
        Route::get('destroyslide/{id}','SlideController@destroy')->name('slide.destroy');
    });
   
});
