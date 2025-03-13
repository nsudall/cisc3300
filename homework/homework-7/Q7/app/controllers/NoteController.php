<?php

namespace app\controllers;

class NoteController {
    public function showForm() {
        $successMessage = '';
        $errors = [];
        $this->renderView($successMessage, $errors);
    }

    public function submitNote() {
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');

        $errors = [];

        if (strlen($title) < 4) {
            $errors[] = "Title must be at least 4 characters long.";
        }

        if (strlen($description) < 11) {
            $errors[] = "Description must be at least 11 characters long.";
        }

        $title = htmlspecialchars($title);
        $description = htmlspecialchars($description);

        $successMessage = empty($errors) ? "Note submitted successfully!" : '';

        $this->renderView($successMessage, $errors);
    }

    private function renderView($successMessage, $errors) {
        $html = file_get_contents('../public/views/note_form.html');

        $html = str_replace('{{successMessage}}', $successMessage, $html);
        $html = str_replace('{{errors}}', $this->formatErrors($errors), $html);

        echo $html;
    }

    private function formatErrors($errors) {
        if (empty($errors)) return '';

        $errorHtml = '<div class="error"><ul>';
        foreach ($errors as $error) {
            $errorHtml .= "<li>$error</li>";
        }
        $errorHtml .= '</ul></div>';
        return $errorHtml;
    }
}
?>
