<?php
include("../koneksi.php");
echo "test";
var_dump($_POST);
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $catatan = $_POST['catatan'];

    $sql = "UPDATE `task` SET `note` = '$catatan' WHERE `task`.`id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: ../../public/index.php");
        exit();
    } else {
        echo "Update failed. Please try again.";
    }
}
?>
