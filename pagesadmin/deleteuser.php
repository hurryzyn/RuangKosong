<?php
require_once('./class/class.user.php');

if(isset($_GET["id"])){
    $id = $_GET["id"];
    $user = new User();
    $user->deletUserById($id);
}

echo '<script>window.location="dashboardadmin.php?row=home";</script>';

?>

