<!-- JUDUL PAGE -->
<div class="position-absolute top-50 start-50 translate-middle fs-1 fw-bold text-light"> Office Space</div>


<!-- List data start -->
 
<div class="container mt-5">
    <div class="row">
        <?php
        require_once('./class/class.officespace.php');
        $objofficespace = new officespace();
        $arrayResult = $objofficespace->SelectAllGedung();
      
        
        if (count($arrayResult) == 0) {
            echo '<div class="col-12"><p class="text-center">Tidak ada data!</p></div>';
        } else {
            foreach ($arrayResult as $objofficespace) {
                echo '<div class="col-sm-6">';
                echo '  <div class="card my-3">';
                echo '    <img src="./uploads/'.$objofficespace->foto.'" alt="thumbnail" class="card-img-top"/>';
                echo '    <div class="card-body">';
                echo '      <h5 class="card-title">'.$objofficespace->nama_gedung.'</h5>';
                echo '      <p class="card-text">'.$objofficespace->deskripsi.'</p>';
                echo '      <p class="card-text fw-bold text-danger">From IDR '.number_format($objofficespace->harga, 0, ',', '.').'/m</p>';
                echo '      <div class="d-grid gap-2 col-6 mx-auto">';
                echo '        <a href="index.php?coworkingH='.$objofficespace->id_gedung.'" class="btn btn-success">Book Now</a>';
                echo '      </div>';
                echo '    </div>';
                echo '  </div>';
                echo '</div>';
            }
        }
        ?>
    