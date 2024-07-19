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
</head>

<body>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark text-center">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./images/01.jpg" alt="Logo" style="width:40px;" class="rounded-pill">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=explore">Explore Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=menu">Food Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=logout">Logout</a>
                </li>
            </ul>

        </div>
    </nav>
    <!-- navbar end -->
    <?php
    $do=$_GET['do']??'explore';
    $file="./backend/{$do}.php";
    if(file_exists($file)){
        include $file;
    }else{
        include "./backend/explore.php";
    }
    ?>
    <!-- footer start -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights perserved by tong.</p>
        </div>
    </section>
    <!-- footer end -->
</body>

</html>