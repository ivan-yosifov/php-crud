<?php
	require_once('includes/functions.php');
	$all_media = selectAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP CRUD</title>
	<?php include('theme/header-scripts.php'); ?>
</head>
<body>
	<div class="container-fluid">
		<h1><i class="fa fa-check-circle"></i> Welcome to Media Corner</h1>
	</div>

	<?php include('theme/footer-scripts.php'); ?>
</body>
</html>