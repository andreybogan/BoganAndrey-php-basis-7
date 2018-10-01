<?php
/**
 * Функция проверяет есть ли товар с указанным id в корзине.
 * @param int $id - ID товара.
 * @return bool Если товар есть в корзине, возвращается true, иначе false.
 */
function isBasketProd($id) {
  if (my_query("select id_prod from basket where id_prod = '{$id}'")) {
    return true;
  }
  return false;
}

/**
 * Функция возвращает количество товаров в корзине.
 * @return int Возвращает количество товаров в корзине.
 */
function getAmountBasket() {
  $result = my_query("select sum(amount) as sum from basket");
  return mysqli_fetch_assoc($result)['sum'];
}

/**
 * Функция возвращает количество товаров в корзине по заданному ID.
 * @param int $id - ID товара.
 * @return int|null Возвращает количество товаров в корзине, или null, если для заданного ID товаров нет.
 */
function getAmountBasketID($id) {
  $result = my_query("select amount from basket where id_prod = '{$id}'");
  return mysqli_fetch_assoc($result)['amount'];
}

/**
 * Функция возвращает информацию о товарах в карзине: ID, имя и колечество.
 * @return array|null Возвращает ассоциативный массив товаров, если товары отсутствует возвращет null.
 */
function getAllProdBasket() {
  $result =
    my_query("select catalog.id_prod, catalog.name, basket.amount from basket, catalog 
              where basket.id_prod = catalog.id_prod");
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

/**
 * Функция добавляет товар в корзину. Если товар с заданным ID уже есть в корзине, то обновляется количество,
 * если нет, то добавляется новый товар.
 * @param int $id - ID товара.
 */
function addProdToBasket($id) {
  // Экранируем специальные символы.
  $id = (int)my_string($id);

  // Проверяем есть ли для заданного ID товары в корзине.
  if (getAmountBasketID($id) != null) {
    // Обновляем данные о количестве товаров.
    my_query("update basket set amount = amount + 1 where id_prod = '{$id}'");
  } else {
    // Добавляем товар в корзину.
    my_query("insert into basket (id_prod, amount) values ('{$id}', '1')");
  }
}

/**
 * Функция удаляет товар из корзины. Если в корзине только один товар с заданным ID, то товар удаляется,
 * в противном случае обновляется колечество.
 * @param int $id - ID товара.
 */
function removeProdToBasket($id) {
  // Экранируем специальные символы.
  $id = (int)my_string($id);

  // Проверяем есть ли для заданного ID товары в корзине.
  if (getAmountBasketID($id) != 1) {
    // Обновляем данные о количестве товаров.
    my_query("update basket set amount = amount - 1 where id_prod = '{$id}'");
  } else {
    // Удаляем товар с заданым ID.
    my_query("delete from basket where id_prod = '{$id}'");
  }
}