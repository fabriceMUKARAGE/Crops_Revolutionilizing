<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "Agahozo12!@";
$db_name = "Revolutionizing_Crops";

//connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

//check connection
if(!$conn){
	die("connection failed");
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Revolutionilizing Crops</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
       <link rel="stylesheet" href="css/owl.carousel.min.css"> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout inner_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- top -->
                    <!-- header -->
         <header class="header-area">
            
            <div class="left">
               <img src="images/farmerlogo.png" alt="Logo">
            </div>
 

             <div class="right">
               <a href="index.html" ><i class="fa fa-home" aria-hidden="true"></i></a>
            </div>
            <div class="container">
               <div class="row d_flex">
                  <div class="col-sm-3 logo_sm">
                     <div class="logo">
                        <a href="index.html"></a>
                     </div>
                  </div>
                  <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-9">
                     <div class="navbar-area">
                        <nav class="site-navbar">
                           <ul>
                           <li><a class="active" href="information.php">Home</a></li>
                              <li><a href="Stuffs.php">Stuffs</a></li>
                              <li><a href="users.php">Farmer & Consumer</a></li>
                              <li><a href="Farming.php">Market & Stock</a></li>
                              <li><a href="data.php">Best Info.</a></li>                            
                              <li><a href="CropsInfo.php">Crops Info.</a></li>
                           </ul>
                           <button class="nav-toggler">
                           <span></span>
                           </button>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </header>
      <!-- end header -->
<br>
<br>
                    <div class="container">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-2">Market
                        </div>
                        <div class="card-body">
                          <?php 
                          $sql = "SELECT * FROM Market";
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result)>0){
                            echo '<div class="table-responsive">';
                               echo '<table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            
                                           echo '<th data-field>market ID</th>';
                                           echo '<th>Marketsize</th>';  
                                           echo '<th>farmerID</th>'; 
                                         
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '</tbody>';

                                    while($row = mysqli_fetch_assoc($result)){
                                      echo '<tr>';
                                            echo "<td>" .$row['marketID']. "</td>"; 
                                            echo "<td>" .$row['marketsize']. "</td>"; 
                                            echo "<td>" .$row['farmerID']. "</td>";
                                        
                                            
                                    }
                                
                                    
                               echo '</table>';
                                }
                                    ?>
                                
                            </div>
                        </div>
                      </div>


                    <div class="container">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-2">Stock
                        </div>
                        <div class="card-body">
                          <?php 
                          $sql = "SELECT * FROM Stock";
                          $result = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($result)>0){
                            echo '<div class="table-responsive">';
                               echo '<table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            
                                           echo '<th data-field>Farmer ID</th>';
                                           echo '<th data-field>Crop ID</th>';
                                           echo '<th data-field>market ID</th>';
                                         
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '</tbody>';

                                    while($row = mysqli_fetch_assoc($result)){
                                      echo '<tr>';
                                            echo "<td>" .$row['FarmerID']. "</td>";
                                            echo "<td>" .$row['CropID']. "</td>"; 
                                            echo "<td>" .$row['marketID']. "</td>";
                                                                                    
                                    }
                                
                                    
                               echo '</table>';
                                }
                                    ?>
                                
                            </div>
                        </div>
                      </div>
      <!-- end cases -->
      <!--  footer -->
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>