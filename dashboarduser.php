<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<header class="p-3 mb-3 border-bottom" style=" background-color: rgba(13, 12, 11, 0.5)">
    <div class="container";>
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="dashboardadmin.php?p=overview" class="nav-link px-2 link-secondary text-white">Overview</a></li>
          <<a class="nav-link link-secondary text-light fw-bolder" href="index.php?p=home">Home</a>
          <a class="nav-link link-secondary text-light fw-bolder" href="index.php?p=officespace">Office Space</a>
        </ul>


        <div class="dropdown text-end">
          <a href="#" class="d-block link-secondary text-decoration-none dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle"></i>
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <main class="container">
    <?php
    $page_dir = 'pagesuser';
    if (!empty($_GET['p'])) {

      $page = scandir($page_dir, 0);
      unset($page[0], $page[1]);

      $p = $_GET['p'];
      if (in_array($p . '.php', $page)) {
        include($page_dir . '/' . $p . '.php');
      } else {
        echo 'Halaman tidak ditemukan! :(';
      }
    } else {
      include "pagesuser/profil.php";
    }
    ?>
  </main>


    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>