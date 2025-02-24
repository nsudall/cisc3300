<?php

$request = $_SERVER['REQUEST_URI'];

if ($request == '/html') 
{
    echo "<h1>This is the HTML page</h1>";
} 

else if ($request == '/json') {
    $msg = ["message" => "This is the JSON Page"];
    echo json_encode($msg);
}
