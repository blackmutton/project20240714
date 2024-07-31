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
            <div class="row" id="menu-content">
                <!-- 初始内容將通過AJAX加載 -->
            </div>
            <div class="col-12 text-center">
                <div id="pagination">
                    <!-- 頁碼按鈕將通過AJAX加載 -->
                </div>
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
        /* $(document).ready(function() {
            const order = $(".order");
            // 因為變動態加載，所以需要改成$(document).on("click", order, function()
            $(document).on("click", order, function() {
                // console.log('$(this)', $(this))
                let nowBtn = $(this);
                const id = nowBtn.data("id")
                const data = {
                    'id': id
                }
                console.log('data', data)
                // $('#modal').load('./modal/order.php', data)
            })

        }) */

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

        // 在menu區中加載內容用的ajax
        $(document).ready(function() {

            function loadMoreContent(page = 1) {
                $.ajax({
                    url: "./api/see_more.php",
                    type: "GET",
                    data: {
                        p: page
                    },
                    dataType: "json",
                    success: function(data) {
                        $("#menu-content").html(data.content);
                        $("#pagination").html(data.pagination);
                        // 動態綁定order點擊事件，並跟取得分頁內容的ajax連動
                        // 移除之前綁定的點擊事件，然後重新綁定事件，否則表單會重複載入
                        $(document).off("click", ".order").on("click", ".order", function() {
                            let orderId = $(this).data('id');
                            loadOrderModal(orderId);
                        });
                    },
                    error: function(err) {
                        console.log("err: ", err)
                    }
                });
            }

            // 初始加載內容
            loadMoreContent();

            // 處理分頁點擊事件
            // $("#pagination a").on("click", function(e){}只能適用於綁定時已經存在於DOM的元素
            // 如果點擊的元素是動態加載(如ajax)產生，則必須透過$(document).on("click", "#pagination a", function(e) {}來綁定，否則只會拿到初始資料
            $(document).on("click", "#pagination a", function(e) {
                // 阻止默認的連結跳轉行為，這樣點擊時才不會跳轉或刷新頁面。
                e.preventDefault();
                let page = $(this).data("page");
                loadMoreContent(page);
            });
            // 載入表單內容
            function loadOrderModal(orderId) {
                $.ajax({
                    url: "./modal/order.php",
                    type: "POST",
                    data: {
                        id: orderId
                    },
                    success: function(res) {
                        $("#modal").html(res);
                    },
                    error: function(err) {
                        console.log("err: ", err)
                    }
                });
            }
        });
    </script>