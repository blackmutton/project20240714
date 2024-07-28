<?php
include "db.php";

$chk=$User->count($_POST);

if($chk){
    $_SESSION['user']=$_POST['acc'];
}
if($_POST['acc'] == "admin" && $_POST['pw'] == '1234') {
    $_SESSION['login'] = 1;
  }

echo $chk;
?>