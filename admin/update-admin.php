
<?php include('partials/menu.php') ?>

<!-- main-content section starts -->
<div class="main-content">
     <div class="wapper">

     <h1> Update Admin </h1>
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

                    $full_name = $row['full_name'];
                    $username = $row['username'];
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
            <td>Full Name</td>
            <td>
               <input type="text" name="full_name" value="<?php echo $full_name; ?>">
            </td>
         </tr>

            <tr>
               <td>UserName</td>
               <td>
               <input type="text" name="username"  value="<?php echo $username; ?>">
               </td>
            </tr>

            <tr>
                <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Update Admin" class="btn-danger">
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
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name' , 
        username = '$username' 
        WHERE id='$id' ";

        $res=mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            $_SESSION['upd'] = "Data Update Successfuly";
            header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-admin.php');
        }
        else
        {
            $_SESSION['upd'] = "Data Not Update Successfuly";
            header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-admin.php');
           
        }

    }
?>

 <!-- main-content section ends -->

 <?php include('partials/footer.php') ?>