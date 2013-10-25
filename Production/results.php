<script>  var $itemAllArr = new Array(); </script>
<?php
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
      $SQL = "SELECT * FROM Item i, Book b WHERE i.ID = b.BookID AND b.Title LIKE '%{$text}%'";
    } else if($_POST['searchType'] == "isbn") {
      $SQL = "SELECT * FROM Item i, Book b WHERE i.ID = b.BookID AND b.ISBN LIKE '%{$text}%'";
    } else {
      $SQL = "SELECT * FROM Item i, Book b WHERE i.ID = b.BookID";
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
      echo "itemDescripShort: '".$row['Description']."', itemPrice: ".$row['Price']."};";
      echo "</script>";
      $counter++;
    }

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

  // $itemAllArr[0] = {itemName: 'Discrete Mathematics with Applications', 
  //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
  // $itemAllArr[1] = {itemName: 'Discrete Mathematics with Applications', 
  //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
  // $itemAllArr[2] = {itemName: 'Discrete Mathematics with Applications', 
  //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
  // $itemAllArr[3] = {itemName: 'Discrete Mathematics with Applications', 
  //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
  // $itemAllArr[4] = {itemName: 'Discrete Mathematics with Applications', 
  //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
  // $itemAllArr[5] = {itemName: 'Discrete Mathematics with Applications', 
  //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
  // $itemAllArr[6] = {itemName: 'Discrete Mathematics with Applications', 
  //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};
  // $itemAllArr[7] = {itemName: 'Discrete Mathematics with Applications', 
  //   itemDescripShort: "Used for Cpr E 310", itemPrice: 90};

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
<html>
<head>
<meta charset="UTF-8">
<title>Search Results</title>
<link href="resultsStyle.css" rel="stylesheet" type="test/css">
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link href="style.css" rel="stylesheet" type="text/css"><!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
</style>
<![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- <script language="JavaScript" type="text/javascript" src="resultsScript.js"></script> -->
</head>

<body>

<div class="container">
  <div class="header"><a href="#"><img src="" alt="Insert Logo Here" name="Insert_logo" width="20%" height="90" id="Insert_logo" style="background-color: #8090AB; display:block;" /></a> 
    <!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="results">Search</a></li>
      <li><a href="myaccount.php">Seller Page</a></li>
      <li><a href="#">About Us</a></li>
    </ul>
    <p> </p>
    <!-- end .sidebar1 --></div>
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
    <div class="resultsPaneArr" style="overflow:scroll; height:400px;">
      <script type='text/javascript'>
        $('.resultsPaneArr').append(resultsPaneGenerator());
      </script>
<!--       <div class="resultsPane itemFont">
        <div class="itemPhoto">
          <img src="http://www.nationalbookauctions.com/SmallBookIcon.jpg" alt="Book">
        </div>
        <div class="itemName itemFont">
        </div>
        <div class="itemDescripShort itemDescriptionFont">
        </div>
        <div class="itemPrice itemFont">
        </div>
      </div> -->

    </div>
    <!-- end .content --></div>
  <div class="footer">
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>
