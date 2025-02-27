<?php

header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === '') {
    require 'in-class-13.html';
}

if ($uriArray[1] === 'items' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $items = [
        [
            'name' => 'Data'
        ],
        [
            'name' => 'From'
        ],
        [
            'name' => 'Back'
        ],
        [
            'name' => 'End'
        ]
    ];

    echo json_encode($items);
    exit();
}
?>