<?php

require 'Item.php';

use Stock\Item;

$item = new Item("Sweater", 19.99, "Clothes");
echo $item->toJson();