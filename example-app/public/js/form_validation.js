function validateFormKontakt() {
    let meno = document.getElementById("meno").value;
    let priezvisko = document.getElementById("priezvisko").value;
    let email = document.getElementById("email").value;
    let sprava = document.getElementById("sprava").value;

    if (meno === "" || priezvisko === "" || email === "" || sprava === "") {
        alert("Prosím vyplňte všetky údaje");
        return false;
    }

    let emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!emailRegex.test(email)) {
        alert("Neplatný email");
        return false;
    }

    if (!/^\p{Lu}/u.test(meno)) {
        alert("Meno musí začínať veľkým písmenom");
        return false;
    }

    if (!/^\p{Lu}/u.test(priezvisko)) {
        alert("Priezvisko musí začínať veľkým písmenom");
        return false;
    }

    return true;
}

function validateFormPrihlasenie() {
    let email = document.getElementById("email").value;
    let heslo = document.getElementById("password").value;

    if (email === "" || heslo === "") {
        alert("Prosím vyplňte všetky údaje");
        return false;
    }

    let emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!emailRegex.test(email)) {
        alert("Neplatný email");
        return false;
    }

    return true;
}

function validateFormRegistracia() {
    let meno = document.getElementById("meno").value;
    let priezvisko = document.getElementById("priezvisko").value;
    let email = document.getElementById("email").value;
    let heslo = document.getElementById("heslo").value;
    let heslo_potvrd = document.getElementById("heslo_potvrd").value;

    if (meno === "" || priezvisko === "" || email === "" || heslo === "" || heslo_potvrd === "") {
        alert("Prosím vyplňte všetky údaje");
        return false;
    }

    if (!/^\p{Lu}/u.test(meno)) {
        alert("Meno musí začínať veľkým písmenom");
        return false;
    }

    if (!/^\p{Lu}/u.test(priezvisko)) {
        alert("Priezvisko musí začínať veľkým písmenom");
        return false;
    }

    let emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!emailRegex.test(email)) {
        alert("Neplatný email");
        return false;
    }

    if (heslo !== heslo_potvrd) {
        alert("Heslá sa nezhodujú");
        return false;
    }

    return true;
}

function validateFormZmenaMena() {
    let meno = document.getElementById("meno").value;

    if (meno === "") {
        alert("Prosím vyplňte všetky údaje");
        return false;
    }

    if (!/^\p{Lu}/u.test(meno)) {
        alert("Meno musí začínať veľkým písmenom");
        return false;
    }

    return true;
}

function validateFormZmenaHesla() {
    let heslo = document.getElementById("heslo").value;
    let heslo_potvrd = document.getElementById("heslo_potvrd").value;

    if (heslo === "" || heslo_potvrd === "") {
        alert("Prosím vyplňte všetky údaje");
        return false;
    }

    if (heslo !== heslo_potvrd) {
        alert("Heslá sa nezhodujú");
        return false;
    }

    return true;
}


function checkMeno() {
    let menoInput = document.getElementById("meno").value;
    let firstLetter = menoInput.charAt(0);
    document.getElementById("form-error-meno").hidden = firstLetter === firstLetter.toUpperCase();
    if (menoInput === "") {
        document.getElementById("form-error-meno").hidden = true;
    }
}

function checkPriezvisko() {
    let priezviskoInput = document.getElementById("priezvisko").value;
    let firstLetter = priezviskoInput.charAt(0);
    document.getElementById("form-error-priezvisko").hidden = firstLetter === firstLetter.toUpperCase();
    if (priezviskoInput === "") {
        document.getElementById("form-error-priezvisko").hidden = true;
    }
}

function checkEmail() {
    let emailInput = document.getElementById("email").value;
    let emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    document.getElementById("form-error-email").hidden = emailRegex.test(emailInput);
    if (emailInput === "") {
        document.getElementById("form-error-email").hidden = true;
    }
}

function checkHeslo() {
    let hesloInput = document.getElementById("heslo").value;
    let minLength = 8;
    let hasUpperCase = /[A-Z]/.test(hesloInput);
    let hasLowerCase = /[a-z]/.test(hesloInput);
    let hasNumber = /\d/.test(hesloInput);
    let hasSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(hesloInput);

    let isStrong = (
        hesloInput.length >= minLength &&
        hasUpperCase &&
        hasLowerCase &&
        hasNumber &&
        hasSpecialChar
    );

    let errorSpan = document.getElementById("form-error-heslo");

    if (isStrong) {
        errorSpan.hidden = false;
        errorSpan.textContent = "Silné heslo";
        errorSpan.style.color = "green";
    } else {
        errorSpan.hidden = false;
        errorSpan.textContent = "Slabé heslo";
    }

    if (hesloInput === "") {
        errorSpan.hidden = true;
    }
}

function validateFormVlozitProdukt() {
    let nazov = document.getElementById("name").value;
    let cena = document.getElementById("price").value;
    let category = document.getElementById("category").value;
    let popis = document.getElementById("description").value;
    let obrazok = document.getElementById("picture").files[0];


    if (nazov === "" || cena === "" || popis === "" || obrazok === "") {
        alert("Prosím vyplňte všetky údaje");
        return false;
    }

    if (!/^\p{Lu}/u.test(nazov)) {
        alert("Názov musí začínať veľkým písmenom");
        return false;
    }

    if (!/^[0-9]/.test(cena)) {
        alert("Cena musí byť číslo");
        return false;
    }

    if (category === "") {
        alert("Vyberte kategóriu");
        return false;
    }

    return true;
}

function validateSendOrder() {
    let mnozstvo = document.getElementById("mnozstvo").value;
    let cart_mnozstvo = document.getElementById("cart-amount").value;
    console.log(mnozstvo);
    console.log(cart_mnozstvo);


    if (mnozstvo === "" || mnozstvo === 0) {
        alert("Prosím vyplňte množstvo");
        return false;
    }

    if (mnozstvo > cart_mnozstvo) {
        alert("Nedostatok tovaru na sklade");
        return false;
    }
}
