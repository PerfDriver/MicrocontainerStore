<html>
	<head>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
		<link rel="stylesheet" href="css/layouts/store.css">
		<title></title>

	</head>

	<body>
		<?php include('includes/header.php') ?>

		<div class="content pure-u-1 pure-u-md-3-4">
			<h1 class="brand-title">Game Rules</h1> 
			
			<div style="padding-top:20px;">
			<b>This is a basic webstore GUI. <br>It contains a product selection page, a delivery location page and a payment page. <br>Within the webstore there is a hard coded defect, the game is to find the defect.<br><br>Product Selection Page:<br>You must select a product<br><br>Delivery Location Page: <br>The Email Field must be between 1 and 100 characters and must be a valid email.<br>The Confirm Email Field must match the email field.<br>The Name Field must be between 1 and 100 characters and can only contain letters and spaces.<br>The Address Line 1 field must be between 1 and 100 characters and can only contain numbers, letters and spaces. <br>The Address Line 2 field must be less than 100 characters and can only contain numbers letters and spaces<br>The County Field must be between 1 and 100 characters and can only contain numbers, letters and spaces. <br>The Postcode Field must must be a valid U.K. postcode<br>The Country field must have a Country selected. <br><br>Payment Page:<br>The Card Selection Field must have a card selected. <br>The Card number field must be exactly 16 characters contain only numbers.</b>
			</div>
		</div>			
		
		<?php include('includes/footer.php') ?>
	</body>	
</html>
