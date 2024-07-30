<?php
include "db.php";

unset($_SESSION['user']);
// 若是不unset $_SESSION['login']，下次換其他帳號login時便可直接透過網址進入後台
unset($_SESSION['login']);
to("../index.php");
?>