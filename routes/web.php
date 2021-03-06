<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'ArtworksController@showPaintings');

/*$router->get('/travaux', function () {
    return view('travaux.peinture');
});*/

$router->get('/travaux', 'ArtworksController@showPaintings');
$router->get('/travaux/peinture', 'ArtworksController@showPaintings');


$router->get('/travaux/{id}', function ($id) {
    return view('travaux.' . $id, ['page' => $id]);
});

$router->get('/bio', function () {
    return view('bio');
});


/*$router->get('/admin/index', "AdminController@index");
$router->get('/admin/login', 'AdminController@showLogin');
$router->post('/admin/auth', "AdminController@authenticate");*/

$router->get('/admin', 'AdminController@showLogin');
$router->get('/admin/login', 'AdminController@showLogin');
$router->post('/admin/login', 'AdminController@login');
$router->get('/admin/logout', 'AdminController@logout');

$router->group(['middleware' => 'auth'], function () use ($router) {

    $router->get('admin/index', [
        'as' => 'admin.index', 'uses' => 'AdminController@index'
    ]);

    $router->post('admin/{id}/update', 'ArtworksController@update');
    $router->post('admin/store', ['as' => 'createArtwork', 'uses' => 'ArtworksController@store']);
    
    
    $router->get('admin', 'AdminController@index');
    $router->get('admin/new', 'AdminController@new');
    $router->get('admin/{id}/edit', 'AdminController@edit');
    $router->get('admin/{id}/destroy', 'AdminController@destroy');
    

});
