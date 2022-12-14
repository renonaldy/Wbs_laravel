$('#btnbwh').click(function() {
    if ($('#btnbwh').is(':submit')) {
        $.ajax({
            url: 'masuk'
            method: 'post',
            data: {
                '_token': '{{ csrf_token() }}',
                media: $('select[name=media] option').filter(':selected').val(),
                token: $('input[name="token"]').val(),
            }
        }).done(function() {
            window.location.href = "login";
            alert('Kode OTP Berhasil, Silahkan Login')
        }).fail(function(error) {
            alert('Kode OTP yang anda masukkan salah')
        })


        // console.log('berhasil menginputkan otp')
    })
}


$('#btnonOtp').click(function()
{
    $.ajax({
        url: test.php,
        type:'POST',
        data:
        {
            // The key is 'mobile'. This will be the same key in $_POST[] that holds the mobile number value.
            mobile: $('#mobile').val()
        },
        success: function(msg)
        {
            alert('OTP Sent');
        }
    });
});

The key is 'mobiel ' this will be the same key in $_post[] that holds the mobile number valie
