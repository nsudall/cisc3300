<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Note Submission</title>
    <link rel="stylesheet" href="/public/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="/public/script.js" defer></script>
</head>
<body>
    <div class="container">
        <h2>Submit a Note</h2>
        <form id="note-form">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" id="title-input">
                <div id="title-error" class="error-text"></div>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea id="description-input"></textarea>
                <div id="description-error" class="error-text"></div>
            </div>
            <button type="submit">Submit</button>
        </form>
        <div id="message"></div>
    </div>
</body>
</html>
