<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\DatabaseModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
class UserController extends BaseController{

    private $UserModel;
    private $DatabaseModel;
    


    function __construct(){
        $this->DatabaseModel= new DatabaseModel;
        $this->UserModel= new UserModel($this->DatabaseModel);

    }

    function profile() {
        $this->titlepage = 'My Profile';

        $this->renderView("ProfileView", $this->titlepage, $this->data);
    }

    function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $password=$_POST['password'];
                $saltF = "G433H#";
                $saltL = "Td23$%";
                $passnew = md5($saltF . $password . $saltL);

                $kq = $this->UserModel->userlogin($_POST['email'],$passnew);
                if ($kq)  {
                    $_SESSION['user'] = $kq;
                    header("Location: " . BASE_PATH . "index");
                    exit();
                } else {
                    header("Location: " . BASE_PATH . "login");
                    $_SESSION['loidn'] = '<span style="color: red;">Email hoặc mật khẩu không đúng.</span>';
                }
            }
        }
       
        $this->titlepage = 'Đăng Nhập';
        $this->renderView("LoginView", $this->titlepage, $this->data);
    }

    function logout() {
        unset($_SESSION['user']);
        header("Location: " . BASE_PATH . "index");
    }

    

    function signin() {
        if(isset($_POST['signin'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $address=$_POST['address'];
            $password = $_POST['password'];
                $saltF = "G433H#";
                $saltL = "Td23$%";
                $passnew = md5($saltF . $password . $saltL);

            $kq = $this->UserModel->user_checkemail($email);
            if ($kq) {
                
                $_SESSION['loidk'] = '<strong>Email đã tồn tại. Vui lòng sử dụng email khác</strong>.';
                header("Location: " . BASE_PATH . "signin");
            }
            else{
                $HinhAnh = 'default.png';
                $Role = 1;
                $this->UserModel->SignIntUser($username, $passnew, $email, $HinhAnh, $Role ,$phone ,$address);
                header("Location: " . BASE_PATH . "login");
            }
        }
  
        $this->titlepage = 'Đăng Ký';
        $this->renderView("SigninView", $this->titlepage, $this->data);
    }

    function geteditprofile()
    {
        $this->titlepage = 'Edit My Profile';

        $this->renderView("geteditProfileView", $this->titlepage, $this->data);
    }

    function  posteditprofile()
    {
        if(isset($_POST['capnhat']) && $_SESSION['user'])
        {
           
                $email=$_SESSION['user']["email"];
                $password=$_SESSION['user']["password"];
                $address = isset($_POST['address']) ? $_POST['address'] : 'chưa có';
                $phone = isset($_POST['sdt']) ? $_POST['sdt'] : 'chưa có';
                 // Cập nhật thông tin trong session
                    $_SESSION['user']["Address"] = $address;
                    $_SESSION['user']["Phone"] = $phone;
                $this->UserModel->updateprofile($email,$password,$phone,$address);
        }
        echo '<script> alert("Cập nhật thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;url=/phone/profile" />';
        
    }
    function getforget()
    {
        $this->titlepage = 'Forget';
        $this->renderView("Forget", $this->titlepage, $this->data);
    }
    function editforget()
    {
        if(isset($_POST["email"]))
        {
           $username=isset($_SESSION['user'])? $_SESSION['user']['username'] :'username';
           $email=$_POST["email"];
           $code = rand(100000, 999999);
           $item=array("email"=>$email,"code"=>$code);
           $_SESSION["email"]=$item;
           //Create an instance; passing `true` enables exceptions
           $mail = new PHPMailer(true);

            try {
                //Server settings
                                    //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'hotruongthinhkv147@gmail.com';                     //SMTP username
                $mail->Password   = 'wwuo nhfa pvio ophz';                               //SMTP password
                $mail->SMTPSecure ='tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('hotruongthinhkv147@gmail.com', 'Website');
                $mail->addAddress($email,$username);     //Add a recipient
                $mail->addAddress('vercelwebsite@gmail.com');               //Name is optional
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Forget password';
                $mail->Body    = "Đây là mã xác nhận để đổi lại mật khẩu $code";
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo '<script> alert("Đã gửi mã xác nhận cho email '.$email.'");</script>';
                echo '<meta http-equiv="refresh" content="0;url=/phone/repassword" />';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        else
        {
            echo"không có email";
        }
    }

    function repassword()
    {
        $this->titlepage = 'Repassword';
        $this->renderView("Repassword", $this->titlepage, $this->data);
    }
    function passwordnew()
    {
        if(isset($_POST["changepass"]))
        {
            $code=$_POST["code"];
            $password=$_POST["repassword"];
            $saltF = "G433H#";
            $saltL = "Td23$%";
            $passnew = md5($saltF . $password . $saltL);

            if(isset($_SESSION["email"]))
            {
                $email=$_SESSION["email"]["email"];
                if($code==$_SESSION["email"]["code"])
                {
                    $success=$this->UserModel->changepassword($email,$passnew);
                    if($success==0)
                    {
                        unset($_SESSION["email"]);
                        echo '<script> alert("Cập nhật thành công");</script>';
                        echo '<meta http-equiv="refresh" content="0;url=/phone" />';
                    }
                    else
                    {
                        echo '<script> alert("Cập nhật không thành công");</script>';
                        echo '<meta http-equiv="refresh" content="0;url=/phone" />';
                    }
                }
                else
                {
                    echo '<script> alert("Mã xác nhận không đúng");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=/phone/repassword" />';
                }
            }
            else
            {
                echo '<script> alert("Email chưa được cấp mã xác nhận");</script>';
                echo '<meta http-equiv="refresh" content="0;url=/phone" />';
            }
        }
    }

}