// Wait for the DOM to be fully loaded
window.addEventListener('DOMContentLoaded', () => {
    // Get references to the elements
    const topNavigationPage = document.querySelector('.topNavigation');
    const navigationPage = document.querySelector('.navigation');
    const mainContentPage = document.querySelector('.main-content');
    const aboutUsPage = document.querySelector('.about-us'); 
    const footerPage = document.querySelector('.footer');
  
    // Fetch and load HTML content for each section
    fetch('pages/topNavigation.html')
        .then(response => response.text())
        .then(html => {
            topNavigationPage.innerHTML = html;
        });
  
    fetch('navigation/navigation.html')
        .then(response => response.text())
        .then(html => {
            navigationPage.innerHTML = html; 
        });
  
    fetch('pages/main-content.html')
        .then(response => response.text())
        .then(html => {
            mainContentPage.innerHTML = html;
        });
  
    fetch('pages/about-us.html')
        .then(response => response.text())
        .then(html => {
            aboutUsPage.innerHTML = html; 
        });
  
    fetch('pages/footer.html')
        .then(response => response.text())
        .then(html => {
            footerPage.innerHTML = html;
        });
  });