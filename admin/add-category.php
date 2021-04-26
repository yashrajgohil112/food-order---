<?php include('partials/menu.php') ?>

<div class="main-content">
             <div class="wapper">
                 <h1>Add Category</h1>

                 <br><br><br>

                 <form action="" method="POST" enctype="multipart/form-data">

                    <table class="tbl-30">
                    <tr>
                        <td>Title : </td>
                        <td>
                            <input type="text" name="title" placeholder="Enter Category Title" required='required'>
                        </td>
                    </tr>

                    <tr>
                        <td>Image : </td>
                        <td>
                            <input type="file" name="image_name" placeholder="Enter Category Title" required='required'>
                        </td>
                    </tr>

                    <tr>
                        <td>Featured :</td>
                        <td>
                            <input type="radio" name="featured" value="Yes" >Yes
                            <input type="radio" name="featured" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td>Active :</td>
                        <td>
                            <input type="radio" name="active" value="Yes" >Yes
                            <input type="radio" name="active" value="No">No
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" placeholder="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
  
                    </table>       
                 </form>

                 <?php

                 //check button click or not
                 if(isset($_POST['submit']))
                 {
                     //echo "done";
                     //1.get vlaue from category form
                     $title = $_POST['title'];

                     //featured radio button selected or not
                     if(isset($_POST['featured']))
                     {
                         //get value
                         $featured = $_POST['featured'];
                     }
                     else
                     {
                        $featured = "No";
                     }

                     //Active radio button selected or not
                     if(isset($_POST['active']))
                     {
                         //get value
                         $active = $_POST['active'];
                     }
                     else
                     {
                        $active = "No";
                     }

                     //img selected or not
                     //print_r($_FILES['image_name']); //image path
                     //die(); //break the code hear.
                     if(isset($_FILES['image_name']['name']))
                     {
                         //uplode img
                         //to uplode img we need img name, source path ane destination path
                         $image_name = $_FILES['image_name']['name']; 

                         if($image_name !="")
                         {

                         //auto rename img
                         //get img extention (jpg,jpeg,png etc.) // e.g "food1.jpg"
                         $ext = end(explode('.',$image_name));

                         //rename the image
                         $image_name = "Food_category_".rand(000, 999).'.'.$ext; // e.g. Food_catagory_112.jpg

                         $source_path = $_FILES['image_name']['tmp_name'];

                         $destination_path = "../images/category/".$image_name;

                         //uplode the img
                         $uplode = move_uploaded_file($source_path ,$destination_path);

                         //check img upload or not
                         //if img not uplode stop process and print error msg.
                         if($uplode==FALSE)
                         {
                            echo "img not upload";
                            die();

                         }
                        }
                     }
                     else
                     {
                         //don't uplode and set image_name  value is blank
                         $image_name = "";      
                     }


                     //2.sql query to save the data into database
                     $sql = "INSERT INTO tbl_category SET 
                     title ='$title',
                     image_name = '$image_name',
                     featured ='$featured',
                     active ='$active' ";

                     //3.Execute query and save data into database
                     $res = mysqli_query($conn, $sql);
        
                     //4.check query executed or not
                     if($res==TRUE)
                     {
                       $_SESSION['add-category-done'] = "Category Enterd Successfuly";
                       header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-category.php');
                     }
                     else
                     {
                         echo "not done";
                         $_SESSION['add-category-done'] = "Category Not Enterd Successfuly";
                         header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-category.php');
                     }

                 }
                 ?>

            </div>  
</div>

<?php include('partials/footer.php') ?>   