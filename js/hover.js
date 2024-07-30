// 讓Explore Food section的.overHidden可以生效，因為overflow:hidden只要圖層上其他東西便無法生效，因此需要以js方式呈現動畫效果
$(document).ready(function(){

    const grayBg = $(".text-bottom");
    const imgs = $(".card-img-top");
    grayBg.hover(function(){
        // this需在事件內才可生效
        // console.log($(this));
        const bottomId = $(this).data("bottom-id");
        // console.log("bottomId: ", bottomId);
        const img = $(`#img-${bottomId}`);
        // console.log("img: ", img);
        img.addClass("imgBig");
    }, function(){
        const bottomId = $(this).data("bottom-id");
        const img = $(`#img-${bottomId}`);
        img.removeClass("imgBig");
    })
})