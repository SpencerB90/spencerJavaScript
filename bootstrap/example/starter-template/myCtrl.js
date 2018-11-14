app.controller("myCtrl", function($scope, $http) {

  $http.get("table.php").then(function (response) {
    $scope.myPHPData = response.data.records;

    });
    $scope.removeItem = function (x) {
        $scope.products.splice(x, 1);
    } 
});
