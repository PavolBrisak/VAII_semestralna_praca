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

function filterProducts() {
    let kategorie = $("#kategorie").val();
    let cena = $("#cena").val();
    let onSale = $("#onSale").is(":checked");

    $.ajax({
        url: "/ajax/filterProducts",
        method: "POST",
        data: {
            category: kategorie,
            priceFrom: 0,
            priceTo: cena,
            onSale: onSale,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            console.log(response.htmlContent);
            $("#produkty").html(response.htmlContent);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function validateFormUpravitProdukt(element)
{
    let nazov = $(element).find("#name").val();
    let cena = $(element).find("#price").val();
    let category = $(element).find("#category").val();
    let popis = $(element).find("#description").val();
    let amount = $(element).find("#amount").val();
    let description = $(element).find("#description").val();
    let onSale = $(element).find("#onSale").is(":checked");
    let salePrice = $(element).find("#salePrice").val();
    let id = $(element).find("#id").val();

    if (nazov !== "" && !/^[A-Z]/.test(nazov)) {
        alert("Názov musí začínať veľkým písmenom");
        return false;
    }

    if (cena !== "" && !/^[0-9]/.test(cena)) {
        alert("Cena musí byť číslo");
        return false;
    }

    if (salePrice !== "" && !/^[0-9]/.test(salePrice)) {
        alert("Cena musí byť číslo");
        return false;
    }

    if (onSale === true && salePrice === "") {
        alert("Zadajte zľavnenú cenu");
        return false;
    }

    if (salePrice !== "" && salePrice >= cena) {
        alert("Zľavnená cena musí byť menšia ako pôvodná cena");
        return false;
    }

    $.ajax({
        url: "/upravit-produkt",
        method: "POST",
        data: {
            id: id,
            nazov: nazov,
            cena: cena,
            category: category,
            popis: popis,
            amount: amount,
            description: description,
            onSale: onSale,
            salePrice: salePrice,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#success").css("display", "block");
        },
        error: function (error) {
            console.log(error);
        },
    });
}
