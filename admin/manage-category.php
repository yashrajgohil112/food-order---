<?php include('partials/menu.php') ?>

        <!-- main-content section starts -->
        <div class="main-content">
             <div class="wapper">
                 <h1>Manage Categories</h1>

                 <?php include('alert.php') ?>
                   <br>

                 <a href="add-category.php" class="btn-primary">Add Category</a><br><br>

                  
                  <table class="tbl-full">
                      <tr>
                          <th>Sr.no</th>
                          <th>Title</th>
                          <th>Featured</th>
                          <th>Active</th>
                          <th>Image</th>
                          <th>Actions</th>
                      </tr>

                      <?php 
                            //query get all admin 
                            $sql = "SELECT * FROM tbl_category ";
                            //execute query
                            $res = mysqli_query($conn, $sql);

                            //check query execute or not
                            if($res==TRUE)
                             {
                                //count rows to check we have data in database or not
                                $count = mysqli_num_rows($res);//get all the row


                                $sn=1; //create variable for sr.no and assign value
                                //check the num of rows
                                if($count>0)
                                {
                                    //we have data in db
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        //using while loop to get all the data from db
                                        //get individual data
                                        $id=$rows['id'];
                                        $title=$rows['title'];
                                        $image_name=$rows['image_name'];
                                        $featured=$rows['featured'];
                                        $active=$rows['active'];
                                        //display the value
                                        ?>
                                           <tr>
                                               <td><?php echo $sn++;  ?></td>
                                               <td><?php echo $title; ?></td>
                                               <td><?php echo $featured; ?></td>
                                               <td><?php echo $active; ?></td>

                                               <td>
                                                   <?php

                                                    if($image_name!="")
                                                    {
                                                        //display the img                                                        
                                                        ?>
                                                        <img src="http://localhost/yashraj/18se02it012-food-order-project/images/category/<?php echo $image_name; ?> " width="50px">
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        //display msg
                                                        echo "<p> <font color=red>Image Not Added.</font> </p>";
                                                    }

                                                    ?>
                                               </td>

                                               
                                               <td>
                                                  <a href="update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                                                  <a href="delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo "$image_name";?>" class="btn-danger"> Delete Category</a>
                                             </td>
                                          </tr>
                                        <?php

                                    }
                                }
                                else
                                {
                                    //we do not have to data in db
                                }
                            }
                        
                    
                        ?>

                     

                  </table>
             </div>  
        </div>
        <!-- main-content section ends -->

<?php include('partials/footer.php') ?>