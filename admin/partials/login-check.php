<?php
   //authorization - Access control
   //check whether the user is logged in or not
   if(!isset($_SESSION['user'])) //if user session is not ser
   {
       //user is not logged in 
       //request to login page with messege
       $_SESSION['no-login-msg'] = "<div class='text-center'> 'Please login to access Admin Panel.' </div>";
       header('location: login.php');
 
   }
?>