<?php
header("Content-type: text/html; charset=utf-8");

// Поключаем файлы конфигурации и функции.
include __DIR__ . "/../global/config.php";
include GLOBAL_DIR . "fns/fns_db.php";
include GLOBAL_DIR . "fns/fns_catalog.php";
include GLOBAL_DIR . "fns/fns_basket.php";
include GLOBAL_DIR . "fns/fns_render.php";
include GLOBAL_DIR . "onload.php";

// Получаем массив товаров в корзине.
$arrProdInBasket = getAllProdBasket();

// Проверяем была ли нажата кнопка Добавить в корзину.
if ($_REQUEST['submitAddBasket']) {
  // Добавляем данные в базу.
  addProdToBasket($_POST['id_prod']);
  // Делаем редирект.
  header("Location: " . $_SERVER['SCRIPT_NAME']);
  exit;
}

// Проверяем была ли нажата кнопка Удалить из корзины.
if ($_REQUEST['submitRemoveBasket']) {
  // Добавляем данные в базу.
  removeProdToBasket($_POST['id_prod']);
  // Делаем редирект.
  header("Location: " . $_SERVER['SCRIPT_NAME']);
  exit;
}

// Подключаем html страницу корзины.
renderBasket("basket", ['arrProdInBasket' => $arrProdInBasket]);