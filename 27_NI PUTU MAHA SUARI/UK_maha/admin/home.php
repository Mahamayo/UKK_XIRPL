<?php
include "../config/koneksi.php";
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
<div class="container mt-3">
Album :
<?php 
$album = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID = '$UserID'");
while ($row = mysqli_fetch_array($album)) {?>
<a href="home.php?albumID=<?php echo $row['albumID'] ?>" class="btn btn-outline-primary">
<?php echo $row['namaAlbum'] ?></a>

<?php } ?>

	<div class="row">
		<?php 
        if (isset ($_GET['albumID'])) {
            $albumID = $_GET ['albumID'];
            $query=mysqli_query($koneksi, "SELECT * FROM foto WHERE UserID ='$UserID' AND albumID ='$albumID'");
            while ($data = mysqli_fetch_array($query)) { ?>
                
                <div class="col-md-3 mt-2">
		<div class="card">
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
                    echo mysqli_num_rows($like).'suka';
                    
                    ?>
					<a href=""><i class="fa-regular fa-comment"></i></a> 3 komentar
				</div>
			</div>
		</div>
        <?php } }else{ 
	
$query = mysqli_query($koneksi, "SELECT  * FROM  foto WHERE UserID = '$UserID'");
while ($data = mysqli_fetch_array($query)) {
?>
<div class="col-md-3 mt-2">
		<div class="card">
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
					<a href=""><i class="fa-regular fa-comment"></i></a> 3 komentar
				</div>
			</div>
		</div>
        <?php } }?>
    </div>
</div>
<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
  <p>&copy; UKK RPL 2024|Mahasuari</p>
</footer>

<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
</body>
</html>