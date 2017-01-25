<?php 
	session_start() ; 
	
	$containsAllNeededInfo = false;
	if(!empty($_POST))
	{
		if((isset($_POST['ProductName']) ))
		{
			$containsAllNeededInfo = true;
			$_SESSION["ProductName"] = $_POST['ProductName'];
		
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
	//$_SESSION["ProductName"]

?>
<html>
	<head>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
		<link rel="stylesheet" href="css/layouts/store.css">
		<title></title>
                <script src="shipping_validation.js">
				</script>
	</head>

	<body>
		<?php include('includes/header.php') ?>

		<div class="content pure-u-1 pure-u-md-3-4">
			<h1 class="brand-title">Delivery Location</h1>

			<div style="padding-top:30px;">
                            <form action="delivery.php" method="post" class="pure-form pure-form-aligned" name="MasterForm">
					<fieldset>
                                                
                                                <div class="pure-control-group">
							<label>Email:</label>
							<input id="Email" name="Email" type="text" placeholder="Email">
                                                        <font color="red"><b><i><span id="EmailError"></span></b></i></font>									
						</div>
                                                <div class="pure-control-group">
							<label>Confirm Email:</label>
							<input id="ConfirmEmail" name="ConfirmEmail" type="text" placeholder="Email">
                                                        <font color="red"><b><i><span id="ConfirmEmailError"></span></b></i></font>							
						</div>
                                                
						<div class="pure-control-group">
							<label>Name:</label>
							<input id="name" name="name" type="text" placeholder="Name">
                                                        <font color="red"><b><i><span id="NameError"></span></b></i></font>
						</div>
						<div class="pure-control-group">
							<label>Address Line 1:</label>
							<input id="line1" name="line1" type="text">
                                                        <font color="red"><b><i><span id="Adr1Error"></span></b></i></font>
						</div>
						<div class="pure-control-group">
							<label>Address Line 2:</label>
							<input id="line2" name="line2" type="text">
                                                        <font color="red"><b><i><span id="Adr2Error"></span></b></i></font>
						</div>
						<div class="pure-control-group">
							<label>County:</label>
							<input id="county" name="county" type="text">
                                                        <font color="red"><b><i><span id="CountyError"></span></b></i></font>
						</div>
						<div class="pure-control-group">
							<label>Post Code:</label>
							<input id="post_code" name="post_code" type="text">
                                                        <font color="red"><b><i><span id="PostCodeError"></span></b></i></font>
						</div>
							<div class="pure-control-group">
							<label>Country:</label>
							 <select id="country" name="country">
								<option disabled selected>-- Select a Country --</option>
								<option>England</option>
								<option>Wales</option>
								<option>Scotland</option>
							</select>
                                                        <font color="red"><b><i><span id="CountryError"></span></b></i></font>
						</div>					
					</fieldset>

					<div class="pure-controls">
                                            <button type="submit" class="pure-button pure-button-primary" onClick="Validate()">Save Shipping</button>
					</div>
				</form>
			</div>
		</div>			
		
		<?php include('includes/footer.php') ?>
            <IFRAME style="display:none" name="hidden-form"></IFRAME>  
	</body>	
</html>