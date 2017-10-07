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
		
		var fire = firebase.database().ref('/users/').once('value').then(  function(snapshot){
			var snap = snapshot.val();
			console.log(snap);

			snapshot.forEach(function(childSnapshot) {
  				  var childKey = childSnapshot.key;
    			var childData = childSnapshot.val();
    			 if(email === childData.email && pass === childData.password) {
    			 	setCookie("userid",childKey,20);
    			 	
    			 	window.location.href = "index.php";
    			 	
    			 	abort();
    			 }

    			 
    // ...
  			});
  			alert("invalid login details");
		

		    });
		
		return false;
	}

</script>


<div class="signupcontainer">
<h2> Login to continue shopping from us . </h2>
<form onsubmit="return false" method="post">
	<input type="email" name="email" placeholder=" Email ID" id="email"> <br>
	<input type="password" name="password" placeholder=" Password" id="password"> <br>
	<script>
		
	</script>
		


	<input type="submit" value="Login" id="signup" onclick="checklogin()">
	</form>

	<h2> Dont have an account ? <a href="signup.php">Sign up </a> </h2>
	
	</div>





</body>
</html>