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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <scrip src="JQuery/jquery-3.5.1.min.js">
        </script>
        
    <link rel="stylesheet" href="Assets/CSS/style.css">
</head>

<body>
    <div>
        <h1 class="page-title">Menu</h1>
        <?php
        if (!empty($_SESSION['menu'])) {
            foreach ($_SESSION['menu'] as $order_code => $menu) {
                include("Snippets/menuCard.php");
            }
        }
        ?>
    </div>
    <div>
        <h2>Your Order</h2>
        <table>
            <tr>
                <th>Menu</th>
                <th>Item Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
            <?php
            if (!empty($_SESSION['orders'])) {
                $totalBill = 0;
                foreach ($_SESSION['orders'] as $orderCode => $quantity) {

                    if (isset($_SESSION['menu'][$orderCode])) {
                        $menuItem = $_SESSION['menu'][$orderCode];
                        $total = $menuItem['price'] * $quantity;
                        $itemName = $menuItem['name'];
                        $itemPrice = $menuItem['price'];
                        $totalBill += $total;
                        echo <<<html
                        <tr>
                            <td>{$itemName}</td>
                            <td>{$itemPrice}</td>
                            <td>{$quantity}</td>
                            <td>{$total}</td>
                        </tr>
                        html;
                    }
                }
                echo "<td colspan='3'>Total Bill</td><td>{$totalBill}</td>";
            }
            ?>
        </table>
    </div>
</body>

</html>