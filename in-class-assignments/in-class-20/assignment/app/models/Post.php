<?php

namespace app\models;

//using the database class namespace
use app\models\Model;

class Post extends Model {

    public function getAllPostsByNameOrComment($username, $commentPost) {
        $query = "select * from posts WHERE username like :username or commentPost like :commentPost";
        return $this->query($query, [
            'username' => '%' . $username . '%',
            'commentPost' => '%' . $commentPost . '%',
        ]);
    }

    public function getAllPosts() {
        $query = "select * from posts";
        return $this->query($query);
    }

    public function getPostById($id){
        $query = "select * from posts where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function savePost($inputData){
        $query = "insert into posts (username, commentPost) values (:username, :commentPost);";
        return $this->query($query, $inputData);
    }

    public function updatePost($inputData){
        $query = "update posts set username = :username, commentPost = :commentPost";
        return $this->query($query, $inputData);
    }

    public function deletePost($inputData){
        $query = "DELETE FROM posts where id = :id";
        return $this->query($query, $inputData);
    }
}