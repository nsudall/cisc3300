<?php
namespace Stock;

class Item {
    public $name;
    public $price;
    public $type;

    public function __construct($name, $price, $type) {
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
    }

    public function toJson() {
        return json_encode([
            'name' => $this->name,
            'price' => $this->price,
            'type' => $this->type
        ]);
    }
}