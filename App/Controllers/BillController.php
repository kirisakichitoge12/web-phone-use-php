<?php
namespace App\Controllers;
use App\Models\BillModel;
use App\Models\CartModel;
use DateTime;

class BillController extends BaseController{
    private $BillModel;

    function __construct(){
        $this->BillModel= new BillModel;
    }
    public function checkout()
    {
        // $cart = new CartModel();
        // $data = $cart->getCart();
        // $this->view("checkout", $data);
        if(isset($_SESSION["user"]))
        {
            $this->renderView("CheckoutView", $this->titlepage, $this->data);
        }
        else
        {
            header('location: '.BASE_PATH.'viewcart');
        }
    }
    public function thanhtoan()
    {
        if (count($_SESSION["user"]) > 0) {
            // Xác nhận đơn hàng thành công
            $tongtien=0;
            $idtk=$_SESSION["user"]["IDTK"];
            $date = new DateTime('now');
            $ngay = $date->format('Y-m-d');
            foreach ($_SESSION['giohang'] as  $item) {
             $thanhtien=$item["GiaSP"]*$item["Soluong"];
             $tongtien+=$thanhtien;            
            }
            $sohd = $this->BillModel->insertHoaDon($idtk,$ngay,$tongtien);
            foreach ($_SESSION['giohang'] as  $item) {
                $this->BillModel->billdetail($sohd["id"],$item["IDSP"],$item["Soluong"]);      
               }

            $this->alert("Xác nhận đơn hàng thành công");
        }
        //huysession
        unset($_SESSION['giohang']);
        echo '<meta http-equiv="refresh" content="0;url=/phone/product" />';
    }
    
    // Hàm alert để hiển thị thông báo
    private function alert($message)
    {
        // Thực hiện mã HTML hoặc JS để hiển thị thông báo
        echo "<script>alert('$message');</script>";
    }
    


}