<?php

namespace app\controllers;

class NoteController
{

    public function saveNote() {
        $title = $_POST['title-input'] ?? null;
        $description = $_POST['description-input'] ?? null;
        $errors = [];

        if ($title) {
            $title = htmlspecialchars($title);

            echo ($title);
            echo '<br>';
            echo htmlspecialchars(htmlspecialchars($title));

            if (strlen($title) < 3) {
                $errors['title'] = 'title is too short';
            }
        } else {
            $errors['title'] = 'title is required';
        }

        if ($description) {
            if ($description < 10) {
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
            'title' => $title,
            'description' => $description,
        ];
        echo json_encode($returnData);
        exit();
    }

}