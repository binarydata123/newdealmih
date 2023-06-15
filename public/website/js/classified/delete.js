$('body').on('click', '.delete', function () {

    var id = $(this).data('id');

    var content=$(this).data('content');

    var url =base_url+content+'/delete';

    swal({
        // title: "Are you sure ?",
        text: "Are you sure you want to delete ?", 
        icon: "warning",
        buttons: true,
        dangerMode: true,
        showCancelButton: true,
        
            })
          .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: url,
                            type: 'POST',  
                            data:{
                                'id':id,
                            },
                            
                            beforeSend: function(){
                                $("#if_loading").html("loading");
                                
                            },
                            success: function(success) {
                                location.reload();
                            },
                            
                            complete: function(){
                                $('#if_loading').html("");
                                
                            }
                            
                        });
    
                    } 
                });
                
        });
