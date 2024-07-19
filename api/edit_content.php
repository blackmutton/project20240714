<?php
include "db.php";
dd($_POST);
/* Array
(
    [title] => 1
    [text] => 01
    [id] => 1
    [img] =>Predator_Wallpaper_01_3840x2400.jpg        
) */
dd($_FILES);
/* Array
(
    [img] => Array
        (
            [name] => Predator_Wallpaper_01_3840x2400.jpg
            [full_path] => Predator_Wallpaper_01_3840x2400.jpg
            [type] => image/jpeg
            [tmp_name] => C:\xampp\tmp\phpA443.tmp
            [error] => 0
            [size] => 7803881
        )

) */


if(!empty($_FILES['img']['tmp_name'])){
    $img=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$img);
    $_POST['img']=$img;
    $tmp=a2s($_POST);
    dd($tmp);
 /*    Array
(
    [0] => `title`='1'
    [1] => `text`='01'
    [2] => `id`='1'
    [3] => `img`='Predator_Wallpaper_01_3840x2400.jpg'
) */
$sql="update `explore` set " . join(",",$tmp);
$sql.=" where `id`='{$_POST['id']}'";
$pdo->exec($sql);
}

header("location:../admin.php");

?>
