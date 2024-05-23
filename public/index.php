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

        <div id="list" class="label">
          <i id="chevron" class="fa-solid fa-chevron-right"></i>
          <p>List</p>
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
          class="fixed inset-0 hidden bg-black opacity-80"
        ></div>
        <div
          id="modal"
          class="absolute hidden w-full max-w-lg p-4 -translate-x-1/2 bg-blue-400 top-1/2 left-1/2 -translate-y-2/3"
        >
          <div class="justify-between label hover:bg-transparent">
            <h1 class="text-2xl font-bold ps-4">To do</h1>
            <i id="close" class="text-2xl fa-solid fa-circle-xmark"></i>
          </div>

          <div class="ps-8">
            <form action="./../src/crud/insert.php" method="get">
              <div>
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
                  class="px-3 py-1 font-normal rounded-full"
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

        <div class="container mt-16">
          <div class="gap-4 label hover:bg-transparent">
            <i class="fa-solid fa-person-walking text-8xl"></i>
            <h1 class="gap-10 text-3xl font-bold">Personal</h1>
          </div>

          <div id="newtask" class="text-lg label hover:bg-transparent">
            <i class="text-2xl text-blue-500 fa-regular fa-square-plus"></i>
            <p class="font-semibold">New Task</p>
          </div>

          <div>
            <div class="relative w-full max-w-sm px-3 py-2 bg-blue-500">
              <input
                class="absolute left-4 top-4"
                type="checkbox"
                name=""
                id=""
              />
              <h1 class="py-2 font-bold text-center">Title</h1>
              <p class="w-full p-4 rounded-lg outline outline-black">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi
                sed reiciendis impedit eius culpa, dolor eligendi voluptatem.
                Natus labore voluptatum, laboriosam veritatis, quod quae
                deserunt illo unde quisquam maiores placeat!
              </p>

              <div
                class="justify-end font-light cursor-default label hover:bg-transparent"
              >
                <p>06:33</p>
                <p>20-12-2030</p>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>

    <script>
      const list = document.getElementById("list");
      const chevron = document.getElementById("chevron");
      const activity = document.getElementById("activity");

      const modal = document.getElementById("modal");
      const newtask = document.getElementById("newtask");

      const overlay = document.getElementById("overlay");

      const close = document.getElementById("close");

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

      close.addEventListener("click", () => {
        modal.classList.add("hidden");
        overlay.classList.add("hidden");
      });
    </script>
  </body>
</html>
