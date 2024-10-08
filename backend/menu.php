<!-- food-menu start -->
<section class="food-menu text-center">
        <div class="container">
            <h2>Food Menu</h2>
            <div class="row">
                <?php
                $rows=${ucfirst($do)}->all();
                foreach($rows as $row){
                ?>
                <div class="col-12 col-lg-6">
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="./images/<?=$row['img']?>" alt="" class="img-responsive img-curve">
                        </div>
                        <div class="food-menu-desc text-start">
                            <h4><?=$row['title']?></h4>
                            <p>price:$<?=$row['price']?></p>
                            <p>desc:<?=nl2br($row['desc'])?></p>
                            <a href="?do=change_menu&id=<?=$row['id']?>&table=<?=ucfirst($do)?>" class="btn btn-primary">Change Menu</a>
                            <button href="?do=delete_menu&id=<?=$row['id']?>" class="btn btn-danger del" data-id="<?=$row['id']?>" data-do="<?=$do?>">Delete Menu</button>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="container mt-2">
            <div class="row">
                <div class="col-12">
                    <div class="trans-bg">
                    <a href="?do=add_menu&table=<?=ucfirst($do)?>" class="btn btn-success">Add Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- food-menu end -->