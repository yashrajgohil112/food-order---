<?php

session_start();
 include('../connection/constants.php');
//1.gte admin id to be deleted
 echo  $id = $_GET['id'];

 //2.create query to delete admin
 $sql = "DELETE FROM tbl_admin WHERE id=$id";

 //3.execute query
 $res=mysqli_query($conn, $sql);

 //check query run or not

 if($res==TRUE)
 {
     $_SESSION['del'] = "Admin deleted successfuly.";
     header("location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-admin.php");
 }
 else
 {
    $_SESSION['del'] = "Admin Not deleted successfuly.";
    header("location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-admin.php");
 }



?>
