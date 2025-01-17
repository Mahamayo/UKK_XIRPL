<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>website Galery Photo</title>
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
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

     </div>  
     	<a href="register.php" class="btn btn-outline-primary m-1">Daftar</a>
     	<a href="login.php" class="btn btn-outline-success m-1">Masuk</a>
    </div>
  </div>
</nav>

<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-4">
			<div class="card">
				<div class="card-body bg-light">
					<div class="text-center">
						<h5>Register Galery</h5>
					</div>
					<form action="config/aksi_register.php" method="POST">
						<label class="form-label">Username</label>
						<input type="text" name="Username" class="form-control" required>
						<label class="form-label">Password</label>
						<input type="Password" name="Password" class="form-control" required>
						<div class="d-grid mt-2">
						<label class="form-label">Email</label>
						<input type="Email" name="Email" class="form-control" required>
						<label class="form-label">Nama Lengkap</label>
						<input type="text" name="NamaLengkap" class="form-control"
						 required>
						<label class="form-label">Alamat</label>
						<input type="text" name="Alamat" class="form-control" required>
							<button class="btn btn-primary" type="submit" name="Kirim">DAFTAR</button>
						</div>
					</form>
					<hr>
					<p>Sudah Punya Akun? <a href="login.php">Login Disini!</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
	<p>&copy; UKK RPL 2024|Mahasuari</p>
</footer>

<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
</body>
</html>