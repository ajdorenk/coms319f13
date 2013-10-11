$(document).ready(function() {

	var $item1Arr = {itemName: 'Discrete Mathematics with Applications', 
		itemDescripShort: "Used for Cpr E 310", itemSeller: 'Austin Dorenkamp', 
		itemPrice: 90};

	$(function() {
    	$( document ).tooltip();
  	});

  	$('.itemSeller').attr("title", 'Austin Dorenkamp tooltip');

	$itemName = $('.itemName');
	if($item1Arr['itemName'].length > 15) {
		$itemName.html($item1Arr['itemName'].substring(0,15) + "...");
		$itemName.attr('title',$item1Arr['itemName']);
	} else {
		$itemName.html($item1Arr['itemName']);
	}

	$itemDescripShort = $('.itemDescripShort');
	if($item1Arr['itemDescripShort'].length > 15) {
		$itemDescripShort.html($item1Arr['itemDescripShort'].substring(0,15) + "...");
		$itemDescripShort.attr('title',$item1Arr['itemDescripShort']);
	} else {
		$itemDescripShort.html($item1Arr['itemName']);
	}

	$itemSeller = $('.itemSeller');
	if($item1Arr['itemSeller'].length > 15) {
		$itemSeller.html($item1Arr['itemSeller'].substring(0,15) + "...");
		$itemSeller.attr('title',$item1Arr['itemSeller']);
	} else {
		$itemSeller.html($item1Arr['itemName']);
	}

	// $('.resultsPaneArr').append(
	// 	<div class="resultsPane itemFont">
 //        <div class="itemPhoto">
 //          <img src="http://www.nationalbookauctions.com/SmallBookIcon.jpg" alt="Book">
 //        </div>
 //        <div class="itemName itemFont">
 //          // <!-- Discrete Mathematics with Applications -->
 //          Discrete Matheme...
 //          // <div class="itemNamePopup" style="display: none">Sample popup test</div>
 //        </div>
 //        <div class="itemDescripShort itemFont">
 //          Used in Cpr E 310 
 //        </div>
 //        <div class="itemSeller itemFont">
 //          Austin Dorenkamp
 //        </div>
 //        <div class="itemPrice itemFont">
 //          $90
 //        </div>
 //      </div>
	// );

	// $itemName.hover(
	// 	function(e) {
	// 		$('.itemNamePopup').show();
	// 	},
	// 	function(e) {
	// 		$('itenNamePopup').hide();
	// 	}
	// );
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