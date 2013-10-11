var num = 1;
function printBook(src, title, author, isbn, condition, asking)
{
	var id = "edititem" + num;
	var toReturn = "<div id='items' ><table  id='tableitem'><tr ><td id='picturetd'><div id='picture'><img id='pictureimg' src=" +
						src + ">" +
						"</div></td><td><div id='info'><p style='padding-left:1em; line-height:2.0em'>" +
						"Item Informaton: <button id=" + id + " onClick='itemEdit(this.id)'>Edit</button><br>" + 
							"Title: <span id='span'" + id +">"+ title + "</span><br>" +
							"Author: <span>" + author + "</span><br>" +
							"ISBN: <span>" + isbn + "</span><br>" +
							"Item Condition: <span>" + condition + "</span><br>" +
							"Asking Price: <span>" + asking + "</span><br>" +
						"</p></div></td></tr></table></div>";
	num += 1;
	return toReturn;
	/*return "balls";*/
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
	$('#tableitem td button').each( function()
	{
		var temp = 'edititem';
		var tempId = $(this).attr('id');
		for(var i = 1; i<num;i++)
		{
			if(tempId == (temp + i) && tempId == id)
			{
			alert(tempId);
				var count = 1;
				$('#tableitem td div').each( function()
				{	
					var a = $(this).attr('id');
					if(count == i && a == 'info')
					{
						$(this).html("hmm");
						var b = $(this).getElementById('span1');
						alert(b);
					}
					if(a == 'info')
						count += 1;
				});
			}
		}
	});
}

$(document).ready( function() {
	$('#edituser').click( function () { editFunc(); });
});