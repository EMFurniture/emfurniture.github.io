angular.module('myApp', [])
  .directive('navigationPage', function() {
    return {
      restrict: 'E', // 'E' for element
      templateUrl: 'navigation/navigation.html',
      controller: 'NavigationController'
    };
  })
  .controller('MainController', function($scope, $sce) {
    $scope.content = ''; // Initial content

    // Function to update content based on navigation click
    $scope.updateContent = function(linkText) {
      if (linkText === 'Home') {
        fetch('pages/main-content.html')
          .then(response => response.text())
          .then(html => {
            $scope.content = $sce.trustAsHtml(html); // Use $sce to safely bind HTML
          });
      } else if (linkText === 'About Us') {
        // Assuming you have a separate about-us.html file
        fetch('pages/about-us.html')
          .then(response => response.text())
          .then(html => {
            $scope.content = $sce.trustAsHtml(html);
          });
      } else {
        console.warn('Content update for link:', linkText, 'not implemented yet.');
      }
    };
  })
  .directive('floatingNotice', function() {
    return {
      restrict: 'E',
      templateUrl: 'notice.html',
      link: function(scope, element) {
        // Close the notice when the button is clicked
        element.find('.close-notice').on('click', function() {
          element.remove(); // Remove the notice from the DOM
        });
      }
    };
  });