<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', "App\Http\Controllers\UsersController@index");
Route::post('/users/signin', 'App\Http\Controllers\UsersController@AuthUsers');
Route::get('/users/signup', 'App\Http\Controllers\UsersController@register');
Route::post('/users/signup', 'App\Http\Controllers\UsersController@registerPost');
Route::get('/tarefas', 'App\Http\Controllers\TarefasController@listarTarefas');
Route::get('/tarefas/excluir/{id}', 'App\Http\Controllers\TarefasController@excluirTarefa');
Route::get('/tarefas/editar/{id}', 'App\Http\Controllers\TarefasController@editarTarefa');
Route::post('/tarefas/editarTarefaPost/{id}', 'App\Http\Controllers\TarefasController@editarTarefaPost');
Route::get('users/logout', 'App\Http\Controllers\UsersController@logout');
Route::get('/users/signin', 'App\Http\Controllers\UsersController@Home');
Route::post('/tarefas/inserirTarefaPost', 'App\Http\Controllers\TarefasController@inserirTarefaPost');
Route::get('/tarefas/inserir', 'App\Http\Controllers\TarefasController@inserirTarefa');
Route::get('/tarefas/{id}', 'App\Http\Controllers\TarefasController@detalharTarefa');



?>
