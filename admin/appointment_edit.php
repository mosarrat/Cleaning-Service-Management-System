<?php include('partials/menu.php');?>
<?php 

    require_once("connection.php");
    $ID = $_GET['GetID'];
    $query = " select * from appointment where id= '$ID'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $ID = $row['id'];
        $service_title = $row['service'];
        $price = $row['price'];
        $price_des = $row['price_des'];
        $dat = $row['appointment_on'];
        $mea = $row['measure'];
        $total = $row['total'];
        $appoint_dat = $row['appointment_made'];
        $customer_name = $row['customer_name'];
        $customer_contact= $row['customer_contact'];
        $customer_email = $row['customer_email'];
        $customer_address= $row['customer_address'];
        $status = $row['status'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">

</head>
<body>

        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card bg-light mt-5">
                        <div class="card-title">
                            <h3 class="bg-primary text-white text-center py-3"> Update Appointment</h3>
                        </div>
                        <div class="card-body">

                            <form action="appointment-update.php?ID=<?php echo $ID?>" method="post">
                                <tr><b>Status:</b></tr><br>
                                <tr>
                                <select name = "status">
                                <option <?php if($status=="Appoint"){echo "selected";}?> value="Appoint">Appoint</option>
                                <option <?php if($status=="On Process"){echo "selected";}?> value="On Process">On Process</option>
                                <option <?php if($status=="Completed"){echo "selected";}?> value="Completed">Completed</option>
                                <option <?php if($status=="Cancelled"){echo "selected";}?> value=" Cancelled"> Cancelled</option>
                                </select>
                                </tr><br><br>
                                <a href ="manage-appoinment.php" class="btn btn-danger">cancel</a>
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
<?php include('partials/footer.php');?>

