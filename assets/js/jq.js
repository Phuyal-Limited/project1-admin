$(document).ready(function(){

	

//admin login
	
$("#submit-button").click(function () {
 		var user = $("#user").val();
		var pass = $("#pass").val();
		
		if(user==''){
			$("#msg").text('User Required!');
			return false;
		}
		if(pass==''){
			$("#msg").text('Password Required!');
			return false;
		}
		
		$.ajax({
			
			url:'login_entry',
			type:'POST',
			data: {
				name: user,
				pass: pass 
			},
			beforeSend: function(){
				$("#load").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="25px" width="25px">');
			},
			success: function(response){
				$("#msg").html('');
				if(response==='successful'){
					$("#load").html('');
					window.location.replace("dashboard");
				}else{
					$("#load").html('');
					$("#msg").text(response);
				}
		},
			
	});
		return false;
  });

//get book details from database if the book with that isbn is in database
$("#isbn10").keyup(function(){
	var isbn10 = $("#isbn10").val();
	var isbn13 = $("#isbn13").val();
	var isbn_check = $("#isbn_check").val();
	var lnth = isbncheck(isbn10);
	if(isbn_check == "0"){
						//do nothing
	}else{
			$("#book_id").val('');
			$("#publish")[0].reset();
			$("#description").text("");
				
			$("#isbn10").val(isbn10);
			$("#isbn_check").val('0');
			$("#publish :input").attr('disabled', false);
	}
	if(lnth==10){
	$.ajax({
			url: 'search_book',
			type: 'POST',
			dataType: 'json',
			data: {
				isbn: isbn10,
				
			},
			beforeSend: function(){
        		
        		$("#load_isbn10").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="20px" width="20px">');
       		},
			success: function(response){
				$("#load_isbn10").html('');
				if(response.error === '1'){
					if(isbn_check == "0"){
						//do nothing
					}else{
						$("#book_id").val('');
						$("#publish")[0].reset();
						$("#description").text("");
						
						$("#isbn10").val(isbn10);
						$("#isbn_check").val('0');
						$("#publish :input").attr('disabled', false);
					}
				}else{
					
					$("#isbn13").val(response[0].isbn13);
					$("#book_name").val(response[0].book_name);
					$("#author").val(response[0].author);
					$("#publisher").val(response[0].publisher);
					$("#published_date").val(response[0].published_date);
					$("#language").val(response[0].language);
					
					$("#weight").val(response[0].weight);
					$("#all_category").val(response[0].category_id);
					
					$("#description").text(response[0].description);
					$("#image").html(response[1].path);
					$("#book_id").val(response[0].book_id);
					$("#isbn_check").val('1');
					
					
					$("#publish :input").attr('disabled', true);
					
					$("#isbn10").attr('disabled', false);
					$("#price").attr('disabled', false);
					$("#qty").attr('disabled', false);
					$("#store_ref").attr('disabled', false);
					$("#delivery_cost_outof_city").attr('disabled', false);
					$("#delivery_cost_within_city").attr('disabled', false);
					$("#book_id").attr('disabled', false);
				}
			},
			
		});
}//else{
	//$("#publish")[0].reset();
	//$("#description").text("");
	//$("#isbn10").val(isbn10);
//}
		return false;
	
});

//get book details from database if the book with that isbn is in database
$("#isbn13").keyup(function(){
	var isbn13 = $("#isbn13").val();
	var isbn10 = $("#isbn10").val();
	var isbn_check = $("#isbn_check").val();
	var lnth = isbncheck(isbn13);
	if(isbn_check == "0"){
		//do nothing				
	}else{
			$("#book_id").val('');
			$("#publish")[0].reset();
			$("#description").text("");
			$("#isbn13").val(isbn13);
				
			$("#isbn_check").val('0');
			$("#publish :input").attr('disabled', false);
	}
	if(lnth==13){
	$.ajax({
			url: 'search_book',
			type: 'POST',
			dataType: 'json',
			data: {
				isbn: isbn13,
				
			},beforeSend: function(){
        		
        		$("#load_isbn13").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="20px" width="20px">');
       		},
			success: function(response){
				$("#load_isbn13").html('');
				$("#success_msg_button").click();
				if(response.error === '1'){
					if(isbn_check == "0"){
					
					}else{
						$("#book_id").val('');
						$("#publish")[0].reset();
						$("#description").text("");
						$("#isbn13").val(isbn13);
					
						$("#isbn_check").val('0');
						$("#publish :input").attr('disabled', false);
					}
				}else{
					$("#isbn10").val(response[0].isbn10);
					$("#book_name").val(response[0].book_name);
					$("#author").val(response[0].author);
					$("#publisher").val(response[0].publisher);
					$("#published_date").val(response[0].published_date);
					$("#language").val(response[0].language);
					
					$("#weight").val(response[0].weight);
					$("#all_category").val(response[0].category_id);
					
					$("#isbn_check").val('1');
					
					$("#description").text(response[0].description);
					$("#image").text(response[1].path);
					$("#book_id").val(response[0].book_id);
					
					$("#publish :input").attr('disabled', true);
					
					$("#price").attr('disabled', false);
					$("#isbn13").attr('disabled', false);
					$("#qty").attr('disabled', false);
					$("#store_ref").attr('disabled', false);
					$("#delivery_cost_outof_city").attr('disabled', false);
					$("#delivery_cost_within_city").attr('disabled', false);
					$("#book_id").attr('disabled', false);
				}
			},
			
		});
}//else{
	//$("#publish")[0].reset();
	//$("#description").text("");
	//$("#isbn13").val(isbn13);
	//$("#isbn10").val(isbn10);
//}
		return false;
	
});

//get the category ids and save to a  hidden field
$("#category_id").change(function(){
	var category_id = $("#category_id").val();
	$("#all_category").val(category_id);

});

//publish book
$("#submit").click(function(event) {
	
	var isbn10att = $('#isbn10').is('[disabled=disabled]')
	var isbn13att = $('#isbn13').is('[disabled=disabled]')

	$("#publish :input").attr('disabled', false);
	$("#description").text("");
	
	
	var oData = new FormData(document.forms.namedItem("publish"));
	
    $.ajax({ 
		type: "POST",
        contentType:false, //attr( "enctype", "multipart/form-data" ),
        processData:false,
        url: 'publish', 
        data: oData, 
        beforeSend: function(){
        	
        	$("#publish_load").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="20px" width="20px">');
        },
        success: function( data ) 
        { 
        	
        	$("#publish_load").html('');
        	
        	var response = data.split('/');
        	
			if(response[0]=='Book Successfully Added.'){
				window.location.replace("confirm/"+response[1]+"/"+response[2]);
				
				
			}
			if(response[0] =='Book already exists in your store'){
				
				$("#msg").show();
        		$("#msg").html('Book already exists in your store');
				$("#publish :input").attr('disabled', true);
				if(isbn10att==false){
					$("#isbn10").attr('disabled', false);
				}
				if(isbn13att==false){
					$("#isbn13").attr('disabled', false);
				}
				$("#price").attr('disabled', false);
				$("#qty").attr('disabled', false);
				$("#store_ref").attr('disabled', false);
				$("#delivery_cost_outof_city").attr('disabled', false);
				$("#delivery_cost_within_city").attr('disabled', false);
				$("#book_id").attr('disabled', false);

			}
			if(response[0] == 'File Size Larger'){
				$("#msg").show();	
        		$("#msg").html('File Size Larger. (Allowed less than 2MB)');
			}
			if(response[0] == 'Invalid File Type'){
				$("#msg").show();	
        		$("#msg").html('Invalid File Type. (Allowed types jpg, jpeg, png)');
			}
		
		/*	else
				alert('error');
        },error: function(xhr, status, error){
							alert(error);*/
		}
   }); 
return false; 
			
 });


//reset the dashboard
$("#reset").click(function(){
	$("#publish :input").attr('disabled', false);
	$("#publish")[0].reset();
	$("#description").text("");
	$(".btn-group button").html('None selected <b class="caret"></b>');
	$("#book_id").val('');
	$("#isn_check").val('0');
	$('#img_prev').attr('src', "#");
	$('#img_prev').hide();
	$('#popup').hide();
	$("#msg").hide();
});


//delete book with ajax
$("#del_item").click(function(){
	var book_id = $("#del_book_id").val();
	var stock_id = $("#del_stock_id").val();
	var store_id = $("#del_store_id").val();
	$("#cancel_delete").click();
	$.ajax({ 
        type: "POST",
        url: 'delete_item', 
        data: {
			book_id: book_id,
			stock_id: stock_id,
			store_id: store_id
		},beforeSend: function(){
        	
        	$("#success_display").click();
        	$("#success_msg p").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="100px" width="100px">');
			$("#success_msg p").css({
				"margin-left":"35%"
			});
        },	 
        success: function( data ) 
        { 
        	$("#success_msg p").css({
				"margin-left":"0%"
			});
			
        	
			$('#success_msg').html('<h4>Item Deleted Successfully.</h4>');
			
		}
   }); 
return false; 
});


//update book with ajax
$("#update_details").click(function(){
	
	var book_id = $("#updt_book_id").val();
	var stock_id = $("#updt_stock_id").val();
	var store_id = $("#updt_store_id").val();
	var price = $('#price').val();
	var delivery_cost_within_city = $('#delivery_cost_within_city').val();
	var delivery_cost_outof_city = $('#delivery_cost_outof_city').val();
	var store_ref = $('#store_ref').val();
	var qty = $('#qty').val();
	//update validation
	if(price == '' || price == 0){
		$("#price_validate").show();
		$("#price_validate").html('Please Fill');
		return false;
	}
	var filter=/^[0-9 .]+$/;
	if(!price.match(filter))
	{
		$("#price_validate").show();

		return false;
	}
	if(qty == '' || qty==0){
		$("#price_validate").hide();
		$("#qty_validate").show();
		$("#qty_validate").html('Please Fill');
		return false;
	}
	var filter=/^[0-9]+$/;
	if(!qty.match(filter))
	{
		$("#price_validate").hide();
		$("#qty_validate").show();
		return false;
	}
	
	$("#cancel_update").click();
	$.ajax({ 
        type: "POST",
        url: 'update_item', 
        data: {
			book_id: book_id,
			stock_id: stock_id,
			store_id: store_id,
			price: price,
			delivery_cost_within_city: delivery_cost_within_city,
			delivery_cost_outof_city: delivery_cost_outof_city,
			store_ref: store_ref,
			qty: qty
		},beforeSend: function(){
        	$("#success_display").click();
        	$("#success_msg p").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="100px" width="100px">');
			$("#success_msg p").css({
				"margin-left":"35%"
			});
        },		 
        success: function( data ) 
        { 
        	$("#success_msg p").css({
				"margin-left":"0%"
			});
			$('#success_msg').html('<h4>Item Updated Successfully.</h4>');
			
			
		}
   }); 
return false; 
});

//clicked add new book button
	$("#add_new_book").click(function(){
		window.location.replace('add_book');
	});

});


//for image preview
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$("#img_prev").show();
$('#img_prev')
.attr('src', e.target.result)
.width(150)
.height(150);

};

reader.readAsDataURL(input.files[0]);
}
}

//function to get details of a book with ajax
function get_details(i){
	var book_id = $("#book_id"+i).val();
	var stock_id = $("#stock_id"+i).val();
	var store_id = $("#store_id"+i).val();
	
	$.ajax({ 
        type: "POST",
        url: 'get_details', 
		dataType: 'json',
        data: {
			book_id: book_id,
			stock_id: stock_id,
			store_id: store_id
		},beforeSend: function(){
        	$("#det").click();
        	
        	$("#all_details").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="100px" width="100px">');
        }, 
        success: function( data ) 
        { 
        	$('#det_title').text(data[0].book_name);
			$('#all_details').html('<div><img src="'+data[2].path+'" height="150px" width="150px" /><br/>' +
			'<h4>Description</h4><hr/>' +
			'<p>'+data[0].description+'</p>' +
			'<h4>Details</h4><hr/>' +
			'<p>ISBN10: '+data[0].isbn10+'</p>' +
			'<p>ISBN13: '+data[0].isbn13+'</p>' +
			'<p>Author: '+data[0].author+'</p>' +
			'<p>Edition: '+data[0].edition+'</p>' +
			'<p>Price: '+data[1].price+'</p>' +
			'<p>Category: '+data[3]+'</p>' +
			'<p>Publisher: '+data[0].publisher+'</p>' +
			'<p>Language: '+data[0].language+'</p>' +
			'<p>In Stock: '+data[1].stock+'</p>' +
			'<p>Delivery Cost Within City: '+data[1].delivery_cost_within_city+'</p>' +
			'<p>Delivery Cost Outof City: '+data[1].delivery_cost_outof_city+'</p>' +
			'<p>Published Date: '+data[0].published_date+'</p>' +
			'<div>'
			);
			
			
		}
   }); 
return false; 
}

//get name of the book to be deleted
function del_stock(i){
	var book_id = $("#book_id"+i).val();
	var stock_id = $("#stock_id"+i).val();
	var store_id = $("#store_id"+i).val();
	$("#del_book_id").val(book_id);
	$("#del_stock_id").val(stock_id);
	$("#del_store_id").val(store_id);
	$.ajax({ 
        type: "POST",
        url: 'get_details', 
        dataType: 'json',
		data: {
			book_id: book_id,
			stock_id: stock_id,
			store_id: store_id
		},
		beforeSend: function(){
        	$("#del").click();
			$("#delete_msg").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="100px" width="100px">');
			$("#delete_msg").css({
				"margin-left":"35%"
			});
        },
        success: function( data ) 
        { 
        	$("#delete_msg").css({
				"margin-left":"0%"
			});
			$("#delete_msg").html("Are you sure you want to delete this book?");
        	$('#del_title').text(data[0].book_name);
			
		}
	});
}

//get details of the book to be updated
function update_stock(i){
	var book_id = $("#book_id"+i).val();
	var stock_id = $("#stock_id"+i).val();
	var store_id = $("#store_id"+i).val();
	$("#updt_book_id").val(book_id);
	$("#updt_stock_id").val(stock_id);
	$("#updt_store_id").val(store_id);
	$.ajax({ 
        type: "POST",
        url: 'get_details', 
        dataType: 'json',
		data: {
			book_id: book_id,
			stock_id: stock_id,
			store_id: store_id
		},beforeSend: function(){
        	$("#updt").click();
        	
        	$("#updt_msg").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="100px" width="100px">');
        },
        success: function( data ) 
        { 
        	$("#updt_msg").html('');
			$("#updt_form").show();
			$('#update_form legend').text(data[0].book_name);
			$('#price').val(data[1].price);
			$('#delivery_cost_within_city').val(data[1].delivery_cost_within_city);
			$('#delivery_cost_outof_city').val(data[1].delivery_cost_outof_city);
			$('#store_ref').val(data[1].item_no_for_store_ref);
			$('#qty').val(data[1].stock);
			
		}
	});
	return false;
}

//when ok clicked after item delete
function success_final(page_name){
	var page_name = page_name;
	//alert(page_name);
	if(page_name=='mybook'){
		book_table();
	}
	if(page_name=='search'){
		var srch_txt = $("#txt").val();

		search_page(srch_txt);
	}
}

//validate form to while book add
function form_validate(){
	var isbn10 = $("#isbn10").val();
	var isbn13 = $("#isbn13").val();
	var category_id = $("#all_category").val();
	var edition = $("#edition").val();
	var book_name = $("#book_name").val();
	var author = $("#author").val();
	var publisher = $("#publisher").val();
	var published_date = $("#published_date").val();
	var language = $("#language").val();
	var price = $("#price").val();
	var qty = $("#qty").val();
	var description = $("#description").val();
	var isbn10length = isbncheck(isbn10);
	var isbn13length = isbncheck(isbn13);
	if(isbn10length != 10){
		$("#msg").show();	
        $("#msg").html('ISBN10 Not of 10 Digits.');
		return false;
	}
	if(isbn13length != 13){
		$("#msg").show();	
        $("#msg").html('ISBN13 Not of 13 Digits.');
		return false;
	}
	
	if(book_name == ''){
		$("#msg").show();	
        $("#msg").html('Book Title Field Empty.');
		return false;
	}
	if(author == ''){
		$("#msg").show();	
        $("#msg").html('Author Field Empty.');
		return false;
	}
	if(publisher == ''){
		$("#msg").show();	
        $("#msg").html('Publisher Field Empty.');
		return false;
	}
	if(published_date == 'Please Choose..'){
		$("#msg").show();	
        $("#msg").html('Year of Publication Not Selected.');
		return false;
	}
	if(edition == ''){
		$("#msg").show();	
        $("#msg").html('Edition Field Empty.');
		return false;
	}
	if(language == ''){
		$("#msg").show();	
        $("#msg").html('Language Field Empty.');
		return false;
	}
	if(price == ''){
		$("#msg").show();	
        $("#msg").html('Price Field Empty.');
		return false;
	}
	var filter=/^[0-9 .]+$/;
	if(!price.match(filter))
	{
		$("#msg").show();	
        $("#msg").html('Numbers with Decimal Allowed in Price Field.');
		return false;
	}
	if(category_id == ''){
		
		$("#msg").show();	
        $("#msg").html('Category Not Selected.');
		return false;
	}

	if(qty == ''){
		$("#msg").show();	
        $("#msg").html('Quantity Field Empty.');
		return false;
	}
	var filter=/^[0-9]+$/;
	if(!qty.match(filter))
	{
		$("#msg").show();	
        $("#msg").html('Only Numbers Allowed in Quantity Field.');
		return false;
	}
  	
	if(description == ''){
		$("#msg").show();	
        $("#msg").html('Description Field Empty.');
		return false;
	}
	$("#submit").click();

}

//check the length of the isbn (number length)
function isbncheck(isbn13){
	var isbn = isbn13.split('-');
	var size = isbn.length;
	var result = isbn.join('');
	return result.length;
}

//password change form validation
function validate_password(){
	var newpass = $("#new").val();
	var repass = $("#repass").val();
	if(newpass.length<5){
		$("#success-msg").hide();
		$("#validate-msg").html('Password must be of minimum length 5 (New Password)');
		$("#validate-msg").show();
		return false;
	}

	if(repass.length<5){
		$("#success-msg").hide();
		$("#validate-msg").html('Password must be of minimum length 5 (Confirm Password)');
		$("#validate-msg").show();
		return false;
	}

	if(newpass!=repass){
		$("#success-msg").hide();
		$("#validate-msg").html('Password Not Match');
		$("#validate-msg").show();
		return false;
	}
}

//password form reset
function reset_form(){
	$("#password-form")[0].reset();
	$("#validate-msg").html(' ');
	$("#validate-msg").hide();
	
}

//order hide show
function order_show(i){
	$("#show-order"+i).toggle(1000);
}
