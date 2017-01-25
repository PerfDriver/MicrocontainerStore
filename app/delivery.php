<?php session_start() ;
        	
	$containsAllNeededInfo = false;
	if(!empty($_POST))
	{
		if((isset($_SESSION['ProductName']) || isset($_POST['Email'])))
		{
			$containsAllNeededInfo = true;			
			foreach ($_POST as $key => $value) 
			{
				$_SESSION[$key] = $value; 
			} 
		}		
	 }
	 if(!$containsAllNeededInfo)
	 {
		header("LOCATION: http://grid-tools-downloads.com/Will/TMF/index.php");
	 }
        
?>

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
			<h1 class="brand-title">Shipping Specification</h1>

			<div style="padding-top:30px;">
				<form action="payment_details.php" method="post" class="pure-form pure-form-aligned">
							<?php
								$cost = 0;
								
								if ($_SESSION['Dist'] == "John Lewis") {
									$cost = 2.00;
									
									$_SESSION["courier"] = "UPS";															
								} else if ($_SESSION["country"] == "England" || $_SESSION["country"] == "Wales") {
									if ($_SESSION["Size"] == "Medium") {
										if ($_SESSION['Dist'] == "Apple") {
											$cost = 5.00;
											
											$_SESSION["courier"] = "DPD";
										} else if ($_SESSION['Dist'] == "Amazon") {
											$cost = 4.00;
											
											$_SESSION["courier"] = "Royal Mail";											
										} else if ($_SESSION['Dist'] == "Tesco") {
											$cost = 2.00;				

											$_SESSION["courier"] = "Tesco";											
										}
									} else if ($_SESSION["Size"] == "Small") {
										if ($_SESSION['Dist'] == "Apple") {
											$cost = 4.00;				

											$_SESSION["courier"] = "DPD";										
										} else if ($_SESSION['Dist'] == "Amazon") {
											$cost = 3.00;				
											
											$_SESSION["courier"] = "UPS";										
										} else if ($_SESSION['Dist'] == "Tesco") {											
											$cost = 1.00;							

											$_SESSION["courier"] = "Tesco";											
										}										
									} else if ($_SESSION["Size"] == "Large") {
										if ($_SESSION['Dist'] == "Apple") {
											$cost = 10.00;
											
											$_SESSION["courier"] = "DPD";
										} else if ($_SESSION['Dist'] == "Amazon") {
											$cost = 5.00;
											
											$_SESSION["courier"] = "Arrow XL";											
										} else if ($_SESSION['Dist'] == "Tesco") {
											$cost = 3.00;
											
											$_SESSION["courier"] = "Tesco";											
										}										
									}
								} else if ($_SESSION["country"] == "Scotland") {
									if ($_SESSION["Size"] == "Medium") {
										if ($_SESSION['Dist'] == "Apple") {
											$cost = 8.00;
											
											$_SESSION["courier"] = "UPS";											
										} else if ($_SESSION['Dist'] == "Amazon") {
											$cost = 6.00;
											
											$_SESSION["courier"] = "Yodal";
											
										} else if ($_SESSION['Dist'] == "Tesco") {
											$cost = 7.00;
											
											$_SESSION["courier"] = "Royal Mail";
											
										}
									} else if ($_SESSION["Size"] == "Small") {
										if ($_SESSION['Dist'] == "Apple") {
											$cost = 3.00;
											
											$_SESSION["courier"] = "UPS";
											
										} else if ($_SESSION['Dist'] == "Amazon") {
											$cost = 1.00;
											
											$_SESSION["courier"] = "DPD";
											
										} else if ($_SESSION['Dist'] == "Tesco") {
											$cost = 3.00;
											
											$_SESSION["courier"] = "Tesco";
											
										}										
									} else if ($_SESSION["Size"] == "Large") {
										if ($_SESSION['Dist'] == "Apple") {
											$cost = 9.00;
											
											$_SESSION["courier"] = "DPD";
											
										} else if ($_SESSION['Dist'] == "Amazon") {
											$cost = 8.00;
											
											$_SESSION["courier"] = "FedEx";
											
										} else if ($_SESSION['Dist'] == "Tesco") {
											$cost = 12.00;
											
											$_SESSION["courier"] = "Tesco";											
										}										
									}
								} 
								
								$_SESSION["delivery_cost"] = $cost;
								
								$_SESSION["Total_Final_Cost"] = $_SESSION["Price"] + $cost;
							?>
							Courier Service: <?php echo $_SESSION["courier"]; ?>

							<br /> <br />
						
							Shipping Cost: <?php echo "&pound;"; echo number_format((float)$cost,  2, '.', ''); ?> <br /> <br /> <br />

							<h2>Total: <?php echo "&pound;"; echo number_format((float) (((float) $_SESSION["Price"]) + $cost), 2, '.', ''); ?> </h2>
							
					<div class="pure-controls">
						<button type="submit" class="pure-button pure-button-primary">Continue</button>
					</div>
					
				</form>			
			</div>
		</div>			
		
		<?php include('includes/footer.php') ?>
	</body>	
</html>