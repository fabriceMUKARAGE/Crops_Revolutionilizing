<HTML>
<HEAD>
<TITLE>Revolutionilizing Crops login</TITLE>
<link href="registration/css/firststyle.css" type="text/css"
	rel="stylesheet" />
<link href="registration/css/registration.css" type="text/css"
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
				<form name="login" action="information.php" method="post"
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
				if(isset($_POST['login-btn'])){
				$myusername = $_POST['username'];
				$mypassword = $_POST['password'];
				$query = "SELECT * FROM Registration WHERE Username='$myusername' OR Password='$mypassword'";
				$result = mysql_query($query);				
				if($conn->query($query) === FALSE){
						echo 'Incorrect Username or Password';
				}
				mysql_close();
			}
			?>


	<script>
function loginValidation() {
	var valid = true;
	$("#username").removeClass("error-field");
	$("#password").removeClass("error-field");

	var username = $("#username").val();
	var Password = $('#password').val();

	$("#username-info").html("").hide();

	if (username.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}

	$("#password-info").html("").hide();
	if (Password.trim() == "") {
		$("#password-info").html("required.").css("color", "#ee0000").show();
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