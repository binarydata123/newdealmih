//next previous start
$(document).ready(function() {
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);
    var pageValue = []
    $(".next").on('click', function() {
        $('span.error').html('');
        $('.district-error').html('');
        $('.municipality-error').html('');
        $('.village-error').html('');
        $('.is_business-error').html('');
        $('.personalinfo-error').html('');

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        var page = $(this).data('id');
        var id = $('.user_id').val();
        var url = base_url + "register/edit/" + id;
        // var firstname = $('.firstname').val();
        // var lastname = $('.lastname').val();
        var gender = $('.gender').val();
        var username = $('.username').val();
        var email = $('.email').val();
        var phone_number = $('.phone_number').val();
        var dob = $('.dob').val();
        var password = $('.password').val();
        var confirm_password = $('.confirm_password').val();
        var hidden_imgdata = $('.hidden_imgdata').val();
        var district = $('.district').val();
        var is_store = $("input[name='is_store']:checked").val();
        var term = $("input[name='term']:checked").val()
        var about_company = $('.about_company').val();
        var business_tax_no = $('.business_tax_no').val();
        var business_reg_number = $('.business_reg_number').val();
        var business_name = $('.business_name').val();
        var municipality = $('.municipality').val();
        var village = $('.village').val();
        var address_one = $('.address_one').val();
        var is_business = $("input[name='is_business']:checked").val();
        var is_contact_person = $("input[name='is_contact_person']:checked").val();
        var person_first_name = $(".person_first_name").val();
        var person_gender = $(".person_gender").val();
        var person_dob = $(".person_dob").val();
        var person_phone_no = $(".person_phone_no").val();




        // var hidd_isuser = $('.hidd_isuser').val();
        //   var seller_last_name = $('.seller_last_name').val();
        //   var seller_phone = $('.seller_phone').val();

        pageValue = ({
            dob,
            gender,
            username,
            email,
            phone_number,
            hidden_imgdata,
            district,
            is_store,
            term,
            about_company,
            business_tax_no,
            business_reg_number,
            business_name,
            municipality,
            village,
            address_one,
            is_business,
            is_contact_person,
            person_first_name,
            person_gender,
            person_phone_no,
            person_dob
            // seller_first_name,seller_last_name,seller_phone
        })
        $.ajax({
            type: "post",
            url: url,
            data: { id: id, page: page, pageValue: pageValue, hidden_imgdata, hidden_imgdata },
            success: function(result) {
                $('span.error').html('');
                if (result.pageStatus == 3) {
                    $('#msform').submit();
                }
                if (result.pageStatus == 1 || result.pageStatus == 2) {

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


                $.each(data.responseJSON.errors, function(key, value) {
                    var replaceVale = key.replace('pageValue.', '')
                    console.log(value);
                    $('.upload-docu').html('');

                    if (replaceVale == 'hidden_imgdata') {
                        $('.upload-docu').html(value);

                    } else if (replaceVale == 'district') {
                        $('.district-error').html(value);
                    } else if (replaceVale == 'municipality') {
                        $('.municipality-error').html(value);
                    } else if (replaceVale == 'village') {
                        $('.village-error').html(value);
                    } else if (replaceVale == 'is_business') {
                        $('.is_business-error').html(value);
                    } else if (replaceVale == 'is_contact_person') {
                        $('.personalinfo-error').html(value);
                    }
                    if (is_store == 2) {

                        $('.term-hide-error').html('');
                    }
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




$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        // console.log(placeToInsertImagePreview);
        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var fileName = event.target.result;
                    var fileindex = fileName.indexOf("application/pdf");
                    if (fileindex > 0) {
                        fileName = "../public/website/images/pdf.png";
                        event.target.result = filename;
                    }


                    $($.parseHTML('<img class="media' + i++ + '">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview).attr('style', 'margin-left: 2%;width:200px;height:200px;')
                    $($.parseHTML('<div class="img-wraps  trash-image delete-trash  "' + i++ + '"" data-id="' + i++ + '" > <span class="closes " title="Delete">×</span> </div> ')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
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

// personal info 
var username = "";
// var lastname = "";
var gender = "";
var dob = "";
var phone_number = "";
$('.personalInfoYes').on('click', function() {

    username = $('.username').val();
    email = $('.email').val();
    // lastname = $('.email').val();
    gender = $('.gender').val();
    dob = $('.dob').val();
    phone_number = $('.phone_number').val();
    $('.person_first_name').val(username);
    $('.person_email').val(email);
    // $('.person_last_name').val(email);

    $('.person_gender').val(gender);
    $('.person_dob').val(dob);
    $('.person_phone_no').val(phone_number);
})

$('.personalInfoNo').on('click', function() {
    $('.person_first_name').val("");
    $('.person_email').val("");
    // $('.person_last_name').val("");
    $('.person_gender').val("");
    $('.person_dob').val("");
    $('.person_phone_no').val("");
})

//show business detail 
$('.is_business_yes').on('click', function() {

    $('.business_detail').show();

})

//hide business detail 
$('.is_business_no').on('click', function() {
    $('.business_detail').hide();
})


// municipality 
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

        $.each(dataList, function(key, value) {
            sel.append('<option value=' + value.municipality_id + '>' + value.municipality_name + '</option>');
        });

        $.each(villageList, function(villageKey, villagevalue) {
            village.append('<option value=' + villagevalue.id + '>' + villagevalue.name + '</option>');
        });
    });
});