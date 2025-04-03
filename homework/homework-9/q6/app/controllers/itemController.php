<?php

namespace app\controllers;

use app\models\Item;

class ItemController
{
    public function getItems() {
        $itemModel = new Item();
        $query = !empty($_GET['type']) ? $_GET['type'] : null;
        $items = $itemModel->getItems($query);
        echo json_encode($items);
        exit();
    }

    public function getItemByID($id) {
        $itemModel = new Item();
        $item = $itemModel->getItemById($id);
        echo json_encode($item);
        exit();
    }

    public function itemsView() {
        include '../public/assets/views/item/items.html';
        exit();
    }

}