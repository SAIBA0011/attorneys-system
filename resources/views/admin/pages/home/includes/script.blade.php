<script>
    $(document).ready(function() {
        var text_max = 109;
        $('.counting').html(text_max + ' characters remaining');

        $('.textarea').keyup(function() {
            var text_length = $('.textarea').val().length;
            var text_remaining = text_max - text_length;

            $('.counting').html(text_remaining + ' characters remaining');
        });
    });
</script>