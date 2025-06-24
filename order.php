<?php
session_start();

if (!isset($_SESSION['orders'])) {
    $_SESSION['orders'] = [];
}

if (isset($_POST['order_code']) && isset($_SESSION['menu'][$_POST['order_code']])) {
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
</head>

<body>
    <div>
        <h1>Menu</h1>
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
                <th>Price</th>
                <th>Amount</th>
                <th>Total Price</th>
            </tr>
            <?php
            if (!empty($_SESSION['orders'])) {
                foreach ($_SESSION['orders'] as $orderCode => $quantity) {
                    if (isset($_SESSION['menu'][$orderCode])) {
                        $menuItem = $_SESSION['menu'][$orderCode];
                        $total = $menuItem['price'] * $quantity;
                        $itemName = htmlspecialchars($menuItem['name']);
                        $itemPrice = htmlspecialchars($menuItem['price']);
                        
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
            }
            ?>
        </table>
    </div>
</body>

</html>