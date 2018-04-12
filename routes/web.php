<?php

Route::get('/', function ($guard = null) {
	 if (Auth::guard($guard)->check()) {
            return redirect('/home');
       }
        return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'home'], function () {
	Route::get('{path?}', 'HomeController@index')->where('path', '[\/\w\.-]*')->name('home');
 });

/* Dashboard Index */
Route::group(['prefix' => 'backend', 'namespace' => 'Backend', 'middleware' => ['auth', 'admin']], function () {
    Route::get('{path?}', 'IndexController@index')->where('path', '[\/\w\.-]*');
 });

 //Response to Json
Route::group(['namespace' => 'Backend', 'prefix' => 'md-vs2/manage', 'middleware' => ['auth', 'admin']], function(){
	Route::resource('users', 'UsersController');
	Route::get('all-users', 'UsersController@getUsers');
	Route::put('update-profile', 'ProfileController@updateProfile');
	Route::get('setting', 'IndexController@setting');
	Route::put('setting', 'IndexController@updateSetting');
	Route::resource('consult', 'ConsultController');
	Route::resource('admission', 'AdmissionController');
	Route::get('tech', 'TechController@index');
	Route::post('tech', 'TechController@store');
	Route::delete('tech/{id}', 'TechController@destroy');
	Route::post('query-single', 'QueryController@storeQuerySingle');
	Route::get('query-single', 'QueryController@getSingleQuery');
	Route::get('search-query-single', 'QueryController@searchSingleQuery');
	Route::post('query-group', 'QueryController@storeQueryGroup');
	Route::get('query-group', 'QueryController@getQueryGroup');
	Route::get('search-query-group', 'QueryController@searchGroup');
	Route::get('origindestination', 'QueryController@origindestination');
	Route::get('searchdestination', 'QueryController@searchDestination');
	Route::post('origindestination', 'QueryController@origindestinationStore');
	Route::post('specialty', 'QueryController@postSpecialty');
	Route::get('searchspecialty', 'QueryController@searchSpecialty');
	Route::get('specialty', 'QueryController@getSpecialty');
	Route::post('query-tech', 'QueryController@queryTech');
	Route::get('query-tech', 'QueryController@getQueryTech');
	Route::get('searchtech', 'QueryController@searchTech');
});