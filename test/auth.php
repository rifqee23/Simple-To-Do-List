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
      <aside class="w-1/6 h-screen bg-slate-100">
        <div class="text-lg label">
          <i class="fa-solid fa-user"></i>
          <p class="font-semibold">Rifqi</p>
        </div>

        <div class="label">
          <i class="fa-solid fa-bell"></i>
          <p>Notification</p>
        </div>

        <div id="list" class="select-none label">
          <i id="chevron" class="select-none fa-solid fa-chevron-right"></i>
          <p class="select-none b">List</p>
        </div>

        <section id="activity" class="hidden ms-5">
          <div class="label bg-slate-200">
            <i class="fa-solid fa-person-walking"></i>
            <p>Personal</p>
          </div>

          <div class="label">
            <i class="fa-solid fa-briefcase"></i>
            <p>Work</p>
          </div>

          <div class="label">
            <i class="fa-solid fa-school"></i>
            <p>Study</p>
          </div>
        </section>

        <div class="label gap-1.5">
          <i class="fa-solid fa-right-from-bracket"></i>
          <p class="">Sing Out</p>
        </div>
      </aside>

      <main class="relative w-4/5">
        <!-- Modal -->
        <div
          id="overlay"
          class="fixed inset-0 z-40 hidden bg-black opacity-80"
        ></div>
        <div
          id="modal"
          class="absolute z-50 hidden w-full max-w-lg p-4 -translate-x-1/2 bg-blue-400 top-1/2 left-1/2 -translate-y-2/3"
        >
          <div class="justify-between label hover:bg-transparent">
            <h1 class="text-2xl font-bold ps-4">To do</h1>
            <i  class="text-2xl fa-solid fa-circle-xmark"></i>
          </div>

          <div class="ps-8">
            <form action="./../src/crud/insert.php" method="get">
              <div>
                <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                <label class="block mb-1 font-semibold text-md" for=""
                  >Title</label
                >
                <input
                  class="px-3 py-1 rounded-full"
                  type="text"
                  name="title"
                />
              </div>
              <div class="mt-2">
                <label class="block mb-1 font-semibold text-md" for=""
                  >Tanggal dan Waktu</label
                >
                <input class="px-3 py-1 rounded-full" type="time" name="time" />

                <input
                  class="px-3 py-1 font-normal rounded-full "
                  type="date"
                  name="date"
                />
              </div>
              <div class="mt-2">
                <label class="block mb-1 font-semibold text-md" for=""
                  >Prioritas</label
                >
                <select
                  class="px-3 py-2 rounded-full w-72"
                  name="priority"
                  id=""
                >
                  <option value="Rendah">Rendah</option>
                  <option value="Sedang">Sedang</option>
                  <option value="Tinggi">Tinggi</option>
                </select>
              </div>

              <div class="mt-2">
                <label class="block mb-1 font-semibold text-md" for="">
                  Catatan</label
                >

                <textarea
                  class="p-4 resize-none"
                  name="catatan"
                  id=""
                  cols="30"
                  rows="10"
                ></textarea>
              </div>

              <button
                class="px-4 py-1 mt-2 font-semibold text-white bg-green-400 rounded-full"
                type="submit"
                name="submit"
              >
                Add Task
              </button>
            </form>
          </div>
        </div>
        <!-- End Modal -->

        <!-- Modal Edit -->
        <div
          id="modalEdit"
          class="absolute z-50 hidden w-full max-w-lg p-4 -translate-x-1/2 bg-blue-400 top-1/2 left-1/2 -translate-y-2/3"
        >
          <div class="justify-between label hover:bg-transparent">
            <h1 class="text-2xl font-bold ps-4">To do</h1>

            <i  class="text-2xl fa-solid fa-circle-xmark"></i>
          </div>

          <div class="ps-8">
            <?php
              
              $query = "SELECT note FROM task";
              $data = mysqli_query($conn, $query);

              if(mysqli_num_rows($data) > 0) :
                $d = mysqli_fetch_assoc($data);
            ?>
            <form action="./../src/crud/insert.php" method="post">


              
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
            <?php endif; ?>
          </div>
        </div>
        <!-- Modal Edit End -->

        <div class="container mt-16">
          <div class="gap-4 label hover:bg-transparent">
            <i class="fa-solid fa-person-walking text-8xl"></i>
            <h1 class="gap-10 text-3xl font-bold">Personal</h1>
          </div>

          <div
            id="newtask"
            class="p-0 text-lg gap-x-2 w-28 label hover:bg-transparent"
          >
            <i class="text-2xl text-blue-500 fa-regular fa-square-plus"></i>
            <span class="font-semibold">New Task</span>
          </div>

          <div class="flex flex-wrap gap-5 mt-5">
            <?php if(mysqli_num_rows($result)) : ?>
            <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <div class="relative w-full max-w-sm px-3 py-2 bg-blue-500 h-72">
              <input
                class="absolute px-4 font-semibold rounded-lg text-slate-200 bg-emerald-400 left-4 top-4"
                type="button"
                value="DONE"
              />
              <h1 class="py-2 font-bold text-center">
                <?php echo $row["title"] ?>
              </h1>
              <div class="relative h-48 max-w-sm overflow-auto scrollbar">
                <a href="#" id="edit" data-id="<?php echo $row["id"] ?>" class="w-full h-4 cursor-pointer">
                  <i  class="absolute cursor-pointer right-1 top-1 fa-solid fa-pencil"></i>
                </a>
                <p class="p-4 font-bold break-words rounded-lg bg-emerald-400">
                  <?php echo $row["note"] ?>
                </p>
              </div>

              <div
                class="absolute bottom-0 right-0 justify-end font-light cursor-default label hover:bg-transparent"
              >
                <p><?php echo $row["waktu"] ?></p>
                <p><?php echo $row["tanggal"] ?></p>
              </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
      const list = document.getElementById("list");
      const chevron = document.getElementById("chevron");
      const activity = document.getElementById("activity");

      const modal = document.getElementById("modal");
      const newtask = document.getElementById("newtask");

      const overlay = document.getElementById("overlay");

      const edit = document.querySelectorAll("#edit");
      const modalEdit = document.getElementById("modalEdit");

      const close = document.querySelectorAll("i.fa-circle-xmark");


        
      

      list.addEventListener("click", () => {
        if (chevron.classList.contains("fa-chevron-right")) {
          chevron.classList.remove("fa-chevron-right");
          activity.classList.remove("hidden");
          chevron.classList.add("fa-chevron-down");
        } else {
          chevron.classList.remove("fa-chevron-down");
          chevron.classList.add("fa-chevron-right");
          activity.classList.add("hidden");
        }
      });

      newtask.addEventListener("click", () => {
        modal.classList.remove("hidden");
        overlay.classList.remove("hidden");
      });

      close.forEach(close=> {
        close.addEventListener("click", () => {
          modal.classList.add("hidden");
          modalEdit.classList.add("hidden");
          overlay.classList.add("hidden");
        });
      })

      edit.forEach(edit => {
        edit.addEventListener("click", () => {
          event.preventDefault()
          modalEdit.classList.remove("hidden");
          overlay.classList.remove("hidden");
        })
      })

      $(document).ready(function(){

        $("#edit").click(function (e) {
          e.preventDefault();

          var user_id = $(this).data('id');

          $.ajax({
            method: "POST",
            url: "../src/crud/update.php",
            data: {id: user_id},
            success: function (response) {
              $.each(response, function(key, value){
                $('#catatan').val(value['catatan']);
              });
            }
          })
        }) 
      })

    </script>
  </body>
</html>
