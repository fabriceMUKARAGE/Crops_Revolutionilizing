
<HTML>
<HEAD>
<TITLE>User registration</TITLE>
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
				<a href="Login.php">Login</a>
			</div>
			<div class="">
				<form name="sign-up" action="signup.php" method="POST"
					onsubmit="return signupValidation()">
					<div class="signup-heading">Register to Proceed</div>
				<?php
    if (! empty($registrationResponse["status"])) {
        ?>
                    <?php
        if ($registrationResponse["status"] == "error") {
            ?>
				    <div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        } else if ($registrationResponse["status"] == "success") {
            ?>
                    <div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        }
        ?>
				<?php
    }
    ?>

			<div class="error-msg" id="error-msg"></div>
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
								Email<span class="required error" id="email-info"></span>
							</div>
							<input class="input-box-330" type="email" name="email" id="email">
						</div>
					</div>
	
                    <div class="row">
						<div class="inline-block">
							<div class="form-label">
								Phone number<span class="required error" id="phone-info"></span>
							</div>
							<input class="input-box-330" type="text" name="phone"
								id="phone">	
						</div>
					</div>

					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="signup-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="password" id="password">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Confirm Password<span class="required error"
									id="confirm-password-info"></span>
							</div>
							<input class="input-box-330" type="password"
								name="confirm-password" id="confirm-password">
						</div>
					</div>

					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Select Preferred<span class="required error" id="select-info"></span>
							</div>
							
							<select name="person" id="person">
								<option value="Farmer">Farmer</option>
								<option value="Customer">Customer</option>
								<option value="Vistor">Vistor</option>
							</select>
							</div>
						</div>

					<div class="row">
						<input class="btn" type="submit" name="signup-btn"
							id="signup-btn" value="Sign up" onclick="return validateForm()">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
        // checking if the user registered into the system
        function validateForm(){
			var username = $("#username").val();
			var email = $("#email").val();
			var Password = $('#password').val();
			var phone = $('#phone').val();
    		var ConfirmPassword = $('#confirm-password').val();
        
            if(email.trim() != "" && username.trim() != "" && phone.trim() != "" && Password.trim() != "" && ConfirmPassword.trim() != "" && Password == ConfirmPassword){
                alert("registered!")
            }

    }
    </script>

	<script>
function signupValidation() {
	var valid = true;

	$("#username").removeClass("error-field");
	$("#email").removeClass("error-field");
	$("#password").removeClass("error-field");
	$("#phone").removeClass("error-field");

	$("#confirm-password").removeClass("error-field");

	var username = $("#username").val();
	var email = $("#email").val();
	var Password = $('#password').val();
	var phone = $('#phone').val();
    var ConfirmPassword = $('#confirm-password').val();
	var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

	$("#username-info").html("").hide();
	$("#email-info").html("").hide();

	if (username.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (email == "") {
		$("#email-info").html("required").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (email.trim() == "") {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
		$("#email").addClass("error-field");
		valid = false;
	} else if (!emailRegex.test(email)) {
		$("#email-info").html("Invalid email address.").css("color", "#ee0000")
				.show();
		$("#email").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#signup-password-info").html("required.").css("color", "#ee0000").show();
		$("#password").addClass("error-field");
		valid = false;
	}
	if (phone.trim() == "") {
		$("#phone-info").html("required.").css("color", "#ee0000").show();
		$("#phone").addClass("error-field");
		valid = false;
	}
	if (ConfirmPassword.trim() == "") {
		$("#confirm-password-info").html("required.").css("color", "#ee0000").show();
		$("#confirm-password").addClass("error-field");
		valid = false;
	}
	if(Password != ConfirmPassword){
        $("#error-msg").html("Both passwords must be same.").show();
        valid=false;
    }
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>

<?php

if(isset($_POST['signup-btn'])){
	$conn = mysqli_connect('localhost', 'root', 'Agahozo12!@', 'Revolutionizing_Crops');
	if(!$conn){
		die("connection failed");
	}
	$email = $_POST['email'];
	$query = "SELECT * FROM Registration WHERE email='$email'";	
	if ($conn->query($query) === TRUE) {
		echo 'Please someone has already registered with the same email, Try another one';
	mysql_close();
	}
}
?>

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

 	// inserting the sign up data for users into the database
	$sql= "INSERT INTO Registration (Username, Email, Phone, Password, Persontype) VALUES ('$username', '$email', '$phone', '$password', '$person')";

	if ($conn->query($sql) === FALSE) {
		echo "<center><h2 style='color:	#ff6b6b'>You either didn't fill all required details or 
		someone has already registered with the same information you are providing <br>
		<br> Please try to register again to be able to login into the system</h2></center>";
	}
    else{
        echo "
        <center><h2>Well done! You can now login into the system</h2>
        </center>";
    }
  
		  
	$conn->close();
    

}

?>

</BODY>
</HTML>
