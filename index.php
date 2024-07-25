<?php
include "./api/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/hover.js"></script>
</head>

<body>
    <!-- navbar start -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark text-center">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="./images/01.jpg" alt="Logo" style="width:40px;" class="rounded-pill">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="?do=main">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=main#explore">Explore Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=main#food-menu">Food Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=main#footer">Contact</a>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_SESSION['user'])){
                        echo "<a href='admin.php' class='nav-link'>Welcome, {$_SESSION['user']}</a>";
                        echo "<button onclick='location.href=&#39;./api/logout.php&#39;' class='btn btn-primary'>登出</button>";
                    }else{
                        
                       echo "<a class='nav-link' href='?do=login'>Login</a>";
                    }
                    ?>
                </li>
            </ul>

        </div>
    </nav>
    <!-- navbar end -->
    <?php
    $do=$_GET['do']??'main';
    $file="./front/{$do}.php";
    if(file_exists($file)){
        include $file;
    }else{
        include "./front/main.php";
    }
    ?>
</body>

</html>