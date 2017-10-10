</!DOCTYPE html>
<html>
<head>
	<title> Sign up</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="cookies.js"></script>
</head>
<body>
<?php  require_once('top.php');
		require_once('connection.php');
		require_once('cookies.php');
?>

<script>
	
	function checklogin()
	{
		 



		var email = document.getElementById('email').value;
		var pass = document.getElementById('password').value;
		var exe = firebase.auth().signInWithEmailAndPassword(email,pass).catch(function(error){
			switch(error.code) {
				case 'auth/invalid-email' : msg = "Invalid Email Address";break;
				case 'auth/user-disabled' : msg ="You are blocked from accesing our store.Kindly Contact us.";
				case 'auth/user-not-found' : msg = "This email address is not registered with us.Kindly Signup with this email.";
				case 'auth/wrong-password' : msg = "Invalid email/password combination.Check your password and try again";
				default : msg ="Internal Error";


			}
			document.getElementById("status").innerHTML = msg;
			


		});
		firebase.auth().onAuthStateChanged(function(user){

			if(user) {
				if(user.emailVerified === true) {
				console.log("done");
				window.location.href = "index.php";
			}else {
				document.getElementById("status").innerHTML = " Your email is not yet confirmed.kindly check your email and confirm your identity.";
					firebase.auth().signOut().then(function(){

					}) .catch(function(error){
						document.getElementById("status").innerHTML = error.code;
					})
			}

			}else {
				console.log("failed");
			}
		});
		
		
		
		return false;
	}

</script>


<div class="logincontainer">
<h2> Login to continue shopping from us . </h2>
<form onsubmit="return false" method="post">
	<input type="email" name="email" placeholder=" Email ID" id="email"> <br>
	<input type="password" name="password" placeholder=" Password" id="password"> <br>
	<script>
		
	</script>
		


	<input type="submit" value="Login" id="signup" onclick="checklogin()">
	</form>

	<h2> Dont have an account ? <a href="signup.php">Sign up </a> </h2>
	<br><br><h2 id="status"></h2>
	<button id="resend">Resend Email Confirmation</button>
	
	</div>





</body>
</html>