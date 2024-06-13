<?php
require "inc.koneksi.php";

$title = "Home";
if (!empty($_GET['p'])) {
  $title = $_GET['p'];
}

$authButton = '<a href="index.php?p=login"> <button type="button" class="btn btn-outline-light me-2">Login</button></a>
<a href="index.php?p=register"><button type="button" class="btn btn-warning">Sign-up</button></a>';

if (isset($_SESSION) && ($_SESSION["role"] == "user")){
  $authButton = '<a href="index.php?p=register"><button type="button" class="btn btn-warning">logout</button></a>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title><?php
          echo $title;
          ?></title>
</head>

<body>
  <header class="header-custom">
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom" style="background-color: rgba(13, 12, 11, 0.5);">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <img src="Asset/rukos.png" alt="Logo" style="height: 60px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link link-secondary text-light fw-bolder" href="index.php?p=home">Home</a>
            <a class="nav-link link-secondary text-light fw-bolder" href="index.php?p=officespace">Office Space</a>
            <a class="nav-link link-secondary text-light fw-bolder" href="index.php?p=coworking">Co-Working</a>
          </div>
        </div>

        <div class="text-end">
          <?php echo $authButton; ?>
        </div>
      </div>
    </nav>
  </header>


  <main class="container">
    <?php
    $page_dir = 'pages';
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
      include $page_dir . "/home.php";
    }
    ?>
  </main>

  <footer>
    <div class="container border-top">
      <div class="row">
        <div class="col-8">
          <div class="fs-2 mt-5 fw-bold">
            Ruang Kosong
          </div>
          <div class="mt-5">
            <a href="#" class="me-3 link-light">
              <img src="./icons/fb.png" alt="facebook" style="width: 20px;">
            </a>
            <a href="#" class="mx-3 link-light">
              <img src="./icons/linkedin.png" alt="linkedin" style="width: 20px;">
            </a>
            <a href="#" class="mx-3 link-light">
              <img src="./icons/yt.png" alt="youtube" style="width: 20px;">
            </a>
            <a href="#" class="mx-3 link-light">
              <img src="./icons/ig.png" alt="instagram" style="width: 20px;">
            </a>
          </div>
        </div>
        <div class="col-4">
          <div class="fs-3 mt-5 mb-3">
            Contact
          </div>
          <div class="fs-5 mt-1">
            +62 8253678289
          </div>
          <div class="fs-5 mt-1">
            @ruangkosong10
          </div>
          <div class="fs-5 mt-1">
            ruangksong@space.id
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>