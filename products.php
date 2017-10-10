<html>
<head> 
	<title>Handicraftso</title>
	<link rel="stylesheet" href="style.css">
	 </head>
<body>
	<?php require_once('top.php');
		require_once('connection.php');
	?>


	<div class="pro_inner-rect">
		<h2> Handicraftso creations </h2>
		<h6>We have diverse collection of Handicrafts. No need to hunt arround, we have got all for you. </h6>
	</div>

	<div class = "cart">
	<button id="gotocart" onclick="window.location.href='cart.php'"> Go to Cart </button>
	</div>
	<h3 id ="warning"> Please wait,while the products are loading .... </h3>
		<script>
		f
		console.log("here ?");

 			function addtocart(id)
 			{
 				alert("product is added to cart of id" +id);
 			}

 		</script>



 		<script>
 		firebase.database().ref('/products/').once('value').then(function(snapshot) {
 				snapshot.forEach(function(child) {
 					console.log("will call update");

 						updatebox(child.val().name , child.val().price , child.val().pictureid);
 						console.log("did call update");

 				});
 				document.getElementById("warning").style.display = "none";

 				
 		});


	</script>

	<script >
	function incquant(pic)
	{
				
				var search = pic;

		var curr = document.getElementById(search).innerHTML;
		curr = "" + (Number(curr)+1);
		
		document.getElementById(search).innerHTML = curr;
		



	}
	function decquant(pic) {
		var search = pic;

		var curr = document.getElementById(search).innerHTML;
		if(curr >=2) {
		curr = "" + (Number(curr)-1);
		document.getElementById(search).innerHTML = curr;
	    }
		
		
		
		
	}
	var updates = {};
	function managecart(pic) {
		console.log("I am again here");
		var quantity = document.getElementById(pic).innerHTML;
		console.log("quantity is "+quantity);
		  updates[""+pic] =  ""+quantity;
			firebase.auth().onAuthStateChanged(function(user) {
				if(user) {
					firebase.database().ref('/users/'+user.uid+/cart/).update(updates);
					document.getElementById("b"+pic).innerHTML = " Added to Cart";
				}



			});
		}






	var ex = "";

		function updatebox(name, price, pictureid) {


			  ex += '<div class="storeproduct"> <img src="products/'+
					 +pictureid +'.png" id="img">'+
					'<br><h1 id="name" class="'+price+'">'+name+'</h1>'+
					
					'<h1 id="price"> Rs. '+price+'</h1>'+


					'<div class="quantity"><h3 > Quantity : '+ 
					'<button id="up" class="'+pictureid+' up" onclick= "incquant('+pictureid+')">▲</button> <span id="'+pictureid+'">1</span>'+  
					'<button id="down" class="'+pictureid+' down" onclick= "decquant('+pictureid+')"> ▼</button>  </h3> '+
				'</div>'+

			' <button id="b'+pictureid+'" onclick="managecart('+pictureid+')"> Add to Cart </button>   </div> ' ;

			
			

			document.getElementById("container").innerHTML= ex;
			
		}




	</script>


	   <div id = "container">.
	   </div>







</body>
</html>