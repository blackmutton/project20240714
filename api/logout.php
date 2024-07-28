<?php
include "db.php";

unset($_SESSION['user']);
unset($_SESSION['login']);
to("../index.php");
?>