<?php
// core configuration
include_once "../../../config/core.php";
include_once "../../login_checker.php";
// set page title
$page_title="Danh mục môn học";
 
// include page header HTML
include '../../layout_head.php';
?>
<div ng-app="testApp" ng-controller="subjectCtl">
    <div class="col-md-12">
    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" id="mydivheader">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> <b>Quản lý môn học</b> </h4>
                    </div>
                    <div class="modal-body">

                     <div class="panel panel-default" style="border: solid 1px #cddbd1;">
                         <div class="panel-heading text-center"> <b style="font-size:18px;"> Thông tin môn học</b>  </div>
                         <div class="panel-body">

                         <label class="col-xs-12">Tên môn học</label>
                         <input type="text" class="form-control" ng-model="subject.subjectName" />
                         </div>
                       </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" ng-click="saveSubject()" class="btn btn-primary" data-dismiss="modal">Lưu</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    <div>

    <div class="alert alert-success alert-dismissible" style="position:fixed; z-index:1000; right:10px; bottom:20px; height:100px;" ng-if="result==1">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công!</strong> Bạn đã cập nhật thành công.
    </div>

    <div class="alert alert-danger" style="position:fixed; z-index:1000; right:10px; bottom:20px; height:100px;" ng-if="result==0">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Lỗi!</strong> Có lỗi xảy ra trong quá trình cập nhật.
    </div>

        <button class="btn btn-success margin-10" style="margin:10px;"data-ng-click="createSubject()"data-toggle="modal" data-target="#myModal"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span></i> Thêm mới</button>
        <button class="btn btn-primary margin-10" style="margin:10px;"data-ng-click="editSubject()" data-ng-disabled="!check" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></span> Chỉnh sửa</button>
        <button class="btn btn-danger margin-10" style="margin:10px;"data-ng-click="confirmDeleteSubject()" data-ng-disabled="!check"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
    <table bs-table-control="bsTableSubjectControl"></table>
    <script src="../controller/subject.js"></script>


    </div>
    </div>
  
 <?php
// include page footer HTML
include_once '../../layout_foot.php';
?>