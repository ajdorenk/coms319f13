<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="newItem_style.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css"><!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
</head>

<body>

<script type = "text/JavaScript">

	function onSelectType() {
		var selector = document.getElementById("item_type");
		var type = selector.value;
		if(type == "book")
		{
			document.getElementById("book_table").style.display = "inline";
			document.getElementById("other_table").style.display = "none";
		}
		else if(type == "other")
		{
			document.getElementById("other_table").style.display = "inline";
			document.getElementById("book_table").style.display = "none";
		}
	}
	
	function submitForm() {
		var type = document.getElementById("item_type").value;
		//TODO we need to get the email of the user currently logged in
		//email is hardcoded for now
		var email = "erichk@iastate.edu";
		var name = document.getElementById("name").value;
		var price = document.getElementById("price").value;
		var shape = document.getElementById("condition").value;
		var description = document.getElementById("description").value;
		var link = document.getElementById("img_file").value;
		alert("got here");
		if(type == "book"){
			alert("book");
			var isbn = document.getElementById("isbn").value;
			var author = document.getElementById("author").value;
			var title = document.getElementById("title").value;
			$.ajax({
					type: "POST",
					url: "insertNewItem.php",
					data: {
								title: title,
								author : author,
								isbn : isbn,
								price : price,
								description : description,
								link : link,
								shape : shape,
								email : email,
								book : type
							},
					async: false
				});
		}
		else {
			$.ajax({
					type: "POST",
					url: "insertNewItem.php",
					data: {
								name : name,
								price : price,
								description : description,
								link : link,
								shape : shape,
								email : email,
								book : type
							},
					async: false
				})
		}
	}
	
	function getAmazonData() {
		var isbn = document.getElementById("isbn").value;
		var img_url;
		var title;
		var author;
		$.get("executeAmazonAPI.php", {"isbn": isbn}, function (resp) {
			var myVar = resp;	
			document.getElementById("img_file").value = myVar[0];
			document.getElementById("title").value = myVar[1];
			document.getElementById("author").value = myVar[2];
		}, "json");
		
	}
</script>

<div class="container">
  <div class="header"><a href="#"><img src="" alt="Insert Logo Here" name="Insert_logo" width="20%" height="90" id="Insert_logo" style="background-color: #8090AB; display:block;" /></a> 
    <!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="results.php">Search</a></li>
      <li><a href="myaccount.php">Seller Page</a></li>
      <li><a href="#">About Us</a></li>
    </ul>
    <p> The above links demonstrate a basic navigational structure using an unordered list styled with CSS. Use this as a starting point and modify the properties to produce your own unique look. If you require flyout menus, create your own using a Spry menu, a menu widget from Adobe's Exchange or a variety of other javascript or CSS solutions.</p>
    <p>If you would like the navigation along the top, simply move the ul.nav to the top of the page and recreate the styling.</p>
    <!-- end .sidebar1 --></div>
  <div class="content">
	<h2>New Item:</h2>
	<form>
		What are you posting?: 
		<select id="item_type" onchange="onSelectType()">
			<option value=null></option>
			<option value="book">Book</option>
			<option value="other">Other</option>
		</select>
	</form>
	<br>
	
	<table id="book_table" class="form" style="display: none">
		<tr class="spaceUnder">
			<td>Title: </td>
			<td><input type="text" id="title"></td>
		</tr>
		<tr class="spaceUnder">
			<td>Author: </td>
			<td><input type="text" id="author"></td>
		</tr>
		<tr class="spaceUnder">
			<td>ISBN: </td>
			<td><input type="text" id="isbn" onchange="getAmazonData()"></td>
		</tr>
		<tr class="spaceUnder">
			<td>Description: </td>
			<td><input type="text" id="description"></td>
		</tr>
		<tr class="spaceUnder">
			<td>Condition:</td>
			<td>
				<select id="condition">
					<option value=null></option>
					<option value="poor">Poor</option>
					<option value="acceptable">Acceptable</option>
					<option value="newish">Like New</option>
					<option value="new">New</option>
				</select>
			</td>
		</tr>
		<tr  class="spaceUnder">
			<td>Price: </td>
			<td><input type="text" id="price"></td>
		</tr>
		<tr class="spaceUnder">
			<td align="right"><input type="checkbox" id="negotiations"></td>
			<td>Allow negotiations?</td>
		</tr>
		<tr class="spaceUnder">
			<td><label for="img_file">Image:</label></td>
			<td><img src="placeholder.jpg" height="125px" width="120px"></td>
			<td align="top">
				<input type="text" id="img_file">
				<button type="button">Browse Computer</button>
			</td>
		</tr>
	</table>
	
	<table id="other_table" class="form" style="display: none">
		<tr class="spaceUnder">
			<td>Name: </td>
			<td><input type="text" id="name"></td>
		</tr>
		<tr class="spaceUnder">
			<td>Description: </td>
			<td><input type="text" id="description"></td>
		</tr>
		<tr class="spaceUnder">
			<td>Condition:</td>
			<td>
				<select id="condition">
					<option value=null></option>
					<option value="poor">Poor</option>
					<option value="acceptable">Acceptable</option>
					<option value="newish">Like New</option>
					<option value="new">New</option>
				</select>
			</td>
		</tr>
		<tr  class="spaceUnder">
			<td>Price: </td>
			<td><input type="text" id="price"></td>
		</tr>
		<tr class="spaceUnder">
			<td align="right"><input type="checkbox" id="negotiations"></td>
			<td>Allow negotiations?</td>
		</tr>
		<tr class="spaceUnder">
			<td><label for="img_file">Image:</label></td>
			<td><img src="placeholder.jpg" height="125px" width="120px"></td>
			<td align="top">
				<input type="text" id="img_file">
				<button type="button">Browse Computer</button>
			</td>
		</tr>
	</table>
	<br>
	<br>
	<button id="canel_item" type="button" style="float:right">Cancel</button>
	<button id="submit_item" type="submit" style="float:right" onclick="submitForm()">Submit</button>
	
  <!-- end .content --></div>
  <div class="footer">
    <p>This .footer contains the declaration position:relative; to give Internet Explorer 6 hasLayout for the .footer and cause it to clear correctly. If you're not required to support IE6, you may remove it.</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
