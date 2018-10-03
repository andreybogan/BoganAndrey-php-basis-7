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

  <h1>Регистрация пользователя</h1>

  <?php if (isset($errors)): ?>
    <?php foreach ($errors as $error): ?>
      <p style="color: red;"><?= $error ?></p>
    <?php endforeach; ?>
  <?php endif; ?>

  <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
    <p>
      <label for="login">Имя пользователя:</label>
      <input type="text" id="login" name="reg[login]" value="<?= $login ?>" size="30">
    </p>
    <p>
      <label for="password">Пароль:</label>
      <input type="password" id="password" name="reg[pass]" value="<?= $pass ?>" size="30">
    </p>
    <p><input type="submit" name="reg[submit]" value="Зарегистрироваться" style="width: auto;"></p>
  </form>

</body>
</html>