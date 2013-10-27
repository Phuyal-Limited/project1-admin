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
			success: function(response){
				
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
	//if(isbn10.length==13){
	$.ajax({
			url: 'search_book',
			type: 'POST',
			dataType: 'json',
			data: {
				isbn: isbn10,
				
			},
			success: function(response){
				
				if(response.error === '1'){
					$("#book_id").val('');
					$("#publish")[0].reset();
					$("#description").text("");
					$("#isbn13").val(isbn13);
					$("#isbn10").val(isbn10);
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
					$("#image").text(response[1].path);
					$("#book_id").val(response[0].book_id);
				}
			},
			
		});
//}else{
	//$("#publish")[0].reset();
	//$("#description").text("");
	//$("#isbn10").val(isbn10);
//}
		return false;
	
});

$("#isbn13").keyup(function(){
	var isbn13 = $("#isbn13").val();
	var isbn10 = $("#isbn10").val();
	//if(isbn13.length==17){
	$.ajax({
			url: 'search_book',
			type: 'POST',
			dataType: 'json',
			data: {
				isbn: isbn13,
				
			},
			success: function(response){
				
				if(response.error === '1'){
					$("#book_id").val('');
					$("#publish")[0].reset();
					$("#description").text("");
					$("#isbn13").val(isbn13);
					$("#isbn10").val(isbn10);
				}else{
					$("#isbn10").val(response[0].isbn10);
					$("#book_name").val(response[0].book_name);
					$("#author").val(response[0].author);
					$("#publisher").val(response[0].publisher);
					$("#published_date").val(response[0].published_date);
					$("#language").val(response[0].language);
					
					$("#weight").val(response[0].weight);
					$("#category_id").val(response[0].category_id);
					
					$("#description").text(response[0].description);
					$("#image").text(response[1].path);
					$("#book_id").val(response[0].book_id);
				}
			},
			
		});
//}else{
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
	var category_id = $("#category_id").val();
	
	if(isbn10.length != 10){
		$("#popup").fadeIn(500);
		$("#popup").html('ISBN10 not valid.');
		return false;
	}
	if(isbn13.length != 13){
		$("#popup").fadeIn(500);
		$("#popup").html('ISBN13 not valid.');
		return false;
	}
	if(category_id == 'Please Choose...'){
		$("#popup").fadeIn(500);
		$("#popup").html('Category Not Selected.');
		return false;
	}
	var oData = new FormData(document.forms.namedItem("publish"));
	
    $.ajax({ 
        type: "POST",
        contentType:false,//attr( "enctype", "multipart/form-data" ),
        processData:false,
        url: 'publish', 
        data: oData, 
        success: function( data ) 
        { 
        	alert(data);
			if(data=='Book Successfully Added.'){
				$("#popup").fadeIn(500);
				$("#popup").html('Book Successfully Added.');
				$("#publish")[0].reset();
				$("#description").text("");
			}
			if(data =='Book already exists in your store'){
				$("#popup").fadeIn(500);
				$("#popup").html('Book already exists in your store.');
			}
			if(data == 'File Size Larger'){
				$("#popup").fadeIn(500);
				$("#popup").html('Large Image Size.');
			}
			if(data == 'Invalid File Type'){
				$("#popup").fadeIn(500);
				$("#popup").html('Invalid File Type.');
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