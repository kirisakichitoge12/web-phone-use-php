<?php
namespace App\Models;
class UserModel{
    private $db;
        function __construct(){
            $this->db = new DatabaseModel;
        }

        

        public function userlogin($email, $password){
            $sql = "SELECT * FROM taikhoan WHERE email=? AND password=?";
            return $this->db->get_one($sql, $email, $password);
        }
       
        public function  adminlogin($email, $password){
            $sql = "SELECT * FROM taikhoan WHERE email=? AND password=? AND Role=0";
            return $this->db->get_one($sql, $email, $password);
        }
        public function SignIntUser($username, $password, $email, $HinhAnh, $Role,  $phone,  $address)
        {
            $sql = "INSERT INTO taikhoan(Username, password, email, HinhAnh, Role,Phone,Address ) VALUES (?, ?, ?, ?, ?,?,?)";
            $this->db->pdo_execute($sql, $username, $password, $email, $HinhAnh, $Role, $phone, $address);
        }

        function user_checkemail($email){
            $sql="select * from taikhoan where email=?";
            return $this->db->get_one($sql, $email);
        }


        function update_user($id, $username, $email, $HinhAnh){
            $sql="update taikhoan set username=?, email=?, HinhAnh=? where id=?";
            $this->db->pdo_execute($sql, $username, $email, $HinhAnh, $id);
        }
        function updateprofile($email,$password,$phone,$address)
        {

            $sql="UPDATE taikhoan SET Phone=?, Address=? WHERE email=? AND password=?";
            $this->db->pdo_execute($sql, $phone, $address, $email, $password);
        }

        function changepassword($email,$password)
        {
            $sql="UPDATE `taikhoan` SET `password`=? WHERE`email`=?";
            $this->db->pdo_execute($sql,$password,$email);
            return 0;
        }
}


?>