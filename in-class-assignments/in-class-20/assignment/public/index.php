<?php
require_once "../app/models/Model.php";
require_once "../app/models/Post.php";
require_once "../app/controllers/PostController.php";

//set our env variables
$env = parse_ini_file('../.env');
//['DBHOST' => 'test', ]
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\PostController;

//get uri without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//0 = ""
//1 = users
//2 = 1


//get all or a single user
if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    //only id
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postController = new PostController();

    if ($id) {
        $postController->getPostByID($id);
    } else {
        $postController->getAllPosts();
    }
}

//save user
if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $postController = new PostController();
    $postController->savePost();
}

//update user
if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $postController = new PostController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postController->updatePost($id);
}

//delete user
if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $postController = new PostController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postController->deletePost($id);
}

//views


if ($uri === '/posts-add' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->postsAddView();
}

if ($uriArray[1] === 'posts-update' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->postsUpdateView();
}

if ($uriArray[1] === 'posts-delete' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->postsDeleteView();
}

if ($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->postsView();
}

include '../public/assets/views/notFound.html';
exit();

?>

