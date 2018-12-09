var app = angular.module("testApp",  ['bsTable']);
app.controller("resultCtl", function($scope) {
    /*$scope.Result=[];
    $scope.check=false;
    $scope.check1=false;
    $scope.result=null;
    $scope.result={};

    $scope.getResult=function(){
        $http.get("http://localhost/test-app/admin/result/controller/getResult.php?method=load_result").then(function (response) {
            console.log(response);
        $scope.Result = response.data.records;
        $scope.bsTableResultControl.options.data = $scope.Result;
        $scope.bsTableResultControl.options.totalRows = $scope.Result.length; 
    });
    }
    $scope.getResult();  */
    $scope.bsTableResultControl = {
        options: {
            data: $scope.Result,
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
                    $scope.result=row;
                });
            },
            onUncheck: function (row, $element) {
                $scope.check=false;
               $scope.result={};
               console.log($scope.check);
            },
            columns: [{
                field: 'state',
                checkbox: true
            },
             {
                field: 'ID_Result',
                title: 'ID Result',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'ID_User',
                title: 'ID User',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            , {
                field: 'ID_Exam',
                title: 'ID Exam',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            ,
            {
                field: 'Score',
                title: 'Điểm số',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
        ]
        }
    };
    
});