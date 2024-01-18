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
            $("#form-error-mnozstvo").show();
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
            $("#success").show().delay(3000).fadeOut();
        },
        error: function (error) {
            console.log(error);
        },
    });
}

function filterOrdersDate(element) {
    $.ajax({
        url: "/ajax/filterOrdersDate",
        method: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#objednavky").html(response.htmlContent);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function filterOrdersStatus(element) {
    let stav = $(element).find("#status").val();
    console.log(stav);
    $.ajax({
        url: "/ajax/filterOrdersStatus",
        method: "POST",
        data: {
            stav: stav,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#objednavky").html(response.htmlContent);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function filterOrdersCustomer(element) {
    let customer = $(element).find("#userInput").val();

    $.ajax({
        url: "/ajax/filterOrdersCustomer",
        method: "POST",
        data: {
            customer: customer,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            $("#objednavky").html(response.htmlContent);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function filterOrdersById(element) {
    let orderId = $(element).find("#oderInput").val();

    $.ajax({
        url: "/ajax/filterOrdersById",
        method: "POST",
        data: {
            orderId: orderId,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            console.log(response.objednavka);
            $("#objednavky").html(response.htmlContent);
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function updateOrderStatus(element) {
    let orderId = $(element).data('order-id');
    let newStatus = $(element).find("#status").val();
    console.log(orderId);
    console.log(newStatus);
    $.ajax({
        url: "/ajax/updateOrderStatus",
        method: "POST",
        data: {
            orderId: orderId,
            newStatus: newStatus,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            console.log(response.success);
            $("#objednavka").html(response.htmlContent);
        },
        error: function (error) {
            console.log(error);
        }
    });
}
