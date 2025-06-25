<?php
session_start();
if (!isset($_SESSION['menu'])) {
    $_SESSION['menu'] = [];
}

if (
    isset($_POST['menu-code']) &&
    isset($_POST['menu-name']) &&
    isset($_POST['menu-price']) &&
    isset($_POST['menu-image']) &&
    !empty($_POST['menu-code']) &&
    !empty($_POST['menu-name']) &&
    !empty($_POST['menu-price']) &&
    !empty($_POST['menu-image'])
) {
    $menu = [
        'code' => $_POST['menu-code'],
        'name' => $_POST['menu-name'],
        'price' => intval($_POST['menu-price']),
        'image' => $_POST['menu-image']
    ];

    if (!isset($_SESSION['menu'][$_POST['menu-code']])) {
        $_SESSION['menu'][$_POST['menu-code']] = $menu;
    } else {
        echo "<script>alert('Menu dengan kode tersebut sudah ada.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Menu</title>
    <link rel="stylesheet" href="Assets/CSS/style.css">
    <script src="JQuery/jquery-3.5.1.min.js"></script>
</head>
<body>
    <h1 class="page-title">Create Menu</h1>
    <form class="menu-input" method="POST" action="index.php" id="menu-form">
        <label for="menu-code">Menu Code</label><br>
        <input type="text" name="menu-code" id="menu-code"><br>
        <label for="menu-name">Menu Name</label><br>
        <input type="text" name="menu-name" id="menu-name"><br>
        <label for="menu-price">Menu Price</label><br>
        <input type="text" name="menu-price" id="menu-price"><br>
        <label for="menu-image">Menu Image URL</label><br>
        <input type="url" name="menu-image" id="menu-image"><br>
        <input type="submit" id="submit" value="Submit">
    </form>
    <br>
    <a class="hyperlink" href="order.php">Order Menu</a>

    <script>
        $(document).ready(function () {
            $("#menu-form").submit(function (e) {
                let code = $("#menu-code").val().trim();
                let name = $("#menu-name").val().trim();
                let price = $("#menu-price").val().trim();
                let image = $("#menu-image").val().trim();

                if (code === "" || name === "" || price === "" || image === "") {
                    alert("Semua field harus diisi!");
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
