app.controller("myCtrl", function($scope, $http) {
  $scope.firstName = "Spencer";
  $scope.lastName = "Chaos";

  $http.get("json_sample.html").then(function (response) {
    $scope.myData = response.data.records;

  });

  $http.get("table.php").then(function (response) {
    $scope.myDatas = response.data.records;

    });
});
