window.onscroll = function () {
    let navbarElement = document.getElementById('navigation-bar');
    if (window.scrollY >= navbarElement.offsetTop + navbarElement.offsetHeight) {
        navbarElement.style.position = 'fixed';
        navbarElement.style.top = '0';
        navbarElement.style.width = '100%';
        navbarElement.style.left = '0';
        let listItems = navbarElement.querySelectorAll('ul li');
        listItems.forEach(item => {
            item.style.marginTop = '20px';
        });
    } else {
        navbarElement.style.position = 'static';
        let listItems = navbarElement.querySelectorAll('ul li');
        listItems.forEach(item => {
            item.style.marginTop = '0';
        });
    }
};

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
    // Set initial price value
    updateCenaValue($("#cena").val());

    // Attach change event to slider
    $("#cena").on("input", function () {
        updateCenaValue($(this).val());
    });
});

function updateCenaValue(value) {
    // Update displayed price next to the slider
    $("#cenaValue").text(value + " €");
}
