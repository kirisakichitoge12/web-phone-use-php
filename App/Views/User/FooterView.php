<footer>
    <div class="container">
      <div class="row" style="color: whitesmoke;">
        <div class="col-lg-3" style=" margin: 30px 0;">
          <div class="section-heading">
            <h6>Về chúng tôi</h6>
            <br>
            Website chính thức và duy nhất <br>
            <br>Hiện tại chúng mình chỉ nhận đơn hàng trên website chứ không nhận bất kỳ nơi nào khác nhé!
          </div>
          
        </div>
        <div class="col-lg-3" style=" margin: 30px 0;">
          <div class="section-heading">
            <h6>Danh mục sản phẩm</h6>
            <br>
            
           Iphone 11
            <br>
            <br>
            Iphone 12
            
            <br>
            <br>
            Iphone 13
            <br>
            <br>
            Iphone 14
            <br>
            <br>
            
          </div>
        </div>
        <div class="col-lg-3" style=" margin: 30px 0;">
          <div class="section-heading">
            <h6>Thông tin</h6>
            <br>
            
                Giới thiệu
            <br>
            <br>
                Điều khoản và điều kiện
            <br>
            <br>
                Chính sách bảo mật
            
            <br>
            <br>
                Hình thức thanh toán
            <br>
            <br>
                Liên hệ
            <br>
          </div>
        </div>
        <div class="col-lg-3" style=" margin: 30px 0;">
          <div class="section-heading">
            <h6>Hỗ trợ</h6>
            <br>
            
            Mọi thắc mắc và góp ý cần hỗ trợ xin vui lòng liên hệ Fanpage và Instagram
            
            <br>
            <br>
                    
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        
            
          </div>
        </div>
        
      </div>
    </div>
  </footer>

  <div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="container">
        © 2023 Rabit. All rights reserved.
      </div>
    </div>
  </div>
  

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="<?=BASE_PATH?>Public/template/vendor/jquery/jquery.min.js"></script>
  <script src="<?=BASE_PATH?>Public/template/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=BASE_PATH?>Public/template/assets/js/isotope.min.js"></script>
  <script src="<?=BASE_PATH?>Public/template/assets/js/owl-carousel.js"></script>
  <script src="<?=BASE_PATH?>Public/template/assets/js/counter.js"></script>
  <script src="<?=BASE_PATH?>Public/template/assets/js/custom.js"></script>
  <script src="<?=BASE_PATH?>Public/template/assets/js/giohang.js"></script>
  <script>
    $(document).ready(function() {
        $('.colorOption').change(function() {
            var selectedColor = $('input[name=color]:checked').val();
          console.log(selectedColor);
            if (selectedColor === 'blue') {
                $('#iphoneImage').attr('src', '<?=BASE_PATH?>Public/template/assets/images/blue.jpg');
            } else if (selectedColor === 'white') {
                $('#iphoneImage').attr('src', '<?=BASE_PATH?>Public/template/assets/images/white.jpg');
            }
            if (selectedColor === 'nature') {
                $('#iphoneImage').attr('src', '<?=BASE_PATH?>Public/template/assets/images/nature.jpg');
            } else if (selectedColor === 'black') {
                $('#iphoneImage').attr('src', '<?=BASE_PATH?>Public/template/assets/images/black.jpg');
            }
            // Thêm các trường hợp khác nếu cần
        });
        $('.gbOption').change(function() {
            var selectedgb = $('input[name=gb]:checked').val();
            console.log(selectedgb);
            // Thêm các trường hợp khác nếu cần
        });
    });
</script>
  </body>
</html>