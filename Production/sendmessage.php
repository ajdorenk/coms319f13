<?php
	require_once("twilio-php-latest/Services/Twilio.php");

	$AccountSid="AC9227eb3b8baafcfc0e5c4d5d6991eb47";
	$AuthToken="856897cf340290a8ce8f3f269625ff8a";
	$client = new Services_Twilio($AccountSid, $AuthToken);

	$conn=mysqli_connect("mysql.cs.iastate.edu","u31904","QWGCG6sfQ","db31904"); // or die("Error " . mysqli_error($link));
	//echo $_POST['Name'];
	$query="Select i.UEmail from Item i, Book b where ". $_POST['Price']."=i.Price and '".$_POST['Description']."'=i.Description and '". $_POST['Name']."'=b.Title";
	
	$result=mysqli_query($conn,$query);
	
	$row=mysqli_fetch_row($result);
	
	$emailSeller = $row[0];
	$emailBuyer = $_POST["buyer"];
	$number = $_POST["number"];
	$number = "+1".$number;

	sendMessages($emailBuyer, $emailSeller, $number);

	function sendMessages($emailBuyer, $emailSeller, $number)
	{	
					
		if($emailBuyer != "")
		{
			sendEmail($emailBuyer, $emailSeller, $number);
		}
		if($number != "")
		{
			sendSMS($emailBuyer, $emailSeller, $number);
		}
	}
	function sendEmail($emailBuyer, $emailSeller, $number)
	{
		mail($emailSeller, "Someone wants to buy an item you're selling!", "You have a buyer interested interested
				an item you are selling. They can be reached at ".$number." or at ".$emailBuyer.".");
	}

	function sendSMS($emailBuyer, $emailSeller, $number)
	{
		$people = array(
			$number => $emailBuyer );

		$sms = $client->account->sms_messages->create(
				"+15159940938",
				$number,
				"You have a buyer interested in an item you are selling. They can be reached at $number or at $emailBuyer."
			);
		echo "Sent message to $phonenumber";
	}
?>
