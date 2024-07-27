<div class="container mt-3">
    <h2 class=text-center>會員註冊</h2>
    <div class=text-center style="color:red">請設定您要註冊的帳號及密碼</div>
    
      <div class="mt-3">
        <label class="form-label" for="acc">登入帳號:</label>
        <input class="form-control" type="text" name="acc" id="acc">
      </div>
      <div class="mt-3">
        <label class="form-label" for="pw">登入密碼:</label>
        <input class="form-control" type="password" name="pw" id="pw" class="form-control" >
      </div>
      <div class="mt-3">
        <label class="form-label" for="pw2">再次確認密碼:</label>
        <input class="form-control" type="password" name="pw2" id="pw2" class="form-control" >
      </div>
      <div class="mt-3">
        <label class="form-label" for="email">信箱(忘記密碼時使用):</label>
        <input class="form-control" type="password" name="email" id="email" class="form-control" >
      </div>
      <div class="mt-3 text-end">
        
        <button onclick="reg()" class="btn btn-primary">註冊</button>
        <button onclick="clean()" class="btn btn-warning">清除</button>
        
      </div>
    
  </div>
<script>
function reg(){
    let user={
        acc:$("#acc").val(),
        pwd:$("#pw").val(),
        pw2:$("#pw2").val(),
        email:$("#email").val(),
    }

    if(user.acc==''||user.pwd==''||user.pw2==''||user.email==''){
        alert("不可空白")
    }else if(user.pwd!=user.pw2){
        alert("密碼欄位不一致")
    }else{
        $.ajax({
            type:"post",
            url:"./api/chk_acc.php",
            data:{acc:user.acc},
            success:(chk)=>{
                if(Number(chk)==1){
                    alert("此帳號已被使用")
                }else{
                    $.ajax({
                        type:"post",
                        url:"./api/reg.php",
                        data:user,
                        success:(res)=>{
                            // console.log(res)
                            alert("註冊完成，歡迎加入")
                            clean();
                            
                        }
                    })
                }
            }
        })
    }

}
</script>
