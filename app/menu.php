<?php require 'app/config/db.php'; ?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">My Kasir <sup>2</sup></div>
  </a>

  <hr class="sidebar-divider my-0">

  <?php

  $roleId     = 1;
  $queryMenu  = "SELECT `tb_menu`.`id`, `menu`
                 FROM `tb_menu` JOIN `tb_access_menu`
                 ON `tb_menu`.`id` = `tb_access_menu`.`menu_id`
                 WHERE `tb_access_menu`.`role_id` = $roleId
                 ORDER BY `tb_access_menu`.`menu_id` ASC
                ";

  $qM         = mysqli_query($conn, $queryMenu);

  while ($menu = mysqli_fetch_assoc($qM)) :

  ?>

    <li class="nav-header"><?= $menu['menu']; ?></li>

    <?php

    $menuId       = $menu['id'];
    $querySubMenu = "SELECT * FROM `tb_submenu` JOIN `tb_access_menu`
                   ON `tb_submenu`.`id` = `tb_access_menu`.`submenu_id`
                   WHERE `tb_access_menu`.`role_id` = $roleId AND `tb_access_menu`.`menu_id` = $menuId
                   ORDER BY `tb_access_menu`.`menu_id` ASC
                  ";

    $qSM          = mysqli_query($conn, $querySubMenu);

    while ($subMenu = mysqli_fetch_assoc($qSM)) :

    ?>

      <?php if ($_REQUEST['pages'] == $subMenu['url']) : ?>

        <li class="nav-item has-treeview">
          <a href="media.php?pages=<?= $subMenu['url']; ?>" class="nav-link active">

          <?php else : ?>

        <li class="nav-item has-treeview">
          <a href="media.php?pages=<?= $subMenu['url']; ?>" class="nav-link">

          <?php endif; ?>

          <i class="nav-icon <?= $subMenu['icon']; ?>"></i>
          <p><?= $subMenu['title']; ?></p>
          </a>
        </li>

      <?php endwhile; ?>

      <hr class="sidebar-divider">

    <?php endwhile; ?>
</ul>
