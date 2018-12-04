<?php
// core configuration
include_once "../../config/core.php";
 
// set page title
$page_title="Danh mục câu hỏi";
 
// include page header HTML
include '../layout_head.php';
?>
    <div ng-app="testApp" ng-controller="questionCtl">
    <div class="col-md-12">
    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" id="mydivheader">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Quản lý tài khoản</h4>
                    </div>
                    <div class="modal-body">

                    <div class="row">
			        	<div class="col-xs-6">
					        <label class="bold">Họ</label>
				    	    <input type="text" readonly class="form-control" ng-model="user.firstname" />
			    	    </div>
                            <div class="col-xs-6">
                            <label class="bold">Tên</label>
				    	<input type="text" readonly class="form-control" ng-model="user.lastname" />
				        </div>
                    </div>
                    
                    <div class="row">
			        	<div class="col-xs-6">
					        <label class="bold">Email</label>
				    	    <input type="text" readonly class="form-control" ng-model="user.email" />
			    	    </div>
                            <div class="col-xs-6">
                            <label class="bold">Số điện thoại</label>
				    	<input type="text" readonly class="form-control" ng-model="user.contact_number" />
				        </div>
                    </div>

                    <div class="row">
			        	<div class="col-xs-12">
					        <label class="bold">Địa chỉ</label>
				    	    <input type="text" readonly class="form-control" ng-model="user.address" />
			    	    </div>
                    </div>

                     <div class="row">
			        	<div class="col-xs-12">
					        <label class="bold">Phân quyền</label>
				    	    <select class="form-control" ng-model="user.access_level">
                                <option value='Admin'>Admin</option>
                                <option value='Customer'>Customer</option>
                            </select>
			    	    </div>
                    </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" ng-click="saveUser()" class="btn btn-primary" data-dismiss="modal">Lưu</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <button class="btn btn-primary margin-10" style="margin:10px;"data-ng-click="editUser()" data-ng-disabled="!check" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i>Sửa</button>
    <div>

    <div class="alert alert-success alert-dismissible" ng-if="result==1">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công!</strong> Bạn đã cập nhật thành công.
    </div>

    <div class="alert alert-danger" ng-if="result==0">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Lỗi!</strong> Có lỗi xảy ra trong quá trình cập nhật.
    </div>

    <table bs-table-control="bsTableQuestionControl"></table>
    </div>
    
    </div>
  
 <?php
// include page footer HTML
include_once '../layout_foot.php';
?>