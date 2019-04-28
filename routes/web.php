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



//SITE - todas as rotas em portugues
Route::get('/', 'SiteController@getIndex')->name('home');

Route::get('/elencos', 'SiteController@getElencos')->name('elencos');
Route::post('/elencos', 'SiteController@postElencos');

Route::get('/elenco/{slug}', 'SiteController@getElencoPerfil');

Route::get('/trabalhos', 'SiteController@getTrabalhos')->name('trabalhos');
Route::get('/trabalho/{slug}', 'SiteController@getTrabalho');

Route::get('/agencia', 'SiteController@getAgencia')->name('agencia');
Route::get('/contato', 'SiteController@getContato')->name('contato');

Route::get('/perfil', 'SiteController@getProfle')->name('perfil');
Route::get('/perfil/editar/{slug}', 'SiteController@getProfleEditar');

Route::get('/cadastro', 'SiteController@getCadastro')->name('cadastro');


Route::group(['prefix' => '/ajax'], function(){
    Route::post('/login-agenciado', 'SiteController@ajaxLoginAgenciado');
});


// Route::group(['middleware' => 'SiteLogin'], function(){

// });

Auth::routes();

//DASHBOARD - todas as rotas em ingles

Route::get('/admin', function () {
    return redirect()->route('login');
});


Route::group(['middleware' => ['auth']], function () {

    // Dashboard
    Route::view('/dashboard', 'dashboard');

    // Cart
    Route::resource('/carts', 'CartController');
    Route::get('/carts/{cart}/preview/{profile}', 'CartController@previewPDF')->name('profile.preview');
    Route::get('/carts/{cart}/send', 'CartController@sendCart')->name('carts.send');

    // Profile
    Route::resource('/profiles', 'ProfileController');
    Route::get('/profiles/solicitation', 'ProfileController@solicitation');
    Route::resource('/profiles', 'ProfileController');

    // Skill
    Route::resource('/skills', 'SkillController');

    // Client
    Route::get('/clients/solicitation', 'ClientController@solicitation');
    Route::get('/clients/awaiting', 'ClientController@awaiting');
    Route::resource('/clients', 'ClientController');

    // Post
    Route::resource('/posts', 'PostController');

    // User
    Route::get('/profile', 'UserController@profile');
    Route::post('/profile', 'UserController@updateProfile');

    Route::resource('/users', 'UserController');
});

// Route::get('/', function () {
//     return redirect()->route('login');
// });


