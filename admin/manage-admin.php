<?php include('partials/menu.php') ?>

        <!-- main-content section starts -->
        <div class="main-content">
             <div class="wapper">
                 <h1>Manage Admin</h1>
                 
                 <?php include('alert.php') ?>
                   <br>
                   
                 <a href="add-admin.php" class="btn-primary">Add Admin</a><br><br>
                  
                  <table class="tbl-full">
                      <tr>
                          <th>Sr.no</th>
                          <th>Full Name</th>
                          <th>Username</th>
                          <th>Actions</th>
                      </tr>

                        <?php 
                            //query get all admin 
                            $sql = "SELECT * FROM tbl_admin ";
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
                                        $full_name=$rows['full_name'];
                                        $username=$rows['username'];
                                        //display the value
                                        ?>
                                           <tr>
                                               <td><?php echo $sn++;  ?></td>
                                               <td><?php echo $full_name; ?></td>
                                               <td><?php echo $username; ?></td>
                                               <td>
                                                  <a href="update-password.php?id=<?php echo $id; ?> " class="btn-pass">Update Password</a>
                                                  <a href="update-admin.php?id=<?php echo $id; ?> " class="btn-secondary">Update Admin</a>
                                                  <a href='delete-admin.php?id=<?php echo $id; ?>' class="btn-danger"> Delete Admin</a>
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