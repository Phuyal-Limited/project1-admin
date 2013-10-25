$(document).ready(function(){
//admin login	 
$("#login").submit(function () {
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
			url: $('#login_form').attr('action'),
			type: 'POST',
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
	
	$.ajax({
			url: 'search_book',
			type: 'POST',
			data: {
				isbn: isbn10,
				
			},
			success: function(response){
				
				
				if(response===''){
					
				}else{
					alert(response);
					$.getJSON(response,function(result){
      $.each(result, function(i, field){
        alert(field);
      });
    });
				}
			},
			
		});
		return false;
	
});

$("#isbn13").keyup(function(){
	var isbn13 = $("#isbn13").val();
	
	$.ajax({
			url: 'search_book',
			type: 'POST',
			data: {
				isbn: isbn13,
				
			},
			success: function(response){
				
				
				if(response===''){
					
				}else{
					alert(response);
				}
			},
			
		});
		return false;
});	
});