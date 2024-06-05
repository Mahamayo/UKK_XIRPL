<?php 
require "../config/koneksi.php";

session_start();
$UserID = $_SESSION['UserID'];
if ($_SESSION['status'] !='Login') {
  echo "<script>
  alert('Anda belum login!');
  location.href='../index.php';
  </script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>website Galery Photo</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Galery Photo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNav">
      <div class="navbar-nav me-auto">
        <a href="home.php" class="nav-link">Home</a>
        <a href="album.php" class="nav-link">Album</a>
        <a href="foto.php" class="nav-link">Foto</a>

    </div>  
        <a href="../config/aksi_logout.php" class="btn btn-outline-danger m-1">Keluar</a>
    </div>
  </div>
</nav>

<div class="container mt-2">
  <div class="row">
  <?php 

    $query = mysqli_query($koneksi, "SELECT  * FROM  foto INNER JOIN user ON foto.UserID=user.userID INNER JOIN album ON foto.albumID=album.albumID");
    while ($data = mysqli_fetch_array($query)) {
?>
    <div class="col-md-3">
      <a type="button"  data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoID'] ?>">
        
          
		    <div class="card mb-2">
			    <img src="../asset/img/<?php echo $data['lokasiFile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="height: 12rem;">
				    <div class="card-footer text-center">
              <?php 
                    $fotoID = $data['fotoID'];
                    $ceksuka  = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoID = '$fotoID' AND UserID = '$UserID'");
                  if (mysqli_num_rows($ceksuka)== 1) { ?>
                    <a href="../config/proses_like.php?fotoID= <?php echo $data['fotoID'] ?>" type="submit" 
                        name="batalsuka" ><i class="fa fa-heart"></i></a>
                        <?php }else { ?>
                        <a href="../config/proses_like.php?fotoID= <?php echo $data['fotoID'] ?>" type="submit" 
                        name="suka" ><i class="fa-regular fa-heart"></i></a>

              <?php }
                        $like = mysqli_query($koneksi , "SELECT * FROM likefoto WHERE fotoID = '$fotoID'");
                        echo mysqli_num_rows($like).'Suka';
                    
                    ?>
					      <a href="#" type="button"  data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoID'] ?>">
                <i class="fa-regular fa-comment"></i></a> 
          <?php 
          $jmlkomen = mysqli_query($koneksi,"SELECT * FROM komentar WHERE fotoID ='$fotoID'");
          echo mysqli_num_rows($jmlkomen).'komentar';
          ?>
				</div>
			</div>
      </a>
<!-- Modal -->
<div class="modal fade" id="komentar<?php echo $data['fotoID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8">
			    <img src="../asset/img/<?php echo $data['lokasiFile'] ?>" class="card-img-top" 
          title="<?php echo $data['judulfoto'] ?>">
          </div>
          <div class="col-md-4">
            <div class="m-2">
              <div class="overflow-auto">
                <div class="sticky-top">
                  <strong><?php echo $data['judulfoto']  ?></strong><br>
                  <span class="badge bg-secondary" ><?php echo $data['NamaLengkap'] ?></span>
                  <span class="badge bg-secondary" ><?php echo $data['tanggalunggah'] ?></span>
                  <span class="badge bg-primary" ><?php echo $data['namaAlbum'] ?></span>

                </div>
                <hr>
                <p align="left">
                  <?php echo $data['deskripsifoto'] ?>
                </p>
                <hr>
                <?php 
                $fotoID = $data['fotoID'];
                $komentar = mysqli_query($koneksi, "SELECT * FROM komentar INNER JOIN user ON komentar.userID=user.userID WHERE komentar.fotoID ='$fotoID'");
                while ($row = mysqli_fetch_array($komentar)) {
                ?>
                <p align="left">
                  <strong><?php echo $row['NamaLengkap'] ?></strong>
                  <?php echo $row['isikomentar']  ?>
                </p>
                <?php } ?>
                <hr>
                <div class="sticky-bottom">
                  <form action="../config/proses_komentar.php" method="POST">
                    <div class="input-group">
                      <input type="hidden" name="fotoID" value="<?php echo $data['fotoID'] ?>">
                      <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
                      <div class="input-group-prevend">
                        <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

		</div> 
    <?php } ?>   
  </div>
</div>


<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
  <p>&copy; UKK RPL 2024|Mahasuari</p>
</footer>

<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
</body>
</html>