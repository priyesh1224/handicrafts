</!DOCTYPE html>
<html>
<head>
	<title> Sign up</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php  require_once('top.php');
	require_once('connection.php');
	require_once('cookies.php');
?>
<script>
	function signupuser()

{	




		var temp = false;

	
	var email = document.getElementById("email").value;
		var pass = document.getElementById("password").value;
			var confirmpass = document.getElementById("confirmpassword").value;
				var number = document.getElementById("contact").value;

				 var suc = "Sign up successful , confirm your email to start using handicraftso";


		if(email === "" || pass === "" || confirmpass === "" || number === "") {
			alert("You need to fill all the details");
		}else if(pass !== confirmpass) {
			alert("Password does not match");
		}else if(pass.length < 6 ) {
			alert("Password needs to be atleast 6 characters long");
		}else if(number.length != 10) {
			alert("Invalid mobile number");
		}else {
			var check = false;
			firebase.auth().createUserWithEmailAndPassword(email, pass).catch(function(error) {
				check = true;
 						 // Handle Errors here.
 						 temp = true;
 						 console.log("%%%%%%%%%"+ email);
 						 var errorCode = error.code;
  						var errorMessage = error.message;
  						alert(" Signup failed");
  						
  						if (errorCode === "auth/network-request-failed")
  						{
  							alert("Check your internet connection and try again");
  						}else if(errorCode === "auth/email-already-in-use")
  						{
  							alert("Account with this email already exist. Try login with this email");
  						}
  						// window.location.href = "signup.php";


  						return;
  // ...
			});

			var curruser = firebase.auth()


			firebase.auth().onAuthStateChanged(function (user) {
		if (user)
		{
			console.log("user is signed in with uid "+user.displayName);
			if(user.displayName === null)
			{
				user.updateProfile({
					displayName : email,
					
				});
				var uid = firebase.auth().currentUser.uid;
				firebase.database().ref(/users/ + uid).set({
   					 username: email,
   						 email: email,
   					 profile_picture : "",
   					 address : "",
   					 zip : "",
   					 contact : ""
 					 });
			}

			window.location.href = "products.php";
			
			}else {
				console.log("no user is logged in");
			}


		});
			

			
					if(temp === false) 
					{
   							alert(suc); 
							console.log(firebase.auth().currentUser.email + "^^^^^^^^^^^");
					}


			
			
		}
	}


</script>











<div class="signupcontainer">
<h2> Create an account to continue shopping from us . </h2>
<form id="form" onsubmit=" return false">
			<input type="email" name="email" placeholder=" Email ID" id="email"> <br>
			<input type="password" name="password" placeholder=" Password" id="password"> <br>
			<input type="password" name="confirmpassword" placeholder=" Confirm password" id="confirmpassword"> <br>
			<input type="number" name="contact" placeholder="  Contact Number" id="contact"> <br>
			<div class="radios">	<input type="radio" name="gender">Male <input type="radio" name="gender">Female <input type="radio" name="gender">Other </div>

			<input type="submit" value="Signup" id="signup" onclick="signupuser()">
</form>

	<h2> Already have an account ? <a href="login.php">Log in </a> </h2>
	<h4> An email will be sent for verification after you fill details and click on Signup. </h4>
	</div>















</body>
</html>