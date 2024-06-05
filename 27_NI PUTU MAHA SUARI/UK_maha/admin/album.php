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
            <div class="card-header">Tambah Album</div>
            <div class="card-body">
            <form action="../config/aksi_album.php" method="POST">
            <label class="form-label">Nama Album</label>
            <input type="text" name="namaAlbum" class="form-control" required>
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" required></textarea>
            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>

            </form>
            </div>
        </div>
    </div>

        <div class="col-md-8">
        <div class="card mt-2">
            <div class="card-header">Data Album</div>
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Album</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $UserID = $_SESSION['UserID'];
                  $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID ='$UserID'");
                  while ($data = mysqli_fetch_array($sql)) {
                  ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $data['namaAlbum'] ?></td>
                        <td><?php echo $data['deskripsi'] ?></td>
                        <td><?php echo $data['tanggaldibuat'] ?></td>
                        <td>
                          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Edit<?php echo $data['albumID'] ?>">
Edit
</button>

<!-- Modal -->
<div class="modal fade" id="Edit<?php echo $data['albumID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../config/aksi_album.php" method="POST">
        <input type="hidden" name="albumID" value="<?php echo $data['albumID'] ?>">
        <label class="form-label">Nama Album</label>
            <input type="text" name="namaAlbum" value="<?php echo $data['namaAlbum'] ?>" class="form-control" required>
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" value="<?php echo $data['namaAlbum'] ?>" required>
              <?php echo $data ['deskripsi'] ?>
          </textarea>
        
      </div>
      <div class="modal-footer">
        <button type="submit" name="Edit" class="btn btn-primary">Edit Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
                                                <!-- tombol hapus -->

<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Hapus<?php echo $data['albumID'] ?>">
Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="Hapus<?php echo $data['albumID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../config/aksi_album.php" method="POST">
        <input type="hidden" name="albumID" value="<?php echo $data['albumID'] ?>">
        Apakah Anda Yakin Akan Menghapus Data <strong> <?php echo $data['namaAlbum']?></strong>?
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