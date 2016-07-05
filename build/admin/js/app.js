(function(){
  var app = angular.module('baudeoPanel', [
		'ngRoute',
		'baudeoPanel.controllers',
		'baudeoPanel.services',
		'baudeoPanel.directives'
	]);
  app.config(['$routeProvider', function($routeProvider){
    $routeProvider
      .when('/projects', {
        templateUrl: './../views/projects.php',
        controller: 'menuNavController'
      })
      .when('/services', {
        templateUrl: './../views/services.php',
        controller: 'menuNavController'
      })
      .when('/project/:id', {
        templateUrl: './../views/project.php',
        controller: 'menuNavController'
      })
      .when('/service/:id', {
        templateUrl: './../views/service.php',
        controller: 'menuNavController'
      })
      .when('/slider-home', {
        templateUrl: './../views/sliderHome.php',
        controller: 'menuNavController'
      })
      .otherwise({
        redirectTo: '/projects'
      });
  }]);
})();
