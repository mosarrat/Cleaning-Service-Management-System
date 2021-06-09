
<?php 

require_once("connection.php");

if(isset($_POST['update']))
{
    $ID = $_GET['ID'];
    $User_Name = $_POST['username'];
    $Password = $_POST['password'];
    $verify_password = $_POST['vpassword'];
    $New_password = $_POST['npassword'];
    $Confirm_password = $_POST['cpassword'];
    
    $query="select * from admin where Id='$ID' and Password='$Password'";
    $result = mysqli_query($con,$query);
    if($result==true)
    {
        $rows=mysqli_num_rows($result);

        if($rows==1)
        {
            if( $Password == $verify_password&$New_password == $Confirm_password)
            {
                $query2 = " update admin set User_Name='".$User_Name."',Password='".$New_password."' where Id='".$ID."'";
                $result2 = mysqli_query($con,$query2);

                if($result2)
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
                header("location:message.php");
                echo 'Your password did not change';
            }
        }
        else
        {
            header("location:manage-admin.php");
        }
    }  
   
}
else
{
    header("location:manage-admin.php");
}

?>

