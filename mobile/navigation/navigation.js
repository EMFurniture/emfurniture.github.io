angular.module('myApp')
    .component('navigationPage', {
        templateUrl: 'navigation.html',
        controller: 'NavigationController'
    })
    .controller('NavigationController', function($scope, $location, $window) {
        $scope.pageRoutes = [
            { id: '1', name: 'Home', url: 'pages/main-content.html' },
            { id: '2', name: 'About Us', url: 'pages/about-us.html'},
            { id: '3', name: 'Gallery', url: 'pages/gallery.html' },
            { id: '4', name: 'Contact Us', url: 'pages/contact-us.html' },
        ];

        $scope.navIcons = [
            { id: '1', name: 'Shop', img: 'shop' },
            { id: '2', name: 'Heart', img: 'heart'},
            { id: '3', name: 'Cart', img: 'cart'},
            { id: '4', name: 'Account', img: 'account'},
            { id: '5', name: 'Sandwich', img: 'sandwich'}
        ];

        $scope.refreshPage = function() {
            $window.location.reload();
        };

        console.log($scope.pageRoutes); // Add this line for debugging

        $scope.defaultPage = 'pages/main-content.html';
        $scope.activeTab = $scope.defaultPage;
        $scope.currentPage = {};

        $scope.setTab = function (url) {
            console.log(url); // Add this line for debugging
            $location.path(url);
            $scope.activeTab = url;
            $scope.currentPage = $scope.pageRoutes.find(function(page) {
                return page.url === url;
            });
        };

        $scope.currentPage = $scope.pageRoutes.find(function(page) {
            return page.url === $scope.defaultPage;
        });
    });