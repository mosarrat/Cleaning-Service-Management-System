<?php 

    require_once("connection.php");

    if(isset($_POST['update']))
    {
        $ID = $_GET['ID'];

        $status = $_POST['status'];


        $query = "UPDATE appointment SET status ='".$status."' WHERE id='".$ID."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:manage-appoinment.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location:manage-appoinment.php");
    }


?>