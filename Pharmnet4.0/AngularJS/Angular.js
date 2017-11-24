var App = angular.module('sortApp', []);

App.controller('mainController', function($scope, $http) {
  $scope.sortType     = 'ObectName'; // set the default sort type
  $scope.sortReverse  = true;  // set the default sort order
  $scope.searchFish   = '';     // set the default search/filter term

  $http.get('fish.json')
       .then(function(res){
          $scope.sushi = res.data;
        });
});
