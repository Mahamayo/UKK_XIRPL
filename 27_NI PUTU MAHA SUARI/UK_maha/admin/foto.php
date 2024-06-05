<?php 
session_start();
include '../config/koneksi.php';
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

<div class="container">
    <div class="row">
        <div class="col-md-4">
        <div class="card mt-2">
            <div class="card-header">Tambah Foto</div>
            <div class="card-body">
            <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
            <label class="form-label">judul foto</label>
            <input type="text" name="judulfoto" class="form-control" required>
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsifoto" required></textarea>
            <label class="form-label">Album</label>
            <select class="form-control" name="albumID" required>
                <?php 
                $UserID = $_SESSION['UserID'];
                $sql_album = mysqli_query($koneksi , "SELECT * FROM album WHERE UserID = '$UserID' ");
                while($data_album = mysqli_fetch_array($sql_album)){ ?>
                
                <option value="<?php echo $data_album['albumID'] ?>">
                    <?php echo $data_album['namaAlbum'] ?>
                </option>
                <?php } ?>
            </select>
            <label class="form-label">File</label>
            <input type="file" class="form-control" name="lokasiFile" required>
            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>

            </form>
            </div>
        </div>
    </div>

        <div class="col-md-8">
        <div class="card mt-2">
            <div class="card-header">Data Galery Photo</div>
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Judul Foto</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $UserID = $_SESSION['UserID'];
                  $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userID ='$UserID'");
                  while ($data = mysqli_fetch_array($sql)) {
                  ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><img src="../asset/img/<?php echo $data['lokasiFile'] ?>" width="100"></td>
                        <td><?php echo $data['judulfoto'] ?></td>
                        <td><?php echo $data['deskripsifoto'] ?></td>
                        <td><?php echo $data['tanggalunggah'] ?></td>
                        <td>
                          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Edit<?php echo $data['fotoID'] ?>">
Edit
</button>

<!-- Modal -->
<div class="modal fade" id="Edit<?php echo $data['fotoID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="fotoID" value="<?php echo $data['fotoID'] ?>">
            <label class="form-label">Judul Foto</label>
            <input type="text" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" class="form-control" required>
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsifoto" value="<?php echo $data['deskripsifoto'] ?>" required><?php echo $data ['deskripsifoto'] ?></textarea>

            <label class="form-label">Album</label>
            <select class="form-control" name="albumID">
                <?php 
                $sql_album = mysqli_query($koneksi , "SELECT * FROM album  WHERE UserID = '$UserID'");
                while($data_album = mysqli_fetch_array($sql_album)){ ?>
                
                <option <?php if($data_album['albumID'] == $data ['albumID']) {?> selected="selected" <?php } ?> value="<?php echo $data_album['albumID'] ?>">
                    <?php echo $data_album['namaAlbum'] ?>
                </option>
                <?php } ?>
            </select>
            <label class="form-label">Foto</label>
            <div class="row">
                <div class="col-md-4">
                    <img src="../asset/img/<?php echo $data['lokasiFile'] ?>" width="100">
                </div>
                    <div class="col-md-8">
                    <label class="form-label">Ganti File</label>
                    <input type="file" class="form-control" name="lokasiFile">
                    
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
                                                <!-- tombol hapus -->

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Hapus<?php echo $data['fotoID'] ?>">
Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="Hapus<?php echo $data['fotoID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../config/aksi_foto.php" method="POST">
        <input type="hidden" name="fotoID" value="<?php echo $data['fotoID'] ?>">
        Apakah Anda Yakin Akan Menghapus Data <strong> <?php echo $data['judulfoto']?></strong>?
      </div>
      <div class="modal-footer">
        <button type="submit" name="Hapus" class="btn btn-primary">Hapus Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>


<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
  <p>&copy; UKK RPL 2024|Mahasuari</p>
</footer>

<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
</body>
</html>