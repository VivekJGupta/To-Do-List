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

    <?php
        echo '<script>alert("Delete Page")</script>';

        $task_id = $_GET['id'];
        include 'connection.php';

        $sql = "delete from task where id=".$task_id.";";
        $result = mysqli_query($conn, $sql) or die("Query unsuccessful !");

        echo '<script>alert("Note Deleted Successfully !")</script>';

        
        
        header("Location: http://localhost/vivek/");


    ?>
    


    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>