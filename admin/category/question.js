var app = angular.module("testApp",  ['bsTable']);
app.controller("questionCtl", function($scope,$http) {
    $scope.Questions=[];
    $scope.check=false;
    $scope.question={};
    $scope.listAnswers=[];
    $scope.answer={};
    $scope.getQuestions=function(){
        $http.get("http://localhost/test-app/admin/controlPhp/question/getQuestions.php?method=load_questions").then(function (response) {
        $scope.Questions = response.data.records;
        $scope.bsTableQuestionControl.options.data = $scope.Questions;
        $scope.bsTableQuestionControl.options.totalRows = $scope.Questions.length; 
    });
    }
    $scope.getQuestions();  
    $scope.saveQuestion =function(){
        var request = $http({
            method: "POST",
            url: "http://localhost/test-app/admin/controlPhp/question/postQuestion.php?method=post_question",
            data: {
                question: $scope.question,
                listanswer:$scope.listAnswers
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                console.log(response);
                $scope.result1=response.data.records;
                console.log($scope.result1);
                $scope.getQuestions();
                
        });
    }
    $scope.openAnswer=function(){
        $scope.answer={};
    }
    $scope.addAnswer=function(){
        console.log($scope.answer)
        if($scope.answer.Iscorrect==true){
            $scope.answer.Iscorrect=1;
        }
        else{
            $scope.answer.Iscorrect=0;
        }
        $scope.listAnswers.push($scope.answer);
        $scope.bsTableAnswerControl.options.data = $scope.listAnswers;
        $scope.bsTableAnswerControl.options.totalRows = $scope.listAnswers.length; 
    }
    
   
    $scope.bsTableQuestionControl = {
        options: {
            data: $scope.Questions,
            idField: 'id',
            sortable: true,
            striped: true,
            search: true,
            maintainSelected: true,
            clickToSelect: true,
            showColumns: false,
            singleSelect: true,
            showToggle: true,
            pagination: true,
            pageSize: 10,
            pageList: [5, 10, 25, 50, 100],
            onCheck: function (row, $element) {
                $scope.$apply(function () {
                    $scope.check=true;
                    $scope.question=row;
                });
            },
            onUncheck: function (row, $element) {
                $scope.check=false;
               $scope.question={};
               console.log($scope.check);
            },
            columns: [{
                field: 'state',
                checkbox: true
            },
             {
                field: 'ID_Question',
                title: 'ID',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'ContentQs',
                title: 'Nội dung câu hỏi',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }]
        }
    };
    var iscorrectFormatter = function (value,) {
        if (value==1) {
            return 'Đáp án đúng';
        }
        else {
            return 'Đáp án sai';
        
        }
    };
    $scope.bsTableAnswerControl = {
        options: {
            data: $scope.listAnswers,
            idField: 'id',
            sortable: true,
            striped: true,
            search: true,
            maintainSelected: true,
            clickToSelect: true,
            showColumns: false,
            singleSelect: true,
            showToggle: true,
            pagination: true,
            pageSize: 10,
            pageList: [5, 10, 25, 50, 100],
            onCheck: function (row, $element) {
                $scope.$apply(function () {
                    $scope.check=true;
                    $scope.question=row;
                    console.log($scope.check);
                });
            },
            onUncheck: function (row, $element) {
                $scope.check=false;
               $scope.question={};
               console.log($scope.check);
            },
            columns: [{
                field: 'state',
                checkbox: true
            },
             {
                field: 'ID_Answer',
                title: 'ID',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'ContentAs',
                title: 'Nội dung đáp án',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'Iscorrect',
                title: 'Là đáp án',
                align: 'center',
                valign: 'bottom',
                sortable: true,
                formatter:iscorrectFormatter
            }]
        }
    };

});