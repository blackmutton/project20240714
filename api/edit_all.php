<?php
include "db.php";
dd($_POST);
/* Array
(
    [title] => 99
    [text] => 77
    [id] => 1
    [table] => Explore
)
 */
// dd($_FILES);
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
$db=$_POST['table'];
if(isset($_POST['footer'])){
    $_POST['footer'] = nl2br($_POST['footer']);
}
dd($_POST);


if(!empty($_FILES['img']['tmp_name'])){
    $img=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$img);
    /* $_POST['img']=$img;
    $tmp=a2s($_POST);
    dd($tmp); */
 /*    Array
(
    [0] => `title`='1'
    [1] => `text`='01'
    [2] => `id`='1'
    [3] => `img`='Predator_Wallpaper_01_3840x2400.jpg'
) */
/* $sql="update `explore` set " . join(",",$tmp);
$sql.=" where `id`='{$_POST['id']}'";
$pdo->exec($sql); */
$_POST['img']=$_FILES['img']['name'];

// dd($_POST);
}
unset($_POST['table']);
${$db}->save($_POST);
$do=mb_strtolower($db);

to("../admin.php?do=$do");

?>
