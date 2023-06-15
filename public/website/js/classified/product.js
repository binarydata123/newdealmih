//next previous start
$(document).ready(function() {
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);
    var pageValue = []
    $(".next").on('click', function() {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        var page = $(this).data('id');
        var url = base_url + "create/product";
        var title = $('.title').val();
        var category_id = $('.category').val();
        var description = $('.description').val();
        var type = $("input:radio[name='type']:checked").val();
        var location = $('.address-input').val();
        var price = $('.price').val();
        var district = $('.district').val();
        var village = $('.village').val();
        var quantity = $('.quantity').val();
        var municipality = $('.municipality').val();
        var address_one = $('.address_one').val();
        var seller_first_name = $('.seller_first_name').val();
        var seller_last_name = $('.seller_last_name').val();
        var seller_phone = $('.seller_phone').val();
        var slug = $('.slug').val();
        var sub_category = $('.sub-category').val();
        var min_sub_category = $('.min-sub-category').val();
        var is_sub_category = $('.sub-category-check').val();
        var is_min_sub_category = $('.min-sub-category-check').val();

        var land_area = $('.land-area').val();
        var land_area_unit_number = $('.land_area_unit_number').val();

        var is_buynow = $("input[name='is_buynow']:checked").val();

        var auction_price = $('.auction_price').val();

          var km_delivery = $('.km_delivery').val();

        var delivery_service = $('input[name="delivery_service"]:checked').val();

        var delivery_charges = $('input[name="delivery_charges"]:checked').val();

        var mainnewimage = $('.hidden_imgdata').val();

       

        var product_id = $('.sub-category').attr('product-id');
        // var company_name = $('.company_name').val();
        // var company_email = $('.company_email').val();
        if(page == '1'){

            if(sub_category != '61'){

                subcategoryfind(sub_category, product_id);
            }

            
        } else {

        }
        pageValue = ({
            title,
            category_id,
            description,
            type,
            location,
            price,
            district,
            municipality,
            village,
            quantity,
            address_one,
            seller_first_name,
            seller_last_name,
            seller_phone,
            is_buynow,
            auction_price,
            is_sub_category,
            sub_category,
            land_area,
            delivery_service,
            km_delivery,
            delivery_charges,
            min_sub_category,
            is_min_sub_category,
            mainnewimage,
        })
        $.ajax({
            type: "post",
            url: url,
            data: { page: page, pageValue: pageValue, slug: slug },
            success: function(result) {
                    $('span.error').html('');
                
                if (result.pageStatus == 4) {
                    $('#msform').submit();
                }
                if (result.pageStatus == 1 || result.pageStatus == 2 || result.pageStatus == 3) {

                    window.scrollTo(0, 0);

                    console.log(current_fs);
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({ opacity: 0 }, {
                        step: function(now) {
                            // for making fielset appear animation
                            opacity = 1 - now;

                            current_fs.css({
                                display: "none",
                                position: "relative"
                            });
                            next_fs.css({ opacity: opacity });
                        },
                        duration: 500
                    });
                    setProgressBar(++current);

                }
            },
            error: function(data) {
                window.scrollTo(0, 0);
                $('span.error').html('');



                $.each(data.responseJSON.errors, function(key, value) {

                    // console.log(key);

                    

                     // field.push(pageValue.district);

                    var replaceVale = key.replace('pageValue.', '')

                    console.log(replaceVale);

                    if(replaceVale == 'district'){
                        $(".district_error").show();
                    };
                    if(replaceVale == 'municipality'){
                        $(".municipality_error").show();
                    };
                    if(replaceVale == 'village'){
                        $(".village_error").show();
                    };
                

                    if(replaceVale == 'delivery_service'){
                        $(".delivery_service_error").show();
                    };
                    
                    if(replaceVale == 'km_delivery'){
                        $(".km_delivery_error").show();
                    };

                     if(replaceVale == 'delivery_charges'){
                        $(".delivery_charges_error").show();
                    };

                     if(replaceVale == 'image'){
                        $(".maine_image_error").show();
                    };


                    

                    field = $('[name="' + replaceVale + '"]');
                    field.next('span.error').html(value);
                });

            }
        })
    });



    $(".previous").click(function() {
        window.scrollTo(0, 0);
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li")
            .eq($("fieldset").index(current_fs))
            .removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    display: "none",
                    position: "relative"
                });
                previous_fs.css({ opacity: opacity });
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar").css("width", percent + "%");
    }

    $(".submit").click(function() {
        return false;
    });
});
//next previous end
var numberKey = 0;
var key = 0;
// category select change 
$(document).on('change', '.category', function(e) {

    $('.hide-without-land').hide();
    $('.land_area').hide();
    $('.land-area-hide').hide();
    var id = $(this).val();
    var sel = $('.sub-category');
    var url = base_url + 'sub-category';

    $.post(url, { id: id }, function(data) {
        $('.sub-category-hide').show();
        $('.sub-category-check').val(1);
        $('.min-sub-category-hide').hide();

        if (data.count == 0) {
            $('.sub-category-check').val(0);
            $('.sub-category-hide').hide();

        }
        numberKey = key++;
        var dataList = data.data;
        // $('.hide-without-land').show();
        //  $('.business_type').hide();

        if (data.categorySlug == 'business-for-sale') {
            $('.hide-without-land').hide();
            $('.business_type').show();

        }
        sel.html('<option value="">Choose Sub category</option>');
        $.each(dataList, function(key, value) {
            sel.append('<option value=' + value.id + '>' + value.category_name + '</option>');
        });
        console.log(sel);
    });
});


$(document).on('change', '.min-sub-category', function(e) {

 var id = $(this).val();

 var product_id = null;

 subcategoryfind(id, product_id);


});

$(document).on('change', '.sub-category', function(e) {
    
    
    var id = $(this).val();

    if(id == '61'){

        var sel = $('.min-sub-category');
        var url = base_url + 'sub-category';

        $.post(url, { id: id }, function(data) {
        $('.min-sub-category-hide').show();
        $('.min-sub-category-check').val(1);

        if (data.count == 0) {
            $('.min-sub-category-check').val(0);
            $('.min-sub-category-hide').hide();

        }

        numberKey = key++;
        var dataList = data.data;
     
        sel.html('<option value="">Choose Sub category</option>');
        $.each(dataList, function(key, value) {
            sel.append('<option value=' + value.id + '>' + value.category_name + '</option>');
        });
        console.log(sel);
    });

    }else {
         $('.min-sub-category-hide').hide();
         $('.min-sub-category-check').val(0);
    }
   

        
});

//  sub category inner category
// $(document).on('change', '.category', function (e) {
//   var id = $(this).val();
//   var sel = $('.sub-category');
//   var url = base_url + 'sub-category';
//   $.post(url, { id: id }, function (data) {

//     numberKey =key++;
//     var dataList = data.data;
//     if(data.count != 0)
//     {
//     $('.sub-category-list').html("")
//     $('.sub-category-list'+numberKey).html(dataList)
//     }
//     // sel.html('<option value="">Choose Sub category</option>');
//     // $.each(dataList, function (key, value) {
//     //   sel.append('<option value=' + value.id + '>' + value.category_name + '</option>');
//     // });
//   });
// });
// sub category  base feature data
function subcategoryfind(subid, product_id){
    var id = subid;

    $('.business_type').hide();
    var url = base_url + 'feature-data';
    $.ajax({
        type: "post",
        url: url,
        data: { id: id, product_id: product_id },
        success: function(result) {
            var featureDataHtml = result.data;

            console.log(featureDataHtml);
             console.log(result.categorySlug);

            $('.existing_flatemate').hide();
            $('.hide-without-land').show();
            $('.type-new-used').show();


            
            if (result.categorySlug == 'for-rent-houses-apartments') {

                $('.type-new-used').hide();
                $('onrent').hide();
                $('.auction_price').hide();

                $("#txtprice").attr("placeholder", "Rent Per Month");
               
                 
                $('.listed_by_individual_option').hide();

            }

            if (result.categorySlug == 'for-rent-shop-office-land'){
                 $('.auction_price').hide();
                 $('.rent_per_month').show();
                 $('.bedrooms_land').hide();
                 
                 $('.listed_by_individual_option').hide();
                 
                 
            }

            if (result.categorySlug == 'for-sale-houses-apartments'){                 
                 $('.rent_per_month1').hide();
                 $('#bathroom').css('margin-top',24);
                 
                 $('.listed_by_individual_option').hide();

            }
            if (result.categorySlug == 'flat-or-room-mates'){                 
                 $('.rent_per_month').hide();
                  $('.rent_per_month').show();
                  $('#bathroom').css('margin-top',24);
                 
                 $('.listed_by_individual_option').show(); 
            }
             
        
            if (result.categorySlug == 'for-sale-shop-office-land') {
                $('.bedrooms_land').hide();
                $('#bath').css('margin-top',26);
                $('.listed_by_individual_option').hide();
                
                $('.rent_per_month1').hide();
                 $('.listed_by_individual_option').hide();
            }

            if (result.categorySlug == 'flat-or-room-mates') {
                $('#project_name1').show();
                $('#listed_by2').show();
                $('.listed_by_individual_option').show();
            }

            if (result.categorySlug == 'flat-or-room-mates') {
                $('.type-new-used').hide();

                $('.auction_price').hide();
                $('.existing_flatemate').show();
                $('#bath').css('margin-top',26);
                $('.land-area-hide').hide();
                $('.listed_by_individual_option').show();
            }
            if (result.categorySlug == 'land') {
                $('.land-area-hide').show();
                $('.land_area').show();
                $('.type-new-used').hide();
                // $('.existing_flatemate').show();
                $('.hide-without-land').hide();
                $('.bedrooms_land').hide();
                $('.listed_by_individual_option').hide();
            }

            if(id == 67 || id == 71 || id == 68 ) {
                 $("#txtprice").attr("placeholder", "Rent Per Month");
            }

            if(id == 327 ) {
                 $('#listed_by2').show();
                 $('#project_name1').show();
                 $('#facilities_land').show();
                 $('#facing_land').show();
            }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
         
            if(id == 66 || id == 67) {
                 $('#land-1').show();
                 $('#land-2').show();
                 $('#land-area2').show();
                 $('#land-area1').show();
                 $('#bathroom').css('margin-top',0);
                 
            }


            $('.feature-data-result').html(featureDataHtml)
        },
        error: function(result) {
            console.log(result);
        }
    });

}

function getval(sel)
{    
    if(sel.value == 281){

         $("#txtprice").attr("placeholder", "Rent Per Month");
                          $('.auction_price').hide();

    }
}

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        // console.log(placeToInsertImagePreview);
        if (input.files) {
            var filesAmount = input.files.length;
            if(filesAmount > 2){
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {

                        $($.parseHTML('<img class="media' + i++ + '">')).attr('src', event.target.result).
                        appendTo(placeToInsertImagePreview).attr('style', 'margin-left: 2%;margin-top:5%;width:100px;height:100px;')
                        $($.parseHTML('<div class="img-wraps  trash-image delete-trash  "' + i++ + '"" data-id="' + i++ + '" > <span class="closes " title="Delete">×</span> </div> ')).attr('src', event.target.result).
                        appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
                $('#image_error').html('');
            } else {
                $('#image_error').html('Press Ctrl and select aleast 3 three files');
            }
        }
    };

    $('#gallery_image').on('change', function() {
        // $('div.gallery-image').html('');
        imagesPreview(this, 'div.gallery-image');
    });
});

// delete 
$(document).on("click", ".trash-image", function(e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var imageId = id - 2;
    $("img.media" + imageId).remove();
    $(this).remove();
});



$("#profile_file").change(function() {

    readURL(this);
    $('.profile_pic').show();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {

            $('#profile_pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

// municipality and village get from district
$(document).on('change', '.district', function(e) {
    var id = $(this).val();
    var sel = $('.municipality');
    var village = $('.village');
    var url = base_url + 'municipality';
    $.post(url, { id: id }, function(data) {
        var dataList = data.data;
        var villageList = data.village;
        console.log(villageList);
        sel.html('<option value="">Muncipality/Nagarpalika</option>');
        village.html('<option value="">Village</option>');
        sel.append('<option value="">' + 'Other' +'</option>');
        village.append('<option value="">' + 'Other' +'</option>');
        $.each(dataList, function(key, value) {
           sel.append('<option value=' + value.municipality_id + '>' + value.municipality_name + '</option>');
        });
        $.each(villageList, function(villageKey, villagevalue) {
            village.append('<option value=' + villagevalue.id + '>' + villagevalue.name + '</option>');
        });
    });
});

// seller image upload 

$(".seller_image_file").click(function() {
    $("input[class='my_file']").click();
    // PreviewImage();
});
// main image upload
function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image").files[0]);

    oFReader.onload = function(oFREvent) {
        $(".main-image").show();
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
};

// auction date 
$('.auction_price').on('keyup', function() {
    var val = $(this).val();
    if (val) {
        $('.auction_date').show();
    } else {
        $('.auction_date').hide();
    }

})



// if select brand and to display model 
$(document).on('change', '.brands', function() {
    var type = 'list-product';
    var dataId = $(this).val();
    $.ajax({
        type: "post",
        url: base_url + "motor/feature-data-model",
        data: { dataId: dataId, type: type },
        success: function(data) {
            // $('.feature-data-model-result').show();
            console.log(data.html);
            $('.feature-data-model-result').html(data.html);
        },
        error: function(data) {

        }
    })

})

var userName = $('.hidd_name').val();
var phnNo = $('.hidd_phone').val();
console.log(userName, phnNo);

$('.personalInfo').on('click', function() {
    var val = $(this).val();
    $('.seller_first_name').val('');
    $('.seller_phone').val('');
    if (val == 1) {
        $('.seller_first_name').val(userName);
        $('.seller_phone').val(phnNo);
    }

    // alert(username);




})


// $(document).ready(function() {
// function myFunction() {
//   document.getElementById("myForm1").reset();
// }
// });




// $('.personalInfoNo').on('click', function()
// {
//     $('.person_first_name').val("");
//      $('.seller_phone').val("");
//  })