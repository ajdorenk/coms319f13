//var num = 0;
var mEmail = "";
var arrIds = new Array();
var booksArr = new Array();
function printBook(src, title, author, isbn, condition, asking, description, sold, num)
{
	
	var id = "edititem" + num;
	var toReturn = "<table id='tabd" + id + "' class='table table-bordered'><tr><td align='center' class='col-md-3' style='vertical-align:middle'>" + 
					"<img id='pictureimg' src=" + src + ">" +
					"</td><td align='center' style='vertical-align:middle'><table style='margin:auto;' id='info" + id + "' class='table table-bordered'><col width='25%'><col width='75%'>" + 
					"<thead><tr><th id='thid' colspan='2'>Item Informaton"+ (sold==0 ? " <button type='button'class='btn btn-default btn-xs' id=" + id + " onClick='itemEdit(this.id)'>Edit</button> <button type='button'class='btn btn-default btn-xs' id=bbt" + id + " onClick='soldItem(this.id)' disabled style='visibility:hidden'>Sold Item</button>" : " SOLD") + "</th></tr></thead>" + 
					"<tbody><tr><td style='vertical-align:middle' height='45'><strong>Title</strong></td> <td style='vertical-align:middle' height='45'><span>" + title +"</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>Author</strong></td><td style='vertical-align:middle' height='45'><span>" + author + "</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>ISBN</strong></td><td style='vertical-align:middle' height='45'><span>" + isbn + "</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>Item Condition</strong></td><td style='vertical-align:middle' height='45'><span>" + condition + "</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong><div id='s" + id +"'>" + (sold==0 ? "Asking Price" : "Sold For") +"</div></strong></td><td style='vertical-align:middle' height='45'><span>" + asking + "</span></td></tr></tbody></table><br>" + 
					"</td></tr><tr><td colspan='2'><h4>Description"+  (sold==0 ? "<button type='button' class='btn btn-default btn-xs' id='d" + id + "' onClick='descriptEdit(this.id)'>Edit</button>" : "" ) + "</h4>" + 
					"<div><span>" + description + "</span></div></td></tr></table>";
	//num += 1;
	return toReturn;
	/*return "balls";*/
}

function getBooks(email, print)
{
	var toRet = "";
	var i = 0;
	$.ajax({
		type: "POST",
		url: "myaccount_files/php_scripts/my_account_books.php",
		data: {
					Email : email
				},
		async: false
		//dataType: "text",
		/*success: printAllBooks(data),
		error: function(error) {
					alert("Sorry your request could not be processed");
				}*/
	}).done( function( data ) {
		var books = $.parseJSON(data);
		alert(data);
		$.each(books,  function() {
			arrIds[i] = this["ID"];
			//toRet += printBook(this["ImageLink"], this["Title"], this["Author"], this["ISBN"], this["ItemShape"], this["Price"], this['Description'], this['Sold']);
			booksArr[i++] = new Book(this["Author"], this["Title"], this["ItemShape"], this["Price"], this["ID"], this["ISBN"], i, this['Sold'], this['Description'], this["ImageLink"]);
		});
	});
	//alert(printBooks());
	//booksArr.sort(compareSold);
	if(print == 1)
		return printBooks();
}

function printBooks() {
	for(var i = 0; i < booksArr.length; i++) {
		var toRem = "#tabdedititem" + booksArr[i].getTid();
		$(toRem).remove();
		//alert(toRem);
	//	$("#posthere").remove( toRem );
	}
	//$("#posthere").empty();
	var toRet = "";
	for(var i = 0; i < booksArr.length; i++) {
		//alert(printBook(booksArr[i].getImage(), booksArr[i].getTitle(), booksArr[i].getAuthor(), booksArr[i].getISBN(), booksArr[i].getCondition(), booksArr[i].getPrice(), booksArr[i].getDescript(), booksArr[i].getSold(), booksArr[i].getTid()));
		toRet += printBook(booksArr[i].getImage(), booksArr[i].getTitle(), booksArr[i].getAuthor(), booksArr[i].getISBN(), booksArr[i].getCondition(), booksArr[i].getPrice(), booksArr[i].getDescript(), booksArr[i].getSold(), booksArr[i].getTid());
	}
	return toRet;
}

function printInfo(name, email, phone, created, sale, sold, rating)
{	
	mEmail = email;
	var toReturn = "<table style='width:100%'>" +
				"<tr style='width:100%'><td style='width:50%'>" +
				"<table class='table table-bordered' id='usertable'  style='width:100%; height:100%'><col width='25%'><col width='75%'><thead><tr><th colspan='2'>User Information <button type='button' id='edituser' class='btn btn-default btn-xs'>Edit</button></th></tr>" +
				"</thead><tbody><tr><td style='vertical-align:middle' height='45'><strong>Name</strong></td><td style='vertical-align:middle' height='45' id='nameuser'>" + name + "</td></tr><tr>" +
				"<td style='vertical-align:middle' height='45'><strong>Email</strong></td><td style='vertical-align:middle' height='45' id='emailuser'>" + email + "</td></tr><tr>" +
				"<td style='vertical-align:middle' height='45'><strong>Phone</strong></td><td style='vertical-align:middle' height='45' id='phoneuser'>" + phone + "</td></tr><tr>" +
				"<td style='vertical-align:middle' height='45'><strong>Created</strong></td><td style='vertical-align:middle' height='45'>" + created + "</td></tr></tbody></table>" +
				"<!--<p style='padding-left:1em; line-height:2.0em'>User Information: edit<br>First Name:<br>" +
				"Last Name:<br>Email Address:<br>Date Created:<br></p>-->" +
				"</td><td style='width:50%; height:100%'>" +
				"<table class='table table-bordered' style='width:100%; height:100%'><col width='75%'><col width='25%'><thead><tr><th colspan='2'>" +
				"Seller Information </th></tr></thead><tbody><tr><td style='vertical-align:middle' height='45'><strong>Number of Books for Sale</strong></td>" +
				"<td style='vertical-align:middle' height='45'>" + sale + "</td></tr><tr>" +
				"<td style='vertical-align:middle' height='45'><strong>Number of Books Sold</strong></td><td style='vertical-align:middle' height='45'>" + sold + "</td></tr><tr>" +
				"<td style='vertical-align:middle' height='45'><strong>Current Seller Rating</strong></td><td style='vertical-align:middle' height='45'>" + rating + "/5.0</td></tr><tr>" +
				"<td style='vertical-align:middle' height='45'><strong>View Rating</strong></td><td style='vertical-align:middle' height='45'><button type='button' id='viewrate' class='btn btn-default btn-xs'>View</button></td></tr></tbody></table>" +
				"<!--<p style='padding-left:1em; line-height:2.0em'>Seller Information: edit<br>" +
				"Number of Books for Sale: <br>Number of Books Sold:<br>Current Seller Rating:" +
				"View Rating:<button type='button' id='viewrate' class='btn btn-default btn-xs'>View</button><br></p>--></td></tr></table>";
	return toReturn;
}

function createStringTable(rating) {
	return "<table class='table table-bordered'><col width='45%'><col width='55%'>" + 
				"<tr><td>Friendliness</td><td>" + rating.getFriendly() + "</td></tr>" +
				"<tr><td>Price</td><td>" + rating.getPrice() + "</td></tr>" +
				"<tr><td>Availability</td><td>" + rating.getAvailability() + "</td></tr>" +
				"<tr><td>Timliness</td><td>" + rating.getTime() + "</td></tr>" +
				"<tr><td>Overall</td><td>" + rating.getTotal() + "</td></tr>" +
				"<tr><td colspan='2'><strong>Description</strong> " + rating.getDescript() +"</td></tr>"+
			"</table>";
}

function displayModal() {
	var ratings = getAllRatings(mEmail);
	var stringToAdd = "";
	height = $(window).height() * .75;
	width = $(window).width() * .45;
	for(var i = 0; i < ratings.length; i++) {
		stringToAdd += "<tr><td>" + createStringTable(ratings[i]) + "</td></tr>";
	}
	stringToAdd
	var htmlCode = "<div class='ui-dialog'  title='Your Ratings' >" +
									
										"<div >" +
												stringToAdd +
										"</div>"+
									
					"</div>";
	$(htmlCode).dialog({
			width : width,
			height : height,
			modal : true
		});
}

function getRating(email)
{
	var arr = new Array();
	arr[0] = 0;
	arr[1] = 0;
	arr[2] = 0;
	arr[3] = 0;
	$.ajax({
	type: "POST",
	url: "myaccount_files/php_scripts/my_account_ratings.php",
	data: {
				Email : email
			},
	async: false
	}).done( function( data ) {	
		if(!data)
			return 0;
		var user = $.parseJSON(data);
				$.each(user,  function() {
					arr[0] = parseInt(this["Friendly"]);
					arr[1] = parseInt(this["Price"]);
					arr[2] = parseInt(this["Availability"]);
					arr[3] = parseInt(this["Time"]);
				});
	});
	arr[4] =  (arr[0] + arr[1] + arr[2] + arr[3]) / 4;
	return arr;
}

function getUser(email)
{
	var rating = getRating(email)[4];
	var toRet = "";
	$.ajax({
	type: "POST",
	url: "myaccount_files/php_scripts/my_account.php",
	data: {
				Email : email
			},
	async: false
	}).done( function( data ) {
		var user = $.parseJSON(data);
				$.each(user,  function() {
					toRet = printInfo("" + this["FName"] + " " + this["LName"], this["Email"], this["Phone"], this["DCreated"], this["BooksForSale"], this["BooksSold"], rating);
				});
	});
	return toRet;
}

var edit = 0;
function editFunc()
{
	var name; var tcall;
	$('#usertable th button').each( function() {
		var ID = $(this).attr('id');
		if( ID == 'edituser')
		{
			if($(this).html() == 'Edit')
			{
				$(this).html('Save');
				edit = 1
			}
			else if($(this).html() == 'Save')
			{
				$(this).html('Edit');
				edit = 0;
				tcall = true;
			}
		}
	});
	
	var info = new Array();
	var tphone;
	var tname = "";
	var temail;
	$('#usertable td').each( function() {
		var ID = $(this).attr('id');
		if( ID == 'nameuser' && edit == 1)
		{
			name = $(this).html();
			$(this).html("<textarea cols='35' rows=1 id='nametext' style='resize:none'>" +name+"</textarea>");
		}
		else if( ID == 'nameuser' && edit == 0)
		{
			var temp;
			$('#usertable td textarea').each( function() {
				if($(this).attr('id') == 'nametext')
					tname = $(this).val();
			});
			$(this).html(tname);
		}
		else if( ID == 'emailuser' && edit == 1)
		{
			name = $(this).html();
			$(this).html("<textarea cols='35' rows=1 id='emailtext' style='resize:none'>" +name+"</textarea>");
		}
		else if( ID == 'emailuser' && edit == 0)
		{
			var temp;
			$('#usertable td textarea').each( function() {
				if($(this).attr('id') == 'emailtext')
					temail = $(this).val();
			});
			$(this).html(temail);
		}
		else if( ID == 'phoneuser' && edit == 1)
		{
			name = $(this).html();
			$(this).html("<textarea cols='35' rows=1 id='phonetext' style='resize:none'>" +name+"</textarea>");
		}
		else if( ID == 'phoneuser' && edit == 0)
		{
			var temp;
			$('#usertable td textarea').each( function() {
				if($(this).attr('id') == 'phonetext')
					tphone = $(this).val();
			});
			$(this).html(tphone);
		}
	});
	
	if(tcall){
		updateUser(temail, tname, tphone);
	}
}

function updateUser(email, name, phone) {
	var namearr = name.split(" ");
	var first = namearr[0];
	var last = namearr[1];
	$.ajax({
	type: "POST",
	url: "myaccount_files/php_scripts/my_account_updateuser.php",
	data: {
				OldEmail : mEmail,
				NewEmail : email,
				Phone : phone,
				FName : first,
				LName : last
			},
	async: false
	});/*.done( function( data ) {
		var user = $.parseJSON(data);
				$.each(user,  function() {
					toRet = printInfo("" + this["FName"] + this["LName"], this["Email"], this["Phone"], this["DCreated"], this["BooksForSale"], this["BooksSold"], rating);
				});
	});*/
}

function updateBook(title, author, isbn, condition, price, id, sold)
{
	$.ajax({
	type: "POST",
	url: "myaccount_files/php_scripts/my_account_updatebook.php",
	data: {
				Title : title,
				Author : author,
				ISBN : isbn,
				Condition : condition,
				Price : price,
				ID : id,
				Sold : sold
			},
	async: false
	});/*.done( function( data ) {
		var user = $.parseJSON(data);
				$.each(user,  function() {
					toRet = printInfo("" + this["FName"] + this["LName"], this["Email"], this["Phone"], this["DCreated"], this["BooksForSale"], this["BooksSold"], rating);
				});
	});*/
}

function soldItem(id) {
	var price = 0;
	var stringToAdd = "";
	height = $(window).height() * .25;
	width = $(window).width() * .50;
	var htmlCode = "<div class='ui-dialog'  title='Enter Price' >" +
									
										"How much did you sell this book for?" +
										" <input type='text'>" +
					"</div>";
	$(htmlCode).dialog({
			width : width,
			height : height,
			modal : true,
			buttons : {
				"Okay" : function() {
					enter = true;
					price = $('input').val();
					$(this).dialog('close');
					soldHelper(id, price);
				},
				"Cancel" : function() {
					$(this).dialog('close');	
				},
			}
		});
}

function soldHelper(id, price) {
		var newid = id.substring(3,id.length);
		var name = "#info" + newid + " span";
		var info = new Array();
		var i = 0;
		$(name).each( function () {
				var toget = "#textarea" + newid;
				var temp = $(toget).val();
				if(i == 4) {
					$(this).html(price);
				}
				else {
					$(this).html(temp);
				}
				info[i++] = temp;
		});
		$("#s" + newid).html("Sold For");
		var button = "#" + newid;
		$(button).attr('disabled', true);
		$(button).attr('style', 'visibility:hidden');
		$("#" + id).attr('disabled', true);
		$("#" + id).attr('style', 'visibility:hidden');
		$("#d" + newid).attr('disabled', true);
		$("#d" + newid).attr('style', 'visibility:hidden');
		var re = new RegExp("[0-9]");
		var num = id.search(re);
		var numID = parseInt(id.substring(num,id.length));
		var ids = 0;
		for(var i = 0; i < booksArr.length; i++) {
			if(numID == booksArr[i].getTid()) {
				ids = booksArr[i].getId();
				booksArr[i].setSold();
				break;
			}	
		}
		updateBook(info[0], info[1], info[2], info[3], price, ids, 1);
}

function updateDescript(description, id)
{
	$.ajax({
	type: "POST",
	url: "myaccount_files/php_scripts/my_account_updatedescript.php",
	data: {
				Description : description,
				ID : id
			},
	async: false
	});/*.done( function( data ) {
		var user = $.parseJSON(data);
				$.each(user,  function() {
					toRet = printInfo("" + this["FName"] + this["LName"], this["Email"], this["Phone"], this["DCreated"], this["BooksForSale"], this["BooksSold"], rating);
				});
	});*/
}

function itemEdit(id)
{	
	var button = "#" + id;
	var re = new RegExp("[0-9]");
	var num = id.search(re);
	var numID = parseInt(id.substring(num,id.length));
	var buttontext = $(button).text();
	var name = "#info" + id + " span";
	if(buttontext == "Edit")
	{
		$(button).text("Save");
		$(name).each(function () {
			var temp = $(this).text();
			$(this).html("<textarea cols='75' id='textarea" + id + "' style='margin:0;resize:none;vertical-align:middle' rows=1 id='nametext'>" +temp+"</textarea>");
		});
		$("#bbt" + id).attr('disabled', false);
		$("#bbt" + id).attr('style', '');
	}
	else if(buttontext == "Save")
	{
		//name = "#info" + id + " textarea";
		var info = new Array();
		var count = 0;
		$(button).text("Edit");
		$(name).each(function () {
			var toget = "#textarea" + id;
			var temp = $(toget).val();
			info[count++] = temp;
			$(this).html(temp);
		});
		var ids = 0;
		for(var i = 0; i < booksArr.length; i++) {
			if(numID == booksArr[i].getTid()) {
				ids = booksArr[i].getId();
				break;
			}	
		}
		updateBook(info[0], info[1], info[2], info[3], parseInt(info[4]), ids, 0);
		$("#bbt" + id).attr('disabled', true);
		$("#bbt" + id).attr('style', 'visibility:hidden');
	}
}

function descriptEdit(id)
{	
	var button = "#" + id;
	var re = new RegExp("[0-9]");
	var num = id.search(re);
	var numID = parseInt(id.substring(num,id.length));
	var buttontext = $(button).text();
	var name = "#tab" + id + " tr td div span";
	if(buttontext == "Edit")
	{
		$(button).text("Save");
		$(name).each(function () {
			var temp = $(this).text();
			$(this).html("<textarea cols='100' id='textaread" + id + "' style='margin:0;resize:none;vertical-align:middle' rows=3>" +temp+"</textarea>");
		});
	}
	else if(buttontext == "Save")
	{
		//name = "#info" + id + " textarea";
		var info;
		$(button).text("Edit");
		$(name).each(function () {
			var toget = "#textaread" + id;
			var temp = $(toget).val();
			info = temp;
			$(this).html(temp);
		});
		var ids = 0;
		for(var i = 0; i < booksArr.length; i++) {
			if(numID == booksArr[i].getTid()) {
				ids = booksArr[i].getId();
				break;
			}	
		}
		updateDescript(info, ids);
	}
}

//Constructor for rating object
function Rating(friendly, price, availability, time, description) {
	this.friendly = friendly;
	this.price = price;
	this.availability = availability;
	this.time = time;
	this.description = description;
	
	this.getFriendly = function() {
		return this.friendly;
	}
	
	this.getPrice = function() {
		return this.price;
	}
	
	this.getAvailability = function() {
		return this.availability;
	}
	
	this.getTime = function() {
		return this.time;
	}
	
	this.getDescript = function() {
		return this.description;
	}
	
	this.getTotal = function() {
		return (this.friendly + this.price + this.availability + this.time) / 4;
	}
}

//Constructor for a book
function Book(author, title, condition, price, id, ISBN, t, sold, desc, i) {
	this.author = author;
	this.title = title;
	this.condition = condition;
	this.price = price;
	this.id = id;
	this.isbn = ISBN;
	this.tid = t;
	this.sold = sold;
	this.descript = desc;
	this.img = i;
	
	this.getAuthor = function() {
		return this.author;
	}
	
	this.getTitle = function() {
		return this.title;
	}
	
	this.getCondition = function() {
		return this.condition;
	}
	
	this.getPrice = function() {
		return this.price;
	}
	
	this.getId = function() {
		return this.id;
	}
	
	this.getISBN = function() {
		return this.isbn;
	}
	
	this.getTid = function() {
		return this.tid;
	}
	
	this.getSold = function() {
		return this.sold;
	}
	
	this.getDescript = function() {
		return this.descript;
	}
	
	this.getImage = function() {
		return this.img;
	}
	
	this.setSold = function() {
		this.sold = 1;
	}
}

function getAllRatings(email)
{
	var arr = new Array();
	$.ajax({
	type: "POST",
	url: "myaccount_files/php_scripts/my_account_all_ratings.php",
	data: {
				Email : email
			},
	async: false
	}).done( function( data ) {	
		var ratings = $.parseJSON(data);
		var count = 0;
				$.each(ratings,  function() {
					arr[count++] = new Rating(parseInt(this["Friendly"]), parseInt(this["Price"]), parseInt(this["Availability"]), parseInt(this["Time"]), this["Description"]);
				});
	});
	return arr;
}


$(document).ready( function() {
	$('#edituser').click( function () { editFunc(); });
	$('#viewrate').click( function () { displayModal(); });
});


//COMPARE METHODS
function compareSale(a,b){
	return a.getSold() - b.getSold();
}

function compareSold(a,b){
	return b.getSold() - a.getSold();
}

function comparePriceHigh(a, b) {
	return b.getPrice() - a.getPrice();
}

function comparePriceLow(a, b) {
	return a.getPrice() - b.getPrice();
}

function onSelectType() {
	getBooks(mEmail, 0);
	var type = $("#item_type").val();
	//var type = selector.value;
	//alert(type);
	if(type == "For Sale First") {
		booksArr.sort(compareSale);
	}
	else if(type == "Sold First") {
		booksArr.sort(compareSold);
	}else if(type == "Highest Price First") {
		booksArr.sort(comparePriceHigh);
	}else if(type == "Lowest Price First") {
		booksArr.sort(comparePriceLow);
	}
	var ap = printBooks();
	$("#posthere").append(ap);
}
/*
"<div class='panel panel-default' id='items'><div class='panel-body' id='centerdiv' ><div id='picture' class='col-md-3'>" + 
					"<img id='pictureimg' src=" + src + ">" +
					"</div><div name='information' id='info" + id + "' class='col-md-7'><table class='table table-bordered'><col width='25%'><col width='75%'>" + 
					"<thead><tr><th colspan='2'>Item Informaton <button type='button'class='btn btn-default btn-xs' id=" + id + " onClick='itemEdit(this.id)'>Edit</button></th></tr></thead>" + 
					"<tbody><tr><td style='vertical-align:middle' height='45'><strong>Title</strong></td> <td style='vertical-align:middle' height='45'><span>" + title +"</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>Author</strong></td><td style='vertical-align:middle' height='45'><span>" + author + "</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>ISBN</strong></td><td style='vertical-align:middle' height='45'><span>" + isbn + "</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>Item Condition</strong></td><td style='vertical-align:middle' height='45'><span>" + condition + "</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>Asking Price</strong></td><td style='vertical-align:middle' height='45'><span>" + asking + "</span></td></tr></tbody></table></div></div></div><br>";



"<div class='panel panel-default' id='items'><div class='panel-body' id='centerdiv' ><div id='picture' class='col-md-3'>" + 
					"<img id='pictureimg' src=" + src + ">" +
					"</div><div name='information' id='info" + id + "' class='col-md-7'><table class='table table-bordered'><col width='25%'><col width='75%'>" + 
					"<thead><tr><th colspan='2'>Item Informaton <button type='button'class='btn btn-default btn-xs' id=" + id + " onClick='itemEdit(this.id)'>Edit</button></th></tr></thead>" + 
					"<tbody><tr><td style='vertical-align:middle' height='45'><strong>Title</strong></td> <td style='vertical-align:middle' height='45'><span>" + title +"</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>Author</strong></td><td style='vertical-align:middle' height='45'><span>" + author + "</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>ISBN</strong></td><td style='vertical-align:middle' height='45'><span>" + isbn + "</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>Item Condition</strong></td><td style='vertical-align:middle' height='45'><span>" + condition + "</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>Asking Price</strong></td><td style='vertical-align:middle' height='45'><span>" + asking + "</span></td></tr></tbody></table></div></div></div><br>";					*/