var app = angular.module("testApp",  ['bsTable']);

app.controller("ExamDetailCtl", function($scope,$http,$timeout,$location) {
    
    $scope.getExams=function(){
        $http.get("http://localhost/test-app/user/exam/controller/getExam.php?method=load_Exams").then(function (response) {
        $scope.Exams = response.data.records;
        console.log($scope.Exams);
    });
    }
    $scope.getExams();
    // $scope.session = {id: $stateParams.ID_Exam || null};
    // alert($scope.session);
    var absUrl = $location.absUrl();
    var a=absUrl.lastIndexOf("/");
    var s="";
    for(var i=a+1; i < absUrl.length; i++ ){
        s=s+""+absUrl[i];
    }
    $scope.ID= parseInt(s);
    $scope.RandomQS= function(){
            var request = $http({
                method: "POST",
                url: "http://localhost/test-app/admin/exam/controller/postExam.php?method=post_question",
                data: {
                    exam: $scope.exam
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });
            
            /* Check whether the HTTP Request is successful or not. */
                request.then(function (response) {
                    $scope.result=response.data;
                    $scope.getExams();
                    $scope.exam={};
                    $scope.exam.user=[];
                    $timeout($scope.autoHide, 5000);
                    
            });
    }
});