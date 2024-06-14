<?php
require_once('./inc.koneksi.php');
require_once('./class/class.user.php');
require_once('./class/class.book.php');

if (!isset($_SESSION)) {
  session_start();
}

if ($_SESSION["role"] != "admin") {
  session_destroy();
  echo '<script>window.location = "index.php";</script>';
}

$tableContent = '';
$homeHeaderTable = '<tr>
  <th scope="col-1">User Id</th>
  <th scope="col-6">Nama</th>
  <th scope="col">Email</th>
  <th scope="col">Password</th>
  <th scope="col">Role</th>
  <th scope="col"></th>
</tr>';
$officeSpaceHeaderTable = '<tr>
  <th scope="col-1">Book ID</th>
  <th scope="col-6">Gedung ID</th>
  <th scope="col">Lantai</th>
  <th scope="col">Nama Gedung</th>
  <th scope="col">Nama Penyewa</th>
  <th scope="col">Status</th>
  <th scope="col"></th>
</tr>';

$title = '';
$selectedMenu = "home";
if (isset($_GET["row"]) && $_GET["row"] == "officespace") $selectedMenu = "officeSpace";

if ($selectedMenu == "home"){
  $title = "List Registered Account";
  $user = new User();
  $allUser = $user->getAllUser();
  while ($row = $allUser->fetch_row())  {
    $currentData = '<tr>
      <td>' . $row[0] . '</td>
      <td>' . $row[3] . '</td>
      <td>' . $row[1] . '</td>
      <td>******</td>
      <td>' . $row[4] . '</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
          <a href="dashboardadmin.php?page=edituser&id=' . $row[0] . '" class="btn btn-primary btn-sm">
            <img src="./icons/edit.png" style="width: 20px" />
          </a>
          <a href="dashboardadmin.php?page=deleteuser&id=' . $row[0] . '" class="btn btn-primary btn-sm">
            <img src="./icons/delete.png" style="width: 20px" />
          </a>
        </div>
      </td>
    </tr>';

    $tableContent = $tableContent . $currentData;
  }
} else {
  $title = "Book List";
  $book = new Book();
  $allBookData = $book->getAllBook();
  while ($row = $allBookData->fetch_row())  {
    $currentData = '<tr>
      <td>' . $row[0] . '</td>
      <td>' . $row[1] . '</td>
      <td>' . $row[2] . '</td>
      <td>' . $row[3] . '</td>
      <td>' . $row[4] . '</td>
      <td>' . $row[5] . '</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
          <a href="dashboardadmin.php?page=editbook&bid='.$row[0].'&gid='.$row[1].'&uid='.$row[6].'&status='.$row[5].'" class="btn btn-primary btn-sm">
            <img src="./icons/edit.png" style="width: 20px" />
          </a>
          <a href="dashboardadmin.php?page=deletebook&bid='.$row[0].'" class="btn btn-primary btn-sm">
            <img src="./icons/delete.png" style="width: 20px" />
          </a>
        </div>
      </td>
    </tr>';

    $tableContent = $tableContent . $currentData;
  }
}
if (!empty($_GET['page'])) {
  $title = $_GET['page'];
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- TAMBAHKAN CSS CUSTOM DI SINI -->
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row flex-nowrap">
        <!-- SIDE BAR [START] -->
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 border-end">
          <div
            class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100"
          >
            <p
              class="d-flex align-items-center pb-3 mb-md-0 me-md-auto fw-bold text-dark text-decoration-none"
            >
              <span class="fs-5 d-none d-sm-inline">Task app</span>
            </p>
            <ul
              class="nav nav-pills flex-column py-0 mb-0 align-items-center align-items-sm-start"
              id="menu"
            >
              <li>
                <span
                  data-bs-toggle="collapse"
                  class="nav-link px-0 align-middle text-dark"
                >
                  <i class="fs-4 bi-speedometer2"></i>
                  <span class="ms-1 d-none d-sm-inline">Settings</span>
                </span>
                <ul
                  class="collapse show nav flex-column ms-1"
                  id="submenu1"
                  data-bs-parent="#menu"
                >
                  <li class="w-100">
                    <a href="dashboardadmin.php?row=home" class="nav-link px-0">
                      <span class="d-none d-sm-inline">
                        <!-- Ganti alamat Icon home -->
                        <img
                          src="./icons/home.png"
                          alt="icon home"
                          style="width: 20px"
                        />
                      </span>
                      Home
                    </a>
                  </li>
                  <li class="w-100">
                    <a href="dashboardadmin.php?row=officespace" class="nav-link px-0">
                      <span class="d-none d-sm-inline">
                        <span class="d-none d-sm-inline">
                          <!-- Ganti alamat Icon wifi -->
                          <img
                            src="./icons/wifi.png"
                            alt="icon wifi"
                            style="width: 20px"
                          />
                        </span>
                      </span>
                      Office Space
                    </a>
                  </li>
                  <li class="w-100">
                    <a href="dashboardadmin.php?page=logout" class="nav-link px-0">
                      Log Out
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <!-- SIDE BAR [END] -->

        <!-- HALAMAN UTAMA [START] -->
        <div class="col py-3">
          <!-- HEADER [START] -->
          <div class="container">
            <!-- Judul Halaman -->
            <p><?php echo $title; ?></p>
            <div class="row">
              <!-- Search form -->
              <div class="col">
                <form class="d-flex">
                  <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                    <?php 
                    if (!empty($_GET['page'])) {
                      echo "disabled";
                    } else {
                      echo "";
                    }
                    ?>
                  />
                  <button 
                    class="btn btn-outline-success" 
                    type="submit" 
                    <?php 
                    if (!empty($_GET['page'])) {
                      echo "disabled";
                    } else {
                      echo "";
                    }
                    ?>
                  >
                    Search
                  </button>
                </form>
              </div>
              <div class="col text-end">
                <div>
                  <?php 
                  if($selectedMenu != "home" && empty($_GET['page'])){
                    echo '<a href="?page=addbook" class="me-5 btn btn-info">Add new book
                      <img src="./icons/add.png" style="width: 20px" />
                    </a>';
                  }
                  ?>
      
                </div>
              </div>
            </div>
          </div>
          <!-- HEADER [END] -->
          <!-- START MAIN CONTENT -->
          <div class="container">
          <?php
            $page_dir = 'pagesadmin';
            if (!empty($_GET['page'])) { 
              // NOTE: SEBELUM BIKIN FILE BARU, DAFTARIN NAMA FILE DISINI
              $adminPages = ["addbook", "logout", "edituser", "deleteuser", "editbook", "deletebook"];
              $pageName = $_GET['page'];
              if (in_array($pageName, $adminPages)) {
                require_once("./pagesadmin/". $pageName . ".php");
              } else {
                echo 'Halaman tidak ditemukan! :(';
              }
            } else {
              require_once ("./pagesadmin/adminhomepage.php");
            }
          ?>
          </div>
          <!-- END MAIN CONTENT -->
        </div>
        <!-- HALAMAN UTAMA [END] -->
      </div>
    </div>

    <!-- JANGAN DI HAPUS, JAVASCRIPT UNTUK BOOTSTRAP -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
<?php

$_POST["btnSubmitLogin"] = null;
$_POST["emailLogin"] = null;
$_POST["passwordLogin"] = null;
?>