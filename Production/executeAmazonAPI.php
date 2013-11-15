<?php
include("AmazonECS.class.php");
$isbn = $_GET["isbn"];

const AWS_API_KEY = "AKIAIHKWE2IOUHGASMMQ";
const AWS_API_SECRET_KEY = "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";
const AWS_ASSOCIATE_TAG = "textbtrade-20";

$client = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, 'com', AWS_ASSOCIATE_TAG);
$response = $client->category('Books')->responseGroup('Images,Reviews,ItemAttributes,OfferSummary')->search($isbn);

//parses xml result groups
$img_src = $response->Items->Item->LargeImage->URL;
$title = $response->Items->Item->ItemAttributes->Title;
$authors = $response->Items->Item->ItemAttributes->Author;

$size = count($authors);
//might want to consider including cases for multiple authors
if($size > 1){
	$data = array($img_src, $title, $size);
	for($x = 0; $x<$size; $x++){
		array_push($data, $authors[$x]);
	}
}
else{
	$data = array($img_src, $title, $size, $authors);
}

echo json_encode($data);
?>
