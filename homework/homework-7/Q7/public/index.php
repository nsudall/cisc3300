<?php

require_once '../app/controllers/NoteController.php';

use app\controllers\NoteController;

$controller = new NoteController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->submitNote();
} else {
    $controller->showForm();
}
?>
