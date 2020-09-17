$(document).on('click', '#authorization', function () {
    var login1 = $('#login1').val();
    var password2 = $('#password2').val();
    $('#result').empty();
    $.ajax({
        url: '/authorization/ajax',
        type: 'POST',
        dataType: 'json',
        data: {login1: login1, password2: password2},
        success: function (result) {
            console.log(result['error_login']);
            if(result['error_login'] === ""){window.location.href = "/main/index"}
            else {$('#result').append(result['error_login']);}
            $('#password2').val('');}


    })

})