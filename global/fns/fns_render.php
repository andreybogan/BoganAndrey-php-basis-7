<?php
/**
 * Функция отвечает за подключеие шаблонов страниц.
 * @param string $template - Имя подлключаемой страницы.
 * @param array $params - Список параметров, которые мы получаем в функции.
 */
function renderBasket($template, $params = []) {
  // Извлекаем переменные из массива
  extract($params);
  // Подключаем шаблон.
  require TEMPLATE_DIR . $template . ".php";
}