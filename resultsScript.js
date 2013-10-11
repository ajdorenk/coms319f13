// $(document).ready(function() {
// 	$(function() {
//     	$( document ).tooltip();
//   	});
// })

	var $itemAllArr = new Array();
	$itemAllArr[0] = {itemName: 'Discrete Mathematics with Applications', 
		itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
	$itemAllArr[1] = {itemName: 'Discrete Mathematics with Applications', 
		itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
	$itemAllArr[2] = {itemName: 'Discrete Mathematics with Applications', 
		itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
	$itemAllArr[3] = {itemName: 'Discrete Mathematics with Applications', 
		itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
	$itemAllArr[4] = {itemName: 'Discrete Mathematics with Applications', 
		itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
	$itemAllArr[5] = {itemName: 'Discrete Mathematics with Applications', 
		itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
	$itemAllArr[6] = {itemName: 'Discrete Mathematics with Applications', 
		itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
	$itemAllArr[7] = {itemName: 'Discrete Mathematics with Applications', 
		itemDescripShort: "Used for Cpr E 310", itemPrice: 90};

  	function resultsPaneGenerator() {

  		var $returnStr = "";
  		var $content = "";
  		var $ttTitle = '';
	  	for(var $i = 0; $i<$itemAllArr.length; $i++) {
		  	
			if($itemAllArr[$i]['itemName'].length > 25) {
				$content = ($itemAllArr[$i]['itemName'].substring(0,25) + "...");
				$ttTitle = ($itemAllArr[$i]['itemName']);
			} else {
				$content = ($itemAllArr[$i]['itemName']);
				$ttTitle = '';
			}

			$returnStr += '<div class="resultsPane itemFont">'
		        + '<div class="itemPhoto">'
		          + '<img src="http://www.nationalbookauctions.com/SmallBookIcon.jpg" alt="Book">'
		        + '</div>'
		        + '<div class="itemName itemFont" title="';
					$returnStr += $ttTitle;
		    	$returnStr += '">';
		    		$returnStr += $content;
		    	$returnStr += '</div>';

			if($itemAllArr[$i]['itemDescripShort'].length > 25) {
				$content = ($itemAllArr[$i]['itemDescripShort'].substring(0,25) + "...");
				$ttTitle = ($itemAllArr[$i]['itemDescripShort']);
			} else {
				$content = ($itemAllArr[$i]['itemDescripShort']);
				$ttTitle = '';
			}
		    	$returnStr += '<div class="itemDescripShort itemDescriptionFont"'
		    		+ $ttTitle +'>' + $content + '</div>';

		    	$returnStr += '<div class="itemPrice itemFont">'
		    		+ $itemAllArr[$i]['itemPrice'] + '</div>';
		    $returnStr += '</div>';
		    // alert($returnStr);
		}
		alert($returnStr);
	    return $returnStr;

	}		

			// $itemName = $('.itemName');
			// if($itemAllArr[$i]['itemName'].length > 25) {
			// 	$itemName.html($itemAllArr[$i]['itemName'].substring(0,25) + "...");
			// 	$itemName.attr('title',$itemAllArr[$i]['itemName']);
			// } else {
			// 	$itemName.html($itemAllArr[$i]['itemName']);
			// }

			// $itemDescripShort = $('.itemDescripShort');
			// if($itemAllArr[$i]['itemDescripShort'].length > 30) {
			// 	$itemDescripShort.html($itemAllArr[$i]['itemDescripShort'].substring(0,30) + "...");
			// 	$itemDescripShort.attr('title',$itemAllArr[$i]['itemDescripShort']);
			// } else {
			// 	$itemDescripShort.html($itemAllArr[$i]['itemDescripShort']);
			// }

			// $itemPrice = $('.itemPrice');
			// $itemPrice.html('$' + $itemAllArr[$i]['itemPrice']);






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