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


Route::get('/','ViewController@index')->name('index');

Route::get('/login','ViewController@admin')->name('login.page');
Route::post('/login','UserController@login')->name('login');
Route::get('/register','ViewController@register')->name('register.page');
Route::post('/register','UserController@register')->name('register');

Route::get('/user/poco/cadastrar','ViewController@userCadastrarPoco')->name('user.cadastrar.poco');
Route::get('/user/pocos','ViewController@userPocos')->name('user.pocos');
Route::get('/user/poco','ViewController@userPoco')->name('user.poco');
Route::get('/user/usuarios/ativos','ViewController@userUsersAtivos')->name('user.users.ativos');
Route::get('/user/usuarios/inativos','ViewController@userUsersInativos')->name('user.users.inativos');
Route::get('/user/usuario','ViewController@userUsersPerfil')->name('user.dados.user.criado');

Route::middleware(['user'])->prefix('system')->group(function(){
    Route::get('/dashboard','ViewController@systemDashboard')->name('dashboard');

    Route::post('/register/well','UserController@registerWell')->name('register.well');
});
// 	Route::get('/perfil','ViewAdminController@perfil')->name('admin.perfil');
// 	Route::post('/perfil/alterar/dados','AdminController@alterarDados')->name('admin.alterar.dados');
// 	Route::post('/perfil/alterar/senha','AdminController@alterarSenha')->name('admin.alterar.senha');

// 	Route::get('/dashboard','ViewController@adminDashboard')->name('admin.dashboard');
// 	Route::get('/produtos/cadastrar','ViewController@adminProdutosCadastrar')->name('admin.produtos.cadastrar');
// 	Route::get('/produtos/cadastrados','ViewController@adminProdutosCadastrados')->name('admin.produtos.cadastrados');
// 	Route::get('/produtos/arquivados','ViewController@adminProdutosArquivados')->name('admin.produtos.arquivados');
// 	Route::get('/produtos/destaque','ViewController@adminProdutosDestaque')->name('admin.produtos.destaque');
// 	Route::get('/categorias','ViewController@adminCategorias')->name('admin.categorias');
// 	Route::get('/categorias/arquivadas','ViewController@adminCategoriasArquivadas')->name('admin.categorias.arquivadas');
// 	Route::get('/segmentos','ViewAdminController@segmentos')->name('admin.segmentos');
// 	Route::get('/segmento/{segmento_id?}','ViewController@adminSegmento')->name('admin.segmento');

// 	Route::get('/configuracoes/inicial','ViewController@adminConfiguracoesInicial')->name('admin.configuracoes.inicial');
	
// 	Route::post('/produtos/create','AdminController@createProduto')->name('admin.produtos.create');
// 	Route::post('/produtos/update','AdminController@updateProduto')->name('admin.produto.update');
// 	Route::post('/categoria/create','AdminController@createCategoria')->name('admin.categoria.create');
// 	Route::post('/categoria/update','AdminController@updateCategoria')->name('admin.categoria.update');
// 	Route::post('/segmento/cadastro','AdminController@createSegmento')->name('admin.cadastra.segmento');
// 	Route::post('/segmento/update','AdminController@updateSegmento')->name('admin.update.segmento');

// 	Route::get('/logout','AdminController@logout')->name('admin.logout');
// 	Route::get('/produto/arquivar/{produto_id}','AdminController@arquivarProduto')->name('admin.produto.arquivar');
// 	Route::get('/produto/ativar/{produto_id}','AdminController@ativarProduto')->name('admin.produto.ativar');
// 	Route::get('/produto/destacar/{produto_id}','AdminController@destaqueProduto')->name('admin.produto.destaque');
// 	Route::get('/categoria/arquivar/{categoria_id}','AdminController@statusCategoria')->name('admin.categoria.arquivar');
// 	Route::get('/categoria/ativar/{categoria_id}','AdminController@statusCategoria')->name('admin.categoria.ativar');
// 	Route::get('/segmento/ativar/{segmento_id}','AdminController@ativarSegmento')->name('admin.segmento.ativar');
// 	Route::get('/segmento/desativar/{segmento_id}','AdminController@desativarSegmento')->name('admin.segmento.desativar');
// 	Route::get('/segmento/apagar/{segmento_id}','AdminController@apagarSegmento')->name('admin.segmento.apagar');

// 	Route::get('/orcamentos/novos','ViewController@adminOrcamentosNovos')->name('admin.orcamentos.novos');
// 	Route::get('/orcamentos/arquivados','ViewController@adminOrcamentosArquivados')->name('admin.orcamentos.arquivados');
// 	Route::get('/configuracoes/slide/show','ViewController@adminSlideShow')->name('admin.configuracoes.slideshow');
// 	Route::get('/configuracoes/depimentos','ViewController@adminDepoimentos')->name('admin.configuracoes.depoimentos');
// 	Route::get('/configuracoes/anuncios','ViewController@adminAnuncios')->name('admin.configuracoes.anuncios');

// });

Route::middleware(['user'])->prefix('user')->group(function(){

});
