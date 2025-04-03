<?php

namespace app\models;

//using the database class namespace
use app\models\Model;

class User extends Model {

    public function getAllUsersByNameOrEmail($name, $email) {
        $query = "select * from users WHERE CONCAT(firstName,' ',lastName) like :name or email like :email";
        return $this->query($query, [
            'name' => '%' . $name . '%',
            'email' => '%' . $email . '%',
        ]);
    }

    public function getAllUsers() {
        $query = "select * from users";
        return $this->query($query);
    }

    public function getUserById($id){
        $query = "select * from users where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function saveUser($inputData){
        $query = "insert into users (firstName, lastName, email) values (:firstName, :lastName, :email);";
        return $this->query($query, $inputData);
    }

    public function updateUser($inputData){
        $query = "update users set firstName = :firstName, lastName = :lastName, email = :email where id = :id";
        return $this->query($query, $inputData);
    }

    public function deleteUser($inputData){
        $query = "DELETE FROM users where id = :id";
        return $this->query($query, $inputData);
    }
}