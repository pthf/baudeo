(function(){
  angular.module('baudeoPanel.controllers', [])
  .controller('menuNavController', ['$scope', '$routeParams', '$location', function($scope, $routeParams, $location){
		$scope.routeParams = $location.path();
		switch ($scope.routeParams) {
			case '/projects': $scope.selected = 1;  break;
      case '/project': $scope.selected = 1;  break;
      case '/services': $scope.selected = 2;  break;
      case '/service': $scope.selected = 2;  break;
      case '/slider-home': $scope.selected = 3;  break;
		}
		$scope.changeNav = function(item){
			$scope.selected = item;
		};
	}])
  .controller('projectNavController', ['$scope', function($scope){
		$scope.item = 1;
		$scope.selectItem = function(item){
			$scope.item = item;
		};
  }])
  .controller('projectListController', ['$scope', 'baudeoService', function($scope, baudeoService){
    $scope.projectList = [];
    baudeoService.getProjectList().then(function(data){
      $scope.projectList = data;
    });
  }])
  .controller('projectDescription', ['$scope', '$routeParams', 'baudeoService', function($scope, $routeParams, baudeoService){
    $scope.projectElement = [];
    $scope.projectCategory = [];
    $scope.id = parseInt($routeParams.id);
    baudeoService.getProjectById($scope.id).then(function(data){
      $scope.projectElement = data;
    });
    baudeoService.getCategory($scope.id).then(function(data){
      $scope.projectCategory = data;
    });
  }])
  .controller('sliderHome', ['$scope', '$routeParams', 'baudeoService', function($scope, $routeParams, baudeoService){
    $scope.sliderElements = [];
    baudeoService.getSliderHome().then(function(data){
      $scope.sliderElements = data;
    });
  }])
  .controller('serviceListController', ['$scope', 'baudeoService', function($scope, baudeoService){
    $scope.serviceList = [];
    baudeoService.getServicesList().then(function(data){
      $scope.serviceList = data;
    });
  }])
  .controller('serviceDescription', ['$scope', '$routeParams', 'baudeoService', function($scope, $routeParams, baudeoService){
    $scope.serviceElement = [];
    $scope.id = parseInt($routeParams.id);
    baudeoService.getServiceById($scope.id).then(function(data){
      $scope.serviceElement = data;
    });
  }])
})();
