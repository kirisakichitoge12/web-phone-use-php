<?php
    session_start();
    if(!isset($_SESSION['giohang'])){
        $_SESSION['giohang']=[];
    }
    require_once "App\Config\DatabaseConfig.php";
    require_once "vendor/autoload.php";


    use App\Route\Route;
    
   
    
    
    Route::add('/admin/getlogin', 'AdminController@getlogin');
    Route::add('/admin/login', 'AdminController@login');
    Route::add('/admin/logout', 'AdminController@logout');

    if(isset($_SESSION["admin"]))//đã đăng nhập
    {
        Route::add('/admin/dashboard', 'AdminController@index');
        Route::add('/admin/category', 'AdminController@categoryadmin');
        Route::add('/admin/product', 'AdminController@productadmin');
        Route::add('/admin/bill', 'AdminController@billadmin');
        Route::add('/admin/addnew', 'AdminController@addadmin');
        Route::add('/admin/postadmin', 'AdminController@postadmin');
        Route::add('/admin/editproduct/(\d+)', 'AdminController@geteditadmin');
        Route::add('/admin/posteditadmin/(\d+)', 'AdminController@posteditadmin');
        Route::add('/admin/deleteadmin/(\d+)', 'AdminController@deleteadmin');
    }
    
  
        // Define routes
    Route::add('/', 'HomeController@index');
    Route::add('/index', 'HomeController@index');
    Route::add('/product', 'ProductController@index');
    Route::add('/product/detail/(\d+)', 'ProductController@detail');
    Route::add('/product/idcatalog/(\d+)', 'ProductController@index');
    Route::add('/product/search/(\w+)', 'ProductController@index');
    Route::add('/product/sotrang/(\d+)', 'ProductController@index');
    Route::add('/productstyle', 'ProductController@productstyle');
    Route::add('/cart', 'CartController@index');
    Route::add('/viewcart', 'CartController@index');
    Route::add('/addcart', 'CartController@addcart');
    Route::add('/deletecart', 'CartController@deletecart');
    Route::add('/deleteproduct/(\d+)', 'CartController@deleteproduct');
    Route::add('/checkout', 'BillController@checkout');
    Route::add('/thanhtoan', 'BillController@thanhtoan');
    Route::add('/profile', 'UserController@profile');
    Route::add('/geteditprofile', 'UserController@geteditprofile');
    Route::add('/posteditprofile', 'UserController@posteditprofile');
    Route::add('/taikhoancuatoi', 'UserController@profile');
    Route::add('/login', 'UserController@index');
    Route::add('/logout', 'UserController@logout');
    Route::add('/signin', 'UserController@signin');
    
   




  
    
    $uri = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
    Route::dispatch($uri);

