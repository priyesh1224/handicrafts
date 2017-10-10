<?php require "connection.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Handicraftso | cart</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
	<?php require 'top.php';
	require 'connection.php'; ?>
	<script>

		function incquant(pic)
		{

			var search = pic;

			var curr = document.getElementById(search).innerHTML;
			curr = "" + (Number(curr)+1);

			document.getElementById(search).innerHTML = curr;

		}
		function decquant(pic)
		 {
			var search = pic;

			var curr = document.getElementById(search).innerHTML;
			if(curr >=2) {
				curr = "" + (Number(curr)-1);
				document.getElementById(search).innerHTML = curr;
		}







	</script>
	<script>

			function newsaddress()
			{
				



			}

	</script>


		<div class="whole">

			<div class = "details">
				<div id="address"><h2>Delivery Address : <span id="address">-</span><br></h2> </div>

				<div id="contact"><h2>Contact number : <span id = "number">-</span><br> </div> </h2>

				<button id ="changeadd" >Change Delivery Address</button>
				<input type = "text" id="newadd" placeholder="New Address">
				<h5 id="note">Address you set here will be for this order only,incase you want to change your delivery address for all orders,go to profile and change it.</h5>
				<button id = "changecontact"  >Change Contact Number</button>
				<input type="number" id="newnumber" placeholder = "New Contact">
				<h5 id="warn">Contact Number you set here will be for this order only,incase you want to change your default contact for all orders,go to profile and change it.</h5>


				<h2>Total Amount payable : Rs. <span id="tot-bill">0</span><br></h2>
				<h2>	Net price : Rs. <span id="net">0</span> </h2>
				<h3> Gst : Rs. <span id="tax">0</span> </h3>
				<button> Back to Shopping</button>
				<button id="gotopayment"> Proceed to payment</button>
				<h4> Have a promocode ? </h4>


				<h5> Payment powered by highly secured ccavenue payment gateway. </h5>
			</div>


			<script>
				
			function deleteitem(id) 
			{
				var priceofeach = 0;
				console.log(id + " is deleted");
				firebase.auth().onAuthStateChanged(function(user) {
					if(user) {
						firebase.database().ref('/products/'+id).once('value').then(function(snapshot) {
							priceofeach = snapshot.val().price;
						firebase.database().ref('/users/'+user.uid+'/cart/'+id).remove();
						console.log(id + " "+ priceofeach + " "+document.getElementById(id).innerHTML);
						updateprice(priceofeach,document.getElementById(id).innerHTML,id);


						});
					}
				});

				
				
				document.getElementById("item"+id).style.display = "none";

			}

				function updateprice(priceperproduct ,quantity , id)
				{
					var curr = document.getElementById("net").innerHTML;
					curr = "" + (Number(curr) - (Number(quantity) * Number(priceperproduct)));
					console.log(" now amoutn is "+curr);
					console.log(document.getElementById(id).innerHTML);
					document.getElementById("net").innerHTML = curr;
					document.getElementById("tot-bill").innerHTML = "" + (Number(curr)*11/10);
					document.getElementById("tax").innerHTML = "" + (Number(curr)*1/10);


				}





			</script>



			<script >

			document.getElementById('changeadd').addEventListener("click", function(){
				console.log("called");


				if(document.getElementById("changeadd").innerHTML === "Change Delivery Address") 
				{
									console.log("hey");

					document.getElementById("newadd").style.display = "block";
					document.getElementById("changeadd").innerHTML = "Done";
					document.getElementById("note").style.display = "block";
				}
				else if(document.getElementById("changeadd").innerHTML === "Done")
				{
									console.log("hello");
					if(document.getElementById("newadd").value !== "") {
					document.getElementById("address").innerHTML =  "<h2> Delivery Address : "+document.getElementById("newadd").value + "</h2>";
				}
					document.getElementById("changeadd").innerHTML = "Change Delivery Address";
					document.getElementById("newadd").style.display = "none";
					document.getElementById("note").style.display = "none";


				}
			});

			document.getElementById('changecontact').addEventListener("click", function(){
				console.log(document.getElementById("changecontact").innerHTML);
				if(document.getElementById("changecontact").innerHTML === "Change Contact Number") 
				{
					document.getElementById("newnumber").style.display = "block";
					document.getElementById("changecontact").innerHTML = "Done";
					document.getElementById("warn").style.display = "block";
				}else if(document.getElementById("changecontact").innerHTML === "Done")
				{
									console.log("hello");
					if(document.getElementById("newnumber").value !== "") {
					document.getElementById("contact").innerHTML =  "<h2> Contact number : "+document.getElementById("newnumber").value + "</h2>";
				}
					document.getElementById("changecontact").innerHTML = "Change Contact Number";
					document.getElementById("newnumber").style.display = "none";
					document.getElementById("warn").style.display = "none";


				}


			});


				var content = "";
				firebase.auth().onAuthStateChanged(function(user) {
					if(user) {
						firebase.database().ref('/users/'+user.uid).once('value').then(function(snapshot) {

							document.getElementById('address').innerHTML ="<h2>Delivery Address : "+snapshot.val().address+" </h2>";
							document.getElementById('number').innerHTML = snapshot.val().contact;
							console.log(snapshot.val().address + " this is address ");
							console.log(snapshot.val().contact + " this is contact ");

						});

						var totalprice = 0;
						firebase.database().ref('/users/'+user.uid+'/cart/').once('value').then(function(snapshot) {

							snapshot.forEach(function(child) {

								var itempicid = child.key;
								var quantity = child.val();
								console.log(itempicid+" "+quantity);
								itempicic = "hddndndndnd";

								firebase.database().ref('/products/'+itempicid).once('value').then(function(snapshot) {
									console.log(snapshot.val());

									var name = snapshot.val().name;
									var price = snapshot.val().price;
									var stock = snapshot.val().stock;

									console.log(quantity +"with "+price);
									totalprice = Number(totalprice) + Number(quantity) * Number(price);
									console.log("total price is  "+totalprice);


									content += '<div class= "item" id="item'+itempicid+'"><button id="delete" onclick="deleteitem('+itempicid+')">❌</button><img src="products/'+itempicid+'.png">'+ 
									'<div class = "content"><div class="name">'+name+'</div> <br><br>'+
									'<div class="price">Price : Rs '+(price * quantity )+'</div><br><br><div class="quantity" ><h3 > Quantity : '+
									'<button id="up" onclick= "incquant('+itempicid+')">▲</button> <span id="'+itempicid+'">'+quantity+'</span> <button id="down" onclick= "incquant('+itempicid+')"> ▼</button>  </h3> </div></div></div>' ;
									document.getElementById("cartproducts").innerHTML = content;
									console.log(content);
									document.getElementById("net").innerHTML = ""+totalprice;
									document.getElementById("tot-bill").innerHTML = ""+(totalprice * 11 /10);
									document.getElementById("tax").innerHTML = ""+(totalprice * 1/10);

								});

							});

							console.log("total price is  "+totalprice);



						});


					}


				});



			</script>





			<div class="container">
				<div class="items" id ="cartproducts">




				</div>
			</div>





		</div>
	</body>
	</html>