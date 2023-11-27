// kontakt_form_validation.js

function validateForm() {
    let meno = document.getElementById("meno").value;
    let priezvisko = document.getElementById("priezvisko").value;
    let email = document.getElementById("email").value;
    let sprava = document.getElementById("sprava").value;

    if (meno == "" || priezvisko == "" || email == "" || sprava == "") {
        alert("Prosím vyplňte všetky údaje");
        return false;
    }

    let emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!emailRegex.test(email)) {
        alert("Prosím zadajte platný email");
        return false;
    }

    if (!/^[A-Z]/.test(meno)) {
        alert("Meno musí začínať veľkým písmenom");
        return false;
    }

    if (!/^[A-Z]/.test(priezvisko)) {
        alert("Priezvisko musí začínať veľkým písmenom");
        return false;
    }

    return true;
}
