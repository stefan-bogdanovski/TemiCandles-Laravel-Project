$(document).ready(function ()
{
    $.ajaxSetup({
        headers :
            {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
    })

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
    $("body").bind("ajaxSend", function(elm, xhr, s){
        if (s.type == "POST") {
            xhr.setRequestHeader('X-CSRF-Token', getCSRFTokenValue());
        }
    });
    $('select').on('change', getPrice);
    $('a.cart').on('click', addToBasket);
    $('a.delete').on('click', deleteFromBasket);
});
function getPrice()
{
    let productid = $(this).data('productid')
    $.ajax({
        url: 'getPrice',
        method: "post",
        accepts: "application/json",
        data: {
            "productid": productid,
            "value" : $(this).val()
        },
        success: function (data) {
            $('#cena' + productid).html("Cena: " + data['price'] + "din")
        },
        error: function (xhr, status, error) {
            console.log(xhr)
        }
    });
}
function addToBasket()
{
    let productid = $(this).attr('id');
    let sizeID = $('select#product_size' + productid).val();
    $.ajax({
        url: 'cart',
        method: "post",
        accepts: "application/json",
        data: {
            "productid": productid,
            "sizeid" : sizeID
        },
        success: function (data) {
            alert(data)
        },
        error: function (xhr, status, error) {
           alert('Doslo je do greske, molimo Vas kontaktirajte administratora.')
        }
    });
}
function deleteFromBasket()
{
    let productid = $(this).attr('id');
    console.log(productid)
    $.ajax({
        url: 'cart',
        method: "delete",
        accepts: "application/json",
        data: {
            "id": productid
        },
        success: function (data) {
            location.reload();
            alert(data)
        },
        error: function (xhr, status, error) {
            alert('Doslo je do greske, molimo Vas kontaktirajte administratora.')
        }
    });
}
