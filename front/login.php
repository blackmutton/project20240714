<fieldset style="width:60%;margin:20px auto">
  <legend>會員登入</legend>
  <table>
    <tr>
      <td>帳號:</td>
      <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
      <td>密碼：</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
      <td>
        <button onclick="login()" class="btn btn-primary">登入</button>
        <button onclick="clean()" class="btn btn-warning">清除</button>
    </td>
      <td>
      <a href="?do=forgot">忘記密碼</a>
      <a href="?do=reg">尚未註冊</a>
      </td>
    </tr>
  </table>
</fieldset>
<script>
function login(){
  $.ajax({
    type:"post",
    url:"./api/chk_acc.php",
    data:{acc:$("#acc").val()
    },
    success:function(chkAcc){
      // console.log('chkAcc',chkAcc)
      if(Number(chkAcc)==1){
        $.ajax({
          type:"post",
          url:"./api/chk_pwd.php",
          data:{
            acc:$("#acc").val(),
            pwd:$("#pw").val()
          },success:(chkPw)=>{
            if(Number(chkPw)){
              if($("#acc").val()=='admin'){
                location.href="admin.php"
              }else{
                location.href="index.php"
              }
            }else{
              // console.log('chkPw',chkPw)
              alert("密碼錯誤")
            }
          }
        })
      }else{
        alert("查無帳號")
      }
    }, error: function(err){
             console.log("err: ", err)
         }
  })
}
function clean(){

}
</script>
