<div class="container mt-3">
    <h2 class=text-center>忘記密碼</h2>
    <div class="mt-3">
        <label class="form-label" for="email">請輸入信箱以查詢密碼:</label>
        <input class="form-control" type="email" name="email" id="email">
    </div>
    <div class="mt-3">
        <div id="result"></div>

    </div>
    <div class="mt-3 text-end">

        <button class="btn btn-primary" onclick="find()">尋找</button>
    </div>
    <script>
        function find() {
            $.get("./api/forget.php", {
                email: $("#email").val()
            }, (result) => {
                $("#result").text(result)
            })
        }
    </script>