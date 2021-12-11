<?php
    require("connection/config.php");

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $query = "DELETE FROM tasks WHERE id=$id";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            echo header('Location: ../task manager/managetasks.php?msg=dsuccess');
        }
        else
        {
            echo header('Location: ../managetasks.php?msg=derror');
        }
    }
?>