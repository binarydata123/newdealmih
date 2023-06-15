$('.formSubmit').submit(function (evt) {
    evt.preventDefault();
    // alert('hs');
    var actionurl = "";
    var content = $(this).data('content');
    var orderAddress = $(this).data('address');
    console.log(content);
    var dataId = $(this).data('id');
   
    if (dataId) {
        var actionurl = dataId;
    }
    else {
        var actionurl = content;
    }
    //alert(actionurl);
    var formname = $(this).serialize()
    // var validator = $(".js-validation").validate();
    $.ajax({
        type: 'POST', 
        url: actionurl,
        data: formname, 
        // cache: false,
        // contentType: false,  
        // processData: false, 
        success: function (result) {
            $('span.error').html('');
            if(actionurl == 'change-password'){
                $('.succes-msg').html(result.message);
                setTimeout(function () {
                    $('#cpassword').modal('hide');
                }, 5000);
            } else {
                $('.succes-msg').html(result.message);
            }
            $('.formSubmit').trigger("reset");
            if (result.status == true) {
                // window.history.back()

                Lobibox.notify('success', {
                    size: 'mini',
                    position: 'top right',
                    msg: 'you have successfully reviewed this business', 
                    delay: 4000 
                   
                });
                if(result.userLogin == true)
                {
                    window.setTimeout(function(){ window.location.href=base_url},4000)
                }
                else if(result.updateProfile == true)
                {
                    // window.setTimeout(function(){window.location.reload()},4000)

                }
                else 
                {
                    // window.location.reload();
                // window.setTimeout(function(){window.history.back()},4000)
                // window.setTimeout(function(){ window.location.href=base_url+'address'},4000)
                }
                $('span.error').hide();
                // $('#form_validatcion')[0].reset();
        
                // $('.msg').html(result.message).fadeIn('slow');
                // $('.msg').delay(2000).fadeOut('slow');
                // $('.formSubmit').trigger("reset");
                // $('span.error').hide();
            }else{
               
                // Lobibox.notify('error', {
                //     size: 'mini',
                //     position: 'top right',
                //     msg: result.message
                // });

            }
 
        },
        error: function (data) {
            $('span.error').html('');
            $.each(data.responseJSON.errors, function (key, value) {
                // console.log(data.responseJSON.message);
                field = $('[name="' + key + '"]');
                field.next('span.error').html(value);
                if(key=="rating")
                    {
                        $('.rating-error').html(value);
                    }
            });
            // Lobibox.notify('error', {
            //     size: 'mini',
            //     position: 'top right',
            //     // msg: 'Oops! Something went wrong..!',
            //     msg: data.responseJSON.message

            // });
        }

    });
});