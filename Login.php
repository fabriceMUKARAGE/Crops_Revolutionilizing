<HTML>
<HEAD>
<TITLE>Revolutionilizing Crops login</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
	rel="stylesheet" />
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
<BODY>
	<div class="phppot-container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="signup.php">Sign up</a>
			</div>
			<div class="signup-align">
				<form name="login" action="admin_index.php" method="post"
					onsubmit="return loginValidation()">
					<div class="signup-heading">Login</div>
				<?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>
				<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Username<span class="required error" id="username-info"></span>
							</div>
							<input class="input-box-330" type="text" name="username"
								id="username">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="password" id="password">
						</div>
					</div>

					<div class="row">
						<input class="btn" type="submit" name="login-btn"
							id="login-btn" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function loginValidation() {
	var valid = true;
	$("#username").removeClass("error-field");
	$("#password").removeClass("error-field");

	var firstname = $("#username").val();
	var Password = $('#password').val();

	$("#username-info").html("").hide();

	if (firstname.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}

	$("#password-info").html("").hide();
	if (Password.trim() == "") {
		$("#login-password-info").html("required.").css("color", "#ee0000").show();
		$("#password").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>


<?php
/* if a person makes registration, 
    records are stored into the database
*/
if(isset($_POST['signup-btn'])){
$username= $_POST['username'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$password= $_POST['password'];
$person= $_POST['person'];
   

	//Database connection
	require "database_credential.php";
	$conn = new mysqli(servename, username, password, db);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	  }

 	// inserting the sign up data for a driver into the database
	$sql= "INSERT INTO Registration (Username, Email, Phone, Password, Persontype) VALUES ('$username', '$email', '$phone', '$password', '$person')";

	if ($conn->query($sql) === FALSE) {
		echo "<center><h2 style='color:	#ff6b6b'>You either didn't fill all required details or 
		someone has already registered with the same information you are providing <br>
		<br> Please try to register again to be able to login into the system</h2></center>";
	}
    else{
        echo "
        <center><h2> <br><br> You can now login into the system</h2>
        </center>";
    }
  
		  
	$conn->close();
    

}

?>



<!--Checking if the user has already registered in the system-->
<?php 
  $db = mysqli_connect('localhost', 'root', 'Agahozo12!@', 'Revolutionizing_Crops');
  $usernamel = "";
  $passwordl = "";
  if (isset($_POST['login-btn'])) {
  	$username = $_POST['username'];
  	$password = $_POST['password'];

  	$sql_u = "SELECT * FROM Registration WHERE Username='$usernamel'";
  	$sql_e = "SELECT * FROM Registration WHERE Password='$passwordl'";
  	$res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);

  	if (!mysqli_num_rows($res_u)) {
  	  $name_error = "Sorry... There no such Username"; 	
  	}else if(!mysqli_num_rows($res_e)){
  	  $email_error = "Sorry... There is no such password"; 	
  	}
  }
?>
    
</body>
</html>