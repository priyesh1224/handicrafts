<!DOCTYPE html>
<html>
<head>
	<title> Handicraftso | Profile</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<?php require_once('top.php');
	require_once('connection.php');
 ?>

<script>
	



</script>




<div class="right">
<h1>Profile </h1>
<h3 id ="waitalert"> Updating your profile data.Please wait ..... </h3>
	<form onsubmit="return false">
		<input type="text" name="name" id="name" placeholder="Username" readonly="readonly">
		<h4>Delivery Address</h4>
		<textarea readonly="readonly" placeholder = "Delivery Address" name="deliveryaddress" id="delivery"  >  </textarea>
		<input type="text" name="zip" id="zip" placeholder="Zipcode" readonly="readonly"> 
		<input type="text" name="number" id="contact" placeholder="Contact" readonly="readonly">
		<input type ="submit" id="edit" value="Edit profile" onclick="eedit()">
		<input type ="submit" id="signout" value="Sign out" onclick="signoutuser()">
		<h4> Your delivery address will be set as default in each order you place, although you will be able to change your delivery address from your cart before placing the order. </h4>






	</form>
	<script>

	
firebase.auth().onAuthStateChanged(function (user) {
	console.log("update");
		
		if(user) {
			firebase.database().ref('/users/'+ firebase.auth().currentUser.uid).once('value').then(function(snapshot){
				console.log(snapshot.val());

				document.getElementById("name").value = snapshot.val().username;
				document.getElementById("delivery").value = snapshot.val().address;
				document.getElementById("zip").value = snapshot.val().zip;
				document.getElementById("contact").value = snapshot.val().contact;
				if(snapshot.val().username === "" || snapshot.val().username === null) {
						document.getElementById("name").value = snapshot.val().email;
				}
				document.getElementById("name").style.color = "#3F2823";
				document.getElementById("delivery").style.color = "#3F2823";
				document.getElementById("zip").style.color = "#3F2823";
				document.getElementById("contact").style.color = "#3F2823";

				document.getElementById("name").style.fontWeight = "bold";
				document.getElementById("delivery").style.fontWeight = "bold";
				document.getElementById("zip").style.fontWeight = "bold";
				document.getElementById("contact").style.fontWeight = "bold";

				document.getElementById("delivery").style.fontsize ="18px";


				document.getElementById("waitalert").style.display = 'none';

			});
			firebase.auth().currentUser.displayName = username;
		}
	});
		



function eedit()
	{
		console.log(document.getElementById("edit").value);
		var userid = firebase.auth().currentUser.uid;
		if(document.getElementById("edit").value === "Edit profile")
		{

			document.getElementById("name").readOnly = false;
			document.getElementById("delivery").readOnly = false;
			document.getElementById("zip").readOnly = false;
			document.getElementById("contact").readOnly = false;
			document.getElementById("edit").value = "Done";





		}else if(document.getElementById("edit").value === "Done"){

			document.getElementById("name").readOnly = true;
			document.getElementById("delivery").readOnly = true;
			document.getElementById("zip").readOnly = true;
			document.getElementById("contact").readOnly = true;
			document.getElementById("edit").value = "Edit profile";
			
			firebase.database().ref('/users/'+userid).set ({
				username : document.getElementById("name").value.toUpperCase(),
				address : document.getElementById("delivery").value,
				contact : document.getElementById("contact").value,
				zip : document.getElementById("zip").value,
				email : firebase.auth().currentUser.email




			});
			var username = document.getElementById("name").value;
			var email = firebase.auth().currentUser.email;
			if(username !== email && username!=="")
				{
					firebase.auth().currentUser.displayName = username;
				}



			}
	}

	function signoutuser()
	{
		console.log(firebase.auth().currentUser);
		firebase.auth().signOut().then(function() {
				console.log(firebase.auth().currentUser);
				window.location.href="index.php";
		}).catch(function(error) {

			console.log(firebase.auth().currentUser);
		});
		console.log(firebase.auth().currentUser);

	}


</script>
	

</div>

</body>
</html>