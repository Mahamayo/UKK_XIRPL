<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d');
    $albumID = $_POST['albumID'];
    $UserID = $_SESSION['UserID'];
    $foto = $_FILES['lokasiFile']['name'];
    $tmp =$_FILES['lokasiFile']['tmp_name'];
    $lokasi ='../asset/img/';
    $namafoto = rand().'-'.$foto;

    move_uploaded_file($tmp, $lokasi.$namafoto);

    $sql = mysqli_query($koneksi, "INSERT INTO foto VALUES('','$judulfoto','$deskripsifoto','$tanggalunggah','$namafoto','$albumID','$UserID')");

    echo "<script>
    alert('Data berhasil disimpan!');
    location.href='../admin/foto.php';
    </script>";
}
if (isset($_POST['edit'])) {
    $fotoID = $_POST['fotoID'];
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('Y-m-d');
    $albumID = $_POST['albumID'];
    $UserID = $_SESSION['UserID'];
    $foto = $_FILES['lokasiFile']['name'];
    $tmp =$_FILES['lokasiFile']['tmp_name'];
    $lokasi ='../asset/img/';
    $namafoto = rand().'-'.$foto;

    if ($foto == null) {
        $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto = '$judulfoto',deskripsifoto='$deskripsifoto',tanggalunggah='$tanggalunggah', albumID='$albumID' WHERE fotoID ='$fotoID'");
    }else {
        $query = mysqli_query($koneksi, "SELECT  * FROM  foto  WHERE fotoID = '$fotoID' ");
        $data = mysqli_fetch_array($query);
        if (is_file('../asset/img/'.$data['lokasiFile'])) {
            unlink('../asset/img/'.$data['lokasiFile']);
        }
        move_uploaded_file($tmp, $lokasi.$namafoto);
    
            $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto = '$judulfoto',deskripsifoto='$deskripsifoto',tanggalunggah='$tanggalunggah',lokasiFile='$namafoto', albumID='$albumID' WHERE fotoID ='$fotoID'");
    
    echo "<script>
    alert('Data berhasil diperbarui!');
    location.href='../admin/foto.php';
    </script>";
    }
}
if (isset($_POST['Hapus'])) {
    $fotoID = $_POST['fotoID'];
    $query = mysqli_query($koneksi, "SELECT  * FROM  foto  WHERE fotoID = '$fotoID' ");
        $data = mysqli_fetch_array($query);
        if (is_file('../asset/img/'.$data['lokasiFile'])) {
            unlink('../asset/img/'.$data['lokasiFile']);
        }

        $sql = mysqli_query($koneksi, "DELETE FROM foto WHERE fotoID  = '$fotoID' ");
        echo "<script>
        alert('Data berhasil dihapus!');
        location.href='../admin/foto.php';
        </script>"; 
    }
?>