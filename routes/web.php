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
    return view('welcome');
});
Route::get('/laporan', 'laporanController@index')->name('laporan.index');

Route::match(['get','post'],'/user','userController@login');
Route::get('/admin/dashboard','AdminController@dashboard');	
Auth::routes();
Route::resource('ingredients','ingredientController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home{post}/show', 'HomeController@show')->name('home.show');

Route::post('/users/logout', 'Auth\LoginController@userlogout')->name('user.logout');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::match(['get','post'],'/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
  });


Route::get('/ingredient', 'ingredientController@index')->name('ingredient.index');
Route::get('/ingredient/create', 'ingredientController@create')->name('ingredient.create');
Route::get('/ingredient{post}/edit', 'ingredientController@edit')->name('ingredient.edit');
Route::get('/ingredient{post}/show', 'ingredientController@show')->name('ingredient.show');
Route::post('/ingredient', 'ingredientController@store')->name('ingredient.store');
Route::post('/ingredient/{ingredient}', 'ingredientController@update')->name('ingredient.update');
Route::delete('/ingredient/delete/{id}',['as' => 'ingredient.destroy','uses'=>'ingredientController@destroy']);
// Route::delete('/ingredient/{delete}/delete', 'ingredientController@delete')->name('ingredient.destroy');


Route::get('/category', 'categoryController@index')->name('category.index'); 
Route::get('/category/create', 'categoryController@create')->name('category.create');
Route::get('/category{post}/edit', 'categoryController@edit')->name('category.edit');
Route::get('/category{post}/show', 'categoryController@show')->name('category.show');
Route::post('/category', 'categoryController@store')->name('category.store');
Route::post('/category/{post}', 'categoryController@update')->name('category.update');
Route::delete('/category/delete/{id}',['as' => 'category.destroy','uses'=>'categoryController@destroy']);
// Route::post('/category/{post}/delete', 'categoryController@delete')->name('category.destroy');


Route::get('/recipe', 'recipeController@index')->name('recipe.index');
Route::get('/recipe/create', 'recipeController@create')->name('recipe.create');
Route::get('/recipe{post}/edit', 'recipeController@edit')->name('recipe.edit');
Route::get('/recipe{post}/show', 'recipeController@show')->name('recipe.show');
Route::post('/recipe', 'recipeController@store')->name('recipe.store');
Route::post('/recipe/{post}', 'recipeController@update')->name('recipe.update');
Route::delete('/recipe/delete/{id}',['as' => 'recipe.destroy','uses'=>'recipeController@destroy']);
// Route::post('/recipe/{post}/delete', 'recipeController@delete')->name('recipe.destroy');

Route::get('/slider', 'sliderController@index')->name('slider.index');
Route::get('/slider/create', 'sliderController@create')->name('slider.create');
Route::get('/slider{post}/edit', 'sliderController@edit')->name('slider.edit');
Route::get('/slider{post}/show', 'sliderController@show')->name('slider.show');
Route::post('/slider', 'sliderController@store')->name('slider.store');
Route::post('/slider/{post}', 'sliderController@update')->name('slider.update');
Route::delete('/slider/delete/{id}',['as' => 'slider.destroy','uses'=>'sliderController@destroy']);

Route::get('/pengguna', 'penggunaController@index')->name('pengguna.index');


Route::get('/senarairesepi', 'senarairesepiController@index')->name('senarairesepi.index');
Route::get('/search', 'senarairesepiController@search')->name('senarairesepi.search');
Route::match(['get','post'],'/senarairesepi{post}/show', 'senarairesepiController@show')->name('senarairesepi.show');

Route::get('/jadualperancangan', 'jadualperancanganController@index')->name('jadualperancangan.index');
Route::get('/jadualperancangan/create', 'jadualperancanganController@create')->name('jadualperancangan.create');
Route::post('/jadualperancangan', 'jadualperancanganController@store')->name('jadualperancangan.store');
Route::get('/jadualperancangan{post}/edit', 'jadualperancanganController@edit')->name('jadualperancangan.edit');
Route::get('/jadualperancangan/show', 'jadualperancanganController@show')->name('jadualperancangan.show');
Route::get('/jadualperancangan{post}/showrecipe', 'jadualperancanganController@showrecipe')->name('jadualperancangan.showrecipe');
Route::get('/jadualperancangan/showrecipeblade', 'jadualperancanganController@showrecipeblade')->name('jadualperancangan.showrecipeblade');
Route::post('/jadualperancangan/{post}', 'jadualperancanganController@update')->name('jadualperancangan.update');
Route::delete('/jadualperancangan/delete/{id}',['as' => 'jadualperancangan.destroy','uses'=>'jadualperancanganController@destroy']);

Route::get('/grocerylist', 'grocerylistController@index')->name('grocerylist.index');
Route::get('/grocerylist/create', 'grocerylistController@create')->name('grocerylist.create');
Route::post('/grocerylist', 'grocerylistController@store')->name('grocerylist.store');
Route::get('/grocerylist{post}/edit', 'grocerylistController@edit')->name('grocerylist.edit');
Route::get('/grocerylist/show', 'grocerylistController@show')->name('grocerylist.show');
Route::post('/grocerylist/{post}', 'grocerylistController@update')->name('grocerylist.update');
Route::delete('/grocerylist/delete/{id}',['as' => 'grocerylist.destroy','uses'=>'grocerylistController@destroy']);
