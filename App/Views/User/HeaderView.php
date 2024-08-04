<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.png">

    <title><?php 
        if($titlepage!="") echo $titlepage;
        else echo "Rabbit Vivu";
        ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=BASE_PATH?>Public/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?=BASE_PATH?>Public/template/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?=BASE_PATH?>Public/template/assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="<?=BASE_PATH?>Public/template/assets/css/owl.css">
    <link rel="stylesheet" href="<?=BASE_PATH?>Public/template/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    
    
  </head>

<body style="font-family: 'Roboto Mono', monospace;">

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="<?=BASE_PATH?>index" class="logo">
                        <img src="<?=BASE_PATH?>Public/template/assets/images/logo.jpg" alt="logo" style=" max-width: 100px; padding: 20px 0px">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">

                        <li>
                          <div style="margin-bottom: 100px;">
                            <!-- <form action="<?=BASE_PATH?>product/search/" method="post"> -->
                            <form action="search.php" method="post">
                            <div>
                            <input style="max-width: 250px; max-height: 40px; border-radius: 10px;" type="search" name="kyw" placeholder="  Tìm kiếm...">
                            <button class="btn " type="submit" name="btnsearch" ><i class="fa fa-search"></i></button>
                            </div>
                            </form>
                          </div> 
                        </li>   
                               
                        <li>
                          <a href="<?=BASE_PATH?>product">Ip mới nhất</a>
                        </li>
                        <li>
                          <a href="<?=BASE_PATH?>viewcart">Giỏ hàng</a>
                        </li>
                        
                      
                        <li>
                          <a href="<?=BASE_PATH?>cart"><i class="fa fa-cart-shopping"></i></a>
                        </li>
                        
                        <?php
                        if(isset($_SESSION['user']))
                        {
                          echo'  
                          <li>
                          <a href="'.BASE_PATH.'profile"> Xin chào '.$_SESSION['user']['username'].'</a>                             
                          </li>';
                          echo'  <li>
                                    <a href="'.BASE_PATH.'logout">Đăng xuất</a>
                                  </li>';
                        }
                        else{
                          echo'<li>
                                  <a href="'.BASE_PATH.'login">Đăng nhập</a>
                                </li>';
                          echo' 
                                <li>
                                  <a href="'.BASE_PATH.'signin">Đăng kí</a>
                                </li>';
                        }
                        ?>
                     
                      
                          
                    </ul> 
                
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->