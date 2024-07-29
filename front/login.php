<div class="container mt-3">
  <h2 class=text-center>會員登入</h2>
    <div class="mt-3">
      <label class="form-label" for="acc">帳號:</label>
      <input class="form-control" type="text" name="acc" id="acc">
    </div>
    <div class="mt-3">
      <label class="form-label" for="acc">密碼:</label>
      <input class="form-control" type="password" name="pw" id="pw" class="form-control" >
    </div>
    <div class="mt-3 text-end">
      
        <button class="btn btn-primary mx-1" onclick="login()">登入</button>
        <button class="btn btn-warning" onclick="clean()">清除</button>
        <a href="?do=forget">忘記密碼</a>
        <a href="?do=reg">尚未註冊</a>
    </div>

</div>
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
</script>
