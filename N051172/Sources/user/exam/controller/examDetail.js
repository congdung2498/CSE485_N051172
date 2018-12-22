var app = angular.module("testApp",  ['bsTable']);

app.controller("ExamDetailCtl", function($scope,$http,$timeout,$location) {
    
    var time;
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
                        $('.message').html('The clock has stopped!');
                    }
                }
            });

        });
    }
   
    
});