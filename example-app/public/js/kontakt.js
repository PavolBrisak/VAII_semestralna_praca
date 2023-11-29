function changeFormHeightOnTextAreaScroll() {
    let textarea = document.getElementById('sprava');
    let form = document.querySelector('.kontakt-form');
    let filler = document.querySelector('.filler');

    let minHeight = 58;
    textarea.style.height = minHeight + 'px';
    textarea.style.height = Math.max(minHeight, textarea.scrollHeight) + 'px';

    form.style.height = 500 + (textarea.scrollHeight - 40) + 'px';
    filler.style.height = 500 + (textarea.scrollHeight - 40) + 'px';
}
