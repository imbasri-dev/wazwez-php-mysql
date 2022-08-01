<?php
// mengambil/import php data dari db.php
include "database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- link style css ext -->
    <link rel="stylesheet" href="./assets/style/style.css" />
    <title>Fazztrack | WazWez App</title>
</head>

<body>
    <header>
        <!-- nav start -->
        <nav id="navbar">
            <div class="nav_logo">
                <img src="./assets/img/logo_wazwez.png" alt="logo" />
            </div>
            <div class="nav_user">
                <!-- notif -->
                <div class="nav_user_notif">
                    <img src="./assets/img/Iconly-Bold-Notification.png" alt="nav_notif" />
                    <img class="notif-circle" src="./assets/img/Iconly-Bold-Notification-In.png" />
                </div>
                <!-- avatar -->
                <div class="nav_user_avatar">
                    <div class="avatar">
                        <img src="./assets/img/avatar.png" alt="avatar" />
                    </div>
                    <p>Krozeo Jupiter</p>
                    <img src="./assets/img/dropdown black.png" alt="drop arrow" />
                </div>
            </div>
        </nav>
        <!-- nav end -->
    </header>
    <main id="container">
        <!-- todolist bar head start -->
        <div class="todolist_bar">
            <div class="todolist_left">
                <h3>my tasks</h3>
                <h2>To Do List</h2>
                <p>Buat list tugas harian saya</p>
            </div>
            <div class="todolist_right">
                <a href="#" id="tambah_tugas"> <span class="oval">+</span> <span class="todolist_title">Tambah tugas</span> </a>
            </div>
        </div>
        <!-- todolist bar head end -->

        <!-- todolist sort start -->
        <div class="todolist_sort">
            <label for="sorts">Sort By</label>
            <select name="sorts" id="sorts">
                <option value="date">By Tanggal</option>
                <option value="time">By Time</option>
                <option value="date">Terbaru</option>
            </select>

        </div>
        <!-- todolist sort end -->
        <div id="task_container">
            <!-- tambah data form start -->
            <div class="task_content_bar task_tambah_bar task_show">
                <div class="task_content task_tambah_data" id="form-tambah">
                    <input type="checkbox" name="task" />
                    <label for="inputName"></label>
                    <div class="input_tambah">
                        <div id="formTambah" class="form_tambah">
                            <input type="text" placeholder="Masukan nama tugas" class="namaTugas" id="inputName">
                            <div class=" taskInput">
                                <img src="./assets/img/menu-task.png" alt="description">
                                <input type="text" placeholder="Deskripsi Tugas (Opsional)" id="inputDesc">
                            </div>
                            <div class=" taskInput"><img src="./assets/img/Iconly-Light-Outline-Calendar.svg" alt="date">
                                <input type="text" placeholder="Tanggal & Waktu" id="inputDate">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tambah data form start -->
            <?php
            //   import data tasks dari mysql
            $tasks = mysqli_query($conn, $dataTasks);
            foreach ($tasks as $task) {
            ?>
                <div id=" contentTask">
                    <!-- content 1 start -->
                    <div class="task_content_bar" id="newTaskBar ">
                        <div class="task_content" id="newTask">
                            <input type="checkbox" name="task" id="<?= $task['task_id'] ?>" />
                            <label for="<?= $task["task_id"] ?>"></label>
                            <span class="title_content"><?= $task["name"] ?></span>
                            <span class="sort_content"><?= $task["date"] ?></span>
                            <img src="./assets/img/more-vertical.png" alt="more" class="more">
                            <!-- task modal start -->
                            <div class=" task_content_modal" id="modalTask">
                                <div class="modal_content">
                                    <div class="modal_task edit">
                                        <a style="text-decoration: none;" href="deleteTask.php?id=<?= $task['task_id']; ?>">
                                            <img src="./assets/img/Iconly-Bold-Edit.png" alt="Edit">
                                            <span style="color: #293038;">Rename Task</span></a>
                                    </div>
                                    <div class="modal_task delete">
                                        <a style="text-decoration: none;" href="deleteTask.php?id=<?php echo $task['task_id']; ?>">
                                            <img src="./assets/img/Iconly-Bold-Delete.png" alt="delete">
                                            <span style="color: #293038;">Delete Task</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- task modal end -->
                            <p class="text_content"><?= $task["description"] ?></p>
                        </div>
                        <img src="./assets/img/dropdown black.png" alt="dropdown" class="task_dropdown" id="dropTaskContent" />
                    </div>


                    <!-- content 1 end -->

                    <!-- subtask dropdown start -->

                    <div class="subtask_bar show" id="subTaskBar">
                        <div class="subtask_head">
                            <h4>Subtask</h4>
                            <button class="subtask_addbutton"><img src="./assets/img/Iconly-Curved-Plus.svg">Tambah</button>
                        </div>
                        <!-- addsubtask start -->
                        <div class="subtask_add show_subtask" id="subtask_addbar">
                            <input type="text" name="subtask" class="subtask_addinput" id="subtask_addinput" placeholder="Masukkan nama subtask">
                        </div>
                        <!-- addsubtask end -->
                        <!-- subtask  start-->
                        <?php
                        $subtasks = mysqli_query($conn, $dataSubtasksId);
                        foreach ($subtasks as $subtask) {
                            if ($task["task_id"] == $subtask["task_id"]) {
                                // saya pakai kondisi dimana task.task_id == subtask.task_id
                                // jika true akan menampilkan sesuai Task[task_id]
                        ?>
                                <div class="subtask_content" id="subtask_content">
                                    <div class="subtask_input">
                                        <input type="checkbox" id="<?= $subtask['name'] ?>" />
                                        <label for="<?= $subtask['name'] ?>"></label>
                                        <span><?= $subtask['name'] ?></span>
                                    </div>
                                    <img src="./assets/img/trash-delete.png" alt="Tambah Task" class="subtask_content_delete">
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- subtask end -->
                        <div id="subtaskBaru"></div>
                        <!-- subtask dropdown end -->
                    </div>
                    <!-- move hasil input  start-->
                    <div id="inputBaru"></div>
                    <!-- move hasil input  end-->
                </div>


            <?php
            }
            ?>
            <!-- subtask dropdown end -->
            <div class="batas_line"></div>
            <!-- todolist Clear Start -->
            <div class="todolist_clear_container">
                <div class="todolist_clear_content">
                    <img src="./assets/img/dropdown black.png" alt="dropdown_black" />
                    <div class="task">
                        <p>Tugas Terselesaiakan (3 Tugas)</p>
                    </div>
                </div>
            </div>
            <!-- todolist Clear Start -->

            <!-- task_container end -->
    </main>

    <!-- link javascript ext -->
    <script src="./assets/js/script.js"></script>
</body>

</html>