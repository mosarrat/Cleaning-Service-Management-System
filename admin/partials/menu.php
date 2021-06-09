<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
      header("location:login.php");
    }
?>
<html>
  <head>
    <title> Cleaning Service Management System - Home Page</title>
     
    <link rel="stylesheet" href="../css/admin.css">

  </head>
  <body>
       <!--Menu section starts-->
        <div class="menu text-center">
            <div class ="wrapper">
            <ul> 
               <li><a href="index.php">Home</a></li>
               <li><a href="manage-admin.php">Admin</a></li>
               <li><a href="manage-category.php">Categories</a></li>
               <li><a href="manage-service.php">Services</a></li> 
               <li><a href="manage-appoinment.php">Appoinments</a></li>
               <li><a href="logout.php" nmae ="logout">Logout</a></li>

            </ul>
            </div>   
        </div>
       <!--Menu section ends-->
