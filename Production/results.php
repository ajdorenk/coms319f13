<html>
<head>
<meta charset="UTF-8">
<title>Search Results</title>
<link href="resultsStyle.css" rel="stylesheet" type="test/css">
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="../bootstrap/bootstrap.min.js"></script>
<script src="../bootstrap/carousel.js"></script>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/carousel.css">
<!-- <link href="style.css" rel="stylesheet" type="text/css"> --><!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<?php
session_start();
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>  var $itemAllArr = new Array(); </script>
<?php
include("AmazonECS.class.php");

const AWS_API_KEY = "AKIAIHKWE2IOUHGASMMQ";
const AWS_API_SECRET_KEY = "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";
const AWS_ASSOCIATE_TAG = "textbtrade-20";
  //==========================================
//  ESCAPE DANGEROUS SQL CHARACTERS
//==========================================
function quote_smart($value, $handle) {

   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }

   if (!is_numeric($value)) {
       $value = "'" . mysql_real_escape_string($value, $handle) . "'";
   }
   return $value;
}

$fullLink = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

  // echo "SearchType: ".$_POST['searchType'];

  //==========================================
  //  CONNECT TO THE DATABASE
  //==========================================
  $dbusername = "u31904";
  $dbpassword = "QWGCG6sfQ";
  $dbhostname = "mysql.cs.iastate.edu";
  $dbdatabase = "db31904";

  // $dbhandle = mysqli_connect($dbhostname, $dbusername, $dbpassword)
  $dbhandle = mysql_connect($dbhostname, $dbusername, $dbpassword)
    or die("Unable to connect to MySQL");

  // $db_found = mysqli_select_db($dbhandle, $dbdatabase)
  $db_found = mysql_select_db($dbdatabase, $dbhandle)
    or die("Could not select" . $dbdatabase);

  if ($db_found) {
    $SQL = "";
    // $SQL = "SELECT * FROM Item i, Book b WHERE i.ID = b.BookID AND b.Title LIKE '%Micro%'";
    $text = $_POST['searchText'];
    // $SQL = "SELECT * FROM login WHERE L1 = $uname AND L2 = md5($pword)";
    if($_POST['searchType'] == "itemName") {
      $SQL = "SELECT * FROM Item i, Book b WHERE i.ID = b.BookID AND b.Title LIKE '%{$text}%' AND i.Sold = false";
    } else if($_POST['searchType'] == "isbn") {
      $SQL = "SELECT * FROM Item i, Book b WHERE i.ID = b.BookID AND b.ISBN LIKE '%{$text}%' AND i.Sold = false";
    } else if($_POST['searchType'] == "anything") {
      $SQL = "SELECT * FROM Item i, Book b WHERE i.ID = b.BookID AND i.Sold = false";
    } else {
      $SQL = "SELECT * FROM Item i, Book b WHERE i.ID = b.BookID AND b.Title LIKE '%{$text}%' AND i.Sold = false";
    }
    $result = mysql_query($SQL);

    // Check result
    // This shows the actual query sent to MySQL, and the error. Useful for debugging.
    if (!$result) {
      $message  = 'Invalid query: ' . mysql_error() . "\n";
      $message .= 'Whole query: ' . $query;
      die($message);
    }

    // Use result
    // Attempting to print $result won't allow access to information in the resource
    // One of the mysql result functions must be used
    // See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
    $counter = 0;
    while ($row = mysql_fetch_assoc($result)) {
      // echo $row['Title'];
      // $itemAllArr[0] = {itemName: 'Discrete Mathematics with Applications', 
      // itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
      echo "<script>";
      echo "\$itemAllArr[".$counter."] = {itemName: '".$row['Title']."',";
      echo "itemDescripShort: '".$row['Description']."', itemPrice: ".$row['Price'].",";
      echo "imageLink: '".$row['ImageLink']."'};";
      echo "</script>";
      $counter++;
    }

	// echo "<script type=\"text/javascript\">"
 //        ."$(document).ready(function() {"
 //        ."alert(".$counter.");})"         
 //        ."</script>";
	
  if($counter == 0){
		$client = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, 'com', AWS_ASSOCIATE_TAG);
		$response = $client->category('Books')->responseGroup('ItemAttributes')->search($text);
		$asin = $response->Items->Item->ASIN;
		$link = 'http://www.amazon.com/exec/obidos/ASIN/';
    $fullLink = $link.$asin;
    // echo "<script type=\"text/javascript\">"
    //     ."$(document).ready(function() {"
    //     ."alert(\"".$link.$asin."\");})"       
    //     ."</script>";
    // echo "<script type=\"text/javascript\">"
    //     ."$(document).ready(function() {"
    //     ."document.getElementById(\"linkDiv\").style.display = \"inline\";"
    //     ."document.getElementById(\"linkDiv\").innerHTML += ".$link.$asin.";})"         
    //     ."</script>";
    echo "<script type=\"text/javascript\">"
        ."$(document).ready(function() {"
        ."$('#linkDiv').show();"
        ."$('.resultsPaneArr').hide();"
        ."})"         
        ."</script>";
	}
	// else{
	// 	echo "<script type=\"text/javascript\">"
	// 			."$(document).ready(function() {"
	// 			."document.getElementById(\"linkDiv\").style.display = \"none\";"
	// 			."document.getElementById(\"linkDiv\").innerHTML = \"\";})"
	// 		  ."</script>";
	// }

    // $num_rows = mysql_num_rows($result);
    // $resultArr = mysql_fetch_array($result);

  //====================================================
  //  CHECK TO SEE IF THE $result VARIABLE IS TRUE
  //====================================================

    // print $uname . " " . $pword;

    // if ($result) {
    //   if ($num_rows > 0) {
    //     session_start();
    //     $_SESSION['login'] = "1";
    //     $_SESSION['username'] = $resultArr['username'];
    //     $_SESSION['permissions'] = $resultArr['permissions'];
    //     $_SESSION['first_name'] = $resultArr['first_name'];
    //     $_SESSION['last_name'] = $resultArr['last_name'];
    //     $_SESSION['email'] = $resultArr['email'];
    //     $_SESSION['date_created'] = $resultArr['date_created'];
    //     // header ("Location: homepage.php");
    //     echo "<script>window.top.location='homepage.php'</script>";
    //     // print "User recognized: ".$resultArr['username'];
    //   }
    //   else {
    //     // session_start();
    //     // $_SESSION['login'] = "";
    //     // header ("Location: signup.php");
    //     print "New user";
    //   } 
    // }
    // else {
    //   // $errorMessage = "Error logging on";
    //   print'username: ' . $uname . ' password: ' . $pword;

    // }

    mysql_close($dbhandle);

  }

  else {
    // $errorMessage = "Error logging on";
    // $errorMessage += 'NO db, username: ' . $uname . ' password: ' . $pword;
    print "NOdb";
  }

}
?>
 <script>

//   // $itemAllArr[0] = {itemName: 'Discrete Mathematics with Applications', 
//   //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
//   // $itemAllArr[1] = {itemName: 'Discrete Mathematics with Applications', 
//   //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
//   // $itemAllArr[2] = {itemName: 'Discrete Mathematics with Applications', 
//   //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
//   // $itemAllArr[3] = {itemName: 'Discrete Mathematics with Applications', 
//   //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
//   // $itemAllArr[4] = {itemName: 'Discrete Mathematics with Applications', 
//   //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
//   // $itemAllArr[5] = {itemName: 'Discrete Mathematics with Applications', 
//   //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
//   // $itemAllArr[6] = {itemName: 'Discrete Mathematics with Applications', 
//   //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
//   // $itemAllArr[7] = {itemName: 'Discrete Mathematics with Applications', 
//   //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};

    function resultsTableGenerator() {
      var $returnStr = "";
      var $content = "";
      var $ttTitle = "";

      $returnStr += "<table class='table table-striped'>";
      $returnStr += "<thead><tr><th>Image</th><th>Item Name</th><th>Description</th>";
      $returnStr += "<th>Price</th></tr></thead>";

      for(var $i = 0; $i<$itemAllArr.length; $i++) {
        
        // if($itemAllArr[$i]['itemName'].length > 25) {
        //   $content = ($itemAllArr[$i]['itemName'].substring(0,25) + "...");
        //   $ttTitle = ($itemAllArr[$i]['itemName']);
        // } else {
        //   $content = ($itemAllArr[$i]['itemName']);
        //   $ttTitle = ($itemAllArr[$i]['itemName']);
        // }

        $returnStr += "<tr><td><img src='" + $itemAllArr[$i]['imageLink'] + "' alt='No Image Available' width=\"250\"></td>";
        $returnStr += "<td>" + $itemAllArr[$i]['itemName'] + "</td>";
        $returnStr += "<td>" + $itemAllArr[$i]['itemDescripShort'] + "</td>";
        $returnStr += "<td>$" + $itemAllArr[$i]['itemPrice'] + "</td>";
        $returnStr += "</tr>";

      }



      $returnStr += "</table>";

      return $returnStr;
    }

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

          $returnStr += '<div class="itemPrice itemFont"> Price: $'
            + $itemAllArr[$i]['itemPrice'] + '</div>';
        $returnStr += '</div>';
        // alert($returnStr);
    }

      return $returnStr;

    } 
 </script>  

<!-- <script language="JavaScript" type="text/javascript" src="resultsScript.js"></script> -->
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
    echo "<li><a href='results.php' id='logout'>Log Out</a></li>";
  }
?>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>

<script type="text/JavaScript">
  $('#logout').click(function() {
    var str_json;
    // alert("functioncalled")
    $.ajax({
        data: str_json,
        url: 'logout.php',
        method: 'POST', // or GET
        success: function(data) {
          // alert(data);
          // alert("logged out");
          // window.top.location='results.php';
        }
    });
  });
</script>

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
  <div class="col-md-10">

 <!--  <div class="header"><a href="#"><img src="" alt="Insert Logo Here" name="Insert_logo" width="20%" height="90" id="Insert_logo" style="background-color: #8090AB; display:block;" /></a> 
    </div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="results">Search</a></li>
      <li><a href="myaccount.php">Seller Page</a></li>
      <li><a href="#">About Us</a></li>
    </ul>
    <p> </p>
    end .sidebar1</div> -->
  <div class="content">
    <div class="advSearch">
      Search by:
<!--       <select>
        <option value="anything"></option>
        <option value="itemName">Item Name</option> 
        <option value="isbn">ISBN</option>               
      </select>   -->
      <form method='post' action='results.php'>
        <select name="searchType">
          <option value="anything">Display All Items</option>
          <option value="itemName">Item Name</option> 
          <option value="isbn">ISBN</option>               
        </select> 
        <input type="text" name="searchText" placeholder="Search...">
        <input type="submit" name="searchNow" value="Go">
      </form>
    </div>
    <!-- <div class="resultsPaneArr" style="overflow:scroll; height:600px;"> -->
    <div class="resultsPaneArr" style="overflow:scroll; height:90%;">
      <script type='text/javascript'>
        // $('.resultsPaneArr').append(resultsPaneGenerator());
        $('.resultsPaneArr').append(resultsTableGenerator());
      </script>

    </div>
	
	<div id="linkDiv" style="display:none">
		Sorry, we could not find the item you are searching for.  
    <br/>
    We suggest using Amazon.com to find the item:
    <br>
    <a href="<?php echo $fullLink; ?>"> <?php echo $fullLink; ?> </a>
	</div>
    <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>
