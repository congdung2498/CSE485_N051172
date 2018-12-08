var app = angular.module("testApp",  ['bsTable']);
app.controller("userCtrl", function($scope,$http) {
    $scope.hello="hêllo";
    $scope.Users=[];
    $scope.check=false;
    $scope.result=null;
    $scope.edit=function(x){
        alert("Row index is: " +x);
    }
    
    $scope.getUsers=function(){
        $http.get("http://localhost/test-app/admin/user/controller/getUsers.php?method=load_users").then(function (response) {
        $scope.Users = response.data.records;
        $scope.bsTableControl.options.data =  $scope.Users;
        $scope.bsTableControl.options.totalRows = $scope.Users.length; 
        console.log($scope.Users);
    });
    }
    $scope.getUsers();  
    $scope.editUser=function(){
    }
    $scope.saveUser =function(){
        var request = $http({
            method: "PUT",
            url: "http://localhost/test-app/admin/user/controller/updateUser.php?method=put_User",
            data: {
                user: $scope.user,
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                $scope.getUsers();
                $scope.result=response.data;
        });
    }
    var isstatusFormatter = function (value,) {
        if (value==1) {
            return 'Đang hoạt động';
        }
        else {
            return 'Chưa hoạt động';
        
        }
    };
    $scope.bsTableControl = {
        options: {
            data: $scope.Users,
            idField: 'id',
            sortable: true,
            striped: true,
            search:true,
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
                    $scope.check=true;
                    $scope.user=row;
                    console.log($scope.check);
                });
            },
            onUncheck: function (row, $element) {
                $scope.check=false;
               $scope.user={};
               console.log($scope.check);
            },
            columns: [{
                field: 'state',
                checkbox: true
            },
             {
                field: 'firstname',
                title: 'Họ',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'lastname',
                title: 'Tên',
                align: 'center',
                valign: 'bottom',
                sortable: true
            }, {
                field: 'email',
                title: 'Email',
                align: 'center',
                valign: 'middle',
                sortable: true
            }, {
                field: 'address',
                title: 'Địa chỉ',
                align: 'center',
                valign: 'middle'
            }, {
                field: 'contact_number',
                title: 'Số điện thoại',
                align: 'center',
                valign: 'middle'
            },{
                field: 'access_level',
                title: 'Phân quyền',
                align: 'center',
                valign: 'middle'
            }
            ,{
                field: 'status',
                title: 'Trạng thái',
                align: 'center',
                valign: 'middle',
                sortable: true,
                formatter:isstatusFormatter
            }]
        }
    };

});