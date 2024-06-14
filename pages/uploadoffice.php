<?php
require_once('./class/class.officespace.php');
$objOffice = new officespace();
if (isset($_POST['btnSubmit'])) {
    $objOffice->id_gedung = $_POST['id_gedung'];
    $objOffice->nama_gedung = $_POST['nama_gedung'];
    $objOffice->harga = $_POST['harga'];
    $objOffice->lokasi = $_POST['lokasi'];
    $objOffice->kapasitas = $_POST['kapasitas'];
    $objOffice->deskripsi = $_POST['deskripsi'];

    // Upload Foto
    $tipe_file = $_FILES['uploadfoto']['type'];
    $lokasi_file = $_FILES['uploadfoto']['tmp_name'];
    $nama_file = $_FILES['uploadfoto']['name'];
    $ukuran_file = $_FILES['uploadfoto']['size'];
    $folder = './upload/';

    if ($tipe_file != "image/jpeg" && $tipe_file != "image/png") {
        echo "<script>alert('Hanya Boleh Mengupload gambar. Pilih file yang lain');</script>";
        echo "<script>window.location = 'index.php?p=uploadoffice';</script>";
    } else {
        $isSuccessUpload = move_uploaded_file($lokasi_file, $folder . $nama_file);
        if ($isSuccessUpload) {
            echo "<script>alert('Foto Berhasil Di Upload');</script>";
        }
    }
    $objOffice->foto = $folder . $nama_file;

    $objOffice->AddGedung();

    echo "<script> alert('$objOffice->message'); </script>";
    if ($objOffice->hasil) {
        echo '<script> window.location = "index.php?p=uploadoffice";</script>';
    }
}
?>
<div class="container">
    <div class="text-center pt-4">
        <img src="asset/rukos.png" class="img-fluid" style="width:20%" alt="">
    </div>
    <div class="text-center pt-1 mb-4 ">
        <h1>Masukkan Office</h1>
    </div>

    <form enctype="multipart/form-data" method="post" action="index.php?p=uploadoffice">
        <table class="table">
            <div class="mb-3">
                <label class="form-label">ID Gedung</label>
                <input type="text" class="form-control border border-2 border-black" name="id_gedung"  readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Gedung</label>
                <input type="text" class="form-control border border-2 border-black" name="nama_gedung" value="<?php echo $objOffice->nama_gedung; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input type="number" class="form-control border border-2 border-black" name="harga" value="<?php echo $objOffice->harga; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" class="form-control border border-2 border-black" name="lokasi" value="<?php echo $objOffice->lokasi; ?>" required>

            </div>
            <div class="mb-3">
                <label class="form-label">Kapasitas</label>
                <input type="text" class="form-control border border-2 border-black" name="kapasitas" value="<?php echo $objOffice->kapasitas; ?>" required>

            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control border border-2 border-black" rows="3" name="deskripsi" value="<?php echo $objOffice->deskripsi; ?>" required></textarea>

            </div>
            <div class="mb-3">
                <label class="form-label">Upload Foto Gedung</label>
                <input class="form-control border border-2 border-black" type="file" name="uploadfoto" required>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-success" value="Tambahkan" name="btnSubmit">
                <a href="index.php?p=officespace"></a>
            </div>
        </table>
    </form>
</div>