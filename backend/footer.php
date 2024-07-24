<h2 class="text-center">Change Footer</h2>
    <form action="./api/edit_all.php" method="post" class="text-start">
  <div class="mb-3 mt-3">
    <label for="footer" class="form-label">Footer:</label>
    <?php
        $footer=${ucfirst($do)}->find(1)['footer'];
        /* dd($footer);
        Array
        (
            [id] => 1
            [footer] => All rights perserved by tong.
        ) */

    ?>
    <textarea type="text" class="form-control" name="footer" id="footer" rows="5" cols="33"><?=$footer?></textarea>
    </div>
    <input type="hidden" name="id" value="1">
  <input type="hidden" name="table" value="<?=ucfirst($do)?>">
  <button type="submit" class="btn btn-outline-primary">submit</button>
</form>