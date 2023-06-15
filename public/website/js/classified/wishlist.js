
        $('.wishlist').on('click', function() {
            var id = $(this).data('id');

            alert(id)
            $.ajax({
                type: "post",
                url: base_url + "wishlist",
                data: {
                    id: id
                },
                success: function() {

                },
                error: function() {

                }
            })
        })
        
