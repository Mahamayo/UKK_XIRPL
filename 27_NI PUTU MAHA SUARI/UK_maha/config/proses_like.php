<?php   
session_start();
include 'koneksi.php';
$fotoID = $_GET['fotoID'];
$UserID = $_SESSION['UserID'];

$ceksuka  = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoID = '$fotoID' AND UserID = '$UserID'");

if (mysqli_num_rows($ceksuka)== 1) {
    while ($row = mysqli_fetch_array($ceksuka)) {
        $likeID = $row['likeID'];
        $query = mysqli_query($koneksi, "DELETE FROM likefoto WHERE likeID = '$likeID'");
        echo "<script>
        location.href='../admin/home.php';
        </script>";

    }
}else {
    $tanggalike = date('y-m-d');
$query = mysqli_query($koneksi, "INSERT INTO likefoto VALUES ('', '$fotoID','$UserID','$tanggalike')" );

echo "<script>
location.href='../admin/home.php';
</script>";
}



?>