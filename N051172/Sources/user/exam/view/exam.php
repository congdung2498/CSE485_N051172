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
<div ng-app="testApp" ng-controller="ExamDetailCtl">
<div class="col-xs-12" style="height: 100%;display: table-row;">

        <div class="col-xs-12 content " style="margin-top:10px;" ng-repeat="question in Questions" >
             <div class="col-xs-12 " style="font-weight: bold; font-size: 18px; margin-top:10px;">
                Câu hỏi {{question.index}}: {{question.ContentQs}}
             </div>
            
             <div class="clearfix"  ng-repeat="anwser in question.ListAnswer">
					<div class="col-xs-12 ">
						<div class="checkbox anwser">
							<label style="font-weight: bold;"> <input type="checkbox" ng-model="anwser.isChecked"> 
								<span class="cr" style="margin-top: 4px;"><i class="cr-icon glyphicon glyphicon-ok"></i></span> 
								<span style="padding-left: 10px; font-size: 18px;">{{anwser.ContentAs}}</span>
							</label>
						</div>
					</div>
				</div>
             <!-- <div class="col-xs-12" >
             <input type="radio" ng-model="myAnswer" ng-value="question.ListAnswer[0].Iscorrect">
               <b> {{question.ListAnswer[0].ContentAs}}</b>
             </div>

             <div class="col-xs-12" >
             <input type="radio" ng-model="myAnswer" ng-value="question.ListAnswer[1].Iscorrect">
               <b> {{question.ListAnswer[1].ContentAs}}</b>
             </div>

             <div class="col-xs-12" >
             <input type="radio" ng-model="myAnswer" ng-value="question.ListAnswer[2].Iscorrect">
               <b> {{question.ListAnswer[2].ContentAs}}</b>
             </div>

             <div class="col-xs-12" >
             <input type="radio" ng-model="myAnswer" ng-value="question.ListAnswer[3].Iscorrect">
               <b> {{question.ListAnswer[3].ContentAs}}</b>
             </div> -->
            
        </div>
        
</div>
    <script src="../../controller/examDetail.js"></script>
    
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
