<?php
// core configuration
include_once "../../../config/core.php";
$require_login=true;
include_once "../../../login_checker.php";
// set page title
$page_title="Danh mục kết quả thi";
 
// include page header HTML
include '../../../layout_head.php';
?>
<div ng-app="testApp" ng-controller="resultmemberCtl" style="padding:0 100px 0 100px">
    <div class="col-md-12">
    <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" id="mydivheader">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> <b>Quản lý điểm thi </b> </h4>
                    </div>
                 </div>
            </div>
    </div>
    </div>
    <table bs-table-control="bsTableResultControl"></table>
    <script src="../controller/result.js"></script>
    </div>
  <style>
  .container{
      height:1000px;
  }
  </style>
 <?php
// include page footer HTML
include_once '../../../layout_foot.php';
?>