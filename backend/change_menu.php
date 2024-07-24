<?php
$me=$Menu->find($_GET['id']);
?>
<h2 class="text-center">Change Menu</h2>
<form action="./api/edit_all.php" method="post" enctype="multipart/form-data">
<div style="width:100px;height:100px" class="mb-3 mt-3">
    <img src="./images/<?=$me['img']?>" alt=""class="img-responsive">
  </div>
  <div class="mb-3 mt-3">
    <label for="img" class="form-label">Image:</label>
    <input type="file" class="form-control" id="img" name="img">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Title:</label>
    <input type="text" class="form-control" id="title" name="title" value="<?=$me['title']?>">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price:</label>
    <input type="number" class="form-control" id="price" name="price" value="<?=$me['price']?>">
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Desc:</label>
    <textarea type="text" class="form-control" name="desc" id="desc" rows="5" cols="33"><?=$me['desc']?></textarea>
  </div>
  <input type="hidden" name="id" value="<?=$_GET['id']?>">
  <input type="hidden" name="table" value="<?=$_GET['table']?>">
  <button type="submit" class="btn btn-outline-primary">submit</button>
</form>

