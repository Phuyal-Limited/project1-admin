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
	if(isbn10.length==13){
	$.ajax({
			url: 'search_book',
			type: 'POST',
			dataType: 'json',
			data: {
				isbn: isbn10,
				
			},
			success: function(response){
				
				if(response===''){
					
				}else{
					$("#isbn13").val(response[0].isbn13);
					$("#book_name").val(response[0].book_name);
					$("#authurs").val(response[0].authurs);
					$("#publisher").val(response[0].publisher);
					$("#published_date").val(response[0].published_date);
					$("#language").val(response[0].language);
					
					$("#weight").val(response[0].weight);
					$("#category_id").val(response[0].category_id);
					
					$("#description").text(response[0].description);
					$("#image").text(response[1].path);
				}
			},
			
		});
}else{
	$("#publish")[0].reset();
	$("#description").text("");
}
		return false;
	
});

$("#isbn13").keyup(function(){
	var isbn13 = $("#isbn13").val();
	if(isbn13.length==17){
	$.ajax({
			url: 'search_book',
			type: 'POST',
			dataType: 'json',
			data: {
				isbn: isbn13,
				
			},
			success: function(response){
				
				if(response===''){
					
				}else{
					$("#isbn10").val(response[0].isbn10);
					$("#book_name").val(response[0].book_name);
					$("#authurs").val(response[0].authurs);
					$("#publisher").val(response[0].publisher);
					$("#published_date").val(response[0].published_date);
					$("#language").val(response[0].language);
					
					$("#weight").val(response[0].weight);
					$("#category_id").val(response[0].category_id);
					
					$("#description").text(response[0].description);
					$("#image").text(response[1].path);
				}
			},
			
		});
}else{
	$("#publish")[0].reset();
	$("#description").text("");
}
		return false;
	
});


//publish book
$("#submit").click(function(event) {
	var oData = new FormData(document.forms.namedItem("publish"));
    $.ajax({ 
        type: "POST",
        contentType:false,//attr( "enctype", "multipart/form-data" ),
        processData:false,
        url: $('#publish').attr('action'), 
        data: oData, 
        success: function( data ) 
        { 
        	alert(data);
			if(data=='Successful!!'){alert('hey');}
		
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