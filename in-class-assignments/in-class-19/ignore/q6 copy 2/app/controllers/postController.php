<?php

namespace app\controllers;

use app\models\Post;

class PostController
{
    public function getPosts() {
        $postModel = new Post();
        $query = !empty($_GET['username']) ? $_GET['username'] : null;
        //pinecone
        //nathan
        $posts = $postModel->getPosts($query);
        echo json_encode($posts);
        exit();
    }

    public function getPostByID($id) {
        $postModel = new Post();
        $post = $PostModel->getPostById($id);
        echo json_encode($post);
        exit();
    }

    public function postsView() {
        include '../public/assets/views/post/posts.html';
        exit();
    }

    public function postDetailsView() {
        include '../public/assets/views/post/postDetails.html';
        exit();
    }

}