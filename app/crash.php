<?php 
	session_start() ; 	
	var variableToCauseCrash = null;
	variableToCauseCrash = variableToCauseCrash + 1;
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
			<h1 class="brand-title">THIS IS A CRASH</h1> 
		</div>			
		<?php include('includes/footer.php') ?>
		            <IFRAME style="display:none" name="hidden-form_CRASH"></IFRAME>	
	</body>	
</html>