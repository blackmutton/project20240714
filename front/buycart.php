<?php
// dd($_SESSION['cart']);
if(!isset($_SESSION['user'])){
    to("?do=login");
    exit();
}
?>
<div class="container">
    <h2 class="text-center mt-2"><?=$_SESSION['user']?>的購物車</h2>
    <?php
    if(isset($_SESSION['cart'])){
    ?>
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>品項</th>
          <th>總金額</th>
          <th>取貨地點</th>
          <th>刪除</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $rows = $Order->all(" where `user`='{$_SESSION['user']}'");
        foreach ($rows as $row) {
        ?>
          <tr>
            <td><?= $row['food'] ?></td>
            <td><?= $row['total'] ?></td>
            <td><?= $row['customer_address'] ?></td>
            <td><button data-id="<?=$row['id']?>" data-do="Order" class="btn btn-danger del">Delete</button></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <?php
    }else{
        echo "<h3 class='text-center mt-5'>尚未購入商品，歡迎選購喔!</h3>";
    }
    ?>
</div>