<?php
$ex=$Explore->find($_GET['id']);
?>
<h2 class="text-center">Change Content</h2>
  <form action="./api/edit_all.php" method="post" enctype="multipart/form-data">
  <div style="width:100px;height:100px" class="mb-3 mt-3">
    <img src="./images/<?=$ex['img']?>" alt=""class="img-responsive">
  </div>
  <div class="mb-3">
    <label for="img" class="form-label">Image:</label>
    <input type="file" class="form-control" id="img" name="img">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Title:</label>
    <input type="text" class="form-control" id="title" name="title" value="<?=$ex['title']?>">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Text:</label>
    <input type="text" class="form-control" id="text" name="text" value="<?=$ex['text']?>">
  </div>
  <input type="hidden" name="id" value="<?=$_GET['id']?>">
  <input type="hidden" name="table" value="<?=$_GET['table']?>">
  <button type="submit" class="btn btn-outline-primary">submit</button>
</form>

