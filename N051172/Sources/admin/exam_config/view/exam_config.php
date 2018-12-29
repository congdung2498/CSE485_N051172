<?php
// core configuration
include_once "../../../config/core.php";
include_once "../../login_checker.php";
// set page title
$page_title="Cấu hình đề thi";
 
// include page header HTML
include '../../layout_head.php';
?>
<div ng-app="testApp" ng-controller="examCtl">
    <div class="col-md-12">
    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" id="mydivheader">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> <b>Cấu hình đề thi</b> </h4>
                    </div>
                    <div class="modal-body">

                     <div class="panel panel-default" style="border: solid 1px #cddbd1;">
                         <div class="panel-heading text-center"> <b style="font-size:18px;"> Thông tin đề thi</b>  </div>
                         <div class="panel-body">

                         <div class="col-xs-12">
                             <label class="bold" > Môn học </label>
                             <select class="form-control" data-ng-model="exam.subject"  ng-options="sj.subjectName for sj in Subjects"></select>
                         </div>

                             <div class="col-xs-12">
                                    <label class="bold">Tên đề thi</label>
                                    <input type="text" class="form-control" ng-model="exam.Name" />        
                             </div>
                         
                        <div class="col-xs-6">
                            <label class="bold">Số lượng câu hỏi</label>
                            <input type="number" class="form-control" ng-model="exam.Num_Question"  />
                        </div>

                        <div class="col-xs-6" >
                            <label class="bold">Thời gian làm bài</label>
                            <input type="number" class="form-control" ng-model="exam.Totaltime" />
                        </div>
                        
                     </div>
                     <div class="panel panel-default" style="border: solid 1px #cddbd1;">
                         <div class="panel-heading text-center"> <b style="font-size:18px;"> Thêm thí sinh </b>  </div>
                            <div class="panel-body">
                                 <div class="col-md-12" style="margin-bottom:10px;">
                                     <a class="btn btn-success" ng-click="openUser()" data-toggle="modal" data-target="#myUser"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span> Thêm thí sinh </a>
                                     <a class="btn btn-danger" ng-click="deleteUser()" data-ng-disabled="!check2" > <span class="glyphicon glyphicon-trash"></span> Xóa </a>
                                </div>
                                <table bs-table-control="bsTableSelectedUserControl"></table>
                             </div>
                       </div>
                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" ng-click="saveExam()" class="btn btn-primary" data-dismiss="modal">Lưu</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    <div>

    <!-- modal-user -->
    <div id="myUser" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" id="mydivheader">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Thí Sinh</h4>
                    </div>
                    <div class="modal-body">
                            <table bs-table-control="bsTableUserControl"></table>                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" ng-click="addUser()" class="btn btn-primary" data-dismiss="modal">Ok</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    <div class="alert alert-success alert-dismissible" style="position:fixed; z-index:1000; right:10px; bottom:20px; height:100px;" ng-if="result==1 ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công!</strong> Bạn đã cập nhật thành công.
    </div>

    <div class="alert alert-danger" style="position:fixed; z-index:1000; right:10px; bottom:20px; height:100px;" ng-if="result==0">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Lỗi!</strong> Có lỗi xảy ra trong quá trình cập nhật.
    </div>

        <button class="btn btn-success margin-10" style="margin:10px;"data-ng-click="createExam()"data-toggle="modal" data-target="#myModal"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span></i> Thêm mới</button>
        <button class="btn btn-primary margin-10" style="margin:10px;"data-ng-click="editExam()" data-ng-disabled="!check" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></span> Chỉnh sửa</button>
        <button class="btn btn-danger margin-10" style="margin:10px;"data-ng-click="confirmDeleteExam()" data-ng-disabled="!check"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
    <table bs-table-control="bsTableExamControl"></table>
    <script src="../controller/exam_config.js"></script>


    </div>
    </div>
  
 <?php
// include page footer HTML
include_once '../../layout_foot.php';
?>