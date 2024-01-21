function showDropdownUser() {
    let dropdown = document.getElementById('dropdown');
    let dropdownContent = dropdown.querySelector('.dropdown-content');

    if (dropdownContent.style.display === 'block') {
        dropdownContent.style.display = 'none';
    } else {
        dropdownContent.style.display = 'block';
    }
}

function submitSearchForm() {
    let searchInputValue = document.getElementById('searchInput').value;
    document.location.href = window.searchUrl + '/' + encodeURIComponent(searchInputValue);
}

$(document).ready(function () {
    updateCenaValue($("#cena").val());

    $("#cena").on("input", function () {
        updateCenaValue($(this).val());
    });
});

function updateCenaValue(value) {
    $("#cenaValue").text(value + " €");
}
