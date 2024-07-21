<form action="/action_page.php" method="post">
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">UserName:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter username" name="name">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
  </div>
    <div class="mb-3">
        <button onclick="login()">login</button>
        <button onclick="clear()">reset</button>
    </div>
    <div>
        <a href="?do=forgot">忘記密碼</a>
        <a href="?do=reg">尚未註冊</a>
    </div>
</form>
<script>

</script>
