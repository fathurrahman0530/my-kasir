<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] != '') {
  header('location:media.php?pages=dashboard');
  exit();
} else {
  header('location:media.php?pages=login');
  exit();
}
