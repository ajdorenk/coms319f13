<html>
<head>
<meta charset="UTF-8">
<title>Create Account</title>
<link href="createAccount_style.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css"><!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
</head>

<body>

<script type="text/JavaScript">
	function emailValidator(email) {
		var iaState = "@iastate.edu";
		var exists = new RegExp(iaState+"$").test(email);
		alert(exists);
	};
	
	function validate() {
		
	};
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
    <!-- end .sidebar1 --></div>
  <div class="content">
	<h2>Create An Account</h2>
	<br>
	<table id="form_table" class="form">
		<tr class="spaceUnder">
			<td>*First Name: </td>
			<td><input type="text" id="fname"></td>
		</tr>
		<tr class="spaceUnder">
			<td> Last Name: </td>
			<td><input type="text" id="lname"></td>
		</tr>
		<tr class="spaceUnder">
			<td>*Email: </td>
			<td><input type="text" id="email"></td>
			<td id="email_error" style="visibility:hidden;">Must use Iowa State issued email!!</td>
		</tr>
		<tr class="spaceUnder">
			<td>*Password: </td>
			<td><input type="text" id="password"></td>
		</tr>
		<tr class="spaceUnder">
			<td>*Confirm Password: </td>
			<td><input type="text" id="confirm_password"></td>
		</tr>
		<tr class="spaceUnder">
			<td> Phone #: </td>
			<td><input type="text" id="number"></td>
		</tr>
		<tr class="spaceUnder">
			<td></td>
			<td align="right"><input type="submit" value="Create" onclick="validate()"></td>
		</tr>
	</table>
	<!--<form class="myForm" style="text-align:center">
		*First Name: <input type="text" name="fname"><br>
		<br>
		Last Name: <input type="text" name="lname"><br>
		<br>
		*Email: <input type="text" name="email"><br>
		<br>
		*Password: <input type="text" name="password"><br>
		<br>
		Phone number: <input type="text" name="number"><br>
		<br>
		<input type="submit" value="Create" onclick="">
	</form>-->
	<p>* indicates a required field</p>
    <!-- end .content --></div>
  <div class="footer">
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
