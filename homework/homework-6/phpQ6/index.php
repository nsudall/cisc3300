<?php

$array = [
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3',
  ];

foreach ($array as $key => $value) {
    echo "key: {$key}, value: {$value}";
    echo '<br>';
}

function greet(string $name, string $greeting = "Hello"): string {
    return "$greeting, $name!";
}

echo greet("Alice");
echo greet("Bob", "Good morning");
