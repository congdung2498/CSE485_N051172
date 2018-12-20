var app = angular.module("testApp",  ['bsTable']);
// var id=1;
app.controller("dashboardCtl", function($scope,$http,$timeout,$rootScope,$location) {
    $scope.getExamConfigs=function(){
        $http.get("http://localhost/CSE485_N051172/N051172/Sources/user/dashboard/controller/getExamConfigs.php?method=load_ExamConfigs").then(function (response) {
        $scope.Exam_Configs = response.data.records;
        console.log($scope.Exam_Configs);
    });
    }
    $scope.getExamConfigs();

    var absUrl = $location.absUrl();
    console.log(absUrl);
});

