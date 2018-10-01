<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $arrProduct['name'] ?></title>
  <link rel="stylesheet" href="./global/css/style.css">
</head>
<body>

  <?php
  // Вставляем шапку сайта.
  include "header.php"
  ?>

  <a href="index.php">Вернуться в каталог товаров.</a>

  <h1><?= $arrProduct['name'] ?></h1>
  <p><?= $arrProduct['text'] ?></p>
  <p>Цена: <?= $arrProduct['price'] ?></p>
  <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" style="margin-bottom: 36px">
    <input type="hidden" name="id_prod" value="<?= $arrProduct['id_prod'] ?>">
    <input type="submit" name="submitAddBasket" class="submit" value="Добавить в корзину">
  </form>

  <?php foreach ($arrProductImg as $value): ?>
    <a href="./images/big/<?= $value['img'] ?>" target="_blank" style="display: inline-block;">
      <img src="./images/small/<?= $value['img'] ?>" alt="">
    </a>
  <?php endforeach; ?>

</body>
</html>