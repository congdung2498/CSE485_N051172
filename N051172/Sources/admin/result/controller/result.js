var app = angular.module("testApp",  ['bsTable']);
app.controller("resultCtl", function($scope,$http) {
    $scope.Results=[];
    $scope.check=false;
    $scope.result=null;
    $scope.result={};

    $scope.getResults=function(){
        $http.get("http://localhost:81/test-app/admin/result/controller/getResult.php?method=load_Results").then(function (response) {
            console.log(response);
        $scope.Results = response.data.records;
        $scope.bsTableResultControl.options.data = $scope.Results;
        $scope.bsTableResultControl.options.totalRows = $scope.Results.length; 
    });
    }
    $scope.getResults();  
    
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
                title: 'ID kết quả',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'firstname',
                title: 'Tên người dùng',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }
            , {
                field: 'Name',
                title: 'Tên bài kiểm tra',
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