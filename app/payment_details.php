<?php 

session_start() ; 

// $hasOrderedDesk = false;
// foreach ($_POST as $key => $value) 
// {
	// $_SESSION[$key] = $value;
// }	
// if ($_SESSION["ProductName"] == "Desk")
// {
	// $hasOrderedDesk = true;
// }



$hasOrderedDesk = false;
$containsAllNeededInfo = false;
if((isset($_SESSION['ProductName']) && isset($_SESSION['Email'])))
{
	$containsAllNeededInfo = true;			
	foreach ($_POST as $key => $value) 
	{
		$_SESSION[$key] = $value; 
	}
	if ($_SESSION["ProductName"] == "Desk")
	{
		$hasOrderedDesk = true;
	}
}		
 if(!$containsAllNeededInfo || $_SESSION['orderConfirmFinalised'] == true)
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

		<script type="text/javascript">
			
			function changeTotal(theForm) {
				var ind = document.getElementById('cardType').selectedIndex ; 
				var cost = 0;
				if (ind == 1) {
					cost = 2;
				} else if (ind == 2) {
					cost = 2;
				} else {
					cost = 0;
				}
				document.getElementById('cardCharge').value = cost;
				document.getElementById("totalAmount").innerHTML= (<?php echo ((float) $_SESSION["delivery_cost"] +  (float) $_SESSION["Price"]) ?> + cost) + ".00"; 

			}			
		</script>
	<script src="payment_validation.js">	
	</script>
	<script>
		localStorage.setItem("HasOrderedDesk", <?php echo $_SESSION["ProductName"] ?>);
	</script>
	</head>

	<body>
		<?php include('includes/header.php') ?>

		<div class="content pure-u-1 pure-u-md-3-4">
			<h1 class="brand-title">Payment Details</h1>
			<div style="padding-top:30px;">
				<form action="finalise.php" method="post" class="pure-form pure-form-aligned" name="MasterForm">

					<fieldset>
						<div class="pure-control-group">
							<label>Card Type:</label>
							 <select id="cardType" onChange="changeTotal('productSelection');"  name="cardType">
								<option disabled selected> -- Select Card Type -- </option>
								<option>AMEX (&pound;2.00 Charge)</option>
								<option>MasterCard (&pound;2.00 Charge)</option>
								<option>VISA (Free)</option>
							</select>
                                                        <font color="red"><b><i><span id="payment_CardTypeError"></span></b></i></font>
						</div>					
							<input id="cardCharge" name="cardCharge" type="text" placeholder="Name" style="display: none;">
		
						<div class="pure-control-group">
							<label>Card Number:</label>
							<input id="cardNo" name="cardNo" type="text" placeholder="Name">
							<font color="red"><b><i><span id="cardNo_Error"></span></b></i></font>
						</div>

						<div style="margin-left:11.2em; margin-top:20px;">
							<b>Total Amount : &pound; <span id="totalAmount"><?php echo (number_format((float) ($_SESSION["delivery_cost"] + $_SESSION["Price"]), 2, '.', ''));?></span></b>
						</div>
					</fieldset>

					<div class="pure-controls">
						<button type="submit" class="pure-button pure-button-primary" onClick="Validate()">Complete Purchase</button>
					</div>
				</form>
		</div>

		
		<?php include('includes/footer.php') ?>
            <IFRAME style="display:none" name="hidden-form"></IFRAME>			
	</body>		
</html>

