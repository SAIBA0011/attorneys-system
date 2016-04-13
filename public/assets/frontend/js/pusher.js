var pusher = new Pusher('790208a2e6e487b0b894', {
    encrypted: true
});

var channel = pusher.subscribe('test_channel');
channel.bind('userResponded', function(data) {
    var message = data.message;
    toastr.info(message)
});