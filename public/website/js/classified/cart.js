// wishlist 

var quantity = "";
var productId = "";
var quantityValue = "";
var productStatus = 0;
//incresse cart
$('.increaseValue').on('click', function () {
    quantity = $(this).data('id');
    productId = $(this).data('content');
    quantityValue = $('.number' + quantity).val();
    // alert(quantity);
    quantityValue = isNaN(quantityValue) ? 1 : quantityValue;
    quantityValue++;
    cartQuantity(quantityValue, productId);


    // document.getElementById("number").value = value;
})

$('.decreaseValue').on('click', function () {
    quantity = $(this).data('id');
    productId = $(this).data('content');
    quantityValue = $('.number' + quantity).val();

    if (quantityValue > 1) {
        quantityValue = isNaN(quantityValue) ? 1 : quantityValue;
        quantityValue < 1 ? (quantityValue = 1) : "";
        quantityValue--;
        $('.number' + quantity).val(quantityValue);
        cartQuantity(quantityValue, productId);
    }
})

function cartQuantity(quantityValue, productId) {

    $.ajax({
        type: "post",
        url: base_url + "cart/quantity",
        data: {
            quantityValue: quantityValue,
            productId: productId
        },
        success: function (result) {
            console.log(result);
            productStatus = result.productStatus;
            if (result.grandTotal) {
                $('.grandTotal').html('रू ' + result.grandTotal);

            }
            if (productStatus == 1) {
                swal({
                    text: "We are sorry! product quantity exceeded",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    // showCancelButton: true,
                })
            }
            else
            {
                $('.number' + quantity).val(quantityValue);
            }
        },
        error: function (result) {

        }
    })
}