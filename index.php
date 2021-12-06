<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>To-Do</title>
</head>
<body>

    <?php include 'connection.php' ?>
    <?php
        $list = "select * from task";
        $todo_list = mysqli_query($conn, $list) or die('<script>alert("List fetching error...")</script>');
    ?>
    
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="vk-header col-md-10 d-flex align-items-center justify-content-center">
                
                <button type="button" style="width:150px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#new-todoform">
                    <span style="font-size:30px;">+</span>
                </button>

            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="vk-row col-md-3 p-3">
                <div class="list-group" id="list-tab" role="tablist" style="margin-top:30px;">
                    <?php 
                        if(mysqli_num_rows($todo_list)>0)
                        {
                            foreach($todo_list as $item)
                            {
                    ?>
                                <a class="list-group-item list-group-item-action shadow-sm" id="<?php echo $item['id']?>" data-bs-toggle="list" href="#list-<?php echo $item['id']?>" role="tab" aria-controls="list-<?php echo $item['id']?>"><?php echo $item['title']?></a>
                    <?php   } ?>
                </div>
            </div>
            <div class="vk-row col-md-8 mx-4 p-3 border shadow-sm">
                <div class="tab-content" id="nav-tabContent" style="margin-top:8px">
                    <?php
                            foreach($todo_list as $item)
                            {
                    ?>
                    <div class="tab-pane fade" id="list-<?php echo $item['id']?>" role="tabpanel" aria-labelledby="list-<?php echo $item['id']?>-list">
                        
                    
                        <!-- To Do List Options -->
                        <div class="vk-header d-flex align-items-center justify-content-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic radio toggle button group">
                                
                                <a href="http://localhost/vivek/updateTask.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-primary" name="btnradio" id="btnradio3">Update</a>

                                <a href="http://localhost/vivek/print.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-primary" name="btnradio" id="btnradio3">Print</a>

                                <a href="http://localhost/vivek/deleteTask.php?id=<?php echo $item['id']; ?>" class="btn btn-outline-danger" name="btnradio" id="btnradio3">Delete</a>
                                <!-- <label class="btn btn-outline-danger" for="btnradio3">Delete</label> -->
                            </div>
                        </div>
                    
                    
                    
                        <!-- To Do List Items -->
                        <h2><strong><?php echo $item['title']?></strong></h2>
                        <table>
                            <tr>
                                <td><span style="color:blue">Created</span></td>
                                <td>:</td>
                                <td><small><?php echo $item['created_at'] ?></small></td>
                            </tr>
                            <tr>
                                <td><span style="color:red">Reminder</span></td>
                                <td>:</td>
                                <td><?php echo $item['reminder']?></td>
                            </tr>
                            <tr><td><hr></td></tr>
                            <tr>
                                <td><strong>Note</strong></td>
                                <td>:</td>
                                <td><?php echo $item['note']?></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                            }
                        }
                        else
                        {
                            echo('<script>alert("No TO-DO Items available !")</script>');
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    


    <!-- Bootstrap Modat New To Do Form -->
    <div class="modal fade" id="new-todoform" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" arial-labelledby="staticBackdropLabel" arial-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-light" id="staticBackdropLabel">New To Do List</h5>
                    <button type="button" class="btn-close text-light" data-bs-dismiss="modal" arial-label="Close"></button>
                </div>
                <div class="modal-body">
                        
                    <form action="/vivek/index.php" method="POST">
                        <div class="md-3 mt-2">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="md-3 mt-2">
                            <label for="reminder" class="form-label">Remind at</label>
                            <input type="date" min="<?php echo date('Y-m-d') ?>" name="reminder" class="form-control" id="reminder">
                        </div>
                        <div class="md-3 mt-2">
                            <label for="note" class="form-label">Note</label>
                            <textarea class="form-control" name="note" id="note" rows="5"></textarea>
                        </div>
                        <div class="md-3 mt-2">
                            <button type="reset" class="btn btn-secondary">RESET</button>
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>
                    </form>

                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Close</button>
                </div> -->
            </div>
        </div>

    </div>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $title = $_POST['title'];

            $reminder = date('Y-m-d', strtotime($_POST['reminder']));
            $note = $_POST['note'];


            $insert = "insert into task(title, reminder, note) values('".$title."', '".$reminder."', '".$note."')";
            $result = mysqli_query($conn, $insert) or die('<script>alert("Database Error !")</script>');
            echo('<script>alert("Note Added Successfully !")</script>');

        }
    ?>


    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>