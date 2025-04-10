<?php
require_once "../app/models/Model.php";
require_once "../app/models/Item.php";
require_once "../app/controllers/ItemController.php";

//set our env variables
$env = parse_ini_file('../.env');
//['DBHOST' => 'test', ]
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\ItemController;

//get uri without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//0 = ""
//1 = users
//2 = 1


//get all or a single user
if ($uriArray[1] === 'api' && $uriArray[2] === 'items' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    //only id
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $itemController = new ItemController();

    if ($id) {
        $itemController->getItemByID($id);
    } else {
        $itemController->getAllItemsByNameOrType();
    }
}

//save user
if ($uriArray[1] === 'api' && $uriArray[2] === 'items' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemController = new ItemController();
    $itemController->saveItem();
}

//update user
if ($uriArray[1] === 'api' && $uriArray[2] === 'items' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $itemController = new ItemController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $itemController->updateItem($id);
}

//delete user
if ($uriArray[1] === 'api' && $uriArray[2] === 'items' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $itemController = new ItemController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $itemController->deleteItem($id);
}

//views


if ($uri === '/items-add' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $itemController = new ItemController();
    $itemController->itemsAddView();
}

if ($uriArray[1] === 'items-update' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $itemController = new ItemController();
    $itemController->itemsUpdateView();
}

if ($uriArray[1] === 'items-delete' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $itemController = new ItemController();
    $itemController->itemsDeleteView();
}

if ($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $itemController = new ItemController();
    $itemController->itemsView();
}

include '../public/assets/views/notFound.html';
exit();

?>

