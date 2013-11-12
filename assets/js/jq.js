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
				$("#msg").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="150px" width="150px">');
			},
			success: function(response){
				$("#msg").html('');
			if(response==='successful'){
					window.location.replace("dashboard");
				}else{
					$("#msg").text(response);
				}
			},
			
		});
		return false;
    });

$("#isbn10").keyup(function(){
	var isbn10 = $("#isbn10").val();
	var isbn13 = $("#isbn13").val();
	var isbn_check = $("#isbn_check").val();
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
	if(isbn10.length==10){
	$.ajax({
			url: 'search_book',
			type: 'POST',
			dataType: 'json',
			data: {
				isbn: isbn10,
				
			},
			beforeSend: function(){
        		$("#load").click();
        		$("#success_msg_button").hide();
        		$("#success_load p").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="150px" width="150px">');
       		},
			success: function(response){
				$("#success_msg_button").click();
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
					$("#category_id").val(response[0].category_id);
					
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

$("#isbn13").keyup(function(){
	var isbn13 = $("#isbn13").val();
	var isbn10 = $("#isbn10").val();
	var isbn_check = $("#isbn_check").val();
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
	if(isbn13.length==13){
	$.ajax({
			url: 'search_book',
			type: 'POST',
			dataType: 'json',
			data: {
				isbn: isbn13,
				
			},
			beforeSend: function(){
        		$("#load").click();
        		$("#success_msg_button").hide();
        		$("#success_load p").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="150px" width="150px">');
       		},
			success: function(response){
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
					$("#category_id").val(response[0].category_id);
					
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


//publish book
$("#submit").click(function(event) {
	var isbn10 = $("#isbn10").val();
	var isbn13 = $("#isbn13").val();
	var isbn10att = $('#isbn10').is('[disabled=disabled]')
	var isbn13att = $('#isbn13').is('[disabled=disabled]')

	$("#publish :input").attr('disabled', false);
	$("#description").text("");
	var category_id = $("#category_id").val();
	
	if(isbn10.length != 10){
		$("#msg").click();	
        $("#success_msg p").html('ISBN10 Not of 10 Digits.');
		return false;
	}
	if(isbn13.length != 13){
		$("#msg").click();	
        $("#success_msg p").html('ISBN13 Not of 13 Digits.');
		return false;
	}
	if(category_id == 'Please Choose...'){
		$("#msg").click();	
        $("#success_msg p").html('Category Not Selected.');
		return false;
	}
	
	var oData = new FormData(document.forms.namedItem("publish"));
	
    $.ajax({ 
		type: "POST",
        contentType:false, //attr( "enctype", "multipart/form-data" ),
        processData:false,
        url: 'publish', 
        data: oData, 
        beforeSend: function(){
        	
        	$("#load").click();
        	$("#success_msg_button").hide();
        	$("#success_load p").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="150px" width="150px"><br />Loading');
        },
        success: function( data ) 
        { 
        	
        	$("#success_msg_button").click();
        	
        	var response = data.split('/');
        	
			if(response[0]=='Book Successfully Added.'){
				window.location.replace("confirm?stid="+response[1]+" && bkid="+response[2]);
				
				
			}
			if(response[0] =='Book already exists in your store'){
				
				$("#msg").click();	
        		$("#success_msg p").html('Book already exists in your store');
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
				$("#msg").click();	
        		$("#success_msg p").html('File Size Larger.');
			}
			if(response[0] == 'Invalid File Type'){
				$("#msg").click();	
        		$("#success_msg p").html('Invalid File Type.');
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
	
	$("#publish")[0].reset();
	$("#description").text("");
	$("#book_id").val('');
	$("#isn_check").val('0');
	$('#img_prev').attr('src', "#");
	$('#img_prev').hide();
	$('#popup').hide();
});



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
        	
        	$("#load").click();
        	$("#success_msg_button").hide();
        	$("#success_load p").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="150px" width="150px"><br />Loading');
        },	 
        success: function( data ) 
        { 
        	$("#success_msg_button").click();
        	
        	$('#success_title').text('');
			$('#success_msg').html('<h4>Item Deleted Successfully.</h4>');
			
			
			$("#success_display").click();
			
		}
   }); 
return false; 
});



$("#update_details").click(function(){
	var book_id = $("#updt_book_id").val();
	var stock_id = $("#updt_stock_id").val();
	var store_id = $("#updt_store_id").val();
	var price = $('#price').val();
	var delivery_cost_within_city = $('#delivery_cost_within_city').val();
	var delivery_cost_outof_city = $('#delivery_cost_outof_city').val();
	var store_ref = $('#store_ref').val();
	var qty = $('#qty').val();
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
        	
        	$("#load").click();
        	$("#success_msg_button").hide();
        	$("#success_load p").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="150px" width="150px"><br />Loading');
        },		 
        success: function( data ) 
        { 
        	$("#success_msg_button").click();
        	
			$('#success_title').text('');
			$('#success_msg').html('<h4>Item Updated Successfully.</h4>');
			
			
			$("#success_display").click();
			
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
        	
        	$("#load").click();
        	$("#success_msg_button").hide();
        	$("#success_load p").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="150px" width="150px"><br />Loading');
        }, 
        success: function( data ) 
        { 
        	$("#success_msg_button").click();

			$('#det_title').text(data[0].book_name);
			$('#all_details').html('<div><img src="'+data[2].path+'" height="150px" width="150px" /><br/>' +
			'<h4>Description</h4><hr/>' +
			'<p>'+data[0].description+'</p>' +
			'<h4>Details</h4><hr/>' +
			'<p>ISBN10: '+data[0].isbn10+'</p>' +
			'<p>ISBN13: '+data[0].isbn13+'</p>' +
			'<p>Author: '+data[0].author+'</p>' +
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
			$("#det").click();
		}
   }); 
return false; 
}

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
        	
        	$("#load").click();
        	$("#success_msg_button").hide();
        	$("#success_load p").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="150px" width="150px"><br />Loading');
        },
        success: function( data ) 
        { 
        	$("#success_msg_button").click();
        	$('#del_title').text(data[0].book_name);
			$("#del").click();
		}
	});
}

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
        	
        	$("#load").click();
        	$("#success_msg_button").hide();
        	$("#success_load p").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="150px" width="150px"><br />Loading');
        },
        success: function( data ) 
        { 
        	$("#success_msg_button").click();
			
			$('#update_form legend').text(data[0].book_name);
			$('#price').val(data[1].price);
			$('#delivery_cost_within_city').val(data[1].delivery_cost_within_city);
			$('#delivery_cost_outof_city').val(data[1].delivery_cost_outof_city);
			$('#store_ref').val(data[1].item_no_for_store_ref);
			$('#qty').val(data[1].stock);
			$("#updt").click();
		}
	});
	return false;
}

//when ok clicked after item delete
function success_final(){
//window.location.replace("all_books");
book_table();

}

