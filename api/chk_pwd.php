<?php
include "db.php";

$chk=$User->count($_POST);

if($chk){
    $_SESSION['user']=$_POST['acc'];
}
// 讓管理員即使在一般會員登入系統也可得到進入後台權限
if($_POST['acc'] == "admin" && $_POST['pwd'] == '1234') {
    $_SESSION['login'] = 1;
  }

echo $chk;
?>