
<?php 

require_once("connection.php");

if(isset($_POST['update']))
{
    $ID = $_GET['ID'];
    $Full_Name = $_POST['full_name'];
   // $User_Name = $_POST['username'];
    $Email = $_POST['email'];
    $current_image = $_POST['current_image'];
    $image_name = $_FILES['image']['name'];

    if(isset($_FILES['image']['name']))
        {
            $image_name = $_FILES['image']['name'];
            if($image_name != "")
            {
                //auto rename image
                //Get Extension (jpg, png, gif, etc) e.g."Home1.jpg"
                $ext = end(explode('.', $image_name));

                //Rename the image
                $image_name="Service_Category_".rand(000, 999).'.'.$ext; // e.g."Service_Category_876.jpg"
                

                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/profile/". $image_name;
                $uplode= move_uploaded_file($source_path, $destination_path );   
                
                if($current_image != "")
                {
                 $remove_path="../images/profile/".$current_image;
                 $remove= unlink($remove_path);
                }
            
            }
            else
            {
                $image_name=$current_image;
            }
        }
        else
        {
            $image_name=$current_image;
        }

    $query = " update admin set Full_Name = '".$Full_Name."',Email='".$Email."',Image_Name='".$image_name."' where Id='".$ID."'";
    $result = mysqli_query($con,$query);

    if($result)
    {
        header("location:manage-admin.php");
    }
    else
    {
        echo ' Please Check Your Query ';
    }
}
else
{
    header("location:manage-admin.php");
}

?>

