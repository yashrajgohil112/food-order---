<?php include('../connection/constants.php'); ?>
<?php session_start();  ?>

<html>
 <head>
            <title>food-order_home-page</title>

            <link rel="stylesheet" href="../css/admin.css">
            <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

 </head>
    
 <body>
        

        <!-- menu section starts -->
        <div class="menu text-center">
             <div class="wapper">
                   <ul> 
                        <li><a href="index.php">Home</a></li>
                        <li><a href="manage-admin.php">Admin</a></li>
                        <li><a href="manage-category.php">Category</a></li>
                        <li><a href="manage-food.php">Food</a></li>
                        <li><a href="manage-order.php">Order</a></li>
                        <li><a href="logout.php">Log Out</a></li>

                   </ul>
             </div>
        </div>
        <!-- menu section ends -->


        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    