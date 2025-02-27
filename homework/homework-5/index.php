<?php
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === 'items' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $items = [
        [
            'name' => 'Rugs',
            'price' => '59.99'
        ],
        [
            'name' => 'Sweaters',
            'price' => '12.99'
        ],
        [
            'name' => 'Cutlery',
            'price' => '3.99'
        ],
        [
            'name' => 'Mirrors',
            'price' => '15.99'
        ],
        [
            'name' => 'Paintings',
            'price' => '72.99'
        ]
    ];
    

    echo json_encode($items);
    exit();
}

if ($uriArray[1] === 'form' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode([
        'message' => 'Success'
    ]);
    exit();
}


?>