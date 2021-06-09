<?php include('partials/menu.php');?>
<?php 

    require_once("connection.php");
    $ID = $_GET['GetID'];
    $query = " select * from admin where Id='".$ID."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $ID = $row['Id'];
        $FullName = $row['Full_Name'];
        $UserName = $row['User_Name'];
        $Email = $row['Email'];
        $Password = $row['Password'];
        $current_image = $row['Image_Name'];
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
                            <h3 class="bg-primary text-white text-center py-3"> Update Admin</h3>
                        </div>
                        <div class="card-body">

                            <form action="update.php?ID=<?php echo $ID?>" method="post" enctype="multipart/form-data">
                                <input type="text" class="form-control mb-2" placeholder=" Full Name " name="full_name" value="<?php echo $FullName ?>">
                                <input type="text" class="form-control mb-2" placeholder=" Email " name="email" value="<?php echo $Email ?>">                              
                                <div class="form-control mb-2 p-2">
                                    <label for="exampleInputImage">Current Image:</label>
                                    <?php
                                       if($current_image != "")
                                       {
                                           ?>
                                           <img src ="../images/profile/<?php echo $current_image;?>" width="100">
                                           <?php
                                       }
                                    ?>
                                </div>
                                <div class="form-control mb-2 p-2">
                                    <label for="exampleInputImage">Select Image:</label>
                                    <input type="file" name="image">
                                </div>
                                <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                                <a href ="manage-admin.php" class="btn btn-danger">cancel</a>
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

