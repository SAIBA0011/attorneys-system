<script>
    $(document).ready(function() {
        $('.description').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true,                  // set focus to editable area after initializing summernote
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline']],
                ['font', ['strikethrough']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
        });

        $('select').select2({
            'allowClear': true,
            placeholder: 'Please Select..'
        });

        $('.timepicker1').timepicker({
            maxHours : '24',
            showSeconds : false,
            showMeridian : false,
        });
    });
</script>
