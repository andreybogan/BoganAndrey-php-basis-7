<?php
header("Content-type: text/html; charset=utf-8");

// Поключаем файлы конфигурации и функции.
include __DIR__ . "/../global/config.php";
include GLOBAL_DIR . "fns/fns_sum.php";
include GLOBAL_DIR . "onload.php";

// Проверяем нажата ли кнопка Зарегистрироваться.
if ($_REQUEST['reg']['submit']) {
  // Создаем короткие имена переменых.
  $login = $_POST['reg']['login'] ?? '';
  $pass = $_POST['reg']['pass'] ?? '';

  // Проверяем корректность заполнения формы.
  if (empty($errors = checkRegForm($_POST['reg'], $login, $pass))) {
    // Добавляем регистрационную информацию в базу данных.
    addRegInfo($login, $pass);
    // Регистрируем идентификатор пользователя.
    $_SESSION['user'] = $login;
    // Делаем переадресацию на страницу пользователя.
    header("Location: ./user.php");
    exit;
  };
}

// Подключаем html страницу корзины.
renderBasket("register",
             ['arrProdInBasket' => $arrProdInBasket, 'errors' => $errors, 'login' => $login, 'pass' => $pass]);