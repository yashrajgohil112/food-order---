<?php 
     
     session_start();
    //Include COnstants Page
    include('../connection/constants.php');

    //echo "Delete Food Page";
    //Either use '&&' or 'AND'

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
     //get the value and delete
     $id = $_GET['id'];
     $image_name = $_GET['image_name'];

     //remove the physical image file available
     if($image_name !="")
     {
         //img available.so remove it
         $path = "../images/food/".$image_name;
         //remove img
         $remove = unlink($path);

         //if failed to remove then add error and stop process
         if($remove==FALSE)
         {
            echo "<p> <font color=red>Faile to remove image</font> </p>";
            die(); //stop process
         }
     }



        //3. Delete Food from Database
        $sql = "DELETE FROM tbl_food WHERE id = $id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //CHeck whether the query executed or not and set the session message respectively
        //4. Redirect to Manage Food with Session Message
        if($res==TRUE)
        {
            //Food Deleted
            $_SESSION['del-food'] = "Food Deleted Successfully.";
            header('location: manage-food.php');
        }
        else
        {
            //Failed to Delete Food
            $_SESSION['del-food'] = "Failed to Delete Food.";
            header('location: manage-food.php');
        }

        

    }
    else
    {
        //Redirect to Manage Food Page
        //echo "REdirect";
        echo  "<div class='error'>Unauthorized Access.</div>";
        header('location: manage-food.php');
    }

?>