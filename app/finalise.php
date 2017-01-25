<?php 
	session_start() ; 
		
		$_SESSION['orderConfirmFinalised'] = true;
		
		foreach ($_POST as $key => $value) 
        {
            $_SESSION[$key] = $value;
        }
		
		
		
	$containsAllNeededInfo = false;
	if(!empty($_POST))
	{
		if((isset($_SESSION['ProductName']) && isset($_SESSION['Email']) && isset($_POST['cardCharge'])))
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



	 
        
	$delivery_time = 0;			

	if ($_SESSION["courier"] == "DPD") {
		$delivery_time = 3;		
	} else if ($_SESSION["courier"] == "Royal Mail") {
		$delivery_time = 2;		
	} else if ($_SESSION["courier"] == "Tesco") {
		$delivery_time = 1;		
	} else if ($_SESSION["courier"] == "Arrow XL") {
		$delivery_time = 7;		
	} else if ($_SESSION["courier"] == "UPS") {
		$delivery_time = 1;		
	} else if ($_SESSION["courier"] == "Yodal") {
		$delivery_time = 5;		
	} else if ($_SESSION["courier"] == "FedEx") {
		$delivery_time = 3;
	}
	
	if ($_SESSION["Size"] == "Small") {
		
	} else if ($_SESSION["Size"] == "Medium") {
		$delivery_time = $delivery_time * 1.5;
	} else if ($_SESSION["Size"] == "Large") { 
		$delivery_time = $delivery_time * 2;
	} 
	
	$Total_Final_Cost = $_SESSION["Total_Final_Cost"];
	$line1 = $_SESSION["line1"];
	$line2 = $_SESSION["line2"];
	$county = $_SESSION["county"];
	$post_code = $_SESSION["post_code"];
	$country = $_SESSION["country"];
	
	// Option to write data to .csv file
	$handle = fopen("purchases.csv", "a");

        
        $i=1;
            
        $head[0] ="header";
        $line[0] ="values";
        foreach ($_SESSION as $key => $value) 
        {
            $head[$i] = $key;
            $line[$i] = $_SESSION[$key];
            $i++;
        }
        
        fputcsv($handle, $head);
	fputcsv($handle, $line); # $line is an array of string values here
	fclose($handle);
	
	foreach ($_SESSION as $key => $value) 
	{
		unset($_SESSION[$key]); // - will wipe out the refs totally.
	}
        

?>
<html>
	<head>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
		<link rel="stylesheet" href="css/layouts/store.css">
		<title></title>
		<script type="text/javascript">
		window.onbeforeunload = function() 
		{
			window.location = "http://grid-tools-downloads.com/Will/TMF/index.php";
        }
		</script>
	</head>

	<body>
		<?php include('includes/header.php') ?>

		<div class="content pure-u-1 pure-u-md-3-4">
			<h1 class="brand-title">Order Finalised</h1> 
			
			<div style="padding-top:20px;">
			<b>Estimated delivery time - <?php echo $delivery_time ?> days </b>
			</div>
			<div style="padding-top:20px;">
			<b>Total cost: <?php echo $Total_Final_Cost ?>.00</b>
			</div>
			<div style="padding-top:20px;">
			<b>Delivery Address:<br><?php echo $line1 ?><br> <?php echo $line2 ?><br> <?php echo $county ?><br> <?php echo $post_code ?><br> <?php echo $country ?></b>
			</div>
			
		</div>			
		
		<?php include('includes/footer.php') ?>
	</body>	
</html>




