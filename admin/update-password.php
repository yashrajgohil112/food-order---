<?php include('partials/menu.php') ?>

<!-- main-content section starts -->
<div class="main-content">
     <div class="wapper">

     <h1> Update Password </h1>
     <br><br>

      <?php
        
             //1.gte admin id to be updated
            $id=$_GET['id'];

            //2.create query to get admin data
             $sql = "SELECT * FROM tbl_admin WHERE id=$id ";

            //3.execute query
            $res=mysqli_query($conn, $sql);
 
             //check query run or not

            if($res==TRUE)
            {
                //check data available or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $password = $row['password'];
                    
                }
                else
                {
                    header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-admin.php');
                }
            }
 

          
      ?>


     <form action="" method="POST">

         <table class="tbl-30">
        <tr>
            <td>Current Password</td>
            <td>
               <input type="password" name="current_password" placeholder="Current Password">
            </td>
         </tr>

            <tr>
               <td>New Password</td>
               <td>
               <input type="Password" name="new_password"  placeholder="New Password">
               </td>
            </tr>

            <tr>
               <td>Confirm Password</td>
               <td> 
               <input type="Password" name="confirm_password"  placeholder="Confirm Password">
               </td>
            </tr>


            <tr>
                <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Change Password" class="btn-danger">
                </td>
           </tr>

      </table>       
   </form>

     </div>
</div>

<?php

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']); 

        $sql = " SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'  ";

        $res=mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                 //user exists password can be reach

                 //check  new pass and confirmpass match or not
                 if($new_password==$confirm_password)
                 {
                     //update password
                     $sql2 = "UPDATE tbl_admin SET password='$new_password' WHERE id=$id ";

                     //execute query
                     $res2 = mysqli_query($conn, $sql2);

                     //check query execute or not
                     if($res2==TRUE)
                     {
                        
                         //display succes msg
                        $_SESSION['pass-change-done'] = "Password Change Succesfully. ";
                        header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-admin.php');

                     }
                     else
                     {
                         echo "not done";
                         //display error
                         $_SESSION['pass-change-notdone'] = "Password Not Change Succesfully. ";
                         header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-admin.php');
                     }


                 }
                 else
                 {
                    $_SESSION['pass-not-match'] = "Password not Match.";
                    header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-admin.php');
                 }
            }
            else
            {
                //user does not exiest msg and red alert
                 $_SESSION['user-not-found'] = "Password not Found";
                 header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-admin.php');
            }
            //$_SESSION['pass'] = "Password Update Successfuly";
           // header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-admin.php');
        }
        
        //else
        //{
            //$_SESSION['pass'] = "Password Not Update Successfuly";
           // header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-admin.php');
           
       // }

    }
?>

 <!-- main-content section ends -->

 <?php include('partials/footer.php') ?>