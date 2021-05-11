<?php
include('includes/functions.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$record = selectSingle($id);
}


if(isset($_POST['update'])){
	$artist = htmlspecialchars(trim($_POST['artist']));
	$title = htmlspecialchars(trim($_POST['title']));
	$url = htmlspecialchars(trim($_POST['url']));
	$id = htmlspecialchars(trim($_POST['id']));

	if(update($artist, $title, $url, $id)){
		// refresh page
		header('Location: update.php?id='.$id);
		exit();
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Upate Record</title>
	<?php include('theme/header-scripts.php'); ?>
</head>
<body>
	<?php if($record): ?>
	<h1>Update Record</h1>
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $record->id; ?>">
		<label for="artist">Artist</label>
		<input type="text" id="artist" name="artist" value="<?php echo $record->artist; ?>"><br>
		<label for="title">Title</label>
		<input type="text" id="title" name="title" value="<?php echo $record->title; ?>"><br>
		<label for="url">Url</label>
		<input type="text" id="url" name="url" value="<?php echo $record->url; ?>"><br>

		<button class="btnInsert" name="update">Update Record</button>
	</form>
	<?php else: ?>
		<h1>User is not set. Try again</h1>
	<?php endif; ?>
	<?php include('theme/footer-scripts.php'); ?>
</body>
</html>