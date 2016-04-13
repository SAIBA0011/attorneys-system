<script>
    $( document ).ready( function( )
    {
        $( '.delete' ).bootstrap_confirm_delete(
                {
                    debug:              false,
                    heading:            '',
                    message:            '<div class="text-center">{!! 'Please click on delete to remove ' .$user->name. ' from your friend lists, or alternatively click cancel.' !!}</div>',
                    data_type:          'post',
                    callback:           function ( event )
                    {},
                    delete_callback:    function(event) {
                        // grab original clicked delete button
                        var button = event.data.originalObject;
                        // execute delete operation
                        button.closest('form').submit();
                    },
                    cancel_callback:    function() { console.log( 'cancel button clicked' ); }
                }
        );
    } );
</script>