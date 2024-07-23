<h2 class="text-center">Change Footer</h2>
    <form action="./api/edit_all.php" method="post" class="text-center">
  <div class="mb-3 mt-3">
    <label for="footer" class="form-label">Footer:</label>
    <?php
        $footer=${ucfirst($do)}->find(1)['footer'];
    ?>
    <input type="text" name="footer" id="footer" value="<?=$footer?>">
    </div>
    <input type="hidden" name="id" value="1">
  <input type="hidden" name="table" value="<?=ucfirst($do)?>">
  <button type="submit">submit</button>
</form>