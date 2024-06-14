<?php
if ($_SESSION["role"] != "user") {
    session_destroy();
    echo '<script>window.location = "index.php";</script>';
  }
?>

<h1>aloo</h1>