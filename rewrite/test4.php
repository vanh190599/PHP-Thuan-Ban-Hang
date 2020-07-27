<?php  
	$so1 = isset($_GET["so1"]) ? $_GET["so1"] : 0;
	$so2 = isset($_GET["so2"]) ? $_GET["so2"] : 0;
	$tong = $so1 + $so2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h1><?php echo "$so1 + $so2 = $tong" ; ?></h1>	
</body>
</html>