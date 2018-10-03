<header>
  <div class="shop_name">Это самый лучший магазин</div>
  <div>
    <a href="basket.php" class="link_button">
      <button>Корзина
        <?php if (AMOUNT_BASKET > 0) : ?>
          (<?= AMOUNT_BASKET ?>)
        <?php endif; ?>
      </button>
    </a>

    <?php if (isset($_SESSION['user'])) : ?>
      <a href="user.php" class="link_button">
        <button>Личная страница</button>
      </a>

      <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" style="display: inline-block;">
        <input type="submit" name="logout" value="Выйти" style="width: auto;">
      </form>
    <?php else: ?>
      <a href="login.php" class="link_button">
        <button>Войти</button>
      </a>

      <a href="register.php" class="link_button">
        <button>Регистрация</button>
      </a>
    <?php endif; ?>

  </div>
</header>