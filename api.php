<?php 
include __DIR__ . '/database.php'; 

header('Content-Type: application/json');

if ( !empty($_GET['genre']) ) {
	$genre = $_GET['genre'];
	$categories = [];

	foreach ( $database as $album ) {
		if (strtolower($album['genre']) == strtolower($genre)) {
			$categories[] = $album;
		}
	}

	$database = $categories;
}

$response_rest = [
	"success" => true,
	"response" => $database
];

echo json_encode($response_rest);