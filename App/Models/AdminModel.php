<?php
namespace App\Models;

class AdminModel{
    private $db;

    function __construct(){
        $this->db = new DatabaseModel;
    }
    
    function product_get_all(){
        $sql="select * from sanpham";
        return $this->db->get_all($sql);
    }

    function category_get_all(){
        $sql="select * from danhmuc order by IDDM asc";
        return $this->db->get_all($sql);
      }

    function bill_get_all(){
        $sql="select * from donhang";
        return $this->db->get_all($sql);
    }
    function update($TenSP,$GiaSP,$MotaSP,$HangSP,$LoaiSP,$MaDM,$Hinhsp )
    {
        $sql = "INSERT INTO `sanpham`(`TenSP`, `HinhAnhSP`, `GiaSP`, `MotaSP`, `ViewSP`, `BetSeller`, `HangSP`, `LoaiSP`, `MaDM`)  VALUES ( ?, ?, ?,?, ?,?,?,?,?)";
        $this->db->pdo_execute($sql,$TenSP,$Hinhsp,$GiaSP,$MotaSP,0,0,$HangSP,$LoaiSP,$MaDM);
    }
    function editproducts($id)
    {
        $sql="select * from sanpham where IDSP='$id'";
        return $this->db->get_one($sql);
    }
    
    function editproduct($TenSP,$GiaSP,$MotaSP,$HangSP,$LoaiSP,$MaDM,$Hinhsp,$id )
    {
        $sql = "UPDATE `sanpham` 
        SET `TenSP` = ?, 
            `HinhAnhSP` = ?, 
            `GiaSP` = ?, 
            `MotaSP` = ?, 
            `ViewSP` = ?, 
            `BetSeller` = ?, 
            `HangSP` = ?, 
            `LoaiSP` = ?, 
            `MaDM` = ? 
        WHERE `IDSP` = ?
        ";
        $this->db->pdo_execute($sql,$TenSP,$Hinhsp,$GiaSP,$MotaSP,0,0,$HangSP,$LoaiSP,$MaDM,$id);
    }
    function deleteProduct($id) {
        $sql = "DELETE FROM sanpham WHERE IDSP = ?";
        $this->db->pdo_execute($sql, $id);
    }
    
}