<?php
if(isset($menu)){
    echo <<< html
            <div class="card">
            <img class="menu-image" src="{$menu['image']}" alt="{$menu['name']}">
            <p class="menu-code">code: {$menu['code']}</p>
            <h3 class="menu-name">{$menu['name']}</h3>
            <p class="menu-price">Rp {$menu['price']}</p>
            <form method="POST" action="order.php">
                <input type="hidden" name="order_code" value={$menu['code']}>
                <button type="submit" class="pilih-btn">
                    Pilih
                </button>
            </form>
        </div>
    html;
}
?>