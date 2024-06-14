<?php
require_once('./inc.koneksi.php');
require_once('./class/class.user.php');
require_once('./class/class.gedung.php');
require_once('./class/class.book.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = 0;
    $gedungId = 0;
    
    if (isset($_POST['selectUser'])) {
        $userId = $_POST['selectUser'];
    }
        
    if (isset($_POST['selectGedung'])) {
        $gedungId = $_POST['selectGedung'];
    }
    // Tambah ke tabel book
    $book = new Book();
    $result = $book->addBook($userId, $gedungId);
    if(!$result) echo "<script>alert('Gagal menambahkan data!');</script>";  
    if($result)  echo '<script>window.location="dashboardadmin.php?row=officespace";</script>';
}

$gedung = new Gedung();
$allgedungData = $gedung->getAllGedung();
$optionGedung = "";
while ($row = $allgedungData->fetch_row()) {
    $currentData = '<option value="' . $row[0] . '">' . "id: ".  $row[0] . ". " . $row[3] . "-" .  $row[1]. '</option>';
    $optionGedung = $optionGedung . $currentData;
}

$user = new User();
$allUserData = $user->getAllUser();
$optionUser = "";
while ($row = $allUserData->fetch_row()) {
    $currentData = '<option value="' . $row[0] . '">' . $row[3] . '</option>';
    $optionUser = $optionUser . $currentData;
}

?>

<div class="mt-5">
    <span class="fs-1 fw-bold">Add New Book</span>
</div>
<form method="post" action="">
    <div class="mb-3">
        <select class="form-select" name="selectGedung">
            <?php echo $optionGedung; ?>
        </select>
    </div>
    <div class="mb-3">
        <select class="form-select" name="selectUser">
            <?php echo $optionUser; ?>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Book</button>
</form>
</div>

