var app = angular.module("testApp",  ['bsTable']);
app.controller("dashboardCtl", function($scope,$http,$timeout) {
    $scope.getExams=function(){
        $http.get("http://localhost/test-app/user/dashboard/controller/getExam.php?method=load_Exams").then(function (response) {
        $scope.Exams = response.data.records;
        console.log($scope.Exams);
    });
    }
    $scope.getExams();
});