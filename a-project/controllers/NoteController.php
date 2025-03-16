<?php
class NoteController {
    public function showForm() {
        require 'views/note_form.php';
    }

    public function submitNote() {
        header('Content-Type: application/json');

        // Get JSON request data
        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data) {
            http_response_code(400);
            echo json_encode(["error" => "Invalid request"]);
            exit;
        }

        // Sanitize input
        $title = htmlspecialchars(trim($data['title'] ?? ''));
        $description = htmlspecialchars(trim($data['description'] ?? ''));

        // Validation
        $errors = [];
        if (strlen($title) <= 3) {
            $errors['title'] = "Title must be more than 3 characters.";
        }
        if (strlen($description) <= 10) {
            $errors['description'] = "Description must be more than 10 characters.";
        }

        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit;
        }

        // Simulate successful submission (In real applications, store in DB)
        echo json_encode(["message" => "Note submitted successfully!", "title" => $title, "description" => $description]);
    }
}
?>
