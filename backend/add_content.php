<form action="./api/edit_all.php" method="post" enctype="multipart/form-data">
  <div class="mb-3 mt-3">
    <!-- <img src="../images/{$$_GET['id']}" alt=""> -->
    <label for="img" class="form-label">Image:</label>
    <input type="file" class="form-control" id="img" name="img">
  </div>
  <div class="mb-3">
    <label for="title" class="form-label">Title:</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Text:</label>
    <input type="text" class="form-control" id="text" name="text">
    <input type="hidden" name="table" value="<?=$_GET['table']?>">
  </div>
  <button type="submit">submit</button>
</form>

