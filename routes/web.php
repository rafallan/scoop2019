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


 Route::group(['prefix' => '/scoop2019/painel', 'middleware' => 'auth'], function () {

    Route::get('submissoes/pdf/{id}', 'Painel\SubmissoesController@pdf')->name('submissoes.pdf');

    Route::get('/dashboard', function(){
        return view('painel.dashboard');
    })->name('dashboard');
    
    Route::resource('/areas-tematicas', 'Painel\AreasTematicasController');
    
    Route::resource('/submissoes', 'Painel\SubmissoesController');

    Route::get('/logout', 'LoginController@destroy')->name('logout');

    Route::resource('/usuarios', 'Painel\UsuariosController');

    Route::resource('/perfil', 'Painel\PerfilController');

    Route::resource('/alterar-senha', 'Painel\AlterarSenhaController');
     
 });
 

Route::resource('/scoop2019/recuperar-senha', 'RecuperarSenhaController');

Route::get('/scoop2019/login', 'LoginController@index')->name('login');

Route::post('/scoop2019/logar', 'LoginController@store')->name('logar');

Route::resource('/scoop2019/submissao-oficinas-minicursos', 'Site\SubmissaoController');

//Route::resource('/painel', 'LoginController');
Route::get('/scoop2019/scoop', function(){
    return "Página inicial";
 });

Route::get('/scoop2019', function () {
    return view('welcome');
});