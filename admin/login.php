<?php include('../connection/constants.php') ?>
<?php session_start(); ?>

<html>
    <head>
        <title>Login - Food order</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
       <div class="login text-center">
           <h1>Login</h1>
           <br>
           <?php

           if(isset($_SESSION['login']))
                  {
                      ?>
                      <div class="alert alert-danger" role="alert">
                             <strong>Hey!</strong> <?php  echo $_SESSION['login']; ?>.
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                             </div>
                      <?php
                     
                     unset($_SESSION['login']);
                  }

            //if(isset($_SESSION['no-login-msg']))
            //{
            //   echo $_SESSION['no-login-msg'];
            //   unset($_SESSION['no-login-msg']); 
            //}
            ?>
            <br>


           <!-- LOgin page start hear -->

           <form action="" method="POST">
           <br><br>
           username :   
           <input type="text" name="username" placeholder="Enter Username">
           <br><br>
           Password :    
           <input type="password" name="password" placeholder="Enter Password">
 
           <br><br>
           <input type="submit" name="submit" value="submit" class="btn-primary">

           </form>

            <!-- LOgin page end hear -->
            <br><br>
           <p>Created By - Yashraj Gohil</p>
       </div>
    </body>
</html>

<?php
     //check submit click or not
    if(isset($_POST['submit']))
    {
        //process for login

        //1. get data from login form
         $username = $_POST['username'];
         $password = md5($_POST['password']);

        //2.sql to check whether user exist or not
        $sql = " SELECT * FROM tbl_admin WHERE username='$username' 
        AND password='$password' ";

        //3.execute the query
        $res = mysqli_query($conn, $sql);

        //4.count rows to check user exists or not
        $count = mysqli_num_rows($res);

       if($count==1)
        {
            $_SESSION['login'] = "Login Successfuly";
            $_SESSION['user'] = $username; //to check user logged in or not
            header('location: http://localhost/yashraj/18se02it012-food-order-project/admin');
        }
        else
        { 
          $_SESSION['login'] = "Username and Password Not Match.";
          header('location: http://localhost/yashraj/18se02it012-food-order-project/admin/login.php');
        }    
    }


?>
