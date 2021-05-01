<?php

if ($_GET['pages'] != 'login' || $_GET['pages'] != 'register') {
  include "views/templates/head-admin.php";
  include "views/templates/content-admin.php";
  include "views/templates/footer-admin.php";
} elseif ($_GET['pages'] == 'login' || $_GET['pages'] == 'register') {
  include "views/templates/head-utama.php";
  include "app/content.php";
  include "views/templates/footer-utama.php";
} else {
  echo "Url yang anda input tidak terdaftar atau anda tidak memiliki akses.";
}
