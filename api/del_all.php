<?php
include_once "db.php";
// 因為回傳時會抓列印出來的資料，故需要註解掉dd()
// dd($_POST);
$db = ${ucfirst($_POST['table'])};
// dd($db);

if (isset($_POST['id']) && isset($_POST['table'])) {
    $db->del("{$_POST['id']}");
}
// 為了避免$.ajax的dataType因抓不到資料導致錯誤，故在這邊設定一個回傳的json資料
echo json_encode([
    'msg' => 'ok',
    'id' => $_POST['id']
]);
