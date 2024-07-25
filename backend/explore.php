
<!-- categories start -->
<section class="container text-center mt-3">
    <h2>Explore Food</h2>
    <div class="row mt-3">
    <?php
            $rows=${ucfirst($do)}->all();
            foreach($rows as $row){
            ?>
            <div class="col-12 col-lg-4">
                <div class="card m-auto overHidden" style="width:400px">
                    <img class="card-img-top" src="../images/<?=$row['img']?>" alt="Card image" style="width:100%" id="img-<?=$row['id']?>">
                    <div class="card-img-overlay text-bottom" data-bottom-id ="<?=$row['id']?>">
                        <div class="trans-bg">
                            <h4 class="card-title"><?=$row['title']?></h4>
                            <p class="card-text"><?=$row['text']?>
                            </p>
                            <a href="?do=change_content&id=<?=$row['id']?>&table=<?=ucfirst($do)?>" class="btn btn-primary">Change Content</a>
                            <!-- 因為有被include到admin.php所以可抓到$do -->
                            <button data-id="<?=$row['id']?>" data-do="<?=$do?>" class="btn btn-danger del">Delete Content</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="container mt-5">
            <div class="row text-center">
                <div class="col-12">
                    <div class="trans-bg">
                    <a href="?do=add_content&table=<?=ucfirst($do)?>" class="btn btn-success">Add Content</a>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- categories end -->

<script>
   
    
</script>