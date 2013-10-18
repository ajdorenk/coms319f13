<html>
<head>
<meta charset="UTF-8">
<title>Homepage</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="homepage_style.css" rel="stylesheet" type="text/css">
</head>

<body>

<script type="text/JavaScript">
	function tabFunction(type){
		var tab;
		if(type == "buyer")
		{
			tab = document.getElementById("seller_tab");
			tab.style.display = "none";
			document.getElementById("buyer_tab").style.display="inline";
		}
		else if(type == "seller")
		{
			tab =document.getElementById("buyer_tab");
			tab.style.display = "none";
			document.getElementById("seller_tab").style.display="inline";
		}
	};
</script>

<div class="container">
  <div class="header"><a href="#"><img src="" alt="Insert Logo Here" name="Insert_logo" width="20%" height="90" id="Insert_logo" style="background-color: #8090AB; display:block;" /></a> 
    <!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="#">Home</a></li>
      <li><a href="results.php">Search</a></li>
      <li><a href="myaccount.php">Seller Page</a></li>
      <li><a href="#">About Us</a></li>
    </ul>
    <!-- end .sidebar1 --></div>
  <div class="content">
		<div class="tabs">
			<button id="buyer" onclick="tabFunction(this.id)">Quick Search</button>
			<button id="seller" onclick="tabFunction(this.id)">Seller Login</button>
		</div>
		
		<div id="buyer_tab">
			<h2>Quick Search</h2>
			<br>
			<div class="form">
				<form>
					<input type="text">
					<input type="submit" value="Search">
				</form>
			</div>
		</div>
		
		<div id="seller_tab" style="display: none">
			<h2>Login</h2>
			<br>
			<table id="form_table" class="form">
				<tr>
					<td>Username:</td>
					<td><input id="username" type="text" width="250px"></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input id="password" type="text" width="250px"></td>
					<td><a>Forgot password?</a></td>
				</tr>
				<tr>
					<td align="right"><button id="login" type="submit" onclick="">Go!</button></td>
					<td><button id="new_user" type="submit" onclick="">Create an account</button></td>
				</tr>
			</table>
			<!--<div class="form">
				<Label>Username: </Label>
				<input id="username" type="text" width="250px">
			</div>
			<div class="form">
				<Label>Password: </Label>
				<input id="password" type="text" width="250px">
				<a>Forgot password?</a>
			</div>
			<br>
			<div class="buttons">
				<button id="login" type="submit" onclick="">Go!</button>
				<button id="new_user" type="submit" onclick="">Create an account</button>
			</div>-->
		</div> 
   <!-- end .content --></div>
  <div class="footer">
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
