<?php
// 如果直接到後台，需先登入管理員帳號，並且在admin.php得到$_SESSION['login']，才可看到後台
if (isset($_SESSION['login'])) {

?>

<!-- navbar start -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark text-center">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="./images/01.jpg" alt="Logo" style="width:50px;" class="rounded-pill">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=user">Manage Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=explore">Explore Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=menu">Food Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=order">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?do=footer">Footer</a>
                </li>
                <li class="nav-item">
                <button onclick="location.href='./api/logout.php'" class='btn btn-primary'>Logout</button>
                </li>
            </ul>

        </div>
    </nav>
    <!-- navbar end -->
    <?php
    $do=$_GET['do']??'user';
    $file="./backend/{$do}.php";
    if(file_exists($file)){
        include $file;
    }else{
        include "./backend/user.php";
    }
    ?>

<?php
} else {
    // $error由admin.php得到
    if (isset($error)) {
        echo "<div style='color:red;text-align:center'>$error</div>";
    }
?>
<div class="container mt-3">
  <h2 class=text-center>管理員登入</h2>
  <form action="?" method='post'>
    <div class="mt-3">
      <label class="form-label" for="acc">帳號:</label>
      <input class="form-control" type="text" name="acc" id="acc">
    </div>
    <div class="mt-3">
      <label class="form-label" for="pwd">密碼:</label>
      <input class="form-control" type="password" name="pwd" id="pw" class="form-control" >
    </div>
    <div class="mt-3 text-end">
      
    <input type="submit"  class="btn btn-primary mx-1" value="登入">
    <input type="reset" class="btn btn-warning" value="清除">
        <a href="index.php">回首頁</a>
    </div>
</form>
</div>
<?php
}
?>