<?php


 $connection = mysqli_connect("127.0.0.1" , "root" ,"NVIDIA210","handicrafts");
if(!$connection)
{
	die("Could not connect");
	}else {

	}

	?>


	<script src="https://www.gstatic.com/firebasejs/4.5.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCTwlg00CRN5HXahzZOXRh6fRIvAqbTsQo",
    authDomain: "handicraftso-cda89.firebaseapp.com",
    databaseURL: "https://handicraftso-cda89.firebaseio.com",
    projectId: "handicraftso-cda89",
    storageBucket: "",
    messagingSenderId: "394708400898"
  };
  firebase.initializeApp(config);
</script>