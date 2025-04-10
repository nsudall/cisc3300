<?php

namespace app\controllers;

use app\models\Item;

class ItemController
{
    public function validateItem($inputData) {
        $errors = [];
        $name = $inputData['name'];
        $type = $inputData['type'];
        $price = $inputData['price'];
        $description = $inputData['description'];

        if ($name) {
            $name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($name) < 2) {
                $errors['nameShort'] = 'Item name is too short';
            }
        } else {
            $errors['requiredName'] = 'Name is required';
        }

        if ($type) {
            $type = htmlspecialchars($type, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($type) < 2) {
                $errors['typeShort'] = 'Type is too short';
            }
        } else {
            $errors['requiredType'] = 'Type is required';
        }

        //ADD IN PRICE AND DESCRIPTION VERIFICATION

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'name' => $name,
            'type' => $type,
            'price' => $price,
            'description' => $description,
        ];
    }

    public function getAllItems() {
        $itemModel = new Item();
        header("Content-Type: application/json");
        $items = $itemModel->getAllItems();

        echo json_encode($items);
        exit();
    }

    public function getItems() {
        $itemModel = new Item();
        $query = !empty($_GET['type']) ? $_GET['type'] : null;
        $items = $itemModel->getItems($query);
        echo json_encode($items);
        exit();
    }

    public function getAllItemsByNameOrType() {
        $itemModel = new Item();
        $query = !empty($_GET['search']) ? $_GET['search'] : null;
        $items = $itemModel->getAllItemsByNameOrType($query);
        echo json_encode($items);
        exit();
    }

    public function getItemByID($id) {
        $itemModel = new Item();
        header("Content-Type: application/json");
        $item = $itemModel->getItemById($id);
        echo json_encode($item);
        exit();
    }

    public function saveItem() {
        $inputData = [
            'name' => $_POST['name'] ?: null,
            'type' => $_POST['type'] ?: null,
            'price' => $_POST['price'] ?: null,
            'description' => $_POST['description'] ?: null,
        ];
        $itemData = $this->validateItem($inputData);

        $item = new Item();
        $item->saveItem(
            [
                'name' => $itemData['name'],
                'type' => $itemData['type'],
                'price' => $itemData['price'],
                'description' => $itemData['description'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updateItem($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        //no built-in super global for PUT
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'name' => $_PUT['name'] ?: null,
            'type' => $_PUT['type'] ?: null,
            'price' => $_PUT['price'] ?: null,
            'description' => $_PUT['description'] ?: null,
        ];
        $itemData = $this->validateItem($inputData);
        //we could save the data off to be saved here

        $item = new Item();
        $item->updateItem(
            [
                'id' => $id,
                'name' => $itemData['name'],
                'type' => $itemData['type'],
                'price' => $itemData['price'],
                'description' => $itemData['description'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deleteItem($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $item = new Item();
        $item->deleteItem(
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

    public function itemsView() {
        include '../public/assets/views/item/items-view.html';
        exit();
    }

    public function itemsAddView() {
        include '../public/assets/views/item/items-add.html';
        exit();
    }

    public function itemsDeleteView() {
        include '../public/assets/views/item/items-delete.html';
        exit();
    }

    public function itemsUpdateView() {
        include '../public/assets/views/item/items-update.html';
        exit();
    }


}