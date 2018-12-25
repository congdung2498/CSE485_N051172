var app = angular.module("testApp",  ['bsTable']);

app.controller("ExamDetailCtl", function($scope,$http,$timeout,$location,$window) {
    
    var time;
    $scope.Questions=[];
    $scope.SubmitList=[];
    $scope.Isfinish=false;
    var absUrl = $location.absUrl();
    var a=absUrl.lastIndexOf("/");
    var s="";
    for(var i=a+1; i < absUrl.length; i++ ){
        s=s+""+absUrl[i];
    }
    $scope.examID= parseInt(s);
    console.log($scope.examID);
    $scope.getQuestions= function(){
            var request = $http({
                method: "POST",
                url: "http://localhost/CSE485_N051172/N051172/Sources/user/exam/controller/getQuestions.php?method=load_Ques",
                data: {
                    examID:  $scope.examID
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });
            
            /* Check whether the HTTP Request is successful or not. */
                request.then(function (response) {
                    $scope.Questions=response.data.records;
                    for(var i=0; i<$scope.Questions.length; i++){
                        $scope.Questions[i].index=i+1;
                    }
                    $scope.config=response.data.config[0];
                    $scope.timeclock($scope.config.Totaltime*60);

            });
    }
    $scope.getQuestions();
    $scope.timeclock=function(time){
        var clock;
        $(document).ready(function() {
            console.log(time);
            clock = $('.clock').FlipClock(time, {
                clockFace: 'MinuteCounter',
                countdown: true,
                callbacks: {
                    stop: function() {
                        $scope.Submit ($scope.Questions);
                    }
                }
            });

        });
    }

    $scope.checkoptions = function (question) {
        // var details = [];
        // angular.forEach(choice, function (value, key) {
        // if (choice[key].checked) {
        // details.push(choice[key].userid);
        // }
        // });
        // console.log(details);
    $scope.numberAnswer=0;
        for(var i=0 ; i<question.length;i++){
            var check=false;
            for(var j=0; j<question[i].ListAnswer.length; j++){
                if(question[i].ListAnswer[j].checked!=null && question[i].ListAnswer[j].checked==true){
                    check=true;
                }
            }
            if(check==true) $scope.numberAnswer=$scope.numberAnswer+1;
        }
        console.log($scope.numberAnswer);

        };

        $scope.Submit = function (question) {

            for(var i=0 ; i<question.length;i++){
                for(var j=0; j<question[i].ListAnswer.length; j++){
                    if(question[i].ListAnswer[j].checked!=null && question[i].ListAnswer[j].checked==true){
                        $scope.SubmitList.push(question[i].ListAnswer[j]);
                    }
                }
            }

            var request = $http({
                method: "POST",
                url: "http://localhost/CSE485_N051172/N051172/Sources/user/exam/controller/submit.php?method=submit",
                data: {
                    ListAnswer:  $scope.SubmitList,
                    examID:  $scope.examID

                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });
            
            /* Check whether the HTTP Request is successful or not. */
                request.then(function (response) {
                    $scope.checkFinish=response.data.check;
                    if($scope.checkFinish ==0){
                        alert("Bạn đã làm xong bài thi. Hệ thống sẽ quay lại trang chủ.");
                        $window.location.href="http://localhost/CSE485_N051172/N051172/Sources"
                    }
                    if(response.data.numberCorrect!=null && response.data.score !=null){
                        $scope.NumberCorecct=response.data.numberCorrect;
                        $scope.Score=response.data.score;
                        $scope.Isfinish=true;
                        $scope.timeclock(0);
                    }
                   
            });
            };
   
    
});