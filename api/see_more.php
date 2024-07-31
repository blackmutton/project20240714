<?php
include "db.php";
// 獲得當前頁碼
$page = $_GET['p'] ?? 1;
$div = 6;
$start = ($page - 1) * $div;

// 獲得一頁menu品項
$rows = $Menu->all("LIMIT $start, $div");

// 獲得總頁數
$total = $Menu->count();
$pages = ceil($total / $div);

// 生成menu HTML
$menuContent = '';
foreach ($rows as $row) {
    $menuContent .= '
        <div class="col-12 col-lg-6">
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="./images/' . $row['img'] . '" alt="" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc text-start">
                    <h4>' . $row['title'] . '</h4>
                    <p>price: $' . $row['price'] . '</p>
                    <p>desc: ' . nl2br($row['desc']) . '</p>';
    if (isset($_SESSION['user'])) {
        $menuContent .= "<a class='btn btn-primary order' data-id='{$row['id']}'>order now</a>";
    } else {
        $menuContent .= "<a href='?do=login' style='text-decoration:none'>Login to order!</a>";
    }
    $menuContent .= '
                </div>
            </div>
            <div id="modal"></div>
        </div>';
}

// 生成分頁按鈕HTML
$pagination = '';
if ($page - 1 >= 1) {
    $prev = $page - 1;
    $pagination .= "<a href='#' data-page='$prev' style='text-decoration:none'>&lt;</a> ";
}
for ($i = 1; $i <= $pages; $i++) {
    $size = ($i == $page) ? "24px" : "18px";
    $pagination .= "<a href='#' data-page='$i' style='font-size:$size; text-decoration:none'>$i</a> ";
}
if ($page + 1 <= $pages) {
    $next = $page + 1;
    $pagination .= "<a href='#' data-page='$next' style='text-decoration:none'>&gt;</a>";
}

// 返回JSON資料
echo json_encode([
    'content' => $menuContent,
    'pagination' => $pagination
]);
