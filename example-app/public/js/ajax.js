
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
        success: function(data) {
            console.log(data);
            $('#pocet').html(data.na_sklade);
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}
