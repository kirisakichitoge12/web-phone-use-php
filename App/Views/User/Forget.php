<?php require_once "HeaderView.php"; ?>
<div class="main" style="justify-content: center; display: flex;margin: 50px auto;">
    <form action="<?=BASE_PATH?>forgetnow" method="post">
    <h5 style="text-align: center;margin: 50px;">Nhập email của bạn vào đây</h5>
    <input type="text" name="email" > 
    <button type="submit"  class="btn btn-primary" >Lấy lại mật khẩu</button>
    </form>
</div>

<?php require_once "FooterView.php"; ?>
