<?php
require_once('./class/class.user.php');

if (isset($_SESSION["userid"])) {
    // Redirect ke dashboarduser jika sudah login
    header("Location: index.php?p=dashboarduser");
    exit();
}

if(isset($_POST["btnSubmit"])){
    if(isset($_POST["email"])){
        $inputemail = $_POST["email"];
        $objPengguna = new User();
        $objPengguna->ValidateEmail($inputemail);
        echo "post pass" . $_POST["password"] . "<br>";
        echo "obj pass" . $objPengguna->password . "<br>" ;
        if($objPengguna->hasil && isset($_POST["password"])){
            $ismatch = password_verify($password, $objPengguna->password);
            echo "ismatch" . $ismatch . "<br>" ;
            if($ismatch){
                echo "<script>alert('success');</script>";
                $_POST["btnSubmit"] = 0;
                $_POST["email"] = 0;
                $_POST["password"] = 0;
            } else {
                echo "<script>alert('Email atau password Anda salah!');</script>";
                $_POST["btnSubmit"] = 0;
                $_POST["email"] = 0;
                $_POST["password"] = 0;
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
                                <input type="email" class="form-control" id="email" name= "email" aria-describedby="emailHelp" placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit" name="btnSubmit">Log In</button>
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
