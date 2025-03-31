<?php

namespace app\controllers;

use app\models\Post;

class PostController
{
    public function validatePost($inputData) {
        $errors = [];
        $username = $inputData['username'];
        $commentPost = $inputData['commentPost'];

        if ($username) {
            $username = htmlspecialchars($username, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($username) < 2) {
                $errors['usernameShort'] = 'username is too short';
            }
        } else {
            $errors['requiredUsername'] = 'username is required';
        }

        if ($commentPost) {
            $commentPost = htmlspecialchars($commentPost, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($commentPost) < 2) {
                $errors['commentPostShort'] = 'comment is too short';
            }
        } else {
            $errors['requiredCommentPost'] = 'comment is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'username' => $username,
            'commentPost' => $commentPost,
        ];
    }

    public function getAllPosts() {
        $postModel = new Post();
        header("Content-Type: application/json");
        $posts = $postModel->getAllPosts();

        echo json_encode($posts);
        exit();
    }

    public function getPostByID($id) {
        $userModel = new Post();
        header("Content-Type: application/json");
        $post = $postModel->getPostById($id);
        echo json_encode($post);
        exit();
    }

    public function savePost() {
        $inputData = [
            'username' => $_POST['username'] ?: null,
            'commentPost' => $_POST['commentPost'] ?: null,
        ];
        $postData = $this->validatePost($inputData);

        $post = new Post();
        $post->savePost(
            [
                'username' => $postData['username'],
                'commentPost' => $postData['commentPost'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updatePost($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        //no built-in super global for PUT
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'username' => $_PUT['username'] ?: null,
            'commentPost' => $_PUT['commentPost'] ?: null,
        ];
        $postData = $this->validatePost($inputData);
        //we could save the data off to be saved here

        $post = new Post();
        $post->updatePost(
            [
                'id' => $id,
                'username' => $postData['username'],
                'commentPost' => $postData['commentPost'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deletePost($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $post = new Post();
        $post->deletePost(
            [
                'id' => $id,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function postsView() {
        include '../public/assets/views/post/posts-view.html';
        exit();
    }

    public function postsAddView() {
        include '../public/assets/views/post/posts-add.html';
        exit();
    }

    public function postsDeleteView() {
        include '../public/assets/views/post/posts-delete.html';
        exit();
    }

    public function postsUpdateView() {
        include '../public/assets/views/post/posts-update.html';
        exit();
    }


}