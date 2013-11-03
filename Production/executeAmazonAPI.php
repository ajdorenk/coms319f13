<?php
include("AmazonECS.class.php");
$isbn = $_POST["isbn"];

const AWS_API_KEY = "AKIAIHKWE2IOUHGASMMQ";
const AWS_API_SECRET_KEY = "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";
const AWS_ASSOCIATE_TAG = "";

$client = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, 'com', AWS_ASSOCIATE_TAG);
$response = $client->category('Books')->responseGroup('Images,Reviews,ItemAttributes,OfferSummary')->search($isbn);

// To Get Image
$img_src = $response->Items->Item[0]->LargeImage->URL;

echo $img_src;

?>
