window.onscroll = function (e) {
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
