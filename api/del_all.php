<?php
include_once "db.php";
dd($_POST);
$db=${ucfirst($_POST['table'])};
dd($db);

if(isset($_POST['id'])&& isset($_POST['table'])){
    $db->del("{$_POST['id']}");
}



