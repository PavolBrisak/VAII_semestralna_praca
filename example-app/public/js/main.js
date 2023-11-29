window.onscroll = function () {
    let navbarElement = document.getElementById('navigation-bar');
    if (window.scrollY >= navbarElement.offsetTop + navbarElement.offsetHeight) {
        navbarElement.style.position = 'fixed';
        navbarElement.style.top = '0';
        navbarElement.style.width = '100%';
        navbarElement.style.left = '0';
        let listItems = navbarElement.querySelectorAll('ul li');
        listItems.forEach(item => {
            item.style.marginTop = '10px';  // Adjust the margin-top value as needed
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
