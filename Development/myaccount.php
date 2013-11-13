<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Account</title>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="../bootstrap/carousel.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/carousel.css">
<link rel="stylesheet" href="myaccount_files/myaccount.css">
<script src="myaccount_files/sellerfunctions.js"></script>
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

<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">About Us</a></li>
	  <li><a href="#">Contact Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Log In</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>


	
<div class="container">
	<!--
		<div class="jumbotron">
			<div class="container">
				<h1>Textbook Trader</h1>
				<p>The fastest and  easiest way to sell your books!</p>
				<p><a class="btn btn-primary btn-lg">Create Account</a></p>
			</div>
		</div> -->
		
		
<!--
    <div id="myCarousel" class="carousel slide">
      
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-large btn-primary" href="#">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-large btn-primary" href="#">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-large btn-primary" href="#">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div> /.carousel  -->
		
		
	
		
	<div class="row">
		<div class="col-md-2">
			<div class="well sidebar-nav">
				<ul class="nav nav-list">
				  <li class="nav-header">Navigation</li>
				  <li class="active"><a href="#">Home</a></li>
				  <li><a href="#">Search For Books</a></li>
				  <li><a href="#">List My Books</a></li>
				  <li><a href="#"></a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-10"  id="posthere">
		
	
		
	
		
		<br>
					
		
		<script type="text/javascript">
		<!--$(".content").append(printInfo("Passini, Bryan", "bpassini@iastate.edu", "(312)810-1031", "10/9/2013", "5", "10", "4.5"));-->
		//alert(getUser("bpassini@iastate.edu"));
		
		$("#posthere").append(getUser("bpassini@iastate.edu"));
		$("#posthere").append(getBooks("bpassini@iastate.edu"));
	</script>
			<!--
			<table class='table table-bordered'>
			<tr  >
				<td align='center' class='col-md-3' style='vertical-align:middle'>
				
					<img id='pictureimg' src='http://ecx.images-amazon.com/images/I/518mhMH0IoL._SY300_.jpg'>
			
				</td>
				<td align='center' >
				<table class='table'>
					<col width="25%">
					<col width="75%">
					<thead><tr><th colspan='2'>Item Informaton <button onClick='itemEdit(this.id)'>Edit</button></th></tr></thead>
					<tbody><tr><td><strong>Title</strong></td><span> <td>title </td></span></tr>
					<tr><td><strong>Author</strong></td><span> <td>author </td></span></tr>
					<tr><td><strong>ISBN</strong></td><span> <td>isbn </td></span></tr>
					<tr><td><strong>Item Condition</strong></td><span><td>condition </td></span></tr>
					<tr><td><strong>Asking Price</strong></td><span><td>asking</td></span></tr></tbody>
				</table>
				</td>
			</tr>
			<tr>
			<td colspan='2'>
			<h4>Description  <button type='button' id='edituser' class='btn btn-default btn-xs'>Edit</button></h4>
				hello there dear person please let me know what i can do to help you out kind sir<br>sadgkjashgklasgjasgasg<br>fdhshah
			</td>
			</tr>
			</table>
	-->
	<!--
	<div class='panel panel-primary'>
		<div class='panel panel-heading'>Book</div>
		<div class='panel panel-body'>
			<div id='centerdiv' >
				<div id='picture'> 
					<img id='pictureimg'>
				</div>
				<div  class='info'>
					<p style='padding-left:1em; line-height:2.0em'>
					Item Informaton: <button onClick='itemEdit(this.id)'>Edit</button><br>
					Title:<span>title</span><br>
					Author:<span>author</span><br>
					ISBN:<span>isbn</span><br>
					Item Condition:<span>condition</span><br>
					Asking Price:<span>asking </span><br></p>
				</div>
			</div>
		</div>
		</div><br> -->
	
		<!--
			<div class="jumbotron">
			<h1>Hello there</h1>
			</div> -->
		</div>
	</div>
</div>






<!--
		<div class='panel panel-primary'>
		<div class='panel panel-heading'>Book</div>
		<div class='panel panel-body'>
			<div id='centerdiv' >
				<div id='picture'> 
					<img id='pictureimg'>
				</div>
				<div  class='info'>
					<p style='padding-left:1em; line-height:2.0em'>
					Item Informaton: <button onClick='itemEdit(this.id)'>Edit</button><br>
					Title:<span>title</span><br>
					Author:<span>author</span><br>
					ISBN:<span>isbn</span><br>
					Item Condition:<span>condition</span><br>
					Asking Price:<span>asking </span><br></p>
				</div>
			</div>
		</div>
		</div><br>
		
		
		
		
		
			var toReturn = "<div class='panel panel-default' id='items'><div class='panel-body' id='centerdiv' ><div id='picture'>" + 
					"<img id='pictureimg' class='col-md-3' src=" + src + ">" +
					"</div><div id='info" + id + "' class='info'><p style='padding-left:1em; line-height:2.0em'>" + 
					"Item Informaton: <button id=" + id + " onClick='itemEdit(this.id)'>Edit</button><br>" + 
					"Title:<span>" + title +"</span><br>" +
					"Author:<span>" + author + "</span><br>" +
					"ISBN:<span>" + isbn + "</span><br>" +
					"Item Condition:<span>" + condition + "</span><br>" +
					"Asking Price:<span>" + asking + "</span><br></p></div></div></div><br>";
-->

</body>
</html>





















