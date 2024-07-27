/* 不能在$(document).ready(function(){
})內宣告function */
function clean(){
        $("input[type='text'],input[type='password'],input[type='email']").val("")
}
