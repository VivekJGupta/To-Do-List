<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Update</title>
</head>
<body>

    <?php
        $conn = mysqli_connect(
            "localhost",
            "root",
            "",
            "vivek"
        );
    ?>
    
    <?php

        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {

            $task_id = $_GET['id'];

            $query = "select * from task where id=".$task_id.";";
            $result = mysqli_query($conn, $query) or die('Query unsuccessful !');

            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
    ?>

                    <div class="container">
                            <div class="row mt-5 rounded bg-light border shadow-sm p-4 col-md-6">
                                <form method="POST" action="./updateTask.php">
                                    <div class="form-group mt-2">
                                        <input name="id" value="<?php echo $row['id']; ?>" class="form-control" id="id" aria-describedby="textHelp" hidden>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="id">Title</label>
                                        <input name="title" value="<?php echo $row['title']; ?>" class="form-control" id="title" aria-describedby="textHelp">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="name">Remind at</label>
                                        <input type="date" min="<?php echo date('Y-m-d') ?>" name="reminder" value="<?php echo $row['reminder']; ?>" class="form-control" id="reminder" aria-describedby="textHelp">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="descreption">Note</label>
                                        <textarea name="note" class="form-control" id="note" rows="5"><?php echo $row['note']; ?></textarea>
                                    </div>
                                    <button type="submit"  class="btn btn-primary m-3">UPDATE</button>
                                    <a href="./" class=" mt-3 btn btn-outline-primary" style="display:inline">Back</a>
                                </form>
                            </div>
                        </div>


    <?php
        }}}
        
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $task_id = $_POST['id'];
            $title = $_POST['title'];
            $reminder = $_POST['reminder'];
            $note = $_POST['note'];

            $update_query = "update task set title='{$title}', reminder='{$reminder}', note='{$note}'  where id={$task_id}";
            $result = mysqli_query($conn, $update_query) or die('<script>alert("Database Insertion Error.")</script>');
            echo ('<script>alert("Updated Successfully !")</script>');
            
            header("Location: http://localhost/vivek/index.php");

        }

        mysqli_close($conn);
        
    ?>


    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>