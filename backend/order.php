<div class="container">

  <fieldset>
    <legend class="text-center">訂單確認</legend>
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th>品項</th>
          <th>數量</th>
          <th>下單日期</th>
          <th>下單用戶</th>
          <th>取貨人姓名</th>
          <th>送貨地址</th>
          <th>電話</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $rows = ${ucfirst($do)}->all();
        foreach ($rows as $row) {
        ?>
          <tr>
            <td><?= $row['food'] ?></td>
            <td><?= $row['quantity'] ?></td>
            <td><?= $row['order_date'] ?></td>
            <td><?= $row['user'] ?></td>
            <td><?= $row['customer_name'] ?></td>
            <td><?= $row['customer_address'] ?></td>
            <td><?= $row['customer_contact'] ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </fieldset>
</div>