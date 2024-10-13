<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EM Furniture | Web</title>
  <link rel="stylesheet" href="/master.css">
  <link rel="stylesheet" href="/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="../node_modules/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="../node_modules/slick-carousel/slick/slick-theme.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script> 
</head>
<body>
<?php require_once 'functions.php'; ?>
<h1>Test</h1>
  <div ng-controller="MainController">
    <div class="topNavigation" ng-include="'pages/topNavigation.html'"></div>
    <div class="navigation" ng-include="'pages/navigation.html'"></div>
    <div class="footer" ng-include="'pages/footer.html'"></div> 
  </div>

  <script src="/node_modules/ng-dialog/js/ngDialog.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-route.min.js"></script>
  <script src="/node_modules/jquery/jquery.js"></script> 
  <script src="/node_modules/angular/angular.js"></script> 
  <script src="/node_modules/slick-carousel/slick/slick.js"></script> 
  <script src="/node_modules/angular-slick-carousel/dist/angular-slick.min.js"></script> 
  <script src="index.js"></script>
  <script src="pages/navigation.js"></script>
</body>
</html>