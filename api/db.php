<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=project20240714";
$pdo=new PDO($dsn,'root','');
function dd($arg){
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
}
function a2s($arg){
    $tmp=[];
    foreach($arg as $key=>$value){
        $tmp[]="`$key`='$value'";
    }
    return $tmp;
}