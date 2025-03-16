<?php

namespace app\controllers;

class NoteController
{

    public function saveNote() {
        $title = $_POST['titleInput'] ?? null;
        $description = $_POST['descriptionInput'] ?? null;
        $errors = [];
        
        if ($title) {
            $title = htmlspecialchars($title);

            if (strlen($title) < 3) {
                $errors['title'] = 'title is too short';
            }
        } else {
            $errors['title'] = 'title is required';
        }

        if ($description) {
            if (strlen($description < 10)) {
                $errors['description'] = 'description is too short';
            }
        } else {
            $errors['description'] = 'description is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        $returnData = [
            'dataTitle' => $title,
            'dataDescription' => $description,
        ];
        echo json_encode($returnData);
        exit();
    }

}