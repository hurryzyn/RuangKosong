<?php
include './class/class.book.php'; 
include './class/class.officespace.php'; 
include './class/class.user.php';

$booking = new Booking();
$officespace = new Officespace();
$User = new User();

if (isset($_GET['id_gedung'])) {
    $id_gedung = $_GET['id_gedung'];
    $officespace->id_gedung = $id_gedung;
    $officespace->SelectOneGedung();
} else {
    die("ID Gedung tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_gedung = $_POST['id_gedung'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $tanggal = $_POST['tanggal'];

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Pemesanan</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css"> 
</head>
<body>
    <h2>Halaman Pemesanan</h2>
    <?php
    if ($booking->message) {
        echo "<p>" . $booking->message . "</p>";
    }
    ?>
    <div>
        <h3>Detail Gedung</h3>
        <p>ID Gedung: <?php echo $officespace->id_gedung; ?></p>
        <p>Nama Gedung: <?php echo $officespace->nama_gedung; ?></p>
        <p>Harga: <?php echo $officespace->harga; ?></p>
        <p>Lokasi: <?php echo $officespace->lokasi; ?></p>
        <p>Kapasitas: <?php echo $officespace->kapasitas; ?></p>
        <p>Deskripsi: <?php echo $officespace->deskripsi; ?></p>
        <img src="<?php echo $officespace->foto; ?>" alt="Foto Gedung" width="300px">
    </div>
    <form method="POST" enctype="multipart/form-data" action="booking.php?id_gedung=<?php echo $id_gedung; ?>">
        <input type="hidden" name="id_gedung" value="<?php echo $id_gedung; ?>"> <br> <br>

        <label for="nama_pemesan"><?php echo $User -> nama?></label>
        <input type="hidden" id="nama_pemesan" name="nama_pemesan" readonly><br><br>

        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required><br><br>

        <input type="submit" value="Kirim Pemesanan">
    </form>
</body>
</html>
