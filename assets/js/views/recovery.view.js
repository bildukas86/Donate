$(document).ready(function() {
    loadPage('recovery', 'recovery', function() {
        $('#recovery-form input[name="save"]').on('click', function() {
            blockScreen();

            var data = $('#recovery-form').serialize();

            $.post(route('/recovery'), data, function(response) {
                if (response.hasOwnProperty('content')) {
                    $("#response").html(formatMessage(response.content, response.type));

                    if (response.type == 'success')
                        $('#recovery-form input[name="recovery_input"]').val('');

                    unblockScreen();
                }
            });
        });
    });
});
