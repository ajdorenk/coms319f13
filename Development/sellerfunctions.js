var num = 1;
function printBook(src, title, author, isbn, condition, asking)
{
	var id = "edititem" + num;
	var toReturn = "<div id='items'><div id='centerdiv' ><div id='picture'>" + 
					"<img id='pictureimg' src=" + src + ">" +
					"</div><div id='info" + id + "' class='info'><p style='padding-left:1em; line-height:2.0em'>" + 
					"Item Informaton: <button id=" + id + " onClick='itemEdit(this.id)'>Edit</button><br>" + 
					"Title:<span>" + title +"</span><br>" +
					"Author:<span>" + author + "</span><br>" +
					"ISBN:<span>" + isbn + "</span><br>" +
					"Item Condition:<span>" + condition + "</span><br>" +
					"Asking Price:<span>" + asking + "</span><br></p></div></div></div><br>";
	num += 1;
	return toReturn;
	/*return "balls";*/
}

function getBooks(email)
{
	var toRet = "";
	$.ajax({
		type: "POST",
		url: "my_account_books.php",
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
			toRet += printBook(this["ImageLink"], this["Title"], this["Author"], this["ISBN"], this["ItemShape"], this["Price"]);
		});
	});
	return toRet;
}

function printInfo(name, email, phone, created, sale, sold, rating)
{	
	var toReturn = "<div style='width:86%; height:15em; margin:auto' ><table style='width:100%; height:100%'>" +
				"<tr style='width:100%; height:100%'><td style='width:50%; height:100%'><div id='userinfo'>" +
				"<table id='usertable' border='1px' style='width:100%; height:100%'><thead><tr><th colspan='2'>User Information <button id='edituser'>Edit</button></th></tr>" +
				"</thead><tbody><tr><td>Name</td><td id='nameuser'>" + name + "</td></tr><tr>" +
				"<td>Email</td><td id='emailuser'>" + email + "</td></tr><tr>" +
				"<td>Phone</td><td id='phoneuser'>" + phone + "</td></tr><tr>" +
				"<td>Created</td><td>" + created + "</td></tr></tbody></table>" +
				"<!--<p style='padding-left:1em; line-height:2.0em'>User Information: edit<br>First Name:<br>" +
				"Last Name:<br>Email Address:<br>Date Created:<br></p>-->" +
				"</div></td><td style='width:50%; height:100%'><div id='userinfo'>" +
				"<table border='1px' style='width:100%; height:100%'><thead><tr><th colspan='2'>" +
				"Seller Information</th></tr></thead><tbody><tr><td>Number of Books for Sale</td>" +
				"<td>" + sale + "</td></tr><tr>" +
				"<td>Number of Books Sold</td><td>" + sold + "</td></tr><tr>" +
				"<td>Current Seller Rating</td><td>" + rating + "/5.0</td></tr><tr>" +
				"<td>View Rating</td><td>" + "Link" + "</td></tr></tbody></table>" +
				"<!--<p style='padding-left:1em; line-height:2.0em'>Seller Information: edit<br>" +
				"Number of Books for Sale: <br>Number of Books Sold:<br>Current Seller Rating:<br>" +
				"View Rating:<br></p>--></div></td></tr></table></div>";
	return toReturn;
}

function getUser(email)
{
	var toRet = "";
	$.ajax({
	type: "POST",
	url: "my_account.php",
	data: {
				Email : email
			},
	async: false
	//dataType: "json"
	/*success: function( $data ){
				var books = parseJSON(arr);
				$each(books, function(value) {
				name = "" + value["FName"] + value["LName"];
					printBook(name, value["Email"], value["Phone"], value["DCreated"], 3, 0, 5);
				});
	},
	error: function(error) {
				alert("Sorry your request could not be processed");
			}*/
	}).done( function( data ) {
			
		var user = $.parseJSON(data);
				$.each(user,  function() {
					toRet = printInfo("" + this["FName"] + this["LName"], this["Email"], this["Phone"], this["DCreated"], 3, 0, 5);
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
	
	$('#usertable td').each( function() {
		var ID = $(this).attr('id');
		if( ID == 'nameuser' && edit == 1)
		{
			name = $(this).html();
			$(this).html("<textarea rows=1 id='nametext' style='resize:none'>" +name+"</textarea>");
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
			$(this).html("<textarea rows=1 id='emailtext' style='resize:none'>" +name+"</textarea>");
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
			$(this).html("<textarea rows=1 id='phonetext' style='resize:none'>" +name+"</textarea>");
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

function itemEdit(id)
{	
	var button = "#" + id;
	var buttontext = $(button).text();
	var name = "#info" + id + " span";
	if(buttontext == "Edit")
	{
		$(button).text("Save");
		$(name).each(function () {
			var temp = $(this).text();
			$(this).html("<textarea id='textarea" + id + "' style='margin:0;resize:none;vertical-align:middle' rows=1 id='nametext'>" +temp+"</textarea>");
		});
	}
	else if(buttontext == "Save")
	{
		//name = "#info" + id + " textarea";
		$(button).text("Edit");
		$(name).each(function () {
			var toget = "#textarea" + id;
			var temp = $(toget).val();
			$(this).html(temp);
		});
	}
	
	
}

$(document).ready( function() {
	$('#edituser').click( function () { editFunc(); });
});