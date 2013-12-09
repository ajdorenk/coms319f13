<!DOCTYPE html>

<?PHP
	session_start();
?>
<html>
<head>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="../bootstrap/carousel.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/carousel.css">
<link rel="stylesheet" href="myaccount_files/myaccount.css">
<script src="myaccount_files/sellerfunctions.js"></script>
<!-- <script src="myaccount_files/jquery_ui/jquery-1.9.1.js"></script> -->
<link rel="stylesheet" href="myaccount_files/jquery_ui/jquery-ui.css">
<script src="myaccount_files/jquery_ui/jquery-ui.js"></script>

<style type="text/css">
      body {
    padding-top: 70px;
        padding-bottom: 40px;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    .container {
    max-width : 100%;
    }
    
    .jumbotron {
    background-color: "blue";
    }
</style>
</head>


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
		var name = document.getElementById("name").value;
		var price = document.getElementById("price").value;
		var shape = document.getElementById("condition").value;
		var description = document.getElementById("description").value;
		var link = document.getElementById("img_file").value;
		if(document.getElementById("negotiations").checked){
			var negotiate = 1;
		}else {
			var negotiate = 0;
		}
		if(type == "book"){
			var isbn = document.getElementById("isbn").value;
			var author = document.getElementById("author").value;
			var title = document.getElementById("title").value;
			$.ajax({
					type: "POST",
					url: "insertNewItem.php",
					data: {
								Email : "<?php echo $_SESSION['Email']; ?>",
								name : title,
								price : price,
								description : description,
								link : link,
								shape : shape,
								negotiate : negotiate,
								title : title,
								author : author,
								isbn : isbn,
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
								negotiate : negotiate
							},
					async: false
				});
		}
	}
	
	
	function getAmazonData() {
		var check = document.getElementById("enable");
		if(check.checked){
			var isbn = document.getElementById("isbn").value;
			var img_url;
			var title;
			var author;
			$.get("executeAmazonAPI.php", {"isbn": isbn}, function (resp) {
				var myVar = resp;
				// alert(myVar[2]);
				var size = myVar[2];
				if(size > 1){
					document.getElementById("img_file").value = myVar[0];
					document.getElementById("image").src = myVar[0];
					document.getElementById("title").value = myVar[1];
					var authors = document.getElementById("author");
					for(var i = 0; i < size; i++){
						if(i == 0){
							authors.value = myVar[3+i];
						}
						else{
							authors.value += ", " + myVar[3+i];
						}	
					}
				}
				else{
					document.getElementById("img_file").value = myVar[0];
					document.getElementById("image").src = myVar[0];
					document.getElementById("title").value = myVar[1];
					document.getElementById("author").value = myVar[3];
				}
			}, "json");
		}
	}
</script>

<body id='body'>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php"><strong>TextbookTrader</strong></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <!-- <li><a href="index.php">Home</a></li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
<?PHP
  if (($_SESSION['login'] == '0') || !(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
    echo "<li><a href='loginpage.php'>Log In</a></li>";
    // echo "<script>window.top.location='index.php'</script>";
  }
  else {
    echo "<li><a href='myaccount.php' id='logout'>Log Out</a></li>";
  }
?>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>

<div class="container">

  <div class="row">
  <div class="col-md-2">
    <div class="well sidebar-nav">
      <ul class="nav nav-list">
        <li class="nav-header">Navigation</li>
        <li class="active"><a href="results.php">Buy</a></li>
<?php
	if(isset($_SESSION['login']) && $_SESSION['login'] == "1") {
        echo "<li><a href='myaccount.php'>Sell</a></li>";
	}
?>
    <li><a href="aboutus.php">About Us</a></li>
    <li><a href="contactus.php">Contact Us</a></li>
		</ul>
	</div>
	</div>
  

	
	

	
	<div class="col-md-10"  id="posthere">
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
	
	<form id="book_table" role="form" class="form-horizontal" style="display: none">
	<div class="form-group">
		<label for="title" class="col-sm-2 control-label">Title</label>
		<div class="col-sm-10">
		  <input type="text" id="title">
		</div>
	</div>
	<div class="form-group">
		<label for="author" class="col-sm-2 control-label">Author</label>
		<div class="col-sm-10">
		  <input type="text" id="author">
		</div>
	</div>
	<div class="form-group">
		<label for="isbn" class="col-sm-2 control-label">ISBN</label>
		<div class="col-sm-10">
		  <input type="text" id="isbn" onchange="getAmazonData()">
		  <input type="checkbox" id="enable"> Enable ISBN auto-fill.
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-sm-2 control-label">Description</label>
		<div class="col-sm-10">
		  <input type="text" id="description">
		</div>
	</div>
	<div class="form-group">
		<label for="condition" class="col-sm-2 control-label">Condition</label>
		<div class="col-sm-10">
		  <select id="condition">
					<option value=null></option>
					<option value="poor">Poor</option>
					<option value="acceptable">Acceptable</option>
					<option value="newish">Like New</option>
					<option value="new">New</option>
		  </select>
		</div>
	</div>
	<div class="form-group">
		<label for="price" class="col-sm-2 control-label">Price</label>
		<div class="col-sm-10">
		  <input type="text" id="price">
		  <input type="checkbox" id="negotiations"> Accept negotiations?
		</div>
	</div>
	<div class="form-group">
		<label for="img_file" class="col-sm-2 control-label">Image</label>
		<div class="col-sm-10">
		  <img src="placeholder.jpg" height="125px" width="120px" id="image">
		  <input type="text" id="img_file">
		</div>
	</div>
	<a href='myaccount.php'><button class="btn btn-primary" id="canel_item" type="button">Cancel</button></a>
	<a href='myaccount.php'><button class="btn btn-primary" id="submit_item" type="submit" onclick="submitForm()">Submit</button></a>
	</form>
	
	<form id="other_table" role="form" class="form-horizontal" style="display: none">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-10">
		  <input type="text" id="name">
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-sm-2 control-label">Description</label>
		<div class="col-sm-10">
		  <input type="text" id="description">
		</div>
	</div>
	<div class="form-group">
		<label for="condition" class="col-sm-2 control-label">Condition</label>
		<div class="col-sm-10">
		  <select id="condition">
					<option value=null></option>
					<option value="poor">Poor</option>
					<option value="acceptable">Acceptable</option>
					<option value="newish">Like New</option>
					<option value="new">New</option>
		  </select>
		</div>
	</div>
	<div class="form-group">
		<label for="price" class="col-sm-2 control-label">Price</label>
		<div class="col-sm-10">
		  <input type="text" id="price">
		  <input type="checkbox" id="negotiations"> Accept negotiations?
		</div>
	</div>
	<div class="form-group">
		<label for="img_file" class="col-sm-2 control-label">Image</label>
		<div class="col-sm-10">
		  <img src="placeholder.jpg" height="125px" width="120px" id="image">
		  <input type="text" id="img_file">
		</div>
	</div>
	<a href='myaccount.php'><button class="btn btn-primary" id="canel_item" type="button">Cancel</button></a>
	<a href='myaccount.php'><button class="btn btn-primary" id="submit_item" type="submit" onclick="submitForm()">Submit</button></a>
	</form>	
	
  <!-- end .content --></div>
	
	
	
	</div>
  <div class="footer">
    <!-- end .footer --></div>
  <!-- end .container -->
</body>
</html>
