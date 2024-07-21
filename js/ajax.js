$(document).ready(function(){

    const del=$(".del");
    del.click(function(){
     console.log('this', this);
     console.log('$(this)', $(this));

     let nowBtn = $(this);
     const id=nowBtn.data("id")
     const table=nowBtn.data("do")
     const data={'id':id,'table':table}

     console.log('id',id)
     console.log('table',table)

     // 因為include到admin.php，因此層級也是從admin.php開始算
     let url="./api/del_all.php";

     $.ajax({
         type:"post",
         url:url,
         data:data,
         // dataType:"json",
         success: function(res){
             console.log('res',res)
             window.location.reload();

         }, error: function(err){
             console.log("err: ", err)
         }
         })
     })
})