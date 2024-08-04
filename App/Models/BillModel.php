<?php
namespace App\Models;
class BillModel{
    private $db;

    function __construct(){
        $this->db = new DatabaseModel;
    }
    // function insertHoaDon($idkh, $idsp, $hinanh, $tensp, $giasp, $soluong, $thanhtien){
    //     $sql="INSERT INTO `hoadon`(`IDCTHD`, `IDSP`, `HinhAnh`, `TenSP`, `GiaSP`, `SoLuong`, `ThanhTIen`) VALUES (?, ?, ?, ?, ?,?,?)";
    //     $this->db->pdo_execute($sql,$idkh, $idsp, $hinanh, $tensp, $giasp, $soluong, $thanhtien);
    // }
    function insertHoaDon($idkh, $ngay, $tongtien){
        $sql = "INSERT INTO `bills`(`id_customer`, `date_order`, `total`) VALUES ( ?, ?, ?)";
        $this->db->pdo_execute($sql, $idkh, $ngay, $tongtien);
    
        // Lấy mã số hóa đơn mới nhất
        $select = "SELECT id FROM bills ORDER BY id DESC LIMIT 1";
        $result= $this->db->get_one($select);
    
        return $result;
    }
    function billdetail($idbill, $idproduct, $soluong){
        $sql = "INSERT INTO `bill_detail`(`id_bill`, `id_product`, `quantity`) VALUES ( ?, ?, ?)";
        $this->db->pdo_execute($sql,$idbill, $idproduct, $soluong);
    }
    

    

}