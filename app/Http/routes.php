<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    
    return view('todos.index');
    
});

Route::get('/todos', function () {
    
    return view('todos.index');
    
});

Route::get('/todos/{id}', function ($id) {
    
    return view('todos.show')->withId($id);
    
});
*/

//Route::get('/todos', 'TodoListController@index');
//Route::get('/todos/{id}', 'TodoListController@show');

//Route::get('/', 'TodoListController@index');
//Route::resource('todos', 'TodoListController');
//Route::get('/db', function(){
    // DB::table('todo_lists')->insert(array('name'=>'Your List'));
   // return DB::table('todo_lists')->get();
//});

Route::resource('makers', 'MakerController',['except' =>['create','edit']]);
Route::resource('vehicles', 'VehicleController',['only'=>['index']]);
Route::resource('makers.vehicles', 'MakerVehicleController',['except' =>['edit','create']]);
