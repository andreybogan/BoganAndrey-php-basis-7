<?php
header("Content-type: text/html; charset=utf-8");

// Поключаем файлы конфигурации и функции.
include __DIR__ . "/../global/config.php";
include GLOBAL_DIR . "fns/fns_sum.php";
include GLOBAL_DIR . "onload.php";

// Подключаем html страницу корзины.
renderBasket("user");