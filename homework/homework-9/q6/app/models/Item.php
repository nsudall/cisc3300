<?php

namespace app\models;

class Item extends Model {

    public function getItems($type) {
        if ($type) {
            $query = "select * from items WHERE type like :type";
            return $this->fetchAllWithParams($query, ['type' => '%' . $type . '%']);
        }
        $query = "select * from items";
        return $this->fetchAll($query);
    }

    public function getItemById($id){
        $query = "select * from items where id = :id";
        return $this->fetchAllWithParams($query, ['id' => $id])[0] ?? null;
    }
}