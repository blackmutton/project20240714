<?php include_once "db.php";

$result = $User->find(['email' => $_GET['email']]);
if (!empty($result)) {
    echo "您的密碼:{$result['pwd']}";
} else {
    echo "查無資料";
}