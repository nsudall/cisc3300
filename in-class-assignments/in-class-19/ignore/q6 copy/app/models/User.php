<?php

namespace app\models;

class User extends Model {

    public function getUsers($username) {
        if ($username) {
            $query = "select * from posts WHERE username like :username";
            return $this->fetchAllWithParams($query, ['username' => '%' . $username . '%']);
        }
        $query = "select * from posts";
        return $this->fetchAll($query);
    }

    public function getUserById($id){
        $query = "select * from posts where id = :id";
        return $this->fetchAllWithParams($query, ['id' => $id])[0] ?? null;
    }
}