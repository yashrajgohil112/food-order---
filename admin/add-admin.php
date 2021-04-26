<?php include('partials/menu.php') ?>

<div class="main-content">
             <div class="wapper">
                 <h1>Add Admin</h1>

                 <br><br><br>

                 <form action="" method="POST">

                    <table class="tbl-30">
                    <tr>
                        <td>Full Name</td>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter Your name" required='required'>
                        </td>
                    </tr>

                    <tr>
                        <td>UserName</td>
                        <td>
                            <input type="text" name="username" placeholder="Your username" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" name="password" placeholder="Your Password" required='required'>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" placeholder="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
  
                    </table>       
                 </form>

             </div>  
</div>

<?php include('partials/footer.php') ?>

<?php 

    //process save in database
    //button clicked
   if(isset($_POST['submit']))
   {
        //1.get data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encryption with md5

        //2.sql query to save the data into database
        $sql = "INSERT INTO tbl_admin SET 
                full_name='$full_name',
                username='$username',
                password='$password' ";

        //3.Execute query and save data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        
        //4.check query executed or not
        if($res==TRUE)
        {
            $_SESSION['status'] = "Data Enterd Successfuly";
            header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/manage-admin.php');
        }
        else
        {
            $_SESSION['status'] = "Data Not Enterd Successfuly";
            header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/add-admin.php');
           
        }
    }
?>
   


   