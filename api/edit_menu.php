<?php
include "db.php";
dd($_POST);
/* Array
(
    [title] => 88
    [price] => 66
    [desc] => 99
    [id] => 1
) */


dd($_FILES);
/* Array
(
    [img] => Array
        (
            [name] => 03.jpg
            [full_path] => 03.jpg
            [type] => image/jpeg
            [tmp_name] => C:\xampp\tmp\php6CA3.tmp
            [error] => 0
            [size] => 60656
        )

)
 */


if(!empty($_FILES['img']['tmp_name'])){
    $img=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$img);
    $_POST['img']=$img;
    $tmp=a2s($_POST);
    dd($tmp);
    /* Array
(
    [0] => `title`='88'
    [1] => `price`='66'
    [2] => `desc`='99'
    [3] => `id`='1'
    [4] => `img`='03.jpg'
) */
 
$sql="update `menus` set " . join(",",$tmp);
$sql.=" where `id`='{$_POST['id']}'";
$pdo->exec($sql);
}

// header("location:../admin.php?do=menu");

?>
