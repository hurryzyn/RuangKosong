<?php
require_once('./class/class.user.php'); 

if(isset($_POST['btnSubmit'])){
    $inputemail = $_POST["email"];
    $objPengguna = new User();
    $objPengguna->ValidateEmail($inputemail);

    if($objPengguna->hasil){
        echo "<script>alert('berhasil mendaftar');</script>";
    } else {
        $objPengguna->email = $_POST["email"];
        $password = $_POST['password']; 
        $objPengguna->password= password_hash($password, PASSWORD_DEFAULT);
        $objPengguna->nama = $_POST["nama"];
        $objPengguna->role = "user";
        $objPengguna->AddUser();
        if($objPengguna->hasil){
            echo "<script>alert('Registrasi berhasil');</script>";
            echo '<script>window.location="index.php?p=login";</script>';
            
        } else {
            echo $objPengguna->pesan;
        }
    }

}
?>

<div class="container">
    <div class="row justify-content-center align-items-center my-4">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title fw-bold fs-3 text-center">Register</div>
                    <form action="" method="post"> 
                        <div class="p-3">
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan alamat email Anda">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Anda">
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda">
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit" name="btnSubmit">Register</button>
                                <div class="form-text text-center">Sudah punya akun?</div>
                                <a class="btn btn-secondary" href="index.php">Masuk</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
