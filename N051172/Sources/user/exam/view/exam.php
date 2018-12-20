<?php
// core configuration
include_once "../../../config/core.php";
// set page title
$page_title="Thi trực tuyến";
 
// include page header HTML
include '../../../layout_head.php';
?>
<div ng-app="testApp" ng-controller="ExamDetailCtl">
    
    <script src="../../controller/examDetail.js"></script>
</div>
  
 <?php
// include page footer HTML
include_once '../../../layout_foot.php';
?>