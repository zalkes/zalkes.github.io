let darkModeEnabled = false;

const darkModeButton = document.getElementById('dark-mode-button');
const navbar = document.getElementById('navbar');
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector(".nav-links");
const icons = document.querySelectorAll("i");

darkModeButton.addEventListener('click', () => {
    darkModeEnabled = !darkModeEnabled;

    if (darkModeEnabled) {
        enableDarkMode();
    } else {
        disableDarkMode();
    }
});

const enableDarkMode = () => {
    document.body.classList.add('dark-mode');
    navbar.classList.add('dark-mode');
}

const disableDarkMode = () => {
    document.body.classList.remove('dark-mode');
    navbar.classList.remove('dark-mode');
}

hamburger.addEventListener("click", function () {
    const isVisible = navLinks.getAttribute('data-visible');
    if (isVisible == "true") {
        navLinks.setAttribute('data-visible', "false");
        icons[0].setAttribute('data-visible', "true");
        icons[1].setAttribute('data-visible', "false");
    } else if (isVisible == "false") {
        navLinks.setAttribute('data-visible', "true");
        icons[0].setAttribute('data-visible', "false");
        icons[1].setAttribute('data-visible', "true");
    }
});

function pemberitahuan() {
    alert("Maaf, Fitur ini belum tersedia ;(");
}