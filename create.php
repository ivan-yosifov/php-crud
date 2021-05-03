<?php
include('includes/functions.php');

if(isset($_POST['insert'])){
	$artist = htmlspecialchars(trim($_POST['artist']));
	$title = htmlspecialchars(trim($_POST['title']));
	$url = htmlspecialchars(trim($_POST['url']));
	
	if($lastInsertId = insert($artist, $title, $url)){
		// echo $lastInsertId;

		header('Location: update.php?id='.$lastInsertId);
		exit();
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert Record</title>
</head>
<body>
	<h1>Insert Record</h1>
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<label for="artist">Artist</label>
		<input type="text" id="artist" name="artist"><br>
		<label for="title">Title</label>
		<input type="text" id="title" name="title"><br>
		<label for="url">Url</label>
		<input type="text" id="url" name="url"><br>

		<button class="btnInsert" name="insert">Insert Record</button>
	</form>
</body>
</html>