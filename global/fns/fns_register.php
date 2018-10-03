<?php
/**
 * Функция проверяет правильность заполнения регистрационной формы.
 * @param array $arrPost - Массив значений полученных из формы.
 * @param mixed $login - Имя пользователя.
 * @param mixed $pass - Пароль пользователя.
 * @return array|null Возвращет массив ошибок, либо null, если ошибок нет.
 */
function checkRegForm($arrPost, $login, $pass) {
  // Инициализируем массив для ошибок.
  $errors = null;

  // Проверяем что все значения переданные из формы имеют значения.
  if (!CheckFillForm($arrPost)) {
    $errors[] = "Заполните все поля формы.";
  } else {
    // Проверяем корректность заданного пользователем имени пользователя.
    if (!checkLogin($login, 5)) {
      $errors[] = "Имя пользователя не может быть короче 5 символов.";
    };

    // Проверяем корректность заданного пользователем пароля.
    if (!checkPass($pass, 5)) {
      $errors[] = "Пароль содержит недопустимые символы или его длина менее 5 символов.";
    };
  }
  return $errors;
}

/**
 * Функция заносит данные пользователя в базу данных, предварительно захешировав пароль.
 * @param mixed $login - Имя пользователя.
 * @param mixed $pass - Пароль пользователя.
 */
function addRegInfo($login, $pass) {
  // Хешируем пароль.
  $pass = password_hash($pass, PASSWORD_DEFAULT);
  // Экранируем специальные символы.
  $login = my_string($login);

  // Добавляем информацию в базу данных.
  my_query("insert into user (login, pass) values ('{$login}', '{$pass}')");
}

/**
 * Функция проверяет была ли нажата кнопка Выйти. Если да, то удаляем текущую сессию.
 */
function isLogout() {
  if ($_REQUEST['logout']) {
    // Удаляем текующую сессию.
    logout();
    // Делаем переадресацию.
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
  }
}

/**
 * Функция удаляет текующую сессию.
 */
function logout() {
  // Очищаем данные сессии.
  $_SESSION = [];
  // Удаляем cookie, соответствующую sid.
  unset($_COOKIE[session_name()]);
  // Уничтожаем хранилище сессии.
  session_destroy();
}

/**
 * Функция проверяет существует ли в базе пользователем с полученным именем пользователя и паролем.
 * @param mixed $login - Имя пользователе.
 * @param mixed $pass - Пароль пользователя.
 * @return bool Если пользователь существует возвращает true, иначе - false.
 */
function isAuth($login, $pass) {
  // Проверяем, есть ли в базе информация по данному имени пользователя, если есть, то получаем хеш пароля.
  $result = my_query("select pass from user where login = '{$login}'");
  if ($arrUser = mysqli_fetch_assoc($result)) {
    // Проверяем, соответствует ли пароль хешу.
    if (password_verify($pass, $arrUser['pass'])) {
      return true;
    } else {
      return false;
    }
  }
}