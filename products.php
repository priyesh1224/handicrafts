<?php require "connection.php"; ?>
<!DOCTYPE html>
<html>
<head> 
	<title>Handicraftso</title>
	<link rel="stylesheet" href="style.css">
	 </head>
<body>
	<?php require_once('top.php');
	?>

	<div class="pro_inner-rect">
		<h2> Handicraftso creations </h2>
		<h6>We have diverse collection of Handicrafts. No need to hunt arround, we have got all for you. </h6>
	</div>
		<script>
		firebase.auth().onAuthStateChanged(function(user) {

			if(user) {
					alert("You are signed in");
			}else {
				alert("not signed in ");

			}
		});

		

 			function addtocart(id)
 			{
 				alert("product is added to cart of id" +id);
 			}

 		</script>


<?php
	$query = "select * from products;";
	$res = $connection->query($query);

	while($row = $res->fetch_assoc()) {
		?> <div class = "storeproduct">     </h1>
			<?php $img = $row["category"];
			 $rimg =  "products/" . $img . ".png"  ;
			 ?>

			 <img src=" <?php echo $rimg; ?>">

			
	
	 <h1>  <?php echo  $row["name"]; ?>      </h1>
	 <div class="quantity"><h3 > Quantity :  
					<span id="up">▲</span> 1  
					<span id="down"> ▼</span>  </h3> 
				</div>
				 
		<button id="  <?php echo $row["pid"]; ?> "  onclick= "addtocart( <?php echo $row["pid"]; ?> )"> Add to Cart</button> <br>

			    
			 	</div>
 <?php	} ?>




</body>
</html>