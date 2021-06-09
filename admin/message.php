<?php 

require_once("connection.php");
$query = " select * from admin order by id desc limit 1";
$result = mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="../css/bootstrap.css"/>
    

</head>
<body>

        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card bg-light mt-5">
                        <div class="card-title">
                            <h3 class="bg-info text-white text-center py-3"> Notic Please </h3>
                        </div>
                        <div class="card-body">
                        <?php 
                               
                                while($row=mysqli_fetch_assoc($result))
                                {
                                    $ID = $row['Id'];
                                    $FullName = $row['Full_Name'];
                                    $UserName = $row['User_Name'];
                                    $Email = $row['Email'];
                                    $Password = $row['Password'];
                                    $image_name = $row['Image_Name'];
                        ?>
                                
                                    <p>
                                    <b>Dear <?php echo $FullName ?>,</b><br>
                                    <b>User Name:</b> <?php echo $UserName ?><br>
                                    <b>There must be a mistake....<br>
                                    Please check your passwords<br>
                                    Enter your passwords carefully...</b><br>
                                    
                                    </p>
                                    <div class="text-center"> 
                                    <a href="manage-admin.php" class="btn btn-success ">OK</a>
                                    </div>
                                   
                                 
                        <?php 
                                }  
                                mysqli_free_result($result);
                                mysqli_close($con);
                        ?> 
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>