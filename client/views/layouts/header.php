<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>N9-SHOP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- Thêm thư viện jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <style>
        
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            
            <div class="col-lg-6 text-center text-lg-right">
                <!-- <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">Sign in</button>
                            <button class="dropdown-item" type="button">Sign up</button>
                        </div>
                    </div>
                    <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">EUR</button>
                            <button class="dropdown-item" type="button">GBP</button>
                            <button class="dropdown-item" type="button">CAD</button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">FR</button>
                            <button class="dropdown-item" type="button">AR</button>
                            <button class="dropdown-item" type="button">RU</button>
                        </div>
                    </div>
                </div> -->
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <i class="fa fa-user" style="font-size:36px"></i>   


                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <!-- <span class="h1 text-uppercase text-primary bg-dark px-2">Nhóm</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">2</span> -->
                    <img src="./../upload/logo1.png"  style="width:200px;height:100px"alt="">
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="?url=tim-kiem-san-pham" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="key_word" placeholder="Tìm kiếm sản phẩm">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search text-dark"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+0987 333 6666</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark-header mb-30" >
        <div class="row px-xl-5">
           
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark-header navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">N9</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">SHOP</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link-text ">Trang Chủ</a>
                            <a href="index.php?url=san-pham" class="nav-item nav-link-text ">Cửa Hàng</a>
                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="giohang.html" class="dropdown-item">Giỏ Hàng</a>
                                    <a href="index.php?url=lich-su" class="dropdown-item">Lịch sử đơn hàng</a>
                                </div>
                            </div> -->
                            <a href="index.php?url=lich-su" class="nav-item nav-link-text">Lịch sử đơn hàng</a>
                            <a href="index.php?url=lien-he" class="nav-item nav-link-text">Liên Hệ</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <?php if(isset($user)){ ?>
                               
                                <a href="" class="btn px-0  "  data-toggle="dropdown">
                                    <i class="fa fa-user text-dark" style="font-size:20px;color:red"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                        <td class="anh_account"><img width="30px" style="height:30px;border-radius:30px;margin-right:10px;margin-left: 50px;"
                                                src="../upload/<?=$user['kh_avatar']?>" alt="">
                                        </td>

                                    <div class="dropdown-item">
                                        <p  lass="name_user" style="font-weight: bold;cursor: pointer; "><?=$user['kh_name']?> </p>
                                        
                                    </div>
                                    <div><a href="index.php?url=lich-su" class="dropdown-item">Lịch sử đơn hàng</a></div>
                                    <a class="dropdown-item" href="?logout">Đăng xuất</a>
                                </div>

                            <?php }else{ ?>
                            <a href="" class="btn px-0  "  data-toggle="dropdown">
                                <i class="fa fa-user text-dark" style="font-size:25px;"></i>
                            </a>


                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="index.php?dang-nhap">Đăng Nhập</a>
                                <a class="dropdown-item" href="index.php?dang-ky">Đăng Ký</a>
                            </div>
                            <?php } ?>
                            
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-heart text-dark" style="font-size:20px"></i>
                                <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="index.php?url=gio-hang" class="btn px-0 ml-3" >
                                <i class="fas fa-shopping-cart text-dark" style="font-size:20px"></i>
                                <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;"><?= isset($_SESSION["cart"]) ?  count($_SESSION["cart"]) : 0;?></span>
                            </a>
                            
                        </div>
                        
                    </div>
                    
                </nav>
            </div>
        </div>
    </div>
    