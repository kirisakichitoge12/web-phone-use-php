<?php require_once "HeaderView.php"; ?>
<?php
  $html_cart="";
  $tongtien=0;
  if(count($_SESSION["giohang"])>0){
    foreach ($_SESSION["giohang"] as $item) {
      $tt=$item["Soluong"]*$item["GiaSP"];
      $tongtien+=$tt;
      $html_cart.='<tr >
              <td class="product-thumbnail">
                <img src="Public/template/assets/images/'.$item["HinhAnhSP"].'" alt="Image" class="img-fluid" style="max-width: 200px;">
              </td>
              <td class="product-name">
                <h2 class="h5 text-black">'.$item["TenSP"].'</h2>
                <p>(Màu sắc:'.$item["color"].' Bộ nhớ :'.$item["gb"].')</p>
              </td>
              <td>'.number_format($item["GiaSP"],0,",",".").' VNĐ</td>
              <td>
                <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                  <input type="text" onkeyup="kiemtrasoluong(this)" class="form-control text-center quantity-amount" readonly value="'.$item["Soluong"].'" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                  <input type="hidden" value="'.$item["IDSP"].'">
                </div>

              </td>
              <td>'.number_format($tt,0,",",".").' VNĐ</td>
            </tr>';
    }
    
  }
  else
  {
    $html_cart='<tr   style="text-align:center">
     <td colspan="6">Giỏ hàng trống</td>
    </tr>';
  }
?>
<div class="properties section">
    <div class="container">
      
      <div class="untree_co-section before-footer-section">
        <div class="container" >
          <h1 style="text-align:center;margin-bottom:25px;">Hoá Đơn</h1>
          <div class="row">


<div class="col-md-6  pl-5">
  <div class="row mb-5">
  <h3 class="text-black h4 text-uppercase">Thông tin khách hàng</h3>
     <table class="table">
          <thead>
              <tr>
              <th scope="col">Tên</th>
              <th scope="col">Email</th>
              <th scope="col">Địa chỉ</th>
              <th scope="col">Số điện thoại</th>
              </tr>
          </thead>
          <tbody>
              <tr>
              <td><?=$_SESSION["user"]["username"]?></td>
              <td><?=$_SESSION["user"]["email"]?></td>
              <th><?=$_SESSION["user"]["Address"]?></th>
              <td><?=$_SESSION["user"]["Phone"]?></td>
              </tr>
          </tbody>
          </table>     
    </div>
  </div>
  


<div class="col-md-6 pl-5">
  <div class="row justify-content-end">
    <div class="col-md-7">
      <div class="row">
        <div class="col-md-12 text-right border-bottom mb-5">
          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <span class="text-black">TỔNG TIỀN</span>
        </div>
        <div class="col-md-6 text-right">
          <strong class="text-black"><?=number_format($tongtien,0,",",".")?> VNĐ</strong>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='<?=BASE_PATH?>thanhtoan'"><strong>THANH TOÁN</strong></button>
        </div>
      </div>
    </div>
  </div>
</div>

</div>



          <div id="cart">
            <div class="row mb-5">
              <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                  <table class="table" >
                    <thead >
                      <tr>
                        <th class="product-thumbnail">Sản Phẩm</th>
                        <th class="product-name">Tên Sản Phẩm</th>
                        <th class="product-price">Giá</th>
                        <th class="product-quantity">Số Lượng</th>
                        <th class="product-total">Tổng </th>
                      </tr>
                    </thead>
                    <tbody >
                      <?=$html_cart?>
                    </tbody>
                  </table>
                </div>
              </form>
            </div>
      
         

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once "FooterView.php"; ?>