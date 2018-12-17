<div ng-app="testApp" ng-controller="dashboardCtl">
    <div class="col-md-12">

       <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 exam " ng-repeat="examconfig in Exam_Configs" >
                <a href="user/exam/view/exam.php/{{Exam_Configs.ID_ExamConfig}}">
                    <div class="examName">
                        {{examconfig.Name}}
                    </div>

                    <div class="examSubjectname">
                        <span class="glyphicon glyphicon-list-alt"></span> {{examconfig.subjectName}}
                    </div>

                     <div class="examTotaltime">
                     <i class="far fa-clock"></i> Thời gian làm bài: {{examconfig.Totaltime}} phút
                    </div>

                     <div class="examNumberQs">
                     <i class="fas fa-list-ol"></i> Số lượng câu hỏi: {{examconfig.Num_Question}} câu
                    </div>

                 </a>
        </div>
    </div>

    <script src="user/dashboard/controller/dashboard.js"></script>
</div>


</div>
  
