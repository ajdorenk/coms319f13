$(document).ready(function() {

	var $item1Arr = {itemName: 'Discrete Mathematics and with Applications', 
		itemDescripShort: "Used for Cpr E 310", itemSeller: 'Austin Dorenkamp', 
		itemPrice: 90};

	$itemName = $('.itemName');
	if($item1Arr['itemName'].length > 15) {
		$itemName.html($item1Arr['itemName'].substring(0,15) + "...");
	} else {
		$itemName.html($item1Arr['itemName']);
	}

	$itemName.hover(
		function(e) {
			$('.itemNamePopup').show();
		},
		function(e) {
			$('itenNamePopup').hide();
		}
	);
	// $itemName.mouseover(function() {
	// 	alert('mouseover');
	// 	$('.itemNamePopup').css({'display': 'block'});
	// });
	// $itemName.mouseleave(function() {
	// 	// alert('mouseout');
	// 	$('.itemNamePopup').style.display = 'none';
	// });

	// $('.itemName').html("Print this");

	// document.getElementById('itemName').innerHTML='Print this';

	// for(key in $item1Arr) {
	// 	document.getElementById(key).innerHTML=item1Arr[key];
	// 	alert($item1Arr[key]);
	// }

})