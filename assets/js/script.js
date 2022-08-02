// testing connect javascript console
console.log("hello world");

// tambah task start
let tambahTask = document.querySelector(".todolist_right");
let showTask = document.querySelector(".task_show");
tambahTask.addEventListener("click", function () {
  showTask.classList.toggle("task_show");
});
// tambah task end

let inputName = document.getElementById("inputName");
// form input
// check ambil nilai input start
let input = document.getElementById("form-tambah");
input.addEventListener("keypress", function (event) {
  const task = {
    name: document.getElementById("inputName").value,
    desc: document.getElementById("inputDesc").value,
    date: document.getElementById("inputDate").value,
  };
  if (event.key === "Enter") {
    event.preventDefault();
    if (task.name === "") {
      alert("Nama tugas tidak boleh kosong !");
    } else {
      console.log(task.name);
      console.log(task.desc);
      console.log(task.date);
      handleEnterAddTask();
      showTask.classList.toggle("task_show");
      document.getElementById("inputName").value = "";
      document.getElementById("inputDesc").value = "";
      document.getElementById("inputDate").value = "";
      alert("Data berhasil ditambahkan");
    }
  }
});
// check ambil nilai input end

// newtask start
function handleEnterAddTask() {
  const task = {
    name: document.getElementById("inputName").value,
    desc: document.getElementById("inputDesc").value,
    date: document.getElementById("inputDate").value,
  };

  let newTask = document.getElementById("inputBaru");
  newTask.innerHTML += `<div class="task_content_bar" id="newTaskBar ">
                <div class="task_content" id="newTask">
                  <input type="checkbox" name="task" id="${task.name}" />
                  <label for="${task.name}"></label>
                  <span class="title_content">${task.name}</span>
                  <span class="sort_content">${task.date}</span>
                  <img src="./assets/img/more-vertical.png" alt="more" class="more">
                  <!-- task modal start -->
                  <div class="task_content_modal" id="modalTask">
                    <div class="modal_content">
                      <div class="modal_task edit">
                        <img src="./assets/img/Iconly-Bold-Edit.png" alt="rename">
                        <p>Rename Task</p>
                      </div>
                      <div class="modal_task delete">
                        <img src="./assets/img/Iconly-Bold-Delete.png" alt="delete">
                        <p>Delete Task</p>
                      </div>
                    </div>
                  </div>
                  <!-- task modal end -->

                  <p class="text_content">${task.desc}</p>
                </div>
                <img src="./assets/img/dropdown black.png" alt="dropdown" class="task_dropdown" id="dropTaskContent" />
              </div>
             `;
}
// newtask  end

// subtask dropdown start
let subTaskBar = document.querySelectorAll("#subTaskBar");
let taskButton = document.querySelectorAll(".task_dropdown");
// jika ada class task_drop maka akan
for (
  let taskButtonNode = 0;
  taskButtonNode < taskButton.length;
  taskButtonNode++
) {
  taskButton[taskButtonNode].addEventListener("click", function () {
    if (taskButton[taskButtonNode].classList.contains("task_dropdown")) {
      // active , jika salah
      taskButton[taskButtonNode].classList.add("rotate");
      taskButton[taskButtonNode].classList.remove("task_dropdown");
    } // active
    else {
      taskButton[taskButtonNode].classList.remove("rotate");
      taskButton[taskButtonNode].classList.add("task_dropdown");
    }
    // ini saya loop berdasarkan dari jumlah taskdropdown dikarenakan 1 paket
    subTaskBar[taskButtonNode].classList.toggle("show");
  });
}
// subtask dropdown end

// modal more start
let modalButton = document.querySelectorAll(".more");
let modalBar = document.querySelectorAll(".modal_content");
for (let modalNode = 0; modalNode < modalButton.length; modalNode++) {
  modalButton[modalNode].addEventListener("click", function () {
    if (modalBar[modalNode].style.display === "block") {
      modalBar[modalNode].style.display = "none";
    } else {
      modalBar[modalNode].style.display = "block";
    }
  });
}
// modal more end

// subtask content start
// subtask content end

// addsubtask show/close start
let buttonAddSubtask = document.getElementsByClassName("subtask_addbutton");
let showInputSubtask = document.getElementsByClassName("subtask_add");
for (
  let buttonAddNode = 0;
  buttonAddNode < taskButton.length;
  buttonAddNode++
) {
  buttonAddSubtask[buttonAddNode].addEventListener("click", function () {
    showInputSubtask[buttonAddNode].classList.toggle("show_subtask");
  });
}
// addsubtask show/close end

// func addsubtask start
let inputSubtask = document.querySelectorAll(".subtask_addinput");
let inputBaru = document.querySelectorAll("#subtaskBaru");

for (
  let inputSubtaskNode = 0;
  inputSubtaskNode < taskButton.length;
  inputSubtaskNode++
) {
  inputSubtask[inputSubtaskNode].addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
      if (inputSubtask[inputSubtaskNode].value === "") {
        alert("Nama tugas tidak boleh kosong !");
      } else {
        console.log(inputSubtask[inputSubtaskNode].value);
        inputBaru[inputSubtaskNode].innerHTML += `
                                 <div class="subtask_content" id="subtask_content">
                                    <div class="subtask_input">
                                        <input type="checkbox" id="${inputSubtask[inputSubtaskNode].value}" />
                                        <label for="${inputSubtask[inputSubtaskNode].value}"></label>
                                        <span>${inputSubtask[inputSubtaskNode].value}</span>
                                    </div>
                                    <img src="./assets/img/trash-delete.png" alt="Tambah Task" class="subtask_content_delete" id="deleted">
                                </div>
                                `;

        let deleteSubTask = document.querySelectorAll("#deleted");
        let contentSubTask = document.querySelectorAll("#subtask_content");
        for (let ad = 0; ad < deleteSubTask.length; ad++) {
          deleteSubTask[ad].addEventListener("click", function () {
            let konfirm = confirm("Apakah dihapus ?");
            if (konfirm == true) {
              contentSubTask[ad].remove(".subtask_content");
            }
          });
        }

        // alert("Data berhasil ditambahkan");
        document.getElementById("subtask_addinput").value = "";
      }
    }
  });
}

let deleteSubTask = document.querySelectorAll(".subtask_content_delete");
let contentSubTask = document.querySelectorAll("#subtask_content");
for (let k = 0; k < deleteSubTask.length; k++) {
  deleteSubTask[k].addEventListener("click", function () {
    let konfirm = confirm("Apakah dihapus ?");
    if (konfirm == true) {
      contentSubTask[k].remove(".subtask_content");
    }
  });
}

// func addsubtask end
// function handleEnterSubTask() {
//   let inputBaru = document.querySelectorAll("#subtaskBaru");
//   let inputSubtask = document.getElementsByClassName("subtask_addinput").value;
//   inputBaru[0].innerHTML += `
//                                  <div class="subtask_content" id="subtask_content">
//                                     <div class="subtask_input">
//                                         <input type="checkbox" id="${inputSubtask}" />
//                                         <label for="${inputSubtask}">${inputSubtask}</label>
//                                         <span>${inputSubtask}</span>
//                                     </div>
//                                     <img src="./assets/img/trash-delete.png" alt="Tambah Task" class="subtask_content_delete">
//                                 </div>
//                                 `;
//   deletedSubtask();
// }
