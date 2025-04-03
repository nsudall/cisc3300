<?php

namespace app\controllers;

use app\models\User;

class UserController
{
    public function getUsers() {
        $userModel = new User();
        $query = !empty($_GET['name']) ? $_GET['name'] : null;
        //pinecone
        //nathan
        $users = $userModel->getUsers($query);
        echo json_encode($users);
        exit();
    }

    public function getUserByID($id) {
        $userModel = new User();
        $user = $userModel->getUserById($id);
        echo json_encode($user);
        exit();
    }

    public function usersView() {
        include '../public/assets/views/user/users.html';
        exit();
    }

    public function userDetailsView() {
        include '../public/assets/views/user/userDetails.html';
        exit();
    }

}