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
      <title>Revolutionalizing Crops</title>
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
      <script type="text/javascript">
    $(document).ready(function() {
    $('#dataTable').DataTable();
} );
</script>
          <div class="container">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-2"> Citizens
                        </div>
                        <div class="card-body">
                        	<?php 
                        	$sql = "SELECT * FROM Citizen";
                        	$result = mysqli_query($conn, $sql);
                        	if (mysqli_num_rows($result)>0){
                            echo '<div class="table-responsive">';
                               echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                                    echo '<thead>';
                                        echo '<tr>';
                                            
                                           echo '<th data-field>Citizen ID</th>';
                                            echo '<th>First Name</th>'; 
                                            echo '<th>Last Name</th>'; 
                                            echo '<th>Age</th>'; 
                                            echo '<th>Gender</th>';
                                            echo '<th>Qualification</th>';
                                        
                                        echo '</tr>';
                                    echo '</thead>';
                                    echo '</tbody>';

                                    while($row = mysqli_fetch_assoc($result)){
                                    	echo '<tr>';
                                            echo "<td>" .$row['CitizenID']. "</td>"; 
                                            echo "<td>" .$row['fname']. "</td>";
                                            echo "<td>" .$row['lname']. "</td>";
                                            echo "<td>" .$row['age']. "</td>";
                                            echo "<td>" .$row['gender']. "</td>";
                                            echo "<td>" .$row['qualification']. "</td>";
                                 
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
                     <div class="card-header py-2"> Location
                     </div>
                     <div class="card-body">
                        <?php 
                        $sql = "SELECT * FROM Location";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result)>0){
                        echo '<div class="table-responsive">';
                           echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                                 echo '<thead>';
                                    echo '<tr>';
                                          
                                       echo '<th data-field>Location ID</th>';
                                          echo '<th>Region</th>'; 
                                          echo '<th>district</th>'; 
                                          echo '<th> sector </th>'; 
                                          echo '<th>cell</th>';
                                       
                                    
                                    echo '</tr>';
                                 echo '</thead>';
                                 echo '</tbody>';

                                 while($row = mysqli_fetch_assoc($result)){
                                    echo '<tr>';
                                          echo "<td>" .$row['LocationID']. "</td>"; 
                                          echo "<td>" .$row['Region']. "</td>";
                                          echo "<td>" .$row['district']. "</td>";
                                          echo "<td>" .$row['sector']. "</td>";
                                          echo "<td>" .$row['cell']. "</td>";
                                       
                              
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
                        <div class="card-header py-2"> Consumer
                        </div>
                        <div class="card-body">
                           <?php 
                           $sql = "SELECT * FROM Consumer";
                           $result = mysqli_query($conn, $sql);
                           if (mysqli_num_rows($result)>0){
                           echo '<div class="table-responsive">';
                              echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                                    echo '<thead>';
                                       echo '<tr>';
                                             
                                          echo '<th data-field>Consumer ID</th>';
                                             echo '<th>Citizen ID</th>'; 
                                             echo '<th>Location ID</th>'; 
                                             echo '<th> Market ID </th>'; 
                                             echo '<th>Telephone</th>';
                                            
                                       
                                       echo '</tr>';
                                    echo '</thead>';
                                    echo '</tbody>';

                                    while($row = mysqli_fetch_assoc($result)){
                                       echo '<tr>';
                                             echo "<td>" .$row['ConsumerID']. "</td>"; 
                                             echo "<td>" .$row['CitizenID']. "</td>";
                                             echo "<td>" .$row['LocationID']. "</td>";
                                             echo "<td>" .$row['MarketID']. "</td>";
                                             echo "<td>" .$row['telephone']. "</td>";
                                            
                                 
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
                        <div class="card-header py-2"> Farmer
                        </div>
                        <div class="card-body">
                           <?php 
                           $sql = "SELECT * FROM Farmer";
                           $result = mysqli_query($conn, $sql);
                           if (mysqli_num_rows($result)>0){
                           echo '<div class="table-responsive">';
                              echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
                                    echo '<thead>';
                                       echo '<tr>';
                                             
                                          echo '<th data-field>Farmer ID</th>';
                                             echo '<th>Citizen ID</th>'; 
                                             echo '<th>Location ID</th>'; 
                                             echo '<th> email </th>'; 
                                             echo '<th>Telephone</th>';
                                          
                                       
                                       echo '</tr>';
                                    echo '</thead>';
                                    echo '</tbody>';

                                    while($row = mysqli_fetch_assoc($result)){
                                       echo '<tr>';
                                             echo "<td>" .$row['FarmerID']. "</td>"; 
                                             echo "<td>" .$row['CitizenID']. "</td>";
                                             echo "<td>" .$row['LocationID']. "</td>";
                                             echo "<td>" .$row['email']. "</td>";
                                             echo "<td>" .$row['telephone']. "</td>";
                                          
                                 
                                    }
                                 
                                    
                              echo '</table>';
                                 }
                                    ?>
                                 
                           </div>
                        </div>
                     </div>



                    <button style="display: none; position: fixed; bottom: 10px; right: 20px; z-index: 99; border: none; outline: none; background-color: red; color: white; cursor: pointer; padding: 10px; border-radius: 10px; font-size: 10px;" onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>

                      


<script type="text/javascript">
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>

      <!-- end cases -->
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>