var app = angular.module("testApp",  ['bsTable']);
app.controller("subjectCtl", function($scope,$http,$timeout) {
    $scope.Subjects=[];
    $scope.check=false;
    $scope.result=null;
    $scope.subject={};

    $scope.getSubjects=function(){
        $http.get("http://localhost/CSE485_N051172/N051172/Sources/admin/subject/controller/getSubject.php?method=load_subjects").then(function (response) {
            console.log(response);
        $scope.Subjects = response.data.records;
        $scope.bsTableSubjectControl.options.data = $scope.Subjects;
        $scope.bsTableSubjectControl.options.totalRows = $scope.Subjects.length; 
    });
    }
    $scope.getSubjects();  
    $scope.createSubject= function(){
        $scope.subject={};
    }
    $scope.saveSubject=function(){
        var request = $http({
            method: "POST",
            url: "http://localhost/CSE485_N051172/N051172/Sources/admin/subject/controller/postSubject.php?method=post_question",
            data: {
                subject: $scope.subject
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                $scope.result=response.data;
                $scope.getSubjects();
                $scope.subject={};
                $timeout($scope.autoHide, 5000);
                
        });
    }
    $scope.confirmDeleteSubject=function(){
        var r = confirm("Xác nhận xóa");
        if (r == true) {
           $scope.deleteSubject();
        } else {
           
        }
    }
    $scope.deleteSubject= function(){
        var request = $http({
            method: "POST",
            url: "http://localhost/CSE485_N051172/N051172/Sources/admin/subject/controller/deleteSubject.php?method=del_subject",
            data: {
                subjectID: $scope.subject.ID_Subject
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                $scope.result=response.data;
                $scope.getSubjects();
                $scope.subject={};
                $timeout($scope.autoHide, 5000);
        });
    }
    $scope.autoHide= function(){
        $scope.result=null;
    }
    $scope.bsTableSubjectControl = {
        options: {
            data: $scope.Subjects,
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
                    $scope.subject=row;
                });
            },
            onUncheck: function (row, $element) {
                $scope.check=false;
               $scope.subject={};
            },
            columns: [{
                field: 'state',
                checkbox: true
            },
             {
                field: 'ID_Subject',
                title: 'ID Môn học',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'subjectName',
                title: 'Tên môn học',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            ,
        ]
        }
    };
    
});