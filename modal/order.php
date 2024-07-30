<?php
include "../api/db.php";
$order = $Menu->find($_POST['id']);
?>
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class='form-group mx-auto col-6 mt-5'>
                    <div class="container mt-3">
                        <h2 class=text-center>訂單</h2>
                        <div class="mt-3">
                            <label class="form-label" for="food">食物:</label>
                            <input class="form-control food" type="hidden" name="food" id="food" value="<?= $order['title'] ?>">
                            <span><?= $order['title'] ?></span>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="price">價格:</label>
                            <input class="form-control price" type="hidden" name="price" id="price" value="<?= $order['price'] ?>">
                            <span><?= $order['price'] ?></span>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="quantity">總數:</label>
                            <input class="form-control quantity" type="number" name="quantity" id="quantity" value="1" oninput="calculate()">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="total">總價:</label>
                            <input class="form-control total" type="number" id="total" value="<?= $order['price'] ?>">
                            <span class="total" id="restart"><?= $order['price'] ?></span>元
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="order_date">訂購日期:</label>
                            <input class="form-control order_date" type="date" name="order_date" id="order_date">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="customer_name">訂購人姓名:</label>
                            <input class="form-control customer_name" type="text" name="customer_name" id="customer_name" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="customer_contact">訂購人電話:</label>
                            <input class="form-control customer_contact" type="text" name="customer_contact" id="customer_contact" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label class="form-label" for="customer_address">訂購人地址:</label>
                            <input class="form-control customer_address" type="text" name="customer_address" id="customer_address" class="form-control">
                        </div>
                        <div class="mt-3 text-end">

                            <input type="button" value="送出" class='btn btn-primary' onclick="order()">
                            <input type="reset" value="重置" class='btn btn-warning' onclick="restart()">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // 傳送表單內容
    function order() {
        let form = {
            table: "Order",
            food: $('#food').val(),
            price: $('#price').val(),
            quantity: $('#quantity').val(),
            total: $('#total').val(),
            order_date: $('#order_date').val(),
            customer_name: $('#customer_name').val(),
            customer_contact: $('#customer_contact').val(),
            customer_address: $('#customer_address').val(),
        }
        $.post("../api/order_ajax.php", form, (res) => {
            // console.log(res);
            if(form.quantity==''||form.order_date==''||form.customer_name==''||form.customer_contact==''||form.customer_address==''){
            alert("不可空白")
    }else{

        alert('訂購成功')
        addModal.hide()
    }
        })
    }

    addModal = new bootstrap.Modal('#addModal')
    modal = document.querySelector('#addModal')
    modal.addEventListener('hidden.bs.modal', event => {
        addModal.dispose()
        $("#modal").html("")
    })
    // console.log(addModal)
    addModal.show()

    // 計算總價
    function calculate() {
        const price = Number($(".price").val())
        // console.log('price', price)
        // console.log(typeof(price))
        const quantity = Number($(".quantity").val())
        // console.log('quantity', quantity)
        const total = $(".total")
        let sum = 0;
        sum = price * quantity;
        // console.log('sum', sum)
        total.val(sum)
        total.html(sum)
    }

    // 清除span中的價格
    function restart() {
        const restart = $("#restart")
        restart.html("")
    }
</script>