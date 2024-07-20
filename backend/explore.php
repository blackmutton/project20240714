
<!-- categories start -->
<section class="container text-center mt-3">
    <h2>Explore Food</h2>
    <div class="row mt-3">
    <?php
            $rows=$Explore->all();
            foreach($rows as $row){
            ?>
            <div class="col-12 col-lg-4">
                <div class="card m-auto" style="width:400px">
                    <img class="card-img-top" src="../images/<?=$row['img']?>" alt="Card image" style="width:100%">
                    <div class="card-img-overlay text-bottom">
                        <div class="trans-bg">
                            <h4 class="card-title"><?=$row['title']?></h4>
                            <p class="card-text"><?=$row['text']?>
                            </p>
                            <a href="?do=change_content&id=<?=$row['id']?>" class="btn btn-primary">Change Content</a>
                            <a href="?do=del_content&id=<?=$row['id']?>" class="btn btn-primary">Delete Content</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="trans-bg">
                    <a href="?do=add_content" class="btn btn-primary">Add Content</a>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- categories end -->