<?php
namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\UserModel;
class AdminController extends AdminBaseController{

        private $AdminModel,$UserModel;

        function __construct(){
            $this->AdminModel= new AdminModel;
            $this->UserModel=new UserModel;
        }

        function index(){


            $this->titlepage = 'Home';
            $this->renderView("HomeAdmin", $this->titlepage, $this->data);
        }

        function categoryadmin(){
            $dsdm_admin=$this->AdminModel->category_get_all();
            $this->data["danhmuc_all"]=$dsdm_admin;
            $this->titlepage = 'Quản lý danh mục';
            $this->renderView("CategoryAdmin", $this->titlepage, $this->data);
        }


        function productadmin(){
            $dssp_admin=$this->AdminModel->product_get_all();
            $this->data["sanpham_all"]=$dssp_admin;
            $this->titlepage = 'Quản lý sản phẩm';
            $this->renderView("ProductAdmin", $this->titlepage, $this->data);
        }


        function billadmin(){

            $this->titlepage = 'Quản lý đơn hàng';
            $this->renderView("BillAdmin", $this->titlepage, $this->data);
        }
        
        function addadmin(){

            $this->titlepage = 'Thêm mới ';
            $dsdm_admin=$this->AdminModel->category_get_all();
            $this->data["danhmuc_all"]=$dsdm_admin;
            $this->renderView("AddFormAdmin", $this->titlepage, $this->data);

        }
        function postadmin(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ form
                $TenSP = $_POST["TenSP"];
                $GiaSP = $_POST["GiaSP"];
                $MotaSP = $_POST["MotaSP"];
                $HangSP = $_POST["HangSP"];
                $LoaiSP = $_POST["LoaiSP"];
                $MaDM = $_POST["MaDM"];

                $file_tmp = $_FILES['HinhAnhSP']['tmp_name'];
                $target_path ='Public/template/assets/images/'.$_FILES['HinhAnhSP']['name'];
                $Hinhsp=$_FILES['HinhAnhSP']['name'];
                $this->AdminModel->update($TenSP,$GiaSP,$MotaSP,$HangSP,$LoaiSP,$MaDM,$Hinhsp);
                
                if (move_uploaded_file($file_tmp, $target_path)) {
                    echo "Tải tập tin thành công";
                } else {
                    echo "Tải tập tin thất bại";
                }
                
            }

            $this->titlepage = 'Thêm mới';
            $dsdm_admin=$this->AdminModel->category_get_all();
            $this->data["danhmuc_all"]=$dsdm_admin;
            echo '<script> alert("Thêm sản phẩm thành công");</script>';
            // header('location: '.BASE_PATH.'admin/addnew');
            echo '<meta http-equiv="refresh" content="0;url='.BASE_PATH.'admin/addnew" />';

        }
      
        function geteditadmin(){

            $this->titlepage = 'Sửa sản phẩm';
            $dsdm_admin=$this->AdminModel->category_get_all();
            $this->data["danhmuc_all"]=$dsdm_admin;
            $url = $_SERVER['REQUEST_URI'];
            $segments = explode('/', rtrim($url, '/'));
            $idproduct_key = array_search('editproduct', $segments);
            $idproduct=$segments[$idproduct_key + 1];
            $item=$this->AdminModel->editproducts($idproduct);
            $this->data["item"] = $item;
            $this->renderView("geteditAdmin", $this->titlepage, $this->data);

        }
        
        
        function posteditadmin(){

            $this->titlepage = 'Sửa sản phẩm';
            $url = $_SERVER['REQUEST_URI'];
            $segments = explode('/', rtrim($url, '/'));
            $idproduct_key = array_search('posteditadmin', $segments);
            $idproduct=$segments[$idproduct_key + 1];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Lấy dữ liệu từ form
                $TenSP = $_POST["TenSP"];
                $GiaSP = $_POST["GiaSP"];
                $MotaSP = $_POST["MotaSP"];
                $HangSP = $_POST["HangSP"];
                $LoaiSP = $_POST["LoaiSP"];
                $MaDM = $_POST["MaDM"];

                $file_tmp = $_FILES['HinhAnhSP']['tmp_name'];
                $target_path ='Public/template/assets/images/'.$_FILES['HinhAnhSP']['name'];
                $Hinhsp=$_FILES['HinhAnhSP']['name'];
                $this->AdminModel->editproduct($TenSP,$GiaSP,$MotaSP,$HangSP,$LoaiSP,$MaDM,$Hinhsp,$idproduct);
                
                if (move_uploaded_file($file_tmp, $target_path)) {
                    echo "Tải tập tin thành công";
                } else {
                    echo "Tải tập tin thất bại";
                }
                
            }
            
            echo '<script> alert("Sửa sản phẩm thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url='.BASE_PATH.'admin/product" />';

        }
        function deleteadmin(){
            $this->titlepage = 'Xoá sản phẩm';
            // Lấy ID sản phẩm từ URL
            $url = $_SERVER['REQUEST_URI'];
            $segments = explode('/', rtrim($url, '/'));
            $idproduct_key = array_search('deleteadmin', $segments);
            $idproduct = $segments[$idproduct_key + 1];
        
                $this->AdminModel->deleteProduct($idproduct);
                // Tiếp tục xử lý các thao tác khác nếu cần
        
                // Hiển thị thông báo và chuyển hướng người dùng
                echo '<script> alert("Xóa sản phẩm thành công");</script>';
                echo '<meta http-equiv="refresh" content="0;url='.BASE_PATH.'admin/product" />';
        }
        
        function getlogin()
        {
            $this->titlepage = 'Đăng nhập admin';
            $this->renderView("LoginView", $this->titlepage, $this->data);
        }
        function login()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['email']) && isset($_POST['password'])) {
                    $password=$_POST['password'];
                    $saltF = "G433H#";
                    $saltL = "Td23$%";
                    $passnew = md5($saltF . $password . $saltL);
    
                    $kq = $this->UserModel->adminlogin($_POST['email'],$passnew);
                    if ($kq)  {
                        $_SESSION['admin'] = $kq;
                        echo '<script> alert("Đăng nhập thành công");</script>';
                        echo '<meta http-equiv="refresh" content="0;url='.BASE_PATH.'admin/product" />';
                    } else {
                        echo '<script> alert("Đăng nhập không thành công");</script>';
                        echo '<meta http-equiv="refresh" content="0;url='.BASE_PATH.'admin/getlogin" />';
                    }
                }
            }
           
            $this->titlepage = 'Đăng Nhập';
            $this->renderView("LoginView", $this->titlepage, $this->data);
        }
        function logout() {
            unset($_SESSION['admin']);
            echo '<meta http-equiv="refresh" content="0;url=/phone" />';
        }
}