<style>
    td{
    text-align-last:justify
}
</style>
<fieldset  class="text-center">
    <legend>會員註冊</legend>
    <div style="color:red">請設定您要註冊的帳號及密碼</div>
    <table class="mx-auto">
        <tr>
            <td>登入帳號:</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>登入密碼:</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>再次確認密碼:</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>信箱(忘記密碼時使用):</td>
            <td><input type="email" name="email" id="email"></td>
        </tr>
        <tr>   
            <td>
                <button onclick="reg()" class="btn btn-primary">註冊</button>
                <button onclick="clean()" class="btn btn-warning">清除</button>
            </td>          
            </tr>
        </table>
</fieldset>
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
                        }
                    })
                }
            }
        })
    }
    clean();

}
</script>
