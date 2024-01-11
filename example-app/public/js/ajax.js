function refreshNaSklade(element) {
    const produktId = $(element).attr('data-product-id');

    console.log(produktId);
    $.ajax({
        url: '/ajax/refreshNaSklade',
        type: 'POST',
        dataType: 'json',
        data: {
            produkt_id: produktId,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (data) {
            console.log(data);
            $('#pocet').html(data.na_sklade);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function updateQuantity(element) {
    let productId = $(element).data('product-id');
    let productName = $(element).data('product-name');
    let newQuantity = $(element).val();
    console.log(productName);
    $.ajax({
        url: "/ajax/updateQuantity",
        method: "POST",
        data: {
            productId: productId,
            productName: productName,
            newQuantity: newQuantity,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            location.reload();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

