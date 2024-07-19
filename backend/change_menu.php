<form action="./api/edit_menu.php" method="post" enctype="multipart/form-data">
  <div class="mb-3 mt-3">
    <label for="img" class="form-label">Image:</label>
    <input type="file" class="form-control" id="img" name="img">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Title:</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price:</label>
    <input type="number" class="form-control" id="price" name="price">
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Desc:</label>
    <input type="text" class="form-control" id="desc" name="desc">
  </div>
  <input type="hidden" name="id" value="<?=$_GET['id']?>">
  <button type="submit">submit</button>
</form>

