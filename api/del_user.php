<?php
include "db.php";
dd($_POST);
foreach($_POST['ids'] as $id){
    $User->del($id);
}