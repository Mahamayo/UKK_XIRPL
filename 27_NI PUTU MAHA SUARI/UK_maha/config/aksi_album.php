<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $namaAlbum = $_POST['namaAlbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggaldibuat = date('Y-m-d');
    $UserID = $_SESSION['UserID'];

    $sql = mysqli_query($koneksi, "INSERT INTO album VALUES('','$namaAlbum','$deskripsi','$tanggaldibuat','$UserID')");

    echo "<script>
    alert('Data berhasil disimpan!');
    location.href='../admin/album.php';
    </script>";
}

if (isset($_POST['Edit'])) {
    $albumID = $_POST['albumID'];
    $namaAlbum = $_POST['namaAlbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggaldibuat = date('Y-m-d');
    $UserID = $_SESSION['UserID'];

    $sql = mysqli_query($koneksi, "UPDATE album SET namaAlbum ='$namaAlbum' , deskripsi = '$deskripsi' , tanggaldibuat = '$tanggaldibuat' WHERE albumID = '$albumID'");

    echo "<script>
    alert('Data berhasil diperbarui!');
    location.href='../admin/album.php';
    </script>";

}
if (isset($_POST['Hapus'])) {
    $albumID = $_POST['albumID'];

    $sql = mysqli_query($koneksi, "DELETE FROM album WHERE albumID = '$albumID'");

    echo "<script>
    alert('Data berhasil dihapus!');
    location.href='../admin/album.php';
    </script>";


}



?>