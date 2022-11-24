<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/list_managers', 'App\Http\Controllers\ManagersController@list_managers');
Route::get('/get_manager_info/{id}', 'App\Http\Controllers\ManagersController@get_manager_info');
Route::get('/add_manager', 'App\Http\Controllers\ManagersController@show_form');
Route::post('/save_manager', 'App\Http\Controllers\ManagersController@apply_form');
Route::get('/del_manager/{id}', 'App\Http\Controllers\ManagersController@del_manager');
Route::get('/fedit_manager/{id}', 'App\Http\Controllers\ManagersController@fedit_manager');
Route::post('/edit_manager', 'App\Http\Controllers\ManagersController@edit_manager');
Route::post('/search_manager', 'App\Http\Controllers\ManagersController@search_manager');


Route::get('/list_clients', 'App\Http\Controllers\ClientsController@list_clients');
Route::get('/get_client_info/{id}', 'App\Http\Controllers\ClientsController@get_client_info');
Route::get('/add_client', 'App\Http\Controllers\ClientsController@show_form');
Route::post('/save_client', 'App\Http\Controllers\ClientsController@apply_form');
Route::get('/del_client/{id}', 'App\Http\Controllers\ClientsController@del_client');
Route::get('/fedit_client/{id}', 'App\Http\Controllers\ClientsController@fedit_client');
Route::post('/edit_client', 'App\Http\Controllers\ClientsController@edit_client');
Route::post('/searcher_client', 'App\Http\Controllers\ClientsController@searcher_client');


Route::get('/list_tasks', 'App\Http\Controllers\TasksController@list_tasks');
Route::get('/get_task_info/{id}', 'App\Http\Controllers\TasksController@get_task_info');
Route::get('/add_task', 'App\Http\Controllers\TasksController@show_form');
Route::post('/save_task', 'App\Http\Controllers\TasksController@apply_form');
Route::get('/del_task/{id}', 'App\Http\Controllers\TasksController@del_task');
Route::get('/fedit_task/{id}', 'App\Http\Controllers\TasksController@fedit_task');
Route::post('/edit_task', 'App\Http\Controllers\TasksController@edit_task');
Route::post('/searcher_task', 'App\Http\Controllers\TasksController@searcher_task');