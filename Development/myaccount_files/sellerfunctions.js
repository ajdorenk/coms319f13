var num = 0;
var arrIds = new Array();
function printBook(src, title, author, isbn, condition, asking)
{
	var id = "edititem" + num;
	var toReturn = "<div class='panel panel-default' id='items'><div class='panel-body' id='centerdiv' ><div id='picture' class='col-md-3'>" + 
					"<img id='pictureimg' src=" + src + ">" +
					"</div><div name='information' id='info" + id + "' class='col-md-7'><table class='table table-bordered'><col width='25%'><col width='75%'>" + 
					"<thead><tr><th colspan='2'>Item Informaton <button type='button'class='btn btn-default btn-xs' id=" + id + " onClick='itemEdit(this.id)'>Edit</button></th></tr></thead>" + 
					"<tbody><tr><td style='vertical-align:middle' height='45'><strong>Title</strong></td> <td style='vertical-align:middle' height='45'><span>" + title +"</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>Author</strong></td><td style='vertical-align:middle' height='45'><span>" + author + "</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>ISBN</strong></td><td style='vertical-align:middle' height='45'><span>" + isbn + "</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>Item Condition</strong></td><td style='vertical-align:middle' height='45'><span>" + condition + "</span></td></tr>" +
					"<tr><td style='vertical-align:middle' height='45'><strong>Asking Price</strong></td><td style='vertical-align:middle' height='45'><span>" + asking + "</span></td></tr></tbody></table></div></div></div><br>";
	num += 1;
	return toReturn;
	/*return "balls";*/
}

function getBooks(email)
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
		$.each(books,  function() {
			arrIds[i++] = this["ID"];
			toRet += printBook(this["ImageLink"], this["Title"], this["Author"], this["ISBN"], this["ItemShape"], this["Price"]);
		});
	});
	return toRet;
}

function printInfo(name, email, phone, created, sale, sold, rating)
{	
	var toReturn = "<div class='' style='width:86%; height:16em; margin:auto' ><table style='width:100%; height:100%'>" +
				"<tr style='width:100%; height:100%'><td style='width:50%; height:100%'><div class='panel panel-default'>" +
				"<table class='table table-bordered' id='usertable'  style='width:100%; height:100%'><thead><tr><th colspan='2'>User Information <button type='button' id='edituser' class='btn btn-default btn-xs'>Edit</button></th></tr>" +
				"</thead><tbody><tr><td style='vertical-align:middle' height='45'><strong>Name</strong></td><td style='vertical-align:middle' height='45' id='nameuser'>" + name + "</td></tr><tr>" +
				"<td style='vertical-align:middle' height='45'><strong>Email</strong></td><td style='vertical-align:middle' height='45' id='emailuser'>" + email + "</td></tr><tr>" +
				"<td style='vertical-align:middle' height='45'><strong>Phone</strong></td><td style='vertical-align:middle' height='45' id='phoneuser'>" + phone + "</td></tr><tr>" +
				"<td style='vertical-align:middle' height='45'><strong>Created</strong></td><td style='vertical-align:middle' height='45'>" + created + "</td></tr></tbody></table>" +
				"<!--<p style='padding-left:1em; line-height:2.0em'>User Information: edit<br>First Name:<br>" +
				"Last Name:<br>Email Address:<br>Date Created:<br></p>-->" +
				"</div></td><td style='width:50%; height:100%'><div class='panel panel-default'>" +
				"<table class='table table-bordered' style='width:100%; height:100%'><thead><tr><th colspan='2'>" +
				"Seller Information<button style='visibility:hidden' type='button' class='btn btn-default btn-xs'>Edit</button></th></tr></thead><tbody><tr><td style='vertical-align:middle' height='45'><strong>Number of Books for Sale</strong></td>" +
				"<td style='vertical-align:middle' height='45'>" + sale + "</td></tr><tr>" +
				"<td style='vertical-align:middle' height='45'><strong>Number of Books Sold</strong></td><td style='vertical-align:middle' height='45'>" + sold + "</td></tr><tr>" +
				"<td style='vertical-align:middle' height='45'><strong>Current Seller Rating</strong></td><td style='vertical-align:middle' height='45'>" + rating + "/5.0</td></tr><tr>" +
				"<td style='vertical-align:middle' height='45'><strong>View Rating</strong></td><td style='vertical-align:middle' height='45'>" + "Link" + "</td></tr></tbody></table>" +
				"<!--<p style='padding-left:1em; line-height:2.0em'>Seller Information: edit<br>" +
				"Number of Books for Sale: <br>Number of Books Sold:<br>Current Seller Rating:<br>" +
				"View Rating:<br></p>--></div></td></tr></table></div><br>";
	return toReturn;
}

function getRating(email)
{
	var f;
	var p;
	var a;
	var t;
	$.ajax({
	type: "POST",
	url: "myaccount_files/php_scripts/my_account_ratings.php",
	data: {
				Email : email
			},
	async: false
	}).done( function( data ) {	
		var user = $.parseJSON(data);
				$.each(user,  function() {
					f = parseInt(this["Friendly"]);
					p = parseInt(this["Price"]);
					a = parseInt(this["Availability"]);
					t = parseInt(this["Time"]);
				});
	});
	var total =  f + p + a + t;
	return (total / 4);
}

function getUser(email)
{
	var rating = getRating(email);
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
					toRet = printInfo("" + this["FName"] + this["LName"], this["Email"], this["Phone"], this["DCreated"], this["BooksForSale"], this["BooksSold"], rating);
				});
	});
	return toRet;
}

var edit = 0;
function editFunc()
{
	var name;
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
			}
		}
	});
	
	var info = new Array();
	
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
					temp = $(this).val();
			});
			$(this).html(temp);
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
					temp = $(this).val();
			});
			$(this).html(temp);
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
					temp = $(this).val();
			});
			$(this).html(temp);
		}
	});
}

function updateBook(title, author, isbn, condition, price, id)
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
		updateBook(info[0], info[1], info[2], info[3], parseInt(info[4]), arrIds[numID]);
	}
	
	
}

$(document).ready( function() {
	$('#edituser').click( function () { editFunc(); });
});