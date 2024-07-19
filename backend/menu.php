<!-- food-menu start -->
<section class="food-menu mt-4 text-center">
        <div class="container">
            <h2>Food Menu</h2>
            <div class="row">
                <?php
                $rows=$pdo->query("select * from `menus`")->fetchAll(PDO::FETCH_ASSOC);
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
                            <a href="?do=change_menu&id=<?=$row['id']?>" class="btn btn-primary">Change Menu</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- food-menu end -->