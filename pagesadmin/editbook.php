<?php
// require_once('./class/class.user.php');
require_once('./inc.koneksi.php');
require_once('./class/class.user.php');
require_once('./class/class.gedung.php');
require_once('./class/class.book.php');

$gedung = new Gedung();
$allgedungData = $gedung->getAllGedung();
$optionGedung = "";
while ($row = $allgedungData->fetch_row()) {
    $isSelected = $_GET["gid"] == $row[0] ? "selected": null;
    $currentData = '<option '.$isSelected.' value="' . $row[0] . '">' . "id: ".  $row[0] . ". " . $row[3] . "-" .  $row[1]. '</option>';
    $optionGedung = $optionGedung . $currentData;
}

$user = new User();
$allUserData = $user->getAllUser();
$optionUser = "";
while ($row = $allUserData->fetch_row()) {
    $isSelected = $_GET["uid"] == $row[0] ? "selected": null;
    $currentData = '<option '.$isSelected.' value="' . $row[0] . '">' . $row[3] . '</option>';
    $optionUser = $optionUser . $currentData;
}

if(isset($_POST["updateBookBtn"])){
  $book = new Book();
  $userId = $_POST["editUser"];
  $gedungId = $_POST["editGedung"];
  $status = $_POST["editStatus"];
  $bookId = $_GET["bid"];
  $book->editBook($userId, $gedungId, $status, $bookId);
  echo '<script>window.location="dashboardadmin.php?row=officespace";</script>';
}


?>

<div class="mt-5">
    <span class="fs-1 fw-bold">Edit Book</span>
</div>
<form method="post" action="">
    <div class="mb-3">
        <select class="form-select" name="editGedung">
            <?php echo $optionGedung; ?>
        </select>
    </div>
    <div class="mb-3">
        <select class="form-select" name="editUser">
            <?php echo $optionUser; ?>
        </select>
    </div>
    <div class="mb-3">
        <select class="form-select" name="editStatus">
            <option value="book" <?php if(isset($_GET["status"]) && $_GET["status"] == "book") echo "selected"; ?>>book</option>
            <option value="cancel" <?php if(isset($_GET["status"]) && $_GET["status"] == "cancel") echo "selected"; ?>>cancel</option>
            <option value="done" <?php if(isset($_GET["status"]) && $_GET["status"] == "done") echo "selected"; ?>>done</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary" name="updateBookBtn">Update</button>
    <a href="dashboardadmin.php?row=officespace" class="btn btn-secondary">Cancel</a>
</form>