<?php

namespace app\models;

//using the database class namespace
use app\models\Model;

class Item extends Model {

    public function getAllItemsByNameOrType($search) {
        if ($search) {
            $query = "select * from items WHERE name like :name or type like :type";
            return $this->query($query, [
                'name' => '%' . $search . '%',
                'type' => '%' . $search . '%',
            ]);
        }
        $query = "select * from items";
        return $this->fetchAll($query);
    }

    public function getItems($type) {
        if ($type) {
            $query = "select * from items WHERE type like :type";
            return $this->fetchAllWithParams($query, ['type' => '%' . $type . '%']);
        }
        $query = "select * from items";
        return $this->fetchAll($query);
    }

    public function getAllItems() {
        $query = "select * from items";
        return $this->query($query);
    }

    public function getItemById($id){
        $query = "select * from items where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function saveItem($inputData){
        $query = "insert into items (name, type, price, description) values (:name, :type, :price, :description);";
        return $this->query($query, $inputData);
    }

    public function updateItem($inputData){
        $query = "update items set name = :name, type = :type, price = :price, description = :description where id = :id";
        return $this->query($query, $inputData);
    }

    public function deleteItem($inputData){
        $query = "DELETE FROM items where id = :id";
        return $this->query($query, $inputData);
    }
}