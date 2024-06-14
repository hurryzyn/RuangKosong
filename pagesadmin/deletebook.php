<?php
require_once('./class/class.book.php');

if(isset($_GET["bid"])){
    $id = $_GET["bid"];
    $book = new Book();
    $book->deleteBookById($id);
}

echo '<script>window.location="dashboardadmin.php?row=officespace";</script>';

?>