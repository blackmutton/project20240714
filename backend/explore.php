
<!-- categories start -->
<section class="container text-center mt-3">
    <h2>Explore Food</h2>
    <div class="row mt-3">
    <?php
            $rows=$pdo->query("select * from `explore`")->fetchAll(PDO::FETCH_ASSOC);
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