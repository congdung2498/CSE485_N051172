<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
 
        <div class="navbar-header">
            <!-- to enable navigation dropdown when viewed in mobile device -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
 
            <!-- Change "Site Admin" to your site name -->
            <a class="navbar-brand" href="<?php echo $home_url; ?>admin/index.php"><span class="glyphicon glyphicon-education"></span>Admin</a>
        </div>
 
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
 
 
                <!-- highlight for order related pages -->
                <li <?php echo $page_title=="Admin Index" ? "class='active'" : ""; ?>>
                    <a href="<?php echo $home_url; ?>admin/index.php"><span class="glyphicon glyphicon-home"></span> Trang chủ</a>
                </li>
 
                <!-- highlight for user related pages -->
                <li <?php echo $page_title=="Danh mục người dùng" ? "class='active'" : ""; ?> >
                    <a href="<?php echo $home_url; ?>admin/read_users.php"><span class=""><span class="glyphicon glyphicon-user"></span> Tài khoản</a>
                </li>
               
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-list"></span> Danh mục</a>
                  <ul class="dropdown-menu">

                    <li <?php echo $page_title=="Danh mục môn học" ? "class='active'" : ""; ?> >
                    <a href="<?php echo $home_url; ?>admin/subject/view/subject.php">Môn học</a>
                   </li>

                   <li <?php echo $page_title=="Danh mục câu hỏi" ? "class='active'" : ""; ?> >
                    <a href="<?php echo $home_url; ?>admin/question/view/question.php">Câu hỏi</a>
                   </li>
                    
                   <li <?php echo $page_title=="Cấu hình đề thi" ? "class='active'" : ""; ?> >
                    <a href="<?php echo $home_url; ?>admin/exam_config/view/exam_config.php">Cấu hình đề thi</a>
                   </li>    

                   <li <?php echo $page_title=="Danh mục kết quả thi" ? "class='active'" : ""; ?> >
                    <a href="<?php echo $home_url; ?>admin/result/view/result.php">Kết quả thi</a>
                   </li>                  
                   
                  </ul>
                </li>
            </ul>
 
            <!-- options in the upper right corner of the page -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>
                        &nbsp;&nbsp;<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <!-- log out user -->
                        <li><a href="<?php echo $home_url; ?>logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
 
        </div><!--/.nav-collapse -->
 
    </div>
</div>
<!-- /navbar -->