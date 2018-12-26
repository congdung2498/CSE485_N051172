var app = angular.module("testApp",  ['bsTable']);
// var id=1;
app.controller("dashboardCtl", function($scope,$http,$timeout,$rootScope,$location,$window) {
    $scope.Config={};
    $scope.checkdone;
    $scope.getExamConfigs=function(){
        $http.get("http://localhost/CSE485_N051172/N051172/Sources/user/dashboard/controller/getExamConfigs.php?method=load_ExamConfigs").then(function (response) {
        $scope.Exam_Configs = response.data.records;
        console.log($scope.Exam_Configs);
    });
    }
    $scope.getExamConfigs();

    var absUrl = $location.absUrl();
    console.log(absUrl);

    $scope.open= function(config){
        $scope.Config=config;
    }

    $scope.createExam=function(userID,ID_ExamConfig){
        // $window.location.href="http://localhost/CSE485_N051172/N051172/Sources/user/exam/view/exam.php/"+ID_ExamConfig;
        var request = $http({
            method: "POST",
            url: "http://localhost/CSE485_N051172/N051172/Sources/user/dashboard/controller/createExam.php?method=createEx",
            data: {
                examConfigID:  ID_ExamConfig,
                userID: userID
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
            $scope.IDExam = response.data;
            $window.location.href="http://localhost/CSE485_N051172/N051172/Sources/user/exam/view/exam.php/"+$scope.IDExam;
        });
    }
    $scope.continueExam = function(examID){
        $window.location.href="http://localhost/CSE485_N051172/N051172/Sources/user/exam/view/exam.php/"+examID;
    }
    $scope.login=function(){
        $window.location.href="http://localhost/CSE485_N051172/N051172/Sources/login.php"
    }
    $scope.check=function(userID,ID_ExamConfig){   // hàm kiểm tra xem sv đã làm đề này chưa
        var request = $http({
            method: "POST",
            url: "http://localhost/CSE485_N051172/N051172/Sources/user/dashboard/controller/check.php",
            data: {
                userID:  userID,
                ID_ExamConfig: ID_ExamConfig
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                $scope.checkdone=response.data;
                $scope.checkdone=$scope.checkdone;
                console.log( $scope.checkdone)
                if($scope.checkdone==-1){
                    alert("Bạn đã làm đề thi này rồi.", "Thông Báo")
                }
                if($scope.checkdone==-2){
                    alert("Bạn không có trong danh sách thi.", "Thông Báo")
                }
                if($scope.checkdone==0){
                    $scope.createExam(userID,ID_ExamConfig); // tao de thi moi
                }
                if($scope.checkdone>0){
                    $scope.continueExam($scope.checkdone); // tiep tuc thi
                }
        });
    }
});

