    <!-- food search start -->
    <section class="food-search text-center">
        <div class="container justify-content-center">

            <div class="row">

                <div class="col-md-8">

                    <div class="input-group mb-3">
                        <input id="myInput" type="text" class="form-control input-text" placeholder="Search products...." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-warning btn-lg" type="button"><i class="fa fa-search"></i></button>
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
            $rows = $Explore->all();
            foreach ($rows as $row) {
            ?>
                <div class="col-12 col-lg-4">
                    <div class="card m-auto overHidden" style="width:400px">
                        <img class="card-img-top" src="../images/<?= $row['img'] ?>" alt="Card image" style="width:100%" id="img-<?= $row['id'] ?>">
                        <!-- html對大小寫不敏感，因此若是設data-bottomId會被抓成data-bottomid -->
                        <div class="card-img-overlay text-bottom" data-bottom-id="<?= $row['id'] ?>">
                            <div class="trans-bg">
                                <h4 class="card-title"><?= $row['title'] ?></h4>
                                <p class="card-text"><?= $row['text'] ?>
                                </p>
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
                // 分頁功能
                $total = $Menu->count();
                $div=6;
                $pages=ceil($total/$div);
                $now=$_GET['p']??1;
                $start=($now-1)*$div;
                $rows=$Menu->all(" limit $start,$div");
                foreach ($rows as $row) {
                ?>
                    <div class="col-12 col-lg-6">
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="./images/<?= $row['img'] ?>" alt="" class="img-responsive img-curve">
                            </div>
                            <div class="food-menu-desc text-start">
                                <h4><?= $row['title'] ?></h4>
                                <p>price:$<?= $row['price'] ?></p>
                                <p>desc:<?= nl2br($row['desc']) ?></p>
                                <?php
                                if (isset($_SESSION['user'])) {
                                ?>
                                    <a class='btn btn-primary order' data-id="<?= $row['id']; ?>">order now</a>
                                <?php
                                } else {
                                    echo "<a href='?do=login' style='text-decoration:none'>Login to order!</a>";
                                }
                                ?>
                            </div>
                        </div>
                        <div id="modal">

                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="col-12 text-center">
                            <!-- 頁碼 -->
                            <?php
                            if($now-1>=1){
                                $prev=$now-1;
                                echo "<a href='?do=main&p=$prev#food-menu' style='text-decoration:none'>";
                                echo "<";
                                echo "</a>";
                            }
                            for($i=1;$i<=$pages;$i++){
                                $size=($i==$now)?"24px":"18px";
                                echo "<a href='?do=main&p=$i#food-menu' style='font-size:$size; text-decoration:none'>";
                                echo $i;
                                echo "</a>";
                            }
                            if($now+1<=$pages){
                                $next=$now+1;
                                echo "<a href='?do=main&p=$next#food-menu' style='text-decoration:none'>";
                                echo ">";
                                echo "</a>";
                            }
                            ?>
                        </div>
            </div>
    </section>
    <!-- food-menu end -->
    <!-- social start -->
    <section class="social mt-4">
        <div class="container text-center">
            <div class="row">
                <div class="col-12 col-lg-4"><a href=""><img width="48" height="48" src="https://img.icons8.com/fluency/48/facebook-new.png" alt="facebook-new" /></a></div>
                <div class="col-12 col-lg-4"><a href=""><img width="50" height="50" src="https://img.icons8.com/ios-filled/50/twitterx--v1.png" alt="twitterx--v1" /></a></div>
                <div class="col-12 col-lg-4"><a href=""><img width="48" height="48" src="https://img.icons8.com/fluency/48/instagram-new.png" alt="instagram-new" /></a></div>
            </div>
        </div>
    </section>
    <!-- social end -->
    <!-- footer start -->
    <section class="footer" id="footer">
        <div class="container text-center">
            <?php
            $rows = $Footer->all();
            foreach ($rows as $row) {
            ?>
                <p><?= $row['footer'] ?></p>
            <?php
            }
            ?>
        </div>
    </section>
    <!-- footer end -->
    <script>
        // 送訂單用的function
        $(document).ready(function() {
            const order = $(".order");
            order.click(function() {
                console.log('$(this)', $(this))
                let nowBtn = $(this);
                const id = nowBtn.data("id")
                const data = {
                    'id': id
                }
                $('#modal').load('./modal/order.php', data)
            })

        })

        // 搜尋網站內容用的
        $(document).ready(function() {
            const input = $("#myInput");
            // 當輸入框內容改變時執行此函數
            input.on("keyup", function() {
                const value = $(this).val().toLowerCase();
                const items = $(".col-12")

                // 過濾網頁中的品項
                items.filter(function() {
                    // $(this).text().toLowerCase()：獲取當前.col-12中的所有文本，並將其轉換為小寫。
                    // 如果indexOf找到value，它會返回value在文本中的位置（從0開始的索引）。如果沒有找到，則返回-1。
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>