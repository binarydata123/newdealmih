$('.loginSubmit').submit(function (evt) {
    evt.preventDefault();

    var actionurl = "";
    var content = $(this).data('content');
    var dataId = $(this).data('id');
   
    if (dataId) {
        var actionurl = dataId;
    }
    else {
        var actionurl = content;
    }
  
    // alert(actionurl)
    var formname = $(this).serialize()
    // var validator = $(".js-validation").validate();
    $.ajax({
        type: 'POST', 
        url: base_url+actionurl,
        data: formname, 
        // cache: false,
        // contentType: false,  
        // processData: false, 
        success: function (result) {
            $('span.error').html('');
            if (result.auth == true) {
                if(result.intended)
                {
                    window.location.href=result.intended
                }
                
                $('span.error').hide();
            }else{
               
                Lobibox.notify('error', {
                    size: 'mini',
                    position: 'top right',
                    msg: result.message
                });

            }
 
        },
        error: function (data) {
            $('span.error').html('');
            $.each(data.responseJSON.errors, function (key, value) {
                console.log(data.responseJSON.message);
                field = $('[name="' + key + '"]');
                field.next('span.error').html(value);
            });
            Lobibox.notify('error', {
                size: 'mini',
                position: 'top right',
                // msg: 'Oops! Something went wrong..!',
                msg: data.responseJSON.message

            });
        }

    });
});
