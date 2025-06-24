<?php
if(isset($menu)){
    echo <<< html
            <div class="card">
            <img src="{$menu['image']}" alt="{$menu['name']}">
            <p>code: {$menu['code']}</p>
            <h3>{$menu['name']}</h3>
            <p>Rp {$menu['price']}</p>
            <p>Price: {$menu['price']}</p>
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