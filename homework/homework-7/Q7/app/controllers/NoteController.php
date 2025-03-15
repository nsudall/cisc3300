<?php

namespace app\controllers;

class NoteController
{

    public function saveNote() {
        //get post data from our form post
        //{name: 'pinecone', age: '14'}
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;
        $errors = [];

        //validate and sanitize name
        if ($title) {
            //sanitize, htmlspecialchars replaces html reserved characters with their entity numbers
            //meaning they can't be run as code, this will stop an xxs attack
            $title = htmlspecialchars($title);

            echo ($title);
            echo '<br>';
            echo htmlspecialchars(htmlspecialchars($title));

            //validate text length
            if (strlen($title) < 3) {
                $errors['title'] = 'title is too short';
            }
        } else {
            $errors['title'] = 'title is required';
        }

        //numbers
        if ($description) {
            if ($description < 10) {
                $errors['description'] = 'description is too short';
            }
        } else {
            $errors['description'] = 'description is required';
        }

        //if we have errors
        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        //we could save the data off to be saved here

        $returnData = [
            'title' => $title,
            'description' => $description,
        ];
        echo json_encode($returnData);
        exit();
    }

}