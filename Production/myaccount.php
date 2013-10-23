<html>
<head>
<meta charset="UTF-8">
<title>My Account</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="sellerfunctions.js"></script>
<link href="myaccount.css" rel="stylesheet" type="text/css"><!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
</head>

<body>

<div class="container">
  <div class="header"><a href="#"><img src="" alt="Insert Logo Here" name="Insert_logo" width="20%" height="90" id="Insert_logo" style="display:block;" /></a> 
    <!-- end .header --></div>
   <div class="sidebar1">
    <ul class="nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="results.php">Search</a></li>
      <li><a href="#">Seller Page</a></li>
      <li><a href="#">About Us</a></li>
    </ul>
    <p> </p>
  </div>
	
	
	
  <div class="content">
	<h1>My Account</h1>
  
	<script type="text/javascript">
		<!--$(".content").append(printInfo("Passini, Bryan", "bpassini@iastate.edu", "(312)810-1031", "10/9/2013", "5", "10", "4.5"));-->
		//alert(getUser("bpassini@iastate.edu"));
		$(".content").append(getUser("bpassini@iastate.edu"));
	</script>
	<!--
	   <div style="width:86%; height:15em; margin:auto" >
			<table style="width:100%; height:100%">
				<tr style="width:100%; height:100%">
					<td style="width:50%; height:100%">
						<div id="userinfo">
							<table border="1px" style="width:100%; height:100%">
								<thead>
								<tr>
									<th colspan="2">
									User Information
									</th>
									</tr>
								</thead>
								<tbody>
								<tr>
									<td>Name</td>
									<td>Passini, Bryan</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>bpassini@iastate.edu</td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>(312)810-1031</td>
								</tr>
								<tr>
									<td>Created</td>
									<td>10/09/2013</td>
								</tr>
								</tbody>
							</table>
							<!--<p style="padding-left:1em; line-height:2.0em">
							User Information: edit<br>
							First Name:<br>
							Last Name:<br>
							Email Address:<br>
							Date Created:<br>
						</p>
						</div>
					</td>
					<td style="width:50%; height:100%">	
						<div id="userinfo">
						<table border="1px" style="width:100%; height:100%">
								<thead>
								<tr>
									<th colspan="2">
									Seller Information
									</th>
									</tr>
								</thead>
								<tbody>
								<tr>
									<td>Number of Books for Sale</td>
									<td>10</td>
								</tr>
								<tr>
									<td>Number of Books Sold</td>
									<td>4</td>
								</tr>
								<tr>
									<td>Current Seller Rating</td>
									<td>5.0/5.0</td>
								</tr>
								<tr>
									<td>View Rating</td>
									<td>Link</td>
								</tr>
								</tbody>
							</table>
						<!--
						<p style="padding-left:1em; line-height:2.0em">
							Seller Information: edit<br>
							Number of Books for Sale: <br>
							Number of Books Sold:<br>
							Current Seller Rating:<br>
							View Rating:<br>
						</p>
						</div>
					</td>
				</tr>
			</table>
	   </div> -->
		
		<br>
		<script type="text/javascript">
			<!--$(".content").append(printBook("http://ecx.images-amazon.com/images/I/518mhMH0IoL._SY300_.jpg", "Hello", "Bryan Passini", "98656216516", "Like New", "$40.00")); -->
			$(".content").append(getBooks("bpassini@iastate.edu"));
		</script>
  <!--
	   <div id="items" >
			<table  id="tableitem">
				<tr >
					<td id="picturetd">
						<div id="picture">
							<img id="pictureimg" src="http://ecx.images-amazon.com/images/I/518mhMH0IoL._SY300_.jpg">
						</div>
					</td>
					<td>	
						<div id="info">
						<p style="padding-left:1em; line-height:2.0em">
							Item Informaton: edit<br>
							Title:<br>
							Author:<br>
							ISBN:<br>
							Item Condition:<br>
							Asking Price:<br>
						</p>
						</div>
					</td>
				</tr>
			</table>
	   </div> 
		
	  <br>
		<script type="text/javascript">
			$(".content").append(printBook("http://ecx.images-amazon.com/images/I/51yTnLG7i0L._SY300_.jpg", "Welcome", "Cameron Johnston", "5468265201", "Very Good", "$30.00"));
		</script> -->
	   
	   <!--<div id="items" >
			<div id="centerdiv" >
						<div id="picture">
							<img id="pictureimg" src="http://ecx.images-amazon.com/images/I/518mhMH0IoL._SY300_.jpg">
						</div>	
						<div id="info">
						<p style="padding-left:1em; line-height:2.0em">
							Item Informaton: <button id=" + id + " onClick='itemEdit(this.id)'>Edit</button><br>
							Title:<span></span><br>
							Author:<span></span><br>
							ISBN:<span></span><br>
							Item Condition:<span></span><br>
							Asking Price:<span></span><br>
						</p>
						</div>
			</div>
	   </div>-->
  </div>
  <div class="footer">
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
