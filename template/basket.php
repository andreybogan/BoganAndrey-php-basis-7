<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Корзина</title>
  <link rel="stylesheet" href="./global/css/style.css">
</head>
<body>

  <?php
  // Вставляем шапку сайта.
  include "header.php"
  ?>

  <a href="index.php">Вернуться в каталог товаров.</a>

  <h1>Корзина</h1>

  <?php if ($arrProdInBasket == null) : ?>

    <p>Корзина пуста, начните ваши покупки.</p>

  <?php else: ?>

    <?php foreach ($arrProdInBasket as $value): ?>
      <div class="itemBasket">
        <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">
          <label for="<?= $value['id_prod'] ?>"><?= $value['name'] ?> - <?= $value['amount'] ?> шт. </label>
          <input type="hidden" name="id_prod" id="<?= $value['id_prod'] ?>" value="<?= $value['id_prod'] ?>">
          <input type="submit" name="submitRemoveBasket" class="submit" value="-">
          <input type="submit" name="submitAddBasket" class="submit" value="+">
        </form>
      </div>
    <?php endforeach; ?>

  <?php endif; ?>

</body>
</html>