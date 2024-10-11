angular.module('myApp')
    .component('galleryPage', {
        templateUrl: 'gallery.html',
        controller: 'GalleryController'
    })
    .controller('GalleryController', function($scope) {
        $scope.showImage = false; // Initially hide the second image
      
        $scope.toggleImage = function() {
          $scope.showImage = !$scope.showImage; // Toggle the boolean value
        };

        $scope.galleryImages = [
            { id: '1', img: 'banner.jpg' },
            { id: '2', img: 'gallery-banner.png' },
            { id: '3', img: 'banner' },
            { id: '4', img: 'banner' },
            { id: '5', img: 'banner' },
        ];

        $scope.showPopup = false;  
        $scope.selectedImage = '';
        $scope.selectedExtension = '';

        $scope.galleryPopup = function(img) {
            $scope.selectedImage = img;
            $scope.showPopup = true;
        };

        $scope.closePopup = function() {
            $scope.showPopup = false;
        };

        $scope.displayPopup = function(ngDialog) {        
            ngDialog.open({
              template: 'gallery-popup.html',
              controller: 'GalleryController',
              className: 'ngdialog-theme-default ngdialog-gallery-popup',
              showClose: true,
              closeByEscape: true,
              preCloseCallback: function () {
                window.scrollTo(0, 0);
              }
            });
          };
    });