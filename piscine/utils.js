var btn = document.querySelector('input');

btn.addEventListener('click', updateBtn);

function updateBtn() {
    if (btn.value === 'Visible') {
        btn.value = 'Invisible';
    } else {
        btn.value = 'Visible';
    }
}