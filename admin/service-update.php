<?php 

    require_once("connection.php");

    if(isset($_POST['update']))
    {
        $ID = $_GET['ID'];
        $service_title = $_POST['stitle'];
        $discription = $_POST['discription'];
        $price = $_POST['price'];
        $price_des = $_POST['price_des'];
        $current_image = $_POST['current_image'];
        $image_name = $_FILES['image']['name'];
        $category_title = $_POST['ctitle'];
        $active = $_POST['active'];
        
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
                $destination_path = "../images/service/". $image_name;
                $uplode= move_uploaded_file($source_path, $destination_path );   
                
                if($current_image != "")
                {
                 $remove_path="../images/service/".$current_image;
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

        $query = " update service set Title = '".$service_title."', Description = '".$discription."', Price = '".$price."',Price_des = '".$price_des."', Image_Name='".$image_name."', Category_Title = '".$category_title."', Active='".$active."' where Id='".$ID."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
           header("location:manage-service.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location:manage-service.php");
    }


?>