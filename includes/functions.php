<?php
require_once('db.php');

/* format arrays */
function formatArray($arr){
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

function selectAll(){
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM media");
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_OBJ);

	$data = array();
	if($stmt->rowCount() > 0){
		foreach($results as $row){
			$data[] = $row;
		}
	}

	// $conn = NULL;
	return $data;
}

function selectSingle($id = NULL){
	global $conn;
	$stmt = $conn->prepare("SELECT * FROM media WHERE id = :id");
	$stmt->execute([':id' => $id]);
	$record = $stmt->fetch(PDO::FETCH_OBJ); // NULL if not found

	// $conn = NULL;
	return $record;
}

function insert($artist = NULL, $title = NULL, $url = NULL){
	global $conn;
	$stmt = $conn->prepare("INSERT INTO media (artist, title, url) VALUES (:artist, :title, :url)");
	$stmt->bindParam(':artist', $artist, PDO::PARAM_STR);
	$stmt->bindParam(':title', $title, PDO::PARAM_STR);
	$stmt->bindParam(':url', $url, PDO::PARAM_STR);
	$stmt->execute();

	$lastInsertId = $conn->lastInsertId();

	// $conn = NULL;
	return $lastInsertId; // id or 0
}

function update($artist = NULL, $title = NULL, $url = NULL, $id){
	global $conn;

	$stmt = $conn->prepare("UPDATE media SET artist = :artist, title = :title, url = :url WHERE id = :id");
	$stmt->bindParam(':artist', $artist, PDO::PARAM_STR);
	$stmt->bindParam(':title', $title, PDO::PARAM_STR);
	$stmt->bindParam(':url', $url, PDO::PARAM_STR);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();

	return $stmt->rowCount(); // number of affected rows or 0
}

function delete($id){
	global $conn;
	$stmt = $conn->prepare("DELETE FROM media WHERE id = :id");
	$stmt->bindParam(':id', $id);
	$stmt->execute();
}