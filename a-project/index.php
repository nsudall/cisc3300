<?php
require 'Router.php';
$router = new Router();

// Define routes
$router->get('/', 'NoteController@showForm');
$router->post('/notes', 'NoteController@submitNote');

$router->dispatch();
?>