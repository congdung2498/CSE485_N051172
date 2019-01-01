var app = angular.module("testApp",  ['bsTable']);

app.controller("infoCtl", function($scope,$http,$timeout,$location,$window) {
    
    $scope.user={}; 
    $scope.result=null;
    $scope.password=null;
    $scope.Newpassword=null;
    $scope.Repassword=null;
    $scope.IDUser=null;
    $scope.getIDUser=function(){
        $http.get("http://localhost/CSE485_N051172/N051172/Sources/user/exam/controller/getIDUser.php?method=load_IDUser").then(function (response) {
        $scope.IDUser = response.data;
        $scope.getInfo($scope.IDUser);
    });
    }
    $scope.getIDUser();
    $scope.getInfo= function(IDUser){
            var request = $http({
                method: "POST",
                url: "http://localhost/CSE485_N051172/N051172/Sources/user/info/controller/getInfo.php?method=load_Info",
                data: {
                    userID: IDUser
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });
            
            /* Check whether the HTTP Request is successful or not. */
                request.then(function (response) {
                        $scope.user=response.data.record[0];
            });
    }
    $scope.save=function(){
        var request = $http({
            method: "POST",
            url: "http://localhost/CSE485_N051172/N051172/Sources/user/info/controller/saveInfo.php?method=save",
            data: {
                user: $scope.user
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                $scope.result=response.data;
                $scope.getIDUser();
                $timeout($scope.autoHide, 5000);
                
        });
    }
    $scope.autoHide= function(){
        $scope.result=null;
    }

    $scope.changePass = function(){
        if($scope.password==null || $scope.password.trim()=='') 
        {
            $("#infoPassword").html("Vui lòng nhập mật khẩu cũ");
        }
        else if($scope.Newpassword==null || $scope.Newpassword.trim()=='') 
        {
            $("#infoPassword").html("");
            $("#infoNewPassword").html("Vui lòng nhập mật khẩu mới");
        }
        
        else if($scope.Repassword==null || $scope.Repassword != $scope.Newpassword) 
        {
            $("#infoPassword").html("");
            $("#infoNewPassword").html("");
            $("#infoRePassword").html("Mật khẩu mới không khớp");
        }
        else{
            $("#infoPassword").html("");
            $("#infoNewPassword").html("");
            $("#infoRePassword").html("");
            
            var request = $http({
                method: "POST",
                url: "http://localhost/CSE485_N051172/N051172/Sources/user/info/controller/checkPass.php?method=checkPass",
                data: {
                    idUser : $scope.IDUser,
                    password: $scope.password
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
                });
            
            /* Check whether the HTTP Request is successful or not. */
                request.then(function (response) {
                    $scope.check=response.data;
                    if($scope.check==0){
                    $("#infoPassword").html("Mật khẩu cũ không chính xác");
                    }
                    else{
                        $("#infoPassword").html("");
                        $scope.updatePassword($scope.Newpassword);
                            
                        }
            });

            
        }  
    }
    $scope.updatePassword=function(Newpass){
        var request = $http({
            method: "POST",
            url: "http://localhost/CSE485_N051172/N051172/Sources/user/info/controller/updatePass.php?method=updatePass",
            data: {
                idUser : $scope.IDUser,
                password: Newpass
            },
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            });
        
        /* Check whether the HTTP Request is successful or not. */
            request.then(function (response) {
                    $scope.result=response.data;
                    $timeout($scope.autoHide, 5000);
                     
        });
    }
  
});