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

        $scope.testArray = [
            { name: 'Test1', img: '', id: '1' },
            { name: 'Test2', img: '', id: '2' },
            { name: 'Test3', img: '', id: '3' },
            { name: 'Test4', img: '', id: '4' },
        ];

        $scope.refreshPage = function() {
            $window.location.reload();
        };

        $scope.defaultPage = 'pages/main-content.html';
        $scope.activeTab = $scope.defaultPage;
        $scope.currentPage = {};

        $scope.setTab = function (url) {
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