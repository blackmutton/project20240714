<?php
include "./api/db.php";
?>
    <!-- food search start -->
    <section class="food-search text-center">
        <div class="container justify-content-center">

            <div class="row">

                <div class="col-md-8">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control input-text" placeholder="Search products...."
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-warning btn-lg" type="button"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </section>
    <!-- food search end -->
    <!-- categories start -->
    <section class="container text-center mt-3" id="explore">
        <h2>Explore Food</h2>
        <div class="row mt-3">
            <?php
            $rows=$Explore->all();
            foreach($rows as $row){
            ?>
            <div class="col-12 col-lg-4">
                <div class="card m-auto overHidden" style="width:400px">
                    <img class="card-img-top" src="../images/<?=$row['img']?>" alt="Card image" style="width:100%" id="img-<?=$row['id']?>">
                    <!-- html對大小寫不敏感，因此若是設data-bottomId會被抓成data-bottomid -->
                    <div class="card-img-overlay text-bottom" data-bottom-id ="<?=$row['id']?>">
                        <div class="trans-bg">
                            <h4 class="card-title"><?=$row['title']?></h4>
                            <p class="card-text"><?=$row['text']?>
                            </p>
                            <a href="#" class="btn btn-primary">See Profile</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            </div>
    </section>
    <!-- categories end -->
    <!-- food-menu start -->
    <section class="food-menu mt-4 text-center" id="food-menu">
        <div class="container">
            <h2>Food Menu</h2>
            <div class="row">
            <?php
            $rows=$Menu->all();
            foreach($rows as $row){
            ?>
                <div class="col-12 col-lg-6">
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="./images/<?=$row['img']?>" alt="" class="img-responsive img-curve">
                        </div>
                        <div class="food-menu-desc">
                            <h4><?=$row['title']?></h4>
                            <p><?=$row['price']?></p>
                            <p><?=$row['desc']?></p>
                            <a href="#" class="btn btn-primary">order now</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
                
        </div>
    </section>
    <!-- food-menu end -->
    <!-- social start -->
    <section class="social mt-4">
        <div class="container text-center">
            <div class="row">
                <div class="col-12 col-lg-4"><a href=""><img width="48" height="48"
                            src="https://img.icons8.com/fluency/48/facebook-new.png" alt="facebook-new" /></a></div>
                <div class="col-12 col-lg-4"><a href=""><img width="50" height="50"
                            src="https://img.icons8.com/ios-filled/50/twitterx--v1.png" alt="twitterx--v1" /></a></div>
                <div class="col-12 col-lg-4"><a href=""><img width="48" height="48"
                            src="https://img.icons8.com/fluency/48/instagram-new.png" alt="instagram-new" /></a></div>
            </div>
        </div>
    </section>
    <!-- social end -->

    <script>
        $(document).ready(function(){

        const grayBg = $(".text-bottom");
        const imgs = $(".card-img-top");
        grayBg.hover(function(){
            // this需在事件內才可生效
            console.log($(this));
            const bottomId = $(this).data("bottom-id");
            console.log("bottomId: ", bottomId);
            const img = $(`#img-${bottomId}`);
            console.log("img: ", img);
            img.addClass("imgBig");
        }, function(){
            const bottomId = $(this).data("bottom-id");
            const img = $(`#img-${bottomId}`);
            img.removeClass("imgBig");
        })
    })
    </script>