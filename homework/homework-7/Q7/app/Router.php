<?php

namespace app;

require "../app/controllers/NoteController.php";

use app\controllers\NoteController;

class Router {

    public function handleRoutes() {

        //get URI without query string
        $url = strtok($_SERVER["REQUEST_URI"], '?');

        //split url into array
        $uriArray = explode("/", $url);

        $this->noteRoutes($uriArray);
    }

    protected function noteRoutes($uriArray) {
        if ($uriArray[1] === 'api' && $uriArray[2] === 'notes' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $noteController = new NoteController();
            $noteController->saveNote();
        }

        if ($uriArray[1] === '') {
            require '../public/views/note.html';
        }

    }
}