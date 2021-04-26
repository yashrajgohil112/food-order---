<?php

session_start();
 include('../connection/constants.php');
 
//check img value set or not
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
     //get the value and delete
     $id = $_GET['id'];
     $image_name = $_GET['image_name'];

     //remove the physical image file available
     if($image_name !="")
     {
         //img available.so remove it
         $path = "../images/category/".$image_name;
         //remove img
         $remove = unlink($path);

         //if failed to remove then add error and stop process
         if($remove==FALSE)
         {
            echo "<p> <font color=red>Faile to remove image</font> </p>";
            die(); //stop process
         }
     }

}


//2.create query to delete admin
$sql = "DELETE FROM tbl_category WHERE id=$id";

//3.execute query
$res=mysqli_query($conn, $sql);

//check query run or not

if($res==TRUE)
{
   $_SESSION['del-cat'] = "Category deleted successfuly.";
   header("location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-category.php");
}
else
{
  $_SESSION['del-cat'] = "Category Not deleted successfuly.";
  header("location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-category .php");
}


//delete data from database

//redirect to manage category page


?>

 
