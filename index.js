const navigationPage = document.querySelector('.navigation');
const mainContentPage = document.querySelector('.main-content');

fetch('pages/navigation.html')
    .then(response => response.text())
    .then(html => {
        navigationPage.innerHTML = html;
    });

fetch('pages/main-content.html')
    .then(response => response.text())
    .then(html => {
        mainContentPage.innerHTML = html;
    });