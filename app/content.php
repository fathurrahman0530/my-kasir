<?php

$url = $_REQUEST['pages'];

$query = mysqli_query($conn, "SELECT * FROM tb_submenu WHERE url = '$url'");

$location = mysqli_fetch_assoc($query);

if ($_REQUEST['pages'] == $location['url']) {
  include $location['location'];
}
