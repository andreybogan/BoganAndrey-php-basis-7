<header>
  <div class="shop_name">Это самый лучший магазин</div>
  <a href="basket.php">
    <button>КОРЗИНА
      <?php if (AMOUNT_BASKET > 0) : ?>
        (<?= AMOUNT_BASKET ?>)
      <?php endif; ?>
    </button></a>
</header>