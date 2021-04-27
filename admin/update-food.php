
<?php include('partials/menu.php'); ?>

<?php
 ob_start();

   if(isset($_POST['submit']))
   {
      //get value from the form
      $id = $_POST['id'];
      $title = $_POST['title'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $current_image = $rows['image_name'];
      $category = $_POST['category'];
      $featured = $_POST['featured'];
      $active = $_POST['active'];

      //update img
      if(isset($_FILES['image']['name']))
      {
         //get image detail
        $image_name = $_FILES['image']['name'];

        if($image_name !="")
        {
            //image available
            //AAA====upload the new image
            
                         //auto rename img
                         //get img extention (jpg,jpeg,png etc.) // e.g "food1.jpg"
                         $addr = explode('.', $image_name);
                         $ext = end($addr);
                         
                         //rename the image
                         $image_name = "Food_name_".rand(0000, 9999).'.'.$ext; // e.g. Food_catagory_112.jpg

                         $source_path = $_FILES['image']['tmp_name'];

                         $destination_path = "../images/food/".$image_name;

                         //uplode the img
                         $uplode = move_uploaded_file($source_path ,$destination_path);

                         //check img upload or not
                         //if img not uplode stop process and print error msg.
                         if($uplode==FALSE)
                         {
                            echo "Failed to Upload Image.";
                            die();

                         }


            //BBB====remove the current img
            if($current_image!="")
            { 
                $remove_path =  "../images/food/".$current_image;
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
      $sql3 = "UPDATE tbl_food SET
        title = '$title' ,
        description = '$description' ,
        price = '$price' , 
        image_name = '$image_name' ,
        category_id = '$category' ,
        featured = '$featured' ,
        active = '$active' 
        WHERE id='$id' ";

        $res3 = mysqli_query($conn, $sql3);

        if($res3==TRUE)
        {
            echo "done";
            
           $_SESSION['upd-food'] = "Food Data Update Successfuly";
           header('location:manage-food.php');
        }
        else
        {
            echo "not update";
            //$_SESSION['upd-cat'] = "food Data Not Update Successfuly";
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
                    $sql2 = "SELECT * FROM tbl_food WHERE id=$id ";

                    //3.execute query
                    $res2=mysqli_query($conn, $sql2);
                
                    //check data available or not
                     $count = mysqli_num_rows($res2);

                    if($count==1)
                    {
                        //get all data
                       $rows = mysqli_fetch_assoc($res2);

                       $title = $rows['title'];
                       $description = $rows['description'];
                       $price = $rows['price'];
                       $current_image = $rows['image_name'];
                       $current_category = $rows['category_id'];
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
    <td>Title: </td>
    <td>
        <input type="text" name="title" value="<?php echo $title; ?>">
    </td>
</tr>

<tr>
    <td>Description: </td>
    <td>
        <textarea name="description" cols="30" rows="5" value="<?php echo "$description"; ?>"></textarea>
    </td>
</tr>

<tr>
    <td>Price: </td>
    <td>
        <input type="number" name="price"  value="<?php echo $price; ?>" >
    </td>
</tr>

<tr>
    <td>Current Image: </td>
    <td>
    <?php
        if($current_image !="")
        {
           ?>
           <img src=" http://localhost/yashraj/18se02it012-food-order-project/images/food/<?php echo "$current_image"; ?>" width="100px"> 
            <?php
        }
        else
        {
            echo "<p> <font color=red>Image Not Found.</font> </p>";
        }


    ?>
    </td>
</tr>

<tr>
    <td>Select Image: </td>
    <td>
        <input type="file" name="image" >
    </td>
</tr>

<tr>
    <td>Category: </td>
    <td>
        <select name="category">

        <?php

        //query to get active category
        $sql = "SELECT * FROM tbl_category WHERE active='Yes' ";
        //execute query
        $res = mysqli_query($conn , $sql);
        //count rows
        $count = mysqli_num_rows($res);
        // check category available or not
        if($count>0)
        {
            //available
            while($row=mysqli_fetch_assoc($res))
            {
                $category_title = $row['title'];
                $category_id = $row['id'];

               // echo "<option value='$category_id'>$category_title</option>";
               ?>
               <option <?php  if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?> </option>
               <?php
            }

        }
        else
        {
            //not available
            echo "<option value='0'>none</option>";
        }
        ?>
        </select>
    </td>
</tr>

<tr>
    <td>Featured: </td>
    <td>
          <input <?php  if($featured=="Yes"){echo "checked"; } ?>  type="radio" name="featured" value="Yes" >Yes
          <input <?php  if($featured=="No"){echo "checked"; } ?> type="radio" name="featured" value="No">No
    </td>
</tr>

<tr>
    <td>Active: </td>
    <td>
            <input <?php  if($active=="Yes"){echo "checked"; } ?> type="radio" name="active" value="Yes" >Yes
            <input <?php  if($active=="No"){echo "checked"; } ?> type="radio" name="active" value="No">No
    </td>
</tr>

<tr>
    <td colspan="2">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="current_image" value="<?php ob_start(); echo "$current_image"; ?>">
        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
    </td>
</tr>

</table>

</form>

</div>
</div>

<?php include('partials/footer.php'); ?>   

                 


                 