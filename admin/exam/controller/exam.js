var app = angular.module("testApp",  ['bsTable']);
app.controller("examCtl", function($scope,$http,$timeout) {
    $scope.Exams=[];
    $scope.check=false;
    $scope.result=null;
    $scope.exam={};

    $scope.getExams=function(){
        $http.get("http://localhost/test-app/admin/exam/controller/getExam.php?method=load_Exams").then(function (response) {
            console.log(response);
        $scope.Exams = response.data.records;
        $scope.bsTableExamControl.options.data = $scope.Exams;
        $scope.bsTableExamControl.options.totalRows = $scope.Exams.length; 
    });
    }
    $scope.getExams();  
    $scope.createExam= function(){
        $scope.exam={};
    }
    $scope.saveExam=function(){
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
                $timeout($scope.autoHide, 5000);
                
        });
    }
    $scope.confirmDeleteExam=function(){
        var r = confirm("Xác nhận xóa");
        if (r == true) {
           $scope.deleteExam();
        } else {
           
        }
    }
    $scope.deleteExam= function(){
        var request = $http({
            method: "POST",
            url: "http://localhost/test-app/admin/exam/controller/deleteExam.php?method=del_exam",
            data: {
                examID: $scope.exam.ID_Exam
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                $scope.result=response.data;
                $scope.getExams();
                $scope.exam={};
                $timeout($scope.autoHide, 5000);
        });
    }
    $scope.autoHide= function(){
        $scope.result=null;
    }
    $scope.bsTableExamControl = {
        options: {
            data: $scope.Exams,
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
                    $scope.exam=row;
                });
            },
            onUncheck: function (row, $element) {
                $scope.check=false;
               $scope.exam={};
            },
            columns: [{
                field: 'state',
                checkbox: true
            },
             {
                field: 'ID_Exam',
                title: 'ID đề thi',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'Name',
                title: 'Tên đề thi',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            ,{
                field: 'Num_Question',
                title: 'Số lượng câu hỏi',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            ,{
                field: 'Totaltime',
                title: 'Thời gian làm bài',
                align: 'center',
                valign: 'bottom',
                sortable: true
            },{
                field: 'ID_Subject',
                title: 'Môn học',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            
        ]
        }
    };
    
});