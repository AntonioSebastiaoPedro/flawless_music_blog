<?php
$routes = new \Controllers\RoutesController;
$routes->getRoute('', 'HomeController@index');
$routes->getRoute('musicas', 'MusicController@index');
$routes->getRoute('musica', 'MusicController@musicSingle');
$routes->getRoute('contactos', 'BlogController@contacto');
$routes->getRoute('sobre', 'BlogController@sobre');
$routes->getRoute('download', 'MusicController@download');

$routes->getRoute('postar', 'AdminController@index');
$routes->getRoute('addMusic', 'AdminController@cadastrar');
$routes->getRoute('listar', 'AdminController@listar');
$routes->getRoute('editMusic', 'AdminController@editar');
$routes->getRoute('deleteMusic', 'AdminController@apagar');

$routes->getRoute('login', 'AdminController@entrar');
$routes->getRoute('logout', 'AdminController@sair');
$routes->getRoute('news', 'AdminController@inscritos');
$routes->getRoute('messages', 'AdminController@mensagens');