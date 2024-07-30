/* 不能在$(document).ready(function(){
})內宣告function */
// 清除front/login.php,reg.php和backend/user.php的表單資料
function clean(){
        $("input[type='text'],input[type='password'],input[type='email']").val("")
}
