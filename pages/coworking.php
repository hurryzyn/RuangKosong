<!-- JUDUL PAGE -->
<div class="position-absolute top-50 start-50 translate-middle fs-1 fw-bold text-light"> Co-Working</div>


<!-- List data start -->



<?php
require_once('./class/class.coworking.php');
$objcoworking = new coworking();
$arrayResult = $objcoworking->SelectAllcoworking();
if (count($arrayResult) == 0) {
  echo '<tr><td colspan="5">Tidak ada data!</td></tr>';
} else {
  $no = 1;
  foreach ($arrayResult as $dataGedung) {
    echo '<div class="container mt-5">';
    echo '<div class="row">';
    echo '<div class="col-sm-6">';
    echo '<img
          src="./images/thumbnail.jpg"
          alt="thumbnail"
          class="card-img-top"
        />';
    echo '<div class="card-body">';
    echo '<h5 class="card-title"> . $nama_gedung . </h5>';
    echo '<p class="card-text">..</p>';
    echo '';
    echo '';
    echo '<td>' . $no . '</td>';
    echo '<td>' . $dataEmployee->ssn . '</td>';
    echo '<td>' . $dataEmployee->fname . '</td>';
    echo '<td>' . $dataEmployee->address . '</td>';
    echo '<td><a class="btn btn-warning" href="index.php?p=employee&ssn=' . $dataEmployee->ssn . '"> Edit </a> | <a class="btn btn-danger" href="index.php?p=deleteemployee&ssn=' . $dataEmployee->ssn . '"onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')">Delete </a> </td>';
    echo '</tr>';
    $no++;
  }
}
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-sm-6">
      <div class="card my-3">
        <img src="./images/thumbnail.jpg" alt="thumbnail" class="card-img-top" />
        <div class="card-body">
          <h5 class="card-title">Lantai 1 / Luas 70m2</h5>
          <p class="card-text">
            Spesifikasi unit:<br>
            Fully furnished
          </p>
          <p class="card-text fw-bold text-danger">
            From IDR 1,750,000/m
          </p>
          <div class="d-grid gap-2 col-6 mx-auto">

            <a href="#" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card my-3">
        <img src="./images/thumbnail.jpg" alt="thumbnail" class="card-img-top" />
        <div class="card-body">
          <h5 class="card-title">Lantai 1 / Luas 70m2</h5>
          <p class="card-text">
            Spesifikasi unit:<br>
            Fully furnished
          </p>
          <p class="card-text fw-bold text-danger">
            From IDR 1,750,000/m
          </p>
          <div class="d-grid gap-2 col-6 mx-auto">

            <a href="#" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card my-3">
        <img src="./images/thumbnail.jpg" alt="thumbnail" class="card-img-top" />
        <div class="card-body">
          <h5 class="card-title">Lantai 1 / Luas 70m2</h5>
          <p class="card-text">
            Spesifikasi unit:<br>
            Fully furnished
          </p>
          <p class="card-text fw-bold text-danger">
            From IDR 1,750,000/m
          </p>
          <div class="d-grid gap-2 col-6 mx-auto">

            <a href="#" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card my-3">
        <img src="./images/thumbnail.jpg" alt="thumbnail" class="card-img-top" />
        <div class="card-body">
          <h5 class="card-title">Lantai 1 / Luas 70m2</h5>
          <p class="card-text">
            Spesifikasi unit:<br>
            Fully furnished
          </p>
          <p class="card-text fw-bold text-danger">
            From IDR 1,750,000/m
          </p>
          <div class="d-grid gap-2 col-6 mx-auto">

            <a href="#" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- list data end -->