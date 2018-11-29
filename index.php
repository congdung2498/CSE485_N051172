<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<body>
<div ng-app="myApp" ng-controller="newsCtrl"> 
<table border="2">
  <tr ng-repeat="x in names">
    <td>{{ x.title }}</td>
    <td>{{ x.details }}</td>
    <td>{{ x.hits }}</td>
  </tr>
</table>

<div id="container">
            <div id="login">
                <input type="text" size="40" ng-model="email"><br>
                <input type="password" size="40" ng-model="password"><br>
                <button ng-click="check_credentials()">Login</button><br>
                <span id="message"></span>
            </div>
</div>

</div>
<script>
    var app = angular.module('myApp', []);
    app.controller('newsCtrl', function($scope, $http) {
        $http.get("http://localhost:81/news/wsdl.php?method=load_news")
        .then(function (response) {$scope.names = response.data.records;});

     $scope.check_credentials = function () {

    document.getElementById("message").textContent = "";

    var request = $http({
    method: "post",
    url: window.location.href + "login.php",
    data: {
        email: $scope.email,
        pass: $scope.password
    },
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    });

/* Check whether the HTTP Request is successful or not. */
    request.then(function (data) {
        console.log(data);
    document.getElementById("message").textContent = "You have login successfully with email "+data.data;
});
}
    });
    </script>
</body>
</html>