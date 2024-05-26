<?php

include("./../src/koneksi.php");

$sql = "SELECT * FROM task";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To Do List</title>
    <link rel="stylesheet" href="output.css" />
    <script
      src="https://kit.fontawesome.com/c4ce7ec2a0.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="flex">
      <!-- Modal Edit -->
<div
id="modalEdit"
class="absolute z-50 w-full max-w-lg p-4 -translate-x-1/2 bg-blue-400 top-1/2 left-1/2 -translate-y-2/3"
>
<div class="justify-between label hover:bg-transparent">
  <h1 class="text-2xl font-bold ps-4">To do</h1>

  <i  class="text-2xl fa-solid fa-circle-xmark"></i>
</div>

<div class="ps-8">
  <?php
    
    $id = $_GET["id"];
    $query = "SELECT note, id FROM task WHERE id='$id'";
    $data = mysqli_query($conn, $query);

    
      while($d = mysqli_fetch_array($data)) :
  ?>
  <form action="./../src/crud/update.php" method="post">

        <input type="hidden" name="id" value="<?php echo $d["id"]?>">
    
    <div class="mt-2">
      <label class="block mb-1 font-semibold text-md" for="">
        Catatan</label
      >

      <textarea
        class="p-4 resize-none"
        name="catatan"
        id="catatan"
        cols="30"
        rows="10"
      ><?php echo $d["note"] ?></textarea>
    </div>

    <button
      class="px-4 py-1 mt-2 font-semibold text-white bg-green-400 rounded-full"
      type="submit"
      name="submit"
    >
      Add Task
    </button>
  </form>
  <?php endwhile; ?>
</div>
</div>
<!-- Modal Edit End -->
    </div>

    
  </body>
</html>
