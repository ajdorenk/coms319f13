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
<script language="JavaScript" type="text/javascript" src="resultsScript.js"></script>
</head>

<body>

<div class="container">
  <div class="header"><a href="#"><img src="" alt="Insert Logo Here" name="Insert_logo" width="20%" height="90" id="Insert_logo" style="background-color: #8090AB; display:block;" /></a> 
    <!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="homepage.php">Home</a></li>
      <li><a href="results">Search</a></li>
      <li><a href="myaccount.php">Seller Page</a></li>
      <li><a href="#">About Us</a></li>
    </ul>
    <p> </p>
    <!-- end .sidebar1 --></div>
  <div class="content">
    <div class="advSearch">
      Search by:
      <select>
        <option value="anything"></option>
        <option value="itemName">Item Name</option> 
        <option value="isbn">ISBN</option>               
      </select>  
      <form>
        <input type="text" name="searchText" value="Search...">
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
