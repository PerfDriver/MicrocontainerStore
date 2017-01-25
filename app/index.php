<?php session_start() ; 

            foreach ($_SESSION as $key => $value) 
            {

                //$line[$i] = $_SESSION[$key] = null;
                unset($_SESSION[$key]); // - will wipe out the refs totally.
            }
			
			$_SESSION['orderConfirmFinalised'] = false;

?>

<html>
	<head>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
		<link rel="stylesheet" href="css/layouts/store.css">
		<title></title>
		
		<script type="text/javascript">
			var textBlocks = new Array(8);
			for (var i = 0; i < 8; i++) {
				textBlocks[i] = new Array(8);
			}

			textBlocks[0][0] = "Premium Laptop"; // Name
			textBlocks[0][1] = "Apple"; // Brand
			textBlocks[0][2] = "The incredibly thin and light new MacBook features a stunning 12-inch Retina display, a redesigned keyboard and the new Force Touch trackpad."; // Description
			textBlocks[0][3] = "Medium"; // Size
			textBlocks[0][4] = "10"; // Shipping weight
			textBlocks[0][5] = "Apple"; // Distributor
			textBlocks[0][6] = "850.00"; // Price
			textBlocks[0][7] = "images/laptopImage.jpg"; // Image
						
			textBlocks[1][0] = "Testers Pocketbook";
			textBlocks[1][1] = "Paul Gerrard ";
			textBlocks[1][2] = "A brief introduction to the discipline called testing.";
			textBlocks[1][3] = "Small";
			textBlocks[1][4] = "0.5";
			textBlocks[1][5] = "Amazon";
			textBlocks[1][6] = "10.00";
			textBlocks[1][7] = "images/testersPocketBook.jpg"; // Image
			
			textBlocks[2][0] = "Desk";
			textBlocks[2][1] = "Oak World";
			textBlocks[2][2] = "A solid wood desk.";
			textBlocks[2][3] = "Large";
			textBlocks[2][4] = "50";
			textBlocks[2][5] = "Tesco";
			textBlocks[2][6] = "300.00";
			textBlocks[2][7] = "images/desl.jpg"; // Image
			
			textBlocks[3][0] = "Doombar";
			textBlocks[3][1] = "Tesco";
			textBlocks[3][2] = "Ten bottles of Doombar ale from Cornwall.";
			textBlocks[3][3] = "Medium";
			textBlocks[3][4] = "10.5";
			textBlocks[3][5] = "Amazon";
			textBlocks[3][6] = "24.00";
			textBlocks[3][7] = "images/doombar.jpg"; // Image

			textBlocks[4][0] = "Stationary";
			textBlocks[4][1] = "Helix";
			textBlocks[4][2] = "Nine piece stationary set.";
			textBlocks[4][3] = "Small";
			textBlocks[4][4] = "0.5";
			textBlocks[4][5] = "Amazon";
			textBlocks[4][6] = "4.00";
			textBlocks[4][7] = "images/stationaryKit.jpg"; // Image

			textBlocks[5][0] = "Water";
			textBlocks[5][1] = "Evian";
			textBlocks[5][2] = "A water bottle";
			textBlocks[5][3] = "Small";
			textBlocks[5][4] = "0.5";
			textBlocks[5][5] = "Amazon";
			textBlocks[5][6] = "2.00";
			textBlocks[5][7] = "images/waterBottle.jpg"; // Image

			textBlocks[6][0] = "Headphones";
			textBlocks[6][1] = "Beats";
			textBlocks[6][2] = "Premium consumer headphones.";
			textBlocks[6][3] = "Medium";
			textBlocks[6][4] = "0.5";
			textBlocks[6][5] = "Apple";
			textBlocks[6][6] = "224.00";
			textBlocks[6][7] = "images/beats.jpg"; // Image

			textBlocks[7][0] = "Writing Pad";
			textBlocks[7][1] = "Pukka";
			textBlocks[7][2] = "A large writing pad containing 300 pages.";
			textBlocks[7][3] = "Small";
			textBlocks[7][4] = "0.5";
			textBlocks[7][5] = "Amazon";
			textBlocks[7][6] = "6.00";
			textBlocks[7][7] = "images/writingPad.jpg"; // Image
			
			window.onload = function()
			{
				var selectionItem = document.getElementById('productSelection'); 
				var index = 0;
				
				for(productArray in textBlocks)
				{
				   var opt = document.createElement("option");
				   opt.value= index;
				   opt.innerHTML = textBlocks[index][0] + " - <i>£" + textBlocks[index][6] +"</i>"; // name

				   selectionItem.appendChild(opt);
				   index++;
				}	
			}

			function validateFormOnSubmit(theForm) {
					var form = document.createElement("form");

					form.action = "shipping.php";
					form.method = "post";

					// Post Item - Price - Size
					var ind = document.getElementById('productSelection').value; 

					var nameField = document.createElement("input");
					nameField.type = "hidden";
					nameField.name = "ProductName";
					nameField.value = textBlocks[ind][0];
					form.appendChild(nameField);
					localStorage.setItem("Item", textBlocks[ind][0]);

					var nameField = document.createElement("input");
					nameField.type = "hidden";
					nameField.name = "Price";
					nameField.value = textBlocks[ind][6];
					form.appendChild(nameField);

					var nameField = document.createElement("input");
					nameField.type = "hidden";
					nameField.name = "Size";
					nameField.value = textBlocks[ind][3];
					form.appendChild(nameField);
					
					var distField = document.createElement("input");
					distField.type = "hidden";
					distField.name = "Dist";
					distField.value = textBlocks[ind][5];
					form.appendChild(distField);

				// The form needs to be a part of the document in
				// order for us to be able to submit it.
				form.submit();
			}
	
			function changeText(elemid) { 
				var ind = document.getElementById(elemid).value; 
			
				document.getElementById("brand").innerHTML= textBlocks[ind][1]; 
				document.getElementById("desc").innerHTML= textBlocks[ind][2]; 
				document.getElementById("size").innerHTML= textBlocks[ind][3]; 
				document.getElementById("weight").innerHTML= textBlocks[ind][4] + " KG"; 
				document.getElementById("price").innerHTML= textBlocks[ind][6]; 
				document.getElementById("dist").innerHTML= textBlocks[ind][5]; 
			
				document.getElementById("productImage").src = textBlocks[ind][7];
				document.getElementById("productImage").style.display = "block";
				
			} 
		</script>
	</head>
	<body>
	<?php include('includes/header.php') ?>
		<div class="content pure-u-1 pure-u-md-3-4">
			<h1 class="brand-title">Product Catalog</h1>

			<div style="padding-top:30px;">
				<form action="javascript:validateFormOnSubmit(this);" class="pure-form pure-form-aligned">
					<fieldset>
						<div class="pure-control-group">
							<label for="name">Products:</label>
								 <select id="productSelection" onChange="changeText('productSelection');">
									<option disabled selected> -- Select a product -- </option>
								 </select>
						</div>
						
						<div style="margin-left:11.2em;">
							<img id="productImage" style="display: none;" src="" width="200" height="180">
						</div>
						<div class="pure-control-group">
							<div style="margin-left:3.0em;">
								Product Details:
							</div>
							<div style="margin-left:11.2em;">
								<table class="pure-table">
									<tr>
										<th>Brand</th>
										<td id="brand"></td>
									</tr>
									<tr>
										<th>Distributor</th>
										<td id="dist"></td>
									</tr>
									
									<tr>
										<th>Description</th>
										<td id="desc"></td>
									</tr>
									<tr>
										<th>Product Size</th>
										<td id="size"></td>
									</tr>
									<tr>
										<th>Shipping Weight</th>
										<td id="weight"></td>
									</tr>									
									<tr>
										<th>Price</th>
										<td id="price"></td>
									</tr>
								</table>						
							</div>
						</div>
						
						<div class="pure-controls">
							<button type="submit" class="pure-button pure-button-primary">Order Product</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
		<?php include('includes/footer.php') ?>
	</body>
</html>