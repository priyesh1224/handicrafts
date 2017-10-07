

<script>
<?php  require_once('connection.php'); ?>

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    console.log("cookie set");
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var user = getCookie("username");
    if (user != "") {
        alert("Welcome again " + user);
    } else {
        user = prompt("Please enter your name:", "");
        if (user != "" && user != null) {
            setCookie("username", user, 365);
        }
    }
}

// function signupuser()
// {	
// 	var email = document.getElementById("email").value;
// 		var pass = document.getElementById("password").value;
// 			var confirmpass = document.getElementById("confirmpassword").value;
// 				var number = document.getElementById("contact").value;


// 		if(email === "" || pass === "" || confirmpass === "" || number === "") {
// 			alert("You need to fill all the details");
// 		}else if(pass !== confirmpass) {
// 			alert("Password does not match");
// 		}else if(pass.length < 6 ) {
// 			alert("Password needs to be atleast 6 characters long");
// 		}else if(number.length != 10) {
// 			alert("Invalid mobile number");
// 		}else {
// 			firebase.auth().createUserWithEmailAndPassword(email, pass).catch(function(error) {
//  						 // Handle Errors here.
//  						 var errorCode = error.code;
//   						var errorMessage = error.message;
//   						alert("login failed");
//   						abort();
//   // ...
// 			});
// 			alert("Sign up successful , confirm your email to start using handicraftso");



// 		}









// }













</script>