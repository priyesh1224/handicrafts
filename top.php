<?php 
require_once('connection.php');
?>
<script>



	function check()
	{
		console.log("clicked");
		firebase.auth().onAuthStateChanged(function(user) {

			if(user) {
					window.location.href = "profile.php";

			}else {
				window.location.href = "login.php";

			}
		});
	}

</script>


	
		 	<link rel="stylesheet" href="style.css">

		
		<img class="icon last" src="brown search.jpeg">
		<img class="icon" src="brown use.png" onclick="check()">
		<a href="cart.php"><img class="icon" src="brown cart.png"> </a>
		<br>
		<br>
		<br>
		<br>
		<h3 id = "welcome" style="color : #3F2823"></h3> 
		<nav>
		<div class = "bar">
		<div class = "pro_bar">
			<!-- <div>Space for logo</div> -->
			<div class = "navbar-titles">
				<ul>
					<li class = "last"> <a href="contact.php">Contact Us</a></li>
					<li><a href="profile.php" id="profile">Profile</a></li>
					<li><a href="products.php">Store</a></li>
					<li ><a href="index.php">Home</a></li>
					<li class = "revealmore"> ... </li>
					
					
				</ul>

			</div>
			</div>
			</div>
		</nav>
		<script>
			
			firebase.auth().onAuthStateChanged(function(user) {

			if(user) {

				firebase.database().ref('/users/'+ user.uid).once('value').then(function(snapshot){
						var username = snapshot.val().username;
						if(username === "")
						{
							document.getElementById("welcome").innerHTML = "Welcome "+user.email;
						}else {
							document.getElementById("welcome").innerHTML = "Welcome "+username;
						}

				});
			// 	if(user.displayName === null)
			// 	{
			// 		console.log(user.displayName);
			// 	document.getElementById("welcome").innerHTML = "Welcome "+user.email;
			// }else {
			// 		console.log(user.displayName);

			// 	document.getElementById("welcome").innerHTML = "Welcome "+user.displayName;
			// }
			}
		});

		</script>