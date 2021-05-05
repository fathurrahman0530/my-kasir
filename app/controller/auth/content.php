<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'login':
    include 'views/utama/login.php';
    break;

  case 'register':
    include 'views/utama/register.php';
    break;

  case 'login_error':
    include 'views/utama/login.php';
    break;

  case 'register_success':
    include 'views/utama/login.php';
    break;

  default:
    include 'views/utama/login.php';
    break;
}
