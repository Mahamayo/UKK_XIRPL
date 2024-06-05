<?php 
session_start();
include'koneksi.php';

$fotoID = $_POST['fotoID'];
$userID = $_SESSION['UserID'];
$isikomentar = $_POST['isikomentar'];
$tanggalkomentar = date('y-m-d');

$query = mysqli_query($koneksi, "INSERT INTO komentar VALUES('','$fotoID','$userID','$isikomentar','$tanggalkomentar')");

echo "<script>
location.href='../admin/index.php';
</script>";

?>