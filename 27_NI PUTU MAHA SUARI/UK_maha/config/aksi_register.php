<?php
include'koneksi.php';

$Username = $_POST['Username'];
$Password = md5($_POST['Password']);
$Email = $_POST['Email'];
$NamaLengkap = $_POST['NamaLengkap'];
$Alamat = $_POST['Alamat'];

$sql = mysqli_query($koneksi, "INSERT INTO user VALUES ('','$Username','$Password','$Email','$NamaLengkap','$Alamat')");

if ($sql) {
	echo "<script>
	alert('Pendaftaran Akun Berhasil!');
	location.href='../login.php';
	</script>";
}

 ?>