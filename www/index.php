<?php
header("Content-type: text/html; charset=utf-8");

// Поключаем файлы конфигурации и функции.
include __DIR__ . "/../global/config.php";
include GLOBAL_DIR . "fns/fns_sum.php";
include GLOBAL_DIR . "onload.php";

// Проверяем была ли нажата кнопка Добавить в корзину.
if ($_REQUEST['submitAddBasket']) {
  // Добавляем данные в базу.
  addProdToBasket($_POST['id_prod']);
  // Делаем редирект.
  header("Location: " . $_SERVER['SCRIPT_NAME']);
  exit;
}

// Получаем массив товаров из базы.
$arrCatalog = getCatalog();

// Подключаем html страницу каталога.
renderBasket("catalog", ['arrCatalog' => $arrCatalog]);