require('./bootstrap');

function ready() {

    const nav = document.querySelector('.menu');

    document.querySelector('#menu-mobile').addEventListener('click', e => {
        e.preventDefault()

        if (nav.classList.contains('shown')) {
            nav.classList.remove('shown')
            nav.classList.add('hidden')
        } else {
            nav.classList.remove('hidden')
            nav.classList.add('shown')
        }
    })
}

document.addEventListener('DOMContentLoaded', ready);
