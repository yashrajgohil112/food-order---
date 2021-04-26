<?php include('partials/menu.php') ?>

        <!-- main-content section starts -->
        <div class="main-content">
             <div class="wapper">
                 <h1>Manage Food</h1>

                 <?php include('alert.php') ?>
                
                 <br>
                 <a href="add-food.php" class="btn-primary">Add Food</a><br><br> 
                 
                  <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Create a SQL Query to Get all the Food
                        $sql = "SELECT * FROM tbl_food";

                        //Execute the qUery
                        $res = mysqli_query($conn, $sql);

                        //Count Rows to check whether we have foods or not
                        $count = mysqli_num_rows($res);

                        //Create Serial Number VAriable and Set Default VAlue as 1
                        $sn=1;

                        if($count>0)
                        {
                            //We have food in Database
                            //Get the Foods from Database and Display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get the values from individual columns
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $title; ?></td>
                                    <td>$<?php echo $price; ?></td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <?php  
                                            //CHeck whether we have image or not
                                            if($image_name=="")
                                            {
                                                //WE do not have image, DIslpay Error Message
                                                echo "<p> <font color=red>Image Not Added.</font> </p>";
                                            }
                                            else
                                            {
                                                //WE Have Image, Display Image
                                                ?>
                                                <img src="http://localhost/yashraj/18se02it012-food-order-project/images/food/<?php echo $image_name; ?>" width="50px">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    
                                    <td>
                                        <a href="update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                        <a href="delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo "$image_name"; ?>" class="btn-danger">Delete Food</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //Food not Added in Database
                            echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                        }

                    ?>

                    
                </table>
             </div>  
        </div>
        <!-- main-content section ends -->

<?php include('partials/footer.php') ?>