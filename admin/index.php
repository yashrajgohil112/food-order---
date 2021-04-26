
<?php include('partials/menu.php') ?>

        <!-- main-content section starts -->
        <div class="main-content">
             <div class="wapper">
                 <h1>Dashboard</h1>
                 <br>
          <?php

              

              $sql = "SELECT * FROM tbl_admin";
              $res = mysqli_query($conn, $sql);
              if($res==TRUE)
               {
                  $count = mysqli_num_rows($res);//get all the row

                  if($count>0)
                  {
                     while($rows=mysqli_fetch_assoc($res))
                     {
                         $id=$rows['id'];
                         $full_name=$rows['full_name'];
                         $username=$rows['username'];
                         if(isset($_SESSION['login']))
                         {
                           ?>
                            <div class="alert alert-success " role="alert">
                             <strong><?php echo $full_name;  ?>... </strong> <?php  echo $_SESSION['login']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                           <?php
                     
                           unset($_SESSION['login']);
                         }
                     }
                 }
               }   
   ?>

         
            <br>

                 <div class="col-4 text-center">
                      <h1>5</h1><br>
                      Categories
                 </div>

                 <div class="col-4 text-center">
                      <h1>5</h1><br>
                      Categories
                 </div>

                 <div class="col-4 text-center">
                      <h1>5</h1><br>
                      Categories
                 </div>

                 <div class="col-4 text-center">
                      <h1>5</h1><br>
                      Categories
                 </div>

                 <div class="clearfix"></div>
             </div>  
        </div>
        <!-- main-content section ends -->

 <?php include('partials/footer.php') ?>