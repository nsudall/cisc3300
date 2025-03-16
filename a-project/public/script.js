$(document).ready(function () {
    $('#note-form').on('submit', function (e) {
        e.preventDefault();

        let title = $('#title-input').val().trim();
        let description = $('#description-input').val().trim();

        $('#title-error').html('');
        $('#description-error').html('');
        $('#message').html('');

        const data = { title: title, description: description };

        $.ajax({
            url: '/notes',
            type: "POST",
            data: JSON.stringify(data),
            contentType: "application/json",
            dataType: "json",
            success: function (response) {
                $('#title-input').val('');
                $('#description-input').val('');
                $('#message').html(`<p style="color: green">${response.message}</p>`);
            },
            error: function (xhr) {
                let errors = xhr.responseJSON;
                if (errors.title) {
                    $('#title-error').html(errors.title);
                }
                if (errors.description) {
                    $('#description-error').html(errors.description);
                }
            }
        });
    });
});
