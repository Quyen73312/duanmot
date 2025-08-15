<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./views/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500;&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
   
</head>
<style>
.navbar {
    background-color: #4f3e96;
}
</style>

<body>
    <div class="header">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-start align-items-center">
                        <a class="navbar-brand text-white fs-3" href="">Quản trị</a>
                        <div class="collapse navbar-collapse ml-5" id="navbarNav">
                            <ul class="navbar-nav">
                                <?php foreach($MenuAdmin as $item => $value){ ?>
                                <li class="nav-item">
                                    <a class="nav-link" name="<?=$value["route"]?>"
                                        href="index.php?url=<?=$value[ "route"] ?>"><?=$value[ "name"] ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown">
                        <?php if(isset($_SESSION["user"])){ ?>
                        <img class="avatar  rounded-circle" data-bs-toggle="dropdown" aria-expanded="false"
                            src="./../upload/<?=$_SESSION["user"]["kh_avatar"]?>"
                            alt="">
                        <ul class="dropdown-menu tab-user">
                            <li><a class="dropdown-item" href="../client/index.php?logout">Đăng xuất</a></li>
                        </ul>
                        <?php }else{ ?>
                            <a class="text-white" href="#">Đăng Nhập</a>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>