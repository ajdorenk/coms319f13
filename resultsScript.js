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
		    	$returnStr += '<div class="itemDescripShort itemDescriptionFont" title="'
		    		+ $ttTitle +'">' + $content + '</div>';

		    	$returnStr += '<div class="itemPrice itemFont">'
		    		+ $itemAllArr[$i]['itemPrice'] + '</div>';
		    $returnStr += '</div>';
		    // alert($returnStr);
		}
		alert($returnStr);
	    return $returnStr;

	}		
