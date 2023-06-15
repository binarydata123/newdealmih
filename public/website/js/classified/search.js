var rubberMinPrice = "";
var rubberMaxPrice = "";
var priceAmount = '';
$(function() {
    const $tabWrap = $(".tab-wrap");

    // // ES6 var, let, const
    // // var anhTuyen = "Anh Tuyển";

    // // var anhTuyen = "Thanh";

    // // {
    // //   khối
    // let anhTuyen = "Anh Tuyển";

    // anhTuyen;
    // // }

    // anhTuyen;

    $tabWrap.each(function() {
        // $('.tab-wrap') = $(this);
        // console.log($(this).children());  //tấc cả các con
        // console.log($(this).parents()); tất cả cha
        // console.log($(this).parent());  cha trực tiếp
        // addClass() thêm một class vào thẻ html bất kỳ
        // removeClass() xóa một class trong thẻ html bất kỳ
        // console.log($(this).parents('html').addClass('HTML'));

        // .click(function() {}); .on('sự kiện.. click, hover, dbclick', function() {})

        // $(this).children('')

        // .find() tìm vào bên trong (' phải có tham số ')
        // $(this).find('.tab-item-wrap').first().addClass('active');

        $(this)
            .find(".tab-item-wrap")
            .first()
            .find(".content")
            .show()
            .parent()
            .addClass("active");

        // .css({ "tên thuộc tính" : 'giá trị', 'xxx': 'xxx' })

        // .show() .hide() hiện, ẩn display: block, none;

        var title = $(this).find(".title"),
            $content = $(this).find(".content");
        // console.log(title);

        title.on("click", function() {

            //  $(this).parent().toggleClass('active');

            $(this).parent().find(".content").toggle();

            // $(this).parent().addClass('tuan');
            // .css()
        });

        $(this)

        .find(".tab-item-wrap")
            .find(".title")
            .on("click", function(e) {
                $(this)
                    .parent()
                    .addClass("active")
                    .siblings()
                    .removeClass("active")
                    .find("i")
                    .attr("class", "fa fa-plus");

                $(this).find("i").attr("class", "fa fa-minus");
                $(this)
                    .parents(".tab-item-wrap")
                    .siblings()
                    .find(".content")
                    .hide()
                    .parents(".tab-item-wrap");
            });
    });
});

// Rubberband Input
const rubberIpts = document.querySelectorAll(".rubber-ipt");
// var RubberMinPrice = 1990;
// var RubberMaxPrice = 2022;
for (var i = 0; i < rubberIpts.length; i++) {
    const rubberRange = rubberIpts[i].querySelector(".rubber-ipt-range");
    const rubberMin = rubberIpts[i].querySelector(".rubber-ipt-min");
    const rubberMax = rubberIpts[i].querySelector(".rubber-ipt-max");
    var initialMousePosMin;
    var initialMousePosMax;

    // Rubber Minimum
    rubberMin.style.left = "0px";

    function dragTargetMin(dragOffsetMin) {
        rubberMin.style.left = `${dragOffsetMin}px`;
    }

    function getDragOffsetMin(e) {
        if (initialMousePosMin == null) {
            initialMousePosMin = e.clientX;
        }
        var mousePos = e.clientX;
        var dragOffsetMin = mousePos - initialMousePosMin;
        var rubberMinMax = 200 + (parseInt(rubberMax.style.left, 10)) - 10;

        if (dragOffsetMin < 0) {
            dragOffsetMin = 0
        } else if (dragOffsetMin > rubberMinMax) {
            dragOffsetMin = rubberMinMax;
        };
        if (dragOffsetMin > 190) {
            dragOffsetMin = 190;
        }

        dragTargetMin(dragOffsetMin);
        updateRubberRangeMin(dragOffsetMin);
        getMinPrice(dragOffsetMin);

    }

    function SetDragStartMin(e) {

        document.addEventListener("mousemove", getDragOffsetMin);
    }

    function stopDragMin() {
        document.removeEventListener("mousemove", getDragOffsetMin);
    }

    rubberMin.addEventListener("mousedown", SetDragStartMin);
    document.addEventListener("mouseup", stopDragMin);

    // Rubber Maximum
    rubberMax.style.left = "0px";

    function dragTargetMax(dragOffsetMax) {
        rubberMax.style.left = `${dragOffsetMax}px`;
    }

    function getDragOffsetMax(e) {

        if (initialMousePosMax == null) {
            initialMousePosMax = e.clientX;
        }
        var mousePos = e.clientX;
        var dragOffsetMax = mousePos - initialMousePosMax;
        var rubberMaxMin = (parseInt(rubberMin.style.left, 10) - 200 + 10);

        if (dragOffsetMax > 0) {
            dragOffsetMax = 0} else if (dragOffsetMax < rubberMaxMin) {
            dragOffsetMax = rubberMaxMin;
        };
        if (dragOffsetMax < -190) {
            dragOffsetMax = -190;
        }

        dragTargetMax(dragOffsetMax);
        updateRubberRangeMax(dragOffsetMax);
        getMaxPrice(dragOffsetMax);
    }

    function SetDragStartMax() {
        document.addEventListener("mousemove", getDragOffsetMax);

    }

    function stopDragMax() {

        document.removeEventListener("mousemove", getDragOffsetMax);
    }

    rubberMax.addEventListener("mousedown", SetDragStartMax);
    document.addEventListener("mouseup", stopDragMax);

    // Update Range between Min and Max

    rubberRange.style.width = "200px";

    function updateRubberRangeMin(dragOffsetMin) {
        rubberRange.style.left = `${dragOffsetMin}px`;

        var rubberRangeWidth =
            200 - ((parseInt(rubberMax.style.left, 10)) * -1) - dragOffsetMin;
        if (rubberRangeWidth <= 0) {
            rubberRangeWidth = 0;
        }
        rubberRange.style.width = `${rubberRangeWidth}px`;
    }

    function updateRubberRangeMax(dragOffsetMax) {
        var rubberRangeWidth =
            200 - parseInt(rubberMin.style.left, 10) - (dragOffsetMax * -1);
        if (rubberRangeWidth <= 0) {
            rubberRangeWidth = 0;
        }
        rubberRange.style.width = `${rubberRangeWidth}px`;
    }

    // Update price range

    const minPrice = rubberIpts[i].querySelector(".rubber-value-min");
    console.log("price" + minPrice);
    const maxPrice = rubberIpts[i].querySelector(".rubber-value-max");

    var RubberMinPrice = 100;
    var RubberMaxPrice = 100000;

    function getMinPrice(dragOffsetMin) {
        rubberMinPrice =
            ((RubberMaxPrice / 200) * dragOffsetMin) +
            (((RubberMinPrice - ((RubberMinPrice / 200) * dragOffsetMin))));
      
            // minPrice.innerHTML = `${rubberMinPrice}`
            minPrice.innerHTML = `${Math.round(rubberMinPrice)}`;
         commonSearch()

    }

    function getMaxPrice(dragOffsetMax) {
        rubberMaxPrice = ((RubberMaxPrice/200) * (dragOffsetMax + 200)) + ((RubberMinPrice - ((RubberMinPrice/200) * (dragOffsetMax + 200))));
        // maxPrice.innerHTML = `${rubberMaxPrice}`

        maxPrice.innerHTML = `${Math.round(rubberMaxPrice)}`;
         commonSearch()

    }
};



//  category select 
$('.parent-category').on('click', function() {

    var id = $(this).data('id');

    $('.hide-sub-category' + id).hide();

    $('.min-sub-category').hide();

    $('.sub-category-hide').hide();
    
    $('.hide-already-sub-category-data').hide();

    if ($("#chcek" + id).prop('checked') == true) {

        $.ajax({
            type: "post",
            url: base_url + 'search/sub-category',
            data: {
                id: id
            },
            success: function(result) {
                console.log(result);
                var dataList = result.html;
                var categorySlug = result.categorySlug;
                var categoryId = result.categoryId;
                var categoryHide = 'hide-sub-category' + categoryId;
                console.log(categoryHide)
                $('.bed-bath-hide').show();
                

                //$('.sub-category').append(dataList);
                $('.sub-category').html(dataList);
                $('.hide-sub-category' + categoryId).show();


                if (categorySlug == 'business-for-sale' || categorySlug == 'commercial-shop-office')

                {
                    // $('.bed-bath-hide').hide();
                    $('.hide-sub-category' + categoryId).hide();

                    /////////
                    $.ajax({
                            type: "post",
                            url: base_url + 'search/feature-data',
                            data: {
                                id: id
                            },
                            success: function(result) {
                                console.log(result);
                                var dataList = result.html;
                                var categorySlug = result.categorySlug;
                                
                                  // $('div#bathroom').show();
                                  $('.bed-bath-hide').hide();
                                  $('div#bathroom_ajx').show();

                                  if(categorySlug == 'business-for-sale'){
                                    $('.bed-bath-hide').hide();
                                    $('#hide-sub-category_'+id).hide();
                                  }

                                 $('.feature-data-html').append(dataList);
                            },
                            error: function(result) {}
                        }) /////

                    //////////////////
                }

            },
            error: function(result) {}
        })
    } else {

        $('.hide-sub-category' + id).hide();
    }
})


$(document).on('click', '.min-sub-category-data', function(e) {


     var id = $(this).data('id');

    $('.hide-sub-category' + id).hide();

    $('.min-sub-category').hide();

    $('.min-sub-category-hide').hide();


    $('.hide-already-sub-category-data').hide();

    if ($("#chcek" + id).prop('checked') == true) {

        $.ajax({
            type: "post",
            url: base_url + 'search/sub-category',
            data: {
                id: id
            },
            success: function(result) {
                console.log(result);
                var dataList = result.html;
                var categorySlug = result.categorySlug;
                var categoryId = result.categoryId;
                var categoryHide = 'hide-sub-category' + categoryId;
                console.log(categoryHide)
                $('.bed-bath-hide').show();
                $('.min-sub-category').show();
                $('.min-sub-category').html(dataList);

                $('.hide-sub-category' + categoryId).show();

            },
            error: function(result) {}
        })
    } else {

        $('.hide-sub-category' + id).hide();
    }

});

// feature data 
$(document).on('click', '.sub-category-data', function(e) {
    var id = $(this).data('id');
    // alert(id);
  

    $('.hide-feature-data' + id).hide();
    if ($("#chcek" + id).prop('checked') == true) {
        $.ajax({
            type: "post",
            url: base_url + 'search/feature-data',
            data: {
                id: id
            },
            success: function(result) {
                console.log(result);
                var dataList = result.html;
                var categorySlug = result.categorySlug;
                $('.bed-bath-hide').show();
                // if(categorySlug == 'land')
                if (categorySlug == 'land' || categorySlug == 'for-sale-shop-office-land' || categorySlug == 'for-rent-shop-office-land')

                {
                    $('.bed-bath-hide').hide();
                    $('div#bathroom_ajx').show();
                }
                if ((categorySlug == 'flat-or-room-mates' && categorySlug == 'for-rent-houses-apartments') || categorySlug == 'flat-or-room-mates' || categorySlug == 'for-rent-houses-apartments')
                {
                    $('.type_hide').hide();
                    $('#pricetag').hide();
                    $('#rentpermonth').show();
                } else if (categorySlug == 'for-rent-shop-office-land') {
                    $('.type_hide').show();
                    $('#pricetag').hide();
                    $('#rentpermonth').show();
                } else if (categorySlug == 'for-sale-houses-apartments') {
                    $('.type_hide').show();
                    $('#pricetag').show();
                    $('#rentpermonth').hide();
                } else if (categorySlug == 'land') {
                    $('.type_hide').hide();
                    $('#pricetag').show();
                    $('#rentpermonth').hide();
                } else {
                    $('.type_hide').show();
                    $('#rentpermonth').hide();
                    $('#pricetag').show()
                }
                $('.feature-data-html').append(dataList);
            },
            error: function(result) {}
        })
    } else {
        $.ajax({
            type: "post",
            url: base_url + 'search/feature-data',
            data: {
                id: id
            },
            success: function(result) {
                var dataList = result.html;
                var categorySlug = result.categorySlug;
                if (categorySlug == 'for-sale-houses-apartments' || categorySlug == 'land')
                {
                    $('.type_hide').hide();
                } else {
                    $('.type_hide').show();
                }
            },
            error: function(result) {}
        }) 
        $('#rentpermonth').hide();
        $('#pricetag').show();
        $('.hide-feature-data' + id).hide();
    }

})

// clear feature data 
$(document).on('click', '.clear-feature', function(e) {
    var dataId = $(this).data('id');
    $('.feature-data' + dataId).hide();
    $(this).removeClass('clear-feature');
    $(this).addClass('show-feature');
});
$(document).on('click', '.show-feature', function(e) {
    var dataId = $(this).data('id');
    $('.feature-data' + dataId).show();
    $(this).addClass('clear-feature');
    $(this).removeClass('show-feature');
});


//search 
var category = [];
var subCategory = [];
var minsubCategory = [];
var selectOption = [];
var checkboxFeature = [];
var district = [];
var municipality = [];
var village = [];
var salary = "";
var jobType = "";
var duration = "";
var slug = $('.slug').val();
var type = []; //$('.type').val();
var isAuction = $('.is_auction').val();
var typeCategory = $('.typeCategory').val();
var bathroom = '';
var bedroom = '';
$(document).on('click', '.filter', function() {
        var id = $(this).data('id');
        // category 
        type = [];
        if ($(".stauscategory1").prop("checked") == true && $(".stauscategory2").prop("checked") == true) {        
         type.push(1);
         type.push(2);
        
        } else {            
          if($(".stauscategory1").prop("checked") == true){
             type.push(1);
            
          }else if($(".stauscategory2").prop("checked") == true) {
             type.push(2);
             
          }else {
                type.push(1);
                type.push(2);
          }
        }

        if ($(".category" + id).prop("checked") == true) {

            category.push($(this).data('id'));
        } else if ($(".category" + id).prop("checked") == true) {

            $('.sub-category-hide').hide();

        } else {
            if ((index = category.indexOf($(this).data('id'))) !== -1) {
                category.splice(index, 1);
                // alert('ha');
                subCategory = [];
                $('.feature-data-html').html('');

            }
        }

        // sub category 
        if ($(".sub-category" + id).prop("checked") == true) {
             
            subCategory.push($(this).data('id'));
        } else {
            // $('.feature-data-html').html('');

            $('.hide-feature').hide();
            if ((index = subCategory.indexOf($(this).data('id'))) !== -1) {
                subCategory.splice(index, 1);
            }
        }

         // minsub category 
        if ($(".min-sub-category" + id).prop("checked") == true) {
            
            minsubCategory.push($(this).data('id'));
        } else {
            // $('.feature-data-html').html('');

            $('.hide-feature').hide();
            if ((index = minsubCategory.indexOf($(this).data('id'))) !== -1) {
                minsubCategory.splice(index, 1);
            }
        }

        //checkbox featuredata 
        // console.log($(".feature-data-value-checkbox" + id).prop("checked") == true);
        if ($(".feature-data-value-checkbox" + id).prop("checked") == true) {
            // console.log($(this).data('id'));
            checkboxFeature.push($(this).data('id'));
        } else {
            if ((index = checkboxFeature.indexOf($(this).data('id'))) !== -1) {
                checkboxFeature.splice(index, 1);
            }
        }
        // alert(type);
        commonSearch()
    })
    // selected feature data 
$(document).on('change', '.feature-data-value', function() {
    var id = $(this).data('id');

    $('.feature-data-value :selected').each(function(i, selected) {
        selectOption.push($(selected).val());

    });

    commonSearch()
});
// selected district 
$(document).on('change', '.district', function() {
    $('.district :selected').each(function(i, selected) {
        district = $(selected).val();
    });
    commonSearch()
});
// selected municipality 
$(document).on('change', '.municipality', function() {
    $('.municipality :selected').each(function(i, selected) {
        municipality = $(selected).val();
    });
    commonSearch()
});

// selected village 
$(document).on('change', '.village', function() {
    $('.village :selected').each(function(i, selected) {
        village = $(selected).val();
    });
    commonSearch()
});
// salary search in job listing 
$(document).on('change', '.salary_scal', function() {
    $('.salary_scal :selected').each(function(i, selected) {
        salary = $(selected).val();
    });
    commonSearch()
});
//job type search in job listing
$(document).on('change', '.job_type', function() {
    $('.job_type :selected').each(function(i, selected) {
        jobType = $(selected).val();
    });
    commonSearch()
});
// duration search in job listin 
$(document).on('change', '.duration', function() {
    $('.duration :selected').each(function(i, selected) {
        duration = $(selected).val();
    });
    commonSearch()
});
//select type 
// $('.typeStatus').on('change', function() {
//     type = $(this).data('id');

//     commonSearch();
// });



$('.bathroom').on('change', function() {
    bathroom = $(this).val();
    commonSearch();
})
$('.bedroom').on('change', function() {
        bedroom = $(this).val();
        commonSearch();
    })
       $('.price-submit').on('click', function()
       {
        //    alert('ha');
           priceAmount = rubberMinPrice;
        commonSearch();

   })
function commonSearch() {
    $.ajax({
        type: "get",
        url: base_url + "search/" + slug,
        data: {
            category: category,
            subCategory: subCategory,
            minsubCategory:minsubCategory,
            selectOption: selectOption,
            checkboxFeature: checkboxFeature,
            district: district,
            municipality: municipality,
            village: village,
            price: rubberMinPrice,
            maxprice: rubberMaxPrice,
            salary: salary,
            jobType: jobType,
            duration: duration,
            type: type,
            is_auction: isAuction,
            typeCategory: typeCategory,
            bathroom: bathroom,
            bedroom: bedroom
        },
        success: function(result) {
            $('.product-result').html(result.html);
        },
        error: function(result) {

        }
    })
}



$(document).on('change', '.district', function(e) {
    var id = $(this).val();
    var sel = $('.municipality');
    var village = $('.village');
    var url = base_url + 'municipality';
    $.post(url, {
        id: id
    }, function(data) {
        var dataList = data.data;
        var villageList = data.village;
        console.log(villageList);
        sel.html('<option value="">All Municipality/Nagarpalika</option>');
        village.html('<option value="">Village</option>');

        $.each(dataList, function(key, value) {
            sel.append('<option value=' + value.municipality_id + '>' + value.municipality_name + '</option>');
        });

        $.each(villageList, function(villageKey, villagevalue) {
            village.append('<option value=' + villagevalue.id + '>' + villagevalue.name +
                '</option>');
        });
    });
});
$('.refine-search').on('click', function() {
    window.location.reload();

})
$(document).ready(function() {


    $("#min_price,#max_price").on('change', function() {



        var min_price_range = parseInt($("#min_price").val());

        var max_price_range = parseInt($("#max_price").val());

        if (min_price_range > max_price_range) {
            $('#max_price').val(min_price_range);
        }

        $("#slider-range").slider({
            values: [min_price_range, max_price_range]
        });

    });


    $("#min_price,#max_price").on("paste keyup", function() {



        var min_price_range = parseInt($("#min_price").val());

        var max_price_range = parseInt($("#max_price").val());

        if (min_price_range == max_price_range) {

            max_price_range = min_price_range + 500;

            $("#min_price").val(min_price_range);
            $("#max_price").val(max_price_range);
        }

        $("#slider-range").slider({
            values: [min_price_range, max_price_range]
        });

    });


    $(function() {
        $("#slider-range").slider({
            range: true,
            orientation: "horizontal",
            min: 0,
            max: 10000,
            values: [0, 10000],
            step: 500,

            slide: function(event, ui) {
                if (ui.values[0] == ui.values[1]) {
                    return false;
                }

                $("#min_price").val(ui.values[0]);
                $("#max_price").val(ui.values[1]);
            }
        });

        $("#min_price").val($("#slider-range").slider("values", 0));
        $("#max_price").val($("#slider-range").slider("values", 1));

    });

    //////////////

    $("#min_year,#max_year").on('change', function() {



        var min_year_range = parseInt($("#min_year").val());

        var max_year_range = parseInt($("#max_year").val());

        if (min_year_range > max_year_range) {
            $('#max_year').val(min_year_range);
        }

        $("#slider-range2").slider({
            values: [min_year_range, max_year_range]
        });

    });


    $("#min_year,#max_year").on("paste keyup", function() {



        var min_year_range = parseInt($("#min_year").val());

        var max_year_range = parseInt($("#max_year").val());

        if (min_year_range == max_year_range) {

            max_price_range = min_price_range + 500;

            $("#min_year").val(min_year_range);
            $("#max_year").val(max_year_range);
        }

        $("#slider-range2").slider({
            values: [min_year_range, max_year_range]
        });

    });


    $(function() {
        $("#slider-range2").slider({
            range: true,
            orientation: "horizontal",
            min: 1990,
            max: 2022,
            values: [1990, 2022],
            step: 1,

            slide: function(event, ui) {
                if (ui.values[0] == ui.values[1]) {
                    return false;
                }

                $("#min_year").val(ui.values[0]);
                $("#max_year").val(ui.values[1]);
            }
        });

        $("#min_year").val($("#slider-range").slider("values", 0));
        $("#max_year").val($("#slider-range").slider("values", 1));

    });
    $(document).on('change', '.brands', function() {
        var type = 'list-product';
        var dataId = $(this).val();
        $.ajax({
            type: "post",
            url: base_url + "search/feature-data-model",
            data: { dataId: dataId, type: type },
            success: function(data) {
                // $('.feature-data-model-result').show();
                console.log(data.html);
                $('.feature-data-model-result').html(data.html);
            },
            error: function(data) {
            }
        })
    });

     $('[data-toggle="tooltip"]').tooltip()

    ///////
});