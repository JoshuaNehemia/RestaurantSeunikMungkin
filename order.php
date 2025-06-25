<?php
session_start();
if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = [];
}
if (isset($_POST['order_code'])) {
    $orderCode = $_POST['order_code'];
    if (isset($_SESSION['orders'][$orderCode])) {
        $_SESSION['orders'][$orderCode]++;
    } else {
        $_SESSION['orders'][$orderCode] = 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order</title>
    <link rel="stylesheet" href="Assets/CSS/style.css">
    <script src="JQuery/jquery-3.5.1.min.js"></script>
</head>
<body>
    <h1 class="page-title">Menu</h1>
    <div class="card-container">
        <?php
        if (!empty($_SESSION['menu'])) {
            foreach ($_SESSION['menu'] as $order_code => $menu) {
                include("Snippets/menuCard.php");
            }
        }
        ?>
    </div>
    <div class="order-box">
        <h2>Your Order</h2>
        <div id="order-list"></div>
        <div id="total-bill">Total: Rp 0</div>
    </div>
    <script>
        $(document).ready(function () {
            let total = 0;
            $(".pilih-btn").click(function (e) {
                e.preventDefault();
                let button = $(this);
                let card = button.closest(".card");
                let name = card.find(".menu-name").text();
                let price = parseInt(card.find(".menu-price").text().replace("Rp ", ""));
                $("#order-list").append(
                    `<div class="order-item">${name} - Rp ${price}</div>`
                );
                button.prop("disabled", true);
                total += price;
                $("#total-bill").text("Total: Rp " + total);
            });
        });
    </script>
</body>
</html>