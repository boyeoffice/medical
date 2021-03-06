<?php

Route::get('/', function ($guard = null) {
	 if (Auth::guard($guard)->check()) {
            return redirect('/backend');
       }
        return view('welcome');
});
//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
/* Dashboard Index */
Route::group(['prefix' => 'backend', 'namespace' => 'Backend', 'middleware' => ['auth']], function () {
    Route::get('{path?}', 'IndexController@index')->where('path', '[\/\w\.-]*');
 });

 //Response to Json
Route::group(['namespace' => 'Backend', 'prefix' => 'md-vs2/manage', 'middleware' => ['auth']], function(){
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
	Route::get('stats', 'IndexController@getStats');
	Route::get('pie-chart/consult/m-f', 'IndexController@getPieChartConsultMF');
	Route::get('pie-chart/admission/mf', 'IndexController@getPieChartAdmissiontMF');
	Route::get('pie-chart/admission/origin', 'IndexController@getAdminOrigin');
	Route::get('pie-chart/consult/origin', 'IndexController@getConsultOrigin');
	Route::get('graph/admission/origin', 'IndexController@getGraphAdmission');
	Route::get('graph/consult/origin', 'IndexController@getGraphConsult');
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
	Route::get('messages/inbox', 'MessageController@inbox');
	Route::post('messages', 'MessageController@store');
	Route::get('messages/{id}', 'MessageController@show');
	Route::get('message/users', 'MessageController@getUsers');
	Route::get('messages_count', 'MessageController@total_message');
	Route::post('messages_update', 'MessageController@update');
	Route::resource('calendar', 'AgendaController');
	Route::resource('formacao', 'FormacaoController');
	Route::resource('atividade', 'AtividadeController');
	Route::get('/users/csv', 'UserController@csv');
	Route::post('/upload-file', 'UploadController@uploadDocs');
});
Route::group(['prefix' => 'export', 'middleware' => ['auth']], function(){
	Route::get('internamento/{id}', 'ExcelController@exportInternamento');
	Route::get('consult/{id}', 'ExcelController@exportConsult');
});