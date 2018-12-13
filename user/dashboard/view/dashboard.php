<div ng-app="testApp" ng-controller="dashboardCtl">
    <div class="col-md-12">

       <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 exam " ng-repeat="exam in Exams" >
                <a href="">
                    <div class="examName">
                        {{exam.Name}}
                    </div>

                    <div class="examSubjectname">
                        <span class="glyphicon glyphicon-list-alt"></span> {{exam.subjectName}}
                    </div>

                     <div class="examTotaltime">
                     <i class="far fa-clock"></i> Thời gian làm bài: {{exam.Totaltime}} phút
                    </div>

                     <div class="examNumberQs">
                     <i class="fas fa-list-ol"></i> Số lượng câu hỏi: {{exam.Num_Question}} câu
                    </div>

                 </a>
        </div>
    </div>

    <script src="user/dashboard/controller/dashboard.js"></script>
</div>


</div>
  
