<?php require_once "HeaderView.php"; ?>
<div class="main" style="justify-content: center; display: flex;margin: 50px auto;">
    <form action="<?=BASE_PATH?>passwordnew" method="post">
    <h5 style="text-align: center;margin: 50px;">Thay đổi mật khẩu</h5>
    Mã xác nhận của bạn:<input type="text" name="code" > <br>
    Mật khẩu mới :<input type="password" name="repassword" > 
    <button type="submit"  class="btn btn-primary" name="changepass" >Thay đổi</button>
    </form>
</div>

<?php require_once "FooterView.php"; ?>
