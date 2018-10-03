<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Регистрация пользователя</title>
  <link rel="stylesheet" href="./global/css/style.css">
</head>
<body>

  <?php
  // Вставляем шапку сайта.
  include "header.php"
  ?>

  <a href="index.php">Вернуться в каталог товаров.</a>

  <?php if (isset($_SESSION['user'])): ?>
    <h1>Здравствуйте <?= $_SESSION['user'] ?></h1>
  <?php else: ?>
    <p>Эту страницу могу просматривать только зарегистрированные пользователи.</p>
  <?php endif; ?>

</body>
</html>