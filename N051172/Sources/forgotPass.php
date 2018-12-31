<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title = "Quên mật khẩu";
 
// include login checker
include_once "login_checker.php";
 
// include classes
include_once 'config/database.php';
include_once 'objects/user.php';
include_once "libs/php/utils.php";
 
// include page header HTML
include_once "layout_head.php";
 
echo "<div class='col-md-12'>";
 
    // registration form HTML will be here
    // code when form was submitted will be here
    // if form was posted
if($_POST){
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // initialize objects
    $user = new User($db);
    $utils = new Utils();
 
    // set user email to detect if it already exists
    $user->email=$_POST['email'];
    
    // check if email already exists
    if(!$user->emailExists()){
        echo "<div class='alert alert-danger'>";
            echo "Email không tồn tại. Xin hãy thử lại";
        echo "</div>";
    }
 
    else{

    
    $access_code= $user->getAccesscode();
    // send confimation email
    $send_to_email=$_POST['email'];
    $body="Chào {$send_to_email}.<br /><br />";
    $body.="Xin mời bấm vào link sau để reset mật khẩu cho tài khoản. mật khẩu được reset mặc định :123456 {$home_url}verify.php/?access_code={$access_code}";
    $subject="Reset password";
 
    if($utils->sendEmailViaPhpMail($send_to_email, $subject, $body)){
        echo "<div class='alert alert-success'>
           Email xác thực đã được gửi. Vui lòng kiểm tra và ấn vào link xác thực để reset mật khẩu.
        </div>";
    }
 
    else{
        echo "<div class='alert alert-danger'>
           Có lỗi xảy ra
        </div>";
    }
 
    // empty posted values
    $_POST=array();
    }
}
?>
<form action='forgotPass.php' method='post' id='forgot'>
 
    <table class='table table-responsive'>
 
        <tr>
            <td>Email</td>
            <td><input style="width:50%;" type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Xác nhận
                </button>
            </td>
        </tr>
 
    </table>
</form>
<style>
.container{
    height:1000px;
}
table{
    margin-left:100px;
   
}

</style>
<?php
 
echo "</div>";
 
// include page footer HTML
include_once "layout_foot.php";
?>