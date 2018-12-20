var app = angular.module("testApp",  ['bsTable']);
app.controller("questionCtl", function($scope,$http,$timeout) {
    $scope.Questions=[];
    $scope.check=false;
    $scope.check1=false;
    $scope.result=null;
    $scope.question={};
    $scope.listAnswers=[];
    $scope.answer={};
    $scope.getQuestions=function(){
        $http.get("http://localhost/CSE485_N051172/N051172/Sources/admin/question/controller/getQuestions.php?method=load_questions").then(function (response) {
            console.log(response);
        $scope.Questions = response.data.records;
        $scope.bsTableQuestionControl.options.data = $scope.Questions;
        $scope.bsTableQuestionControl.options.totalRows = $scope.Questions.length; 
    });
    }
    $scope.getQuestions();  
    $scope.createQuestion=function(){
        $scope.question={};
        $scope.listAnswers=[];
        $scope.answer={};
        $scope.bsTableAnswerControl.options.data = $scope.listAnswers;
        $scope.bsTableAnswerControl.options.totalRows = $scope.listAnswers.length; 
    }
    $scope.saveQuestion =function(){
        var request = $http({
            method: "POST",
            url: "http://localhost/CSE485_N051172/N051172/Sources/admin/question/controller/postQuestion.php?method=post_question",
            data: {
                question: $scope.question,
                listanswer:$scope.listAnswers
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                $scope.result=response.data;
                $scope.getQuestions();
                $scope.question={};
                $scope.listAnswers=[];
                $timeout($scope.autoHide, 5000);
                
        });
    }
    $scope.editQuestion=function(){
        $scope.getAnswerbyQsID();
    }

    $scope.autoHide= function(){
        $scope.result=null;
    }

    $scope.getAnswerbyQsID =function(){
        
            var request = $http({
                method: "POST",
                url: "http://localhost/CSE485_N051172/N051172/Sources/admin/question/controller/getAnswersbyQsID.php?method=load_answers",
                data: {
                    questionID: $scope.question.ID_Question
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });
            
            /* Check whether the HTTP Request is successful or not. */
                request.then(function (response) {
                    $scope.listAnswers = response.data.records;
                    $scope.bsTableAnswerControl.options.data = $scope.listAnswers;
                    $scope.bsTableAnswerControl.options.totalRows = $scope.listAnswers.length; 
            });
        
    
    }
    
    $scope.getSubjects=function(){
        $http.get("http://localhost/CSE485_N051172/N051172/Sources/admin/subject/controller/getSubject.php?method=load_subjects").then(function (response) {
            console.log(response);
        $scope.Subjects = response.data.records;
    });
    }
    $scope.getSubjects();
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

    $scope.confirmDeleteQuestion=function(){
        var r = confirm("Xác nhận xóa");
        if (r == true) {
           $scope.deleteQuestion();
        } else {
           
        }
    }
    $scope.deleteQuestion= function(){
        var request = $http({
            method: "POST",
            url: "http://localhost/CSE485_N051172/N051172/Sources/admin/question/controller/deleteQuestion.php?method=del_question",
            data: {
                questionID: $scope.question.ID_Question
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                $scope.result=response.data;
                $scope.getQuestions();
                $scope.question={};
                $scope.listAnswers=[];
                $timeout($scope.autoHide, 5000);
        });
    }
    $scope.deleteAnswer=function(){
        var r = confirm("Xác nhận xóa");
        if (r == true) {
            for(var i=0; i<$scope.listAnswers.length; i++){
                if($scope.listAnswers[i].ContentAs==$scope.ct){
                    $scope.listAnswers.splice(i,1);
                    $scope.bsTableAnswerControl.options.data = $scope.listAnswers;
                    $scope.bsTableAnswerControl.options.totalRows = $scope.listAnswers.length; 
                }
            }
        } else {
           
        }
    }
    $scope.getSubjects=function(){
        $http.get("http://localhost/CSE485_N051172/N051172/Sources/admin/subject/controller/getSubject.php?method=load_subjects").then(function (response) {
        $scope.Subjects = response.data.records;
    });
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
            }, {
                field: 'subjectName',
                title: 'Môn học',
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
            maintainSelected: true,
            clickToSelect: true,
            showColumns: false,
            singleSelect: true,
            showToggle: false,
            pagination: true,
            pageSize: 10,
            pageList: [5, 10, 25, 50, 100],
            onCheck: function (row, $element) {
                $scope.$apply(function () {
                    $scope.ct=row.ContentAs;
                    $scope.check1=true;
                });
            },
            onUncheck: function (row, $element) {
                $scope.check1=false;
               $scope.ct=null;
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