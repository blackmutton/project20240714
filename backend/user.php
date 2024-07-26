<fieldset>
    <legend class="text-center">帳號管理</legend>
    <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>帳號</th>
        <th>密碼</th>
        <th>刪除</th>
      </tr>
    </thead>
    <tbody>
        <?php
    $rows=${ucfirst($do)}->all();
    foreach($rows as $row){
        ?>
      <tr>
        <td><?=$row['acc']?></td>
        <td><?=str_repeat("*",strlen($row['pwd']))?></td>
        <td><input type="checkbox" name="del" value="<?=$row['id']?>"></td>
      </tr>
      <?php
    }
      ?>
    </tbody>
  </table>
  <div class="text-center">
    <button onclick="user_del()" class="btn btn-danger">確定刪除</button>
    <button onclick="clean()" class="btn btn-primary">清空選取</button>
  </div>
</fieldset>

<script>
  function user_del(){
    let chks=$("input[type='checkbox']:checked")
    // console.log('chks',chks)
    // chks是object，所以無法使用foreach
    let ids=new Array()
    
    if(chks.length>0){
      for(let i=0;i<chks.length;i++){
        ids.push(chks[i].value)
      }
      $.ajax({
        type:"post",
        url:"./api/del_user.php",
        data:{ids},
        success:(res)=>{
          console.log(res)
          // 移除對應的表格行
          ids.forEach(id=>$(`input[value='${id}']`).parents('tr').remove())
          // location.reload();
        }
      })
    }else{
      alert("沒有帳號需刪除")
      }
  }
</script>