
<?php
// core configuration
include_once "../../../config/core.php";
$require_login=true;
include_once "../../../login_checker.php";
// set page title
$page_title="Thông tin tài khoản";
 
// include page header HTML
include '../../../layout_head.php';
?>
<div ng-app="testApp" ng-controller="infoCtl" style= "padding-left:50px; padding-right:50px; height:1000px" >
                    <div class="row">
			        	<div class="col-xs-6">
					        <label class="bold">Họ</label>
				    	    <input type="text"  class="form-control" ng-model="user.firstname" />
			    	    </div>
                            <div class="col-xs-6">
                            <label class="bold">Tên</label>
				    	<input type="text"  class="form-control" ng-model="user.lastname" />
				        </div>
                    </div>
                    
                    <div class="row">
			        	<div class="col-xs-6">
					        <label class="bold">Email</label>
				    	    <input type="email"  class="form-control" ng-model="user.email" />
			    	    </div>
                            <div class="col-xs-6">
                            <label class="bold">Số điện thoại</label>
				    	<input type="text" class="form-control" ng-model="user.contact_number" />
				        </div>
                    </div>

                    <div class="row">
			        	<div class="col-xs-12">
					        <label class="bold">Địa chỉ</label>
				    	    <input type="text"  class="form-control" ng-model="user.address" />
			    	    </div>
                    </div>

                    <div class="row">
			        	<div class="col-xs-12">
					        <label class="bold">Quyền</label>
				    	    <input type="text"  readonly class="form-control" ng-model="user.access_level" />
				        </div>
                    </div>
                   
        
        <button class="btn btn-success margin-10" style="margin:10px;"data-ng-click="save()"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span></i> Lưu</button>
        <h3>Đổi mật khẩu</h3>
        <div class="row">
			<div class="col-xs-6">
				<label  class="bold">Mật khẩu cũ</label>
				<input  type="password" style="float:left" class="form-control" ng-model="password" /><div  style="color:red" id="infoPassword"></div>
			</div>
         </div>
         <div class="row">
			<div class="col-xs-6">
				<label class="bold">Mật khẩu mới</label>
				<input type="password"  class="form-control" ng-model="Newpassword" /> <div style="color:red" id="infoNewPassword"></div>
			</div>
         </div>
         <div class="row">
			<div class="col-xs-6">
				<label class="bold">Nhập lại</label>
				<input type="password"  class="form-control" ng-model="Repassword" /> <div style="color:red" id="infoRePassword"></div>
			</div>
         </div>
		 <button class="btn btn-success margin-10" style="margin:10px;" data-ng-click="changePass()"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span></i> Thay đổi</button>


    <div class="alert alert-success alert-dismissible" style="position:fixed; z-index:1000; right:10px; bottom:10px; height:100px;" ng-if="result==1">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công!</strong> Bạn đã cập nhật thành công.
    </div>

    <div class="alert alert-danger" style="position:fixed; z-index:1000; right:10px; bottom:10px; height:100px;" ng-if="result==0">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Lỗi!</strong> Có Lỗi xảy ra trong quá trình cập nhật.
    </div>

    
    <script src="../controller/info.js"></script>
    </div>
  
</div>
