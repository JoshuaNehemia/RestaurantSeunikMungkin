<?php
session_start();
if (!isset($_SESSION['menu'])) {
    $_SESSION['menu'] = [];
}
if (isset($_POST['menu-code']) && isset($_POST['menu-name']) && isset($_POST['menu-price']) && isset($_POST['menu-image'])) {
    $menu = ['code' => $_POST['menu-code'], 'name' => $_POST['menu-name'], 'price' => $_POST['menu-price'], 'image' => $_POST['menu-image']];
    $_SESSION['menu'][$_POST['menu-code']] = $menu;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Menu</title>
</head>
<scrip src="JQuery/jquery-3.5.1.min.js">
    </script>

    <body>
        <h1>Create Menu</h1>
        <form method="POST" action="index.php">
            <label for="menu-code">Insert Menu Code</label><br>
            <input type="textbox" name="menu-code" id="menu-code"><br>
            <label for="menu-name">Insert Menu Name</label><br>
            <input type="textbox" name="menu-name" id="menu-name"><br>
            <label for="menu-price">Insert Menu Price</label><br>
            <input type="textbox" name="menu-price" id="menu-price"><br>
            <label for="menu-name">Insert Menu Image URL</label><br>
            <input type="textbox" name="menu-image" id="menu-image"><br>
            <input type="submit" id="submit">
        </form>
        <a href="order.php">Order Menu</a>
    </body>

</html>