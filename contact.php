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
                              <li><a href="index.html">Home</a></li>
                              <li><a class="active" href="about.html">About</a></li>
                              <li><a href="action.html">Services</a></li>
                              <li><a href="contact.php">Contact </a></li>
                              <li><a href="signup.php">Register </a></li>


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

      <!-- contact -->
     <div class="contact">
         <div class="container">
            <div class="row">
                <div class="col-md-12">
                     <div class="titlepage text_align_left">
                        <h2>Contact Us</h2>
                     </div>
                  </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <form action="contact.php" class="main_form">
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Full Name" type="type" name="Name" id="Name"> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Phone" type="type" name="PhoneNumber" id="PhoneNumber">                          
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="type" name="Email" id="Email"> 
                        </div>
                        <div class="col-md-12">
                           <input class="textarea" placeholder="Message" type="type" name="message" id="message">
                        </div>
                        <div class="col-md-12">
                           <input class="send_btn"  type="submit" name="Inquiry"
							      id="message" value="send now" onclick="return messageConfirmation()">
                        </div>
                     </div>
                  </form>
               </div>
                <div class="col-md-6">
                  <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Rwanda" width="600" height="540" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact -->

      
      <script>
        // confirming if the message was derivered!
        function messageConfirmation(){
			var Name = $("#Name").val();
			var PhoneNumber= $("#PhoneNumber").val();
			var Email = $('#Email').val();
			var message = $('#message').val();     
         if(Name.trim() != "" && PhoneNumber.trim() != "" && Email.trim() != "" && message.trim() != ""){
               alert("Message received Successfully, The team will reach out to you soon!")
            }

    }
    </script>

      <?php
         /* stored inqueries into the database in contact_inquiries table
         */
         if(isset($_POST['Inquiry'])){
         $name= $_POST['Name'];
         $phone= $_POST['PhoneNumber'];
         $email= $_POST['Email'];
         $message= $_POST['message'];

            //Database connection
            require "database_credential.php";
            $conn = new mysqli(servename, username, password, db);
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }

            // inserting into the Contact_inquiries
            $sql= "INSERT INTO Contact_Inquiries (fullname, phone, email, message) VALUES ('$name', '$phone', '$email', '$message')";

            if ($conn->query($sql) === true) {
               echo "The team will contact you shortly!";
            }
            else{
               echo "
               Message failed to send!";
            }
         
               
            $conn->close();
            

         }

      ?>


      <!--  footer -->
     <footer>
         <div class="footer">
            <div class="container">
               <div class="row">

                        <div class="col-lg-3 col-md-6 col-sm-6">
                           <div class="hedingh3 text_align_left">
                             <h3>About</h3>
                             <p>Revolutionalizing Crops is aiming to provide good services to people so that they can maximize their production in growing crops. The mission and vision of this company are to help farmers across the country to maximize their production through our services.</p>
                           </div>
                     </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                           <div class="hedingh3  text_align_left">
                              <h3>Contact  Us</h3>
                                <ul class="top_infomation">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>
                           Kigali/Rwanda  
                        </li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>
                           Call : +233 245627336
                        </li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i>
                           <a href="Javascript:void(0)">Email : fabrice.mukarage@gmail.com</a>
                        </li>
                     </ul>
                            
                     </div>
                  </div>
                     <div class="col-lg-4 col-md-6 col-sm-6">
                           <div class="hedingh3 text_align_left">
                              <div class="map">
                                <img src="images/rwanda.png" alt="#"/>
                              </div>
                           </div>
                        </div>
                    
               </div>
            </div>
            
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/custom.js"></script>

</body>
</html>