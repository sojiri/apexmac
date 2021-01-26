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
    return view('frontend.index');
})->name('apexmac');

Route::get('/test', 'TestController@index')->name('test');


Auth::routes();

//AdminLTE Routes

Route::middleware('auth')->group(function()
{
    Route::get('/admin', 'Lte\HomeController@index')->name('admin');
    //Route::get('/categories', 'Lte\CategoriesController@index')->name('admin.categories');
    Route::resource('/admin/categories', 'Lte\CategoriesController', ['as'=>'admin']);
    Route::resource('/admin/news', 'Lte\NewsController', ['as'=>'admin']);
});


Route::group(['middleware' => ['auth', 'isUser']], function()
{
    Route::get('/home', 'Lte\HomeController@index')->name('home');
    Route::get('my-profile', 'Frontend\UserController@myprofile')->name('my-profile');
    Route::post('my-profile-update', 'Frontend\UserController@profileupdate')->name('my-profile-update');
});

Route::group(['middleware' => ['auth', 'isAdmin']], function() {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('registered-user', 'Admin\RegisteredController@index')->name('registered-user');
    Route::get('role-edit/{id}', 'Admin\RegisteredController@edit')->name('role-edit');
    Route::put('role-update/{id}', 'Admin\RegisteredController@updaterole')->name('role-update');

    //Groups
    Route::get('group', 'Admin\GroupController@index')->name('group');
    Route::get('group-add', 'Admin\GroupController@viewpage')->name('group-add');
    Route::post('group-store', 'Admin\GroupController@store')->name('group-store');
    Route::get('group-edit/{id}', 'Admin\GroupController@edit')->name('group-edit');
    Route::put('group-update/{id}', 'Admin\GroupController@update')->name('group-update');
    Route::get('group-delete/{id}', 'Admin\GroupController@delete')->name('group-delete');
    Route::get('group-deleted-records', 'Admin\GroupController@deletedrecords')->name('group-deleted-records');
    Route::get('group-re-store/{id}', 'Admin\GroupController@deletedrestore')->name('group-re-store');

    //Category
    Route::get('category', 'Admin\CategoryController@index')->name('category');
    Route::get('category-add', 'Admin\CategoryController@create')->name('category-add');
    Route::post('category-store', 'Admin\CategoryController@store')->name('category-store');
    Route::get('category-edit/{id}', 'Admin\CategoryController@edit')->name('category-edit');
    Route::put('category-update/{id}', 'Admin\CategoryController@update')->name('category-update');
    Route::get('category-delete/{id}', 'Admin\CategoryController@delete')->name('category-delete');

    //Subcategory
    Route::get('sub-category', 'Admin\SubcategoryController@index')->name('sub-category');
    Route::get('subcategory-edit/{id}', 'Admin\SubcategoryController@edit')->name('subcategory-edit');
    Route::post('subcategory-store', 'Admin\SubcategoryController@store')->name('subcategory-store');
    Route::put('subcategory-update/{id}', 'Admin\SubcategoryController@update')->name('subcategory-update');
    Route::get('subcategory-delete/{id}', 'Admin\SubcategoryController@delete')->name('subcategory-delete');

    //Products
    Route::get('products', 'Admin\ProductController@index')->name('products');
    Route::get('add-products', 'Admin\ProductController@create')->name('add-products');

});

Route::group(['middleware' => ['auth', 'isVendor']], function() {
    Route::get('/vendor-dashboard', function () {
        return view('vendor.dashboard');
    });
});