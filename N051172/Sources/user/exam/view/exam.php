<?php
// core configuration
include_once "../../../config/core.php";
$require_login=true;
include_once "../../../login_checker.php";
// set page title
$page_title="Thi trực tuyến";

 
// include page header HTML
include '../../../layout_head.php';

?>
<link rel="stylesheet" href="../../../../libs/clock/flipclock.css">


<div ng-app="testApp" ng-controller="ExamDetailCtl">

<div class="row">

	<div class="col-xs-12 col-sm-10" style="height: 100%;display: table-row;">

        <div class="col-xs-12 content " style="margin-top:10px;" ng-repeat="question in Questions" >
             <div class="col-xs-12 " style="font-weight: bold; font-size: 18px; margin-top:10px;">
                <u>Câu hỏi {{question.index}}:</u> {{question.ContentQs}}
             </div>
            
             <div class="clearfix"  ng-repeat="anwser in question.ListAnswer">
					<div class="col-xs-12 ">
						<div class="checkbox anwser">
							<label style="font-weight: bold;"> <input type="checkbox" ng-model="anwser.checked" > 
								<span class="cr" style="margin-top: 4px;"><i class="cr-icon glyphicon glyphicon-ok"></i></span> 
								<span style="padding-left: 10px; font-size: 18px;">{{anwser.ContentAs}}</span>
							</label>
						</div>
					</div>
				</div>
            
        </div>
        
	</div>

	<div class="col-xs-12 col-sm-2" style="background:white;height:100%;">
			<div class="name" style="font-size:16px; margin-top:20px; border-bottom: 1px solid black;">
				<b>{{config.Name}} </b>
            </div>

            <div class="Subjectname" style="margin-top:10px;">
				<i class="fas fa-book-reader"></i> Môn: {{config.subjectName}}
            </div>

            <div class="NumberQs" style="margin-top:10px;">
                <i class="fas fa-list-ol"></i> Số lượng câu hỏi: {{config.Num_Question}} câu
        	</div>

			<div class="Totaltime" style="margin-top:10px;">
                <i class="far fa-clock"></i> Thời gian làm bài: {{config.Totaltime}} phút
            </div>

			<div class="Totaltime" style="margin-top:30px; color:#f58220; font-size:18px;">
              <b>  <i class="far fa-clock"></i> Thời gian còn lại </b>
			</div>
			
			<div class="clock" style="margin-top:2em;"></div>
				<div class="message"></div>
			<button type="button" ng-click="checkoptions(Questions)" style="height:50px; width:100px; margin-left:30%; margin-bottom:20px;"class="btn btn-primary" data-toggle="modal" data-target="#myModal">Nộp bài</button>
				
			<div style="font-size:18px;">
				<div style="margin-top:10px;" ng-if="Isfinish==true"> Bạn làm đúng <b style= "color:red">{{NumberCorecct}}/{{config.Num_Question}}</b> câu hỏi</div>
				<div style="margin-top:10px;" ng-if="Isfinish==true"> Điểm của bạn là:<b style= "color:red"> {{Score}}</b></div>
			</div>
	</div>


</div>
<div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" id="mydivheader">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> Xác nhận</h4>
                    </div>
                    <div class="modal-body">

                     <div class="panel panel-default" style="border: 0px ">
                         <div class="panel-body" style="font-size: 18px;">

                        <div class="row">
                                <label class="col-xs-12 bold">Bạn đã trả lời: <b style="color:red">{{numberAnswer}}/{{config.Num_Question}}</b> câu hỏi</label>
                        </div>    
						<div class="row">
                                <label class="col-xs-12 bold">Bạn có muốn nộp bài không ?</label>
                        </div>
                        
                        
                         
                         </div>                         


                    </div>


                    <div class="modal-footer">
					<button type="button" ng-click="Submit(Questions)" class="btn btn-primary" data-dismiss="modal">Xác nhận</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
                </div>

            </div>
        </div>
    <script src="../../controller/examDetail.js"></script>
	<script src="../../../../libs/clock/flipclock.js"></script>	
	<script type="text/javascript">
					
		
	</script>
</div>
<?php include '../../../layout_foot.php';?>



<style>
/* Note: Try to remove the following lines to see the effect of CSS positioning */

.content{
   background: rgb(255, 255, 255);
   height:100%;
   width:95%;
   margin-left:30px;
   margin-right:30px;
   margin-bottom:10px;
   border-radius: 1%;
}
.navbar {
   margin-bottom: 0px;
}
.affix {
	top: 0;
	width: 87%;
	z-index: 9999 !important;
}

.affix+.container-fluid {
	padding-top: 70px;
}

.menu-info {
	background-color: #fff;
	min-height: 70px;
}

.clear {
	clear: both;
}

.nopadding {
	padding: 0px;
}

.text-menu {
	font-size: 18px;
	font-weight: bold;
	padding-top: 25px;
}

.label-question {
	font-weight: bold;
	font-size: 20px;
}

.lable-form-edit {
	font-weight: bold;
	margin-top: 5px;
	font-size: 18px;
}

.view-info {
	font-weight: bold;
	margin-top: 5px;
	font-size: 18px;
}

.anwser {
	font-weight: bold;
}

.checkbox label:after, .radio label:after {
	content: '';
	display: table;
	clear: both;
}

.checkbox .cr, .radio .cr {
	position: relative;
	display: inline-block;
	border: 1px solid #a9a9a9;
	border-radius: .25em;
	width: 1.3em;
	height: 1.3em;
	float: left;
	margin-right: .5em;
}

.radio .cr {
	border-radius: 50%;
}

.checkbox .cr .cr-icon, .radio .cr .cr-icon {
	position: absolute;
	font-size: .8em;
	line-height: 0;
	top: 50%;
	left: 20%;
}

.radio .cr .cr-icon {
	margin-left: 0.04em;
}

.checkbox label input[type="checkbox"], .radio label input[type="radio"]
	{
	display: none;
}

.checkbox label input[type="checkbox"]+.cr>.cr-icon, .radio label input[type="radio"]+.cr>.cr-icon
	{
	transform: scale(3) rotateZ(-20deg);
	opacity: 0;
	transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked+.cr>.cr-icon, .radio label input[type="radio"]:checked+.cr>.cr-icon
	{
	transform: scale(1) rotateZ(0deg);
	opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled+.cr, .radio label input[type="radio"]:disabled+.cr
	{
	opacity: .5;
}

.img-question img{
	width:auto;
	max-height: 400px;
}
</style>
