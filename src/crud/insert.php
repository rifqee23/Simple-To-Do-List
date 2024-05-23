<?php 
include("./../koneksi.php");

var_dump($_GET);


if(isset($_GET["submit"])) {
    $title = trim($_GET["title"]);
    $time = $_GET["time"];
    $date = $_GET["date"];
    $priority = $_GET["priority"];
    $catatan = $_GET["catatan"];

    $sql = "INSERT INTO task (title, waktu, tanggal, priority, note) VALUES ('$title', '$time', '$date', '$priority', '$catatan')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>