//next previous start
$(document).ready(function () {
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
  
    setProgressBar(current);
    var pageValue = []
    $(".next").on('click', function () {
      current_fs = $(this).parent();
            next_fs = $(this).parent().next();
      var page = $(this).data('id');
      var url = base_url + "register";
      var firstname = $('.firstname').val();
      var lastname = $('.lastname').val();
      var gender = $('.gender').val();
      var username =$('.username').val();
      var email = $('.email').val();
      var phone_number = $('.phone_number').val();
      var dob = $('.dob').val();
      var password = $('.password').val();
      var confirm_password = $('.confirm_password').val();
    //   var seller_last_name = $('.seller_last_name').val();
    //   var seller_phone = $('.seller_phone').val();
      
      pageValue = ({ firstname, lastname, dob,gender,username,email,
        phone_number,password,confirm_password
        // seller_first_name,seller_last_name,seller_phone
     })
      $.ajax({
        type: "post",
        url: url,
        data: { page: page, pageValue: pageValue },
        success: function (result) {
          $('span.error').html('');
          if(result.pageStatus == 4)
          {
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
            current_fs.animate(
              { opacity: 0 },
              {
                step: function (now) {
                  // for making fielset appear animation
                  opacity = 1 - now;
  
                  current_fs.css({
                    display: "none",
                    position: "relative"
                  });
                  next_fs.css({ opacity: opacity });
                },
                duration: 500
              }
            );
            setProgressBar(++current);
  
          }
        }, error: function (data) {
          window.scrollTo(0, 0);
          $('span.error').html('');
          $.each(data.responseJSON.errors, function (key, value) {
            var replaceVale = key.replace('pageValue.', '')
  
            field = $('[name="' + replaceVale + '"]');
            field.next('span.error').html(value);
          });
  
        }
      })
    });
  
    $(".previous").click(function () {
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
      current_fs.animate(
        { opacity: 0 },
        {
          step: function (now) {
            // for making fielset appear animation
            opacity = 1 - now;
  
            current_fs.css({
              display: "none",
              position: "relative"
            });
            previous_fs.css({ opacity: opacity });
          },
          duration: 500
        }
      );
      setProgressBar(--current);
    });
  
    function setProgressBar(curStep) {
      var percent = parseFloat(100 / steps) * curStep;
      percent = percent.toFixed();
      $(".progress-bar").css("width", percent + "%");
    }
  
    $(".submit").click(function () {
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

                    $($.parseHTML('<img class="media'+ i++ + '">')).attr('src', event.target.result).
                    appendTo(placeToInsertImagePreview).attr('style', 'margin-left: 2%;width:200px;height:200px;')
                    $($.parseHTML('<div class="img-wraps  trash-image delete-trash  "'+ i++ +'"" data-id="' + i++ + '" > <span class="closes " title="Delete">×</span> </div> ')).attr('src', event.target.result).
                    appendTo(placeToInsertImagePreview);
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
        $("img.media"+imageId).remove();
        $(this).remove();
});



$("#profile_file").change(function(){

  readURL(this);
  $('.profile_pic').show();
});
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {

      $('#profile_pic').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

// personal info 
var firstname = "";
var lastname = "";
var gender = "";
var dob = "";
var phone_number = "";
$('.personalInfoYes').on('click', function(){
    
    firstname = $('.firstname').val();
    lastname = $('.lastname').val();
    gender = $('.gender').val();
    dob = $('.dob').val();
    phone_number = $('.phone_number').val();
    $('.person_first_name').val(firstname);
    $('.person_last_name').val(lastname);
    $('.person_gender').val(gender);
    $('.person_dob').val(dob);
    $('.person_phone_no').val(phone_number);
})

$('.personalInfoNo').on('click', function()
{
    $('.person_first_name').val("");
    $('.person_last_name').val("");
    $('.person_gender').val("");
    $('.person_dob').val("");
    $('.person_phone_no').val("");
})

//show business detail 
$('.is_business_yes').on('click', function()
{

  $('.business_detail').show();
  
})

//hide business detail 
$('.is_business_no').on('click',function()
{
  $('.business_detail').hide();
})
