$(document).ready(function() {

    // Getting socket
    var socket = io('http://127.0.0.1:8081');

    // Listening on notification from server
    socket.on('notification', function (data) {
        $('.server').append(data);
    });

    // Listener on form submit event
    $(document).on('submit', '.form', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/',
            data: $(this).serialize(),
            success : function(response){
                $('.client').append('A message has been sent to server from this client!<br />');
            },
            error : function(response){
                console.log('Something went wrong.');
            },
            cache: false
        });

        return false;
    });

});
