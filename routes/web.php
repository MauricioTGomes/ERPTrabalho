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

Auth::routes();

Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

Route::group(['where' => ['id' => '[0-9]+', 'middleware' => 'auth']], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('/register', ['as' => 'cadastrar.usuario', 'uses' => 'IndexController@register']);
    });

    Route::group(['prefix' => 'pessoas'], function () {
        Route::get('/listar', ['as' => 'pessoas.listar', 'uses' => 'PessoaController@listar']);
        Route::get('/incluir', ['as' => 'pessoas.incluir', 'uses' => 'PessoaController@getFormIncluir']);
        Route::get('/alterar/{id}', ['as' => 'pessoas.alterar', 'uses' => 'PessoaController@getFormAlterar']);
        Route::post('/deletar/{id}', ['as' => 'pessoas.alterar', 'uses' => 'PessoaController@deletar']);
        Route::post('/gravar', ['as' => 'pessoas.gravar', 'uses' => 'PessoaController@gravar']);
        Route::post('/update/{id}', ['as' => 'pessoas.update', 'uses' => 'PessoaController@update']);
        Route::get('/listar/datatable', ['as' => 'pessoas.datatable', 'uses' => 'PessoaController@datatableAjax']);
    });


    Route::group(['prefix' => 'produtos'], function () {
        Route::get('/listar', ['as' => 'produtos.listar', 'uses' => 'ProdutoController@listar']);
        Route::get('/incluir', ['as' => 'produtos.incluir', 'uses' => 'ProdutoController@getFormIncluir']);
        Route::get('/alterar/{id}', ['as' => 'produtos.alterar', 'uses' => 'ProdutoController@getFormAlterar']);
        Route::post('/deletar/{id}', ['as' => 'produtos.alterar', 'uses' => 'ProdutoController@deletar']);
        Route::post('/gravar', ['as' => 'produtos.gravar', 'uses' => 'ProdutoController@gravar']);
        Route::post('/update/{id}', ['as' => 'produtos.update', 'uses' => 'ProdutoController@update']);
        Route::get('/listar/datatable', ['as' => 'produtos.datatable', 'uses' => 'ProdutoController@datatableAjax']);
    });

    Route::group(['prefix' => 'pedidos'], function () {
        Route::get('/listar', ['as' => 'pedidos.listar', 'uses' => 'PedidoController@listar']);
        Route::get('/incluir', ['as' => 'pedidos.incluir', 'uses' => 'PedidoController@getFormIncluir']);
        Route::get('/alterar/{id}', ['as' => 'pedidos.alterar', 'uses' => 'PedidoController@getFormAlterar']);
        Route::post('/deletar/{id}', ['as' => 'pedidos.alterar', 'uses' => 'PedidoController@deletar']);
        Route::post('/gravar', ['as' => 'pedidos.gravar', 'uses' => 'PedidoController@gravar']);
        Route::post('/update/{id}', ['as' => 'pedidos.update', 'uses' => 'PedidoController@update']);
        Route::get('/listar/datatable', ['as' => 'pedidos.datatable', 'uses' => 'PedidoController@datatableAjax']);
    });


});

