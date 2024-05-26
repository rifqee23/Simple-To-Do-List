<?php

include("./../koneksi.php");
echo "ho";
$id = $_GET['id'];

$sql = "DELETE FROM task WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if($result) {
    header("Location: ./../../public/index.php");
    exit();
} else {
    echo "<script>alert('Gagal Menghapus data');</script>";
}
?>