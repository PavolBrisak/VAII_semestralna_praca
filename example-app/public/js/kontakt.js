function adjustFormHeight() {
    let textarea = document.getElementById('sprava');
    let form = document.querySelector('.kontakt-form');
    form.style.height = textarea.scrollHeight + 'px';
}
