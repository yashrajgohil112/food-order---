
<?php include('partials/menu.php'); ?>
<?php
 ob_start();

   if(isset($_POST['submit']))
   {
      //get value from the form
      $id = $_POST['id'];
      $title = $_POST['title'];
      $current_image = $_POST['current_image'];
      $featured = $_POST['featured'];
      $active = $_POST['active'];

      //update img
      if(isset($_FILES['image']['name']))
      {
         //get image detail
        $image_name = $_FILES['image']['name'];

        if($image_name != "")
        {
            //image available
            //AAA====upload the new image
            
                         //auto rename img
                         //get img extention (jpg,jpeg,png etc.) // e.g "food1.jpg"
                         $ext = end(explode('.', $image_name));

                         //rename the image
                         $image_name = "Food_category_".rand(000, 999).'.'.$ext; // e.g. Food_catagory_112.jpg

                         $source_path = $_FILES['image']['tmp_name'];

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


            //BBB====remove the current img
            if($current_image != "")
            { 
                $remove_path =  "../images/category/".$current_image;
                $remove = unlink($remove_path);
    
                //check img remove or not
                //if failed to remove display error stop process
                if($remove==FALSE)
                {
                    echo "failed to remove img";
                    die();//stop the process
                }
            }

        }   
        else
        {
            $image_name = $current_image;
        } 
      }
      else
      {
        $image_name = $current_image;
      }

      //update into database
      $sql2 = "UPDATE tbl_category SET
        title = '$title' , 
        image_name = '$image_name' ,
        featured = '$featured' ,
        active = '$active' 
        WHERE id='$id' ";

        $res2 = mysqli_query($conn, $sql2);

        if($res2==TRUE)
        {
            echo "done";
            
           $_SESSION['upd-cat'] = "Category Data Update Successfuly";
           header('location:manage-category.php');
        }
        else
        {
            echo "not update";
            //$_SESSION['upd-cat'] = "Category Data Not Update Successfuly";
            //header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-category.php');
           
        }
    }
    ob_end_flush();
  ?>

<div class="main-content">
             <div class="wapper">
                 <h1>Add Category</h1>

                 <br><br><br>

              <?php
               ob_start();
                    //check id set or not
                 if(isset($_GET['id']))
                 {
                     
                    //1.gte admin id to be updated
                    $id=$_GET['id'];

                    //2.create query to get admin data
                    $sql = "SELECT * FROM tbl_category WHERE id=$id ";

                    //3.execute query
                    $res=mysqli_query($conn, $sql);
                
                    //check data available or not
                     $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        //get all data
                       $rows = mysqli_fetch_assoc($res);

                       $title = $rows['title'];
                       $current_image = $rows['image_name'];
                       $featured = $rows['featured'];
                       $active = $rows['active'];
                    }
                    else
                    {
                        echo "not get data";
                        //redirect page
                      //header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-category.php');
                    }
                    

                 }

               ob_end_flush();
               ?>

                 <form action="" method="POST" enctype="multipart/form-data">

                    <table class="tbl-30">
                    <tr>
                        <td>Title : </td>
                        <td>
                            <input type="text" name="title" value="<?php echo $title;?>">
                        </td>
                    </tr>

                    
                    <tr>
                        <td>Current Image : </td>
                        <td><?php
                            if($current_image !="")
                            {
                                ?>
                                <img src=" http://localhost/yashraj/18se02it012-food-order-project/images/category/<?php echo "$current_image"; ?>" width="100px"> 
                                <?php
                            }
                            else
                            {
                                echo "error";
                            }

                            ?>
                       </td>
                    </tr>

                    
                    <tr>
                        <td>Image : </td>
                        <td>
                            <input type="file" name="image" placeholder="Enter Category Title">
                        </td>
                    </tr>

                    <tr>
                        <td>Featured :</td>
                        <td>
                            <input <?php  if($featured=="Yes"){echo "checked"; } ?>  type="radio" name="featured" value="Yes" >Yes
                            <input <?php  if($featured=="No"){echo "checked"; } ?> type="radio" name="featured" value="No">No
                        </td>
                    </tr>

                    <tr>
                        <td>Active :</td>
                        <td>
                            <input <?php  if($active=="Yes"){echo "checked"; } ?> type="radio" name="active" value="Yes" >Yes
                            <input <?php  if($active=="No"){echo "checked"; } ?> type="radio" name="active" value="No">No
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2">
                              <input type="hidden" name="id" value="<?php ob_start(); echo $id; ob_end_flush(); ?>">
                              <input type="hidden" name="current_image" value="<?php ob_start(); echo "$current_image"; ob_end_flush(); ?>">
                            <input type="submit" name="submit" placeholder="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
  
                    </table>       
                 </form>

            </div>  
</div>

<?php include('partials/footer.php'); ?>   

 