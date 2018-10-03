<?php
header("Content-type: text/html; charset=utf-8");

// Поключаем файлы конфигурации и функции.
include __DIR__ . "/../global/config.php";
include GLOBAL_DIR . "fns/fns_sum.php";
include GLOBAL_DIR . "onload.php";

// Проверяем нажата ли кнопка Войти.
if ($_REQUEST['login']['submit']) {
  // Создаем короткие имена переменых.
  $login = $_POST['login']['login'] ?? '';
  $pass = $_POST['login']['pass'] ?? '';

  // Проверяем корректность заполнения формы.
  if (empty($errors = checkRegForm($_POST['login'], $login, $pass))) {
    // Добавляем регистрационную информацию в базу данных.
    if (isAuth($login, $pass)) {
      // Регистрируем идентификатор пользователя.
      $_SESSION['user'] = $login;
      // Делаем переадресацию на страницу пользователя.
      header("Location: ./user.php");
      exit;
    } else {
      $errors[] = "Неправильное имя пользователя или пароль.";
    }
  }
}

// Подключаем html страницу корзины.
renderBasket("login", ['arrProdInBasket' => $arrProdInBasket, 'errors' => $errors, 'login' => $login, 'pass' => $pass]);