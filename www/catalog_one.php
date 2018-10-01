<?php
header("Content-type: text/html; charset=utf-8");

// Поключаем файлы конфигурации и функции.
include __DIR__ . "/../global/config.php";
include GLOBAL_DIR . "fns/fns_db.php";
include GLOBAL_DIR . "fns/fns_catalog.php";
include GLOBAL_DIR . "fns/fns_basket.php";
include GLOBAL_DIR . "fns/fns_render.php";
include GLOBAL_DIR . "onload.php";

// Получаем информацию о товаре из базы.
$arrProduct = getProduct($_GET['id']);

// Получаем список фотографий данного товара.
$arrProductImg = getProductImg($arrProduct['id_prod']);

// Проверяем была ли нажата кнопка Добавить в корзину.
if ($_REQUEST['submitAddBasket']) {
  // Добавляем данные в базу.
  addProdToBasket($_GET['id']);
  // Делаем редирект.
  header("Location: " . $_SERVER['REQUEST_URI']);
  exit;
}

// Подключаем html страницу с полным описание товара.
renderBasket("catalog_one", ['arrProduct' => $arrProduct, 'arrProductImg' => $arrProductImg]);