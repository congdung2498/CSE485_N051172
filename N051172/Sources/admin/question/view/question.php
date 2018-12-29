<?php
// core configuration
include_once "../../../config/core.php";
include_once "../../login_checker.php";
// set page title
$page_title="Danh mục câu hỏi";
 
// include page header HTML
include '../../layout_head.php';
?>
    <div ng-app="testApp" ng-controller="questionCtl">
    <div class="col-md-12">
    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" id="mydivheader">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> <b>Quản lý câu hỏi</b> </h4>
                    </div>
                    <div class="modal-body">

                     <div class="panel panel-default" style="border: solid 1px #cddbd1;">
                         <div class="panel-heading text-center"> <b style="font-size:18px;"> Thông tin câu hỏi </b>  </div>
                         <div class="panel-body">
                         <div class="col-xs-12">
                             <label class="bold" > Môn học </label>
                             <select class="form-control" data-ng-model="question.subject"  ng-options="sj.subjectName for sj in Subjects"></select>
                             </div>
                         <label class="col-xs-12">Nội dung</label>
                         <textarea class="col-xs-11" style="margin:15px; margin-left:15px;" class="form-control ng-pristine ng-valid ng-empty ng-touched" ng-model="question.ContentQs" rows="3" style="resize: vertical; overflow-x: hidden"></textarea>
                         </div>
                       </div>

                       <div class="panel panel-default" style="border: solid 1px #cddbd1;">
                         <div class="panel-heading text-center"> <b style="font-size:18px;"> Thông tin đáp án </b>  </div>
                            <div class="panel-body">
                                 <div class="col-md-12" style="margin-bottom:10px;">
                                     <a class="btn btn-success" ng-click="openAnswer()" data-toggle="modal" data-target="#myAnswer"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span> Thêm đáp án </a>
                                     <a class="btn btn-danger" ng-click="deleteAnswer()" data-ng-disabled="!check1" > <span class="glyphicon glyphicon-trash"></span> Xóa </a>
                                </div>
                                <table bs-table-control="bsTableAnswerControl"></table>
                             </div>
                       </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" ng-click="saveQuestion()" class="btn btn-primary" data-dismiss="modal">Lưu</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    <div>


    <!-- modal-answer -->
    <div id="myAnswer" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" id="mydivheader">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Đáp án</h4>
                    </div>
                    <div class="modal-body">

                     <div class="panel panel-default" style="border: solid 1px #cddbd1;">
                         <div class="panel-heading text-center"> <b style="font-size:18px;"> Thông tin đáp án </b>  </div>
                         <div class="panel-body">
                                                
                         <label class="col-xs-12">Nội dung</label>
                         <textarea class="col-xs-11" style="margin:15px; margin-left:15px;" class="form-control ng-pristine ng-valid ng-empty ng-touched" ng-model="answer.ContentAs" rows="3" style="resize: vertical; overflow-x: hidden"></textarea>
                         <label class="checkbox-inline col-xs-12"><input type="checkbox" ng-model="answer.Iscorrect">Là đáp án đúng</label>
                         
                         </div>                         
                       </div>


                    </div>


                    <div class="modal-footer">
                        <button type="button" ng-click="addAnswer()" class="btn btn-primary" data-dismiss="modal">Ok</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <button class="btn btn-success margin-10" style="margin:10px;"data-ng-click="createQuestion()"data-toggle="modal" data-target="#myModal"><span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span></i> Thêm mới</button>
        <button class="btn btn-primary margin-10" style="margin:10px;"data-ng-click="editQuestion()" data-ng-disabled="!check" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></span> Chỉnh sửa</button>
        <button class="btn btn-danger margin-10" style="margin:10px;"data-ng-click="confirmDeleteQuestion()" data-ng-disabled="!check"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
    <div>



    <div class="alert alert-success alert-dismissible" style="position:fixed; z-index:1000; right:10px; bottom:20px; height:100px;" ng-if="result==1">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thành công!</strong> Bạn đã cập nhật thành công.
    </div>

    <div class="alert alert-danger" style="position:fixed; z-index:1000; right:10px; bottom:20px; height:100px;" ng-if="result==0">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Lỗi!</strong> Có lỗi xảy ra trong quá trình cập nhật.
    </div>

    <table bs-table-control="bsTableQuestionControl"></table>
    </div>
    <script src="../controller/question.js"></script>
    </div>
  
 <?php
// include page footer HTML
include_once '../../layout_foot.php';
?>