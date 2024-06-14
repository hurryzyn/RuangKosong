<?php
require_once('./class/class.user.php');

if(isset($_POST["btnSubmitLogin"])){
    if(isset($_POST["emailLogin"])){
        $inputemail = $_POST["emailLogin"];
        $objPengguna = new User();
        $objPengguna->ValidateEmail($inputemail);
        $password = $_POST["passwordLogin"];

        if($objPengguna->hasil && isset($_POST["passwordLogin"])){
            $ismatch = password_verify($password, $objPengguna->password);
            if($ismatch){
                $_SESSION["userid"]= $objPengguna->userid;
                $_SESSION["role"]= $objPengguna->role;
                $_SESSION["nama"]= $objPengguna->nama;
                $_SESSION["email"]= $objPengguna->email;
                if($objPengguna->role == "user"){
                    echo '<script>window.location = "dashboarduser.php";</script>';
                } else if ($objPengguna->role == "admin"){
                    echo '<script>window.location = "dashboardadmin.php?row=home";</script>';
                } else {
                    echo '<script>window.location = "dashboarduser.php";</script>';
                }

            } else {
                echo "<script>alert('Email atau password Anda salah!');</script>";
            }
        } 
    
    }
}


// require_once('./class/class.User.php');
// if(isset($_POST['btnLogin'])){
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $objPengguna = new User();
//     $objPengguna->hasil = true;
//     $objPengguna->ValidateEmail($email);
    
//     if($objPengguna->hasil){
//         $ismatch = password_verify($password, $objPengguna->password);
//         if($ismatch){
//             if (!isset($_SESSION)) {
//                 session_start();
//             }
//             $_SESSION["userid"]= $objPengguna->userid;
//             $_SESSION["role"]= $objPengguna->role;
//             $_SESSION["nama"]= $objPengguna->nama;
//             $_SESSION["email"]= $objPengguna->email;
//             echo "<script>alert('Login sukses');</script>";
//             if($objPengguna->role == 'user'){
//                 // echo '<script>window.location = "dashboarduser.php";</script>';
//                 header("Location: index.php?p=dashboarduser");
//                 exit();
//             }
//             else if($objPengguna->role == 'manager')
//                 echo '<script>window.location = "dashboardmanager.php";</script>';
//             else if($objPengguna->role == 'admin')
//                 echo '<script>window.location = "dashboardadmin.php";</script>';
//         } else {
//             echo "<script>alert('Password tidak match');</script>";
//         }
//     } else {
//         echo "<script>alert('Email tidak terdaftar');</script>";
//     }
// }
?>

<div class="container">
    <div class="row justify-content-center align-items-center my-4">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title fw-bold fs-3 text-center">Log In</div>
                    <form action="" method="post">
                        <div class="p-3">
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" name= "emailLogin" aria-describedby="emailHelp" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password" name="passwordLogin" placeholder="Enter your password">
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit" name="btnSubmitLogin">Log In</button>
                                <div class="form-text text-center">Not have an account?</div>
                                <a class="btn btn-secondary" href="index.php?p=register">Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
