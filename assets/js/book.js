// JavaScript Document

$(document).ready(function(){
	done();
	$("#sort").change(function(){
		var jsonarray = $("#jsonarray").val();
	});
	
});

function done(){
		book_table();
}
function book_table(){
	$("#display_list").html('');
	
	$.ajax({
			url: 'book_page',
			dataType: 'json',
			beforeSend: function(){
        	
        		$("#load").click();
        		$("#success_msg_button").hide();
        		$("#success_load p").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="150px" width="150px"><br />Loading');
        		
        	}, 
        	success: function( response ) 
        	{ 
				$("#success_msg_button").click();
				$("#jsonarray").val(response);
				//var r = response.informations.length;
				//var lth = response.length;
				var display = '';
				var sz = response[0].length;
				if(sz==0){
						display += '<p>No books in the store.</p>';
				}else{
					var rowsz = sz - 1;
					var divsz = Number(rowsz/4);
					var counter = 0;
					var x=0;
					var y=0;
					var i=0;
					
					for(x=0; x<=divsz; x++){
						
					display += '<div class="row-fluid"><ul class="thumbnails">';

					while(y<sz){
							i++;
							counter++;
						
					display +=	'<li class="span3">'+
	                      '<div class="thumbnail">'+
	                        '<img src="'+response[2][y].path+'" alt="'+response[2][y].alt+'" style="height:150px; width:150px;">'+
	                        '<div class="caption" style="height:175px;">'+
	                              '<h3 style="font-size:13px;">'+response[1][y].book_name+'</h3>'+
	                              '<p>By:<a href="">'+response[1][y].author+'</a> <br /></p>'+
	                              '<p>Fourth Edition</p>'+
	                              '<p>rating ****</p>'+
	                              '<p><a href="">Reviews</a>(123)</p>'+
	                              '<p class="price">Price: '+response[0][y].price+'</p>'+
	                            '</div>'+
	                        '<div class="widget-footer">'+
	                          '<p>'+
	                          '<input type="hidden" id="book_id'+i+'" value="'+response[1][y].book_id+'">'+
							  '<input type="hidden" id="stock_id'+i+'" value="'+response[0][y].stock_id+'">'+
							  '<input type="hidden" id="store_id'+i+'" value="'+response[0][y].store+'">'+
							  '<a href="javascript:void(0)" class="thumb-btn" id="get_details" onClick="get_details('+i+');">Details</a>&nbsp;'+
							  '<a href="javascript:void(0)" class="thumb-btn" id="del_stock" onClick="del_stock('+i+');">Delete</a>&nbsp;'+
							  '<a href="javascript:void(0)" class="thumb-btn" id="update_stock" onClick="update_stock('+i+');">Update</a>'+
	                            
	                          '</p>'+
	                        '</div>'+
	                      '</div>'+
	                    '</li>';
							y++;
							if(counter==4){
								counter=0;
								break;
							}
						}
						display += '</ul></div>';
						
					}
				}
					
				$("#display_list").append(display);
					
				
					
			}
		});
}


function search_page(srch_txt){
	var txt = srch_txt;
	$("#search_list").html('');
	
	$.ajax({
		
			url: 'search_page',
			type: 'post',
			dataType: 'json',
			data: {
				srch_txt: txt
			},
			beforeSend: function(){
        	
        		$("#load_page").click();
        		$("#success_msg_button").hide();
        		$("#success_load p").html('<img src="http://admin.nepalreads.com/assets/images/loading.gif" height="150px" width="150px"><br />Loading');
        		
        	}, 
        	success: function( response ) 
        	{ 
				$("#success_msg_button").click();
				$("#jsonarray").val(response);
				
				//var r = response.informations.length;
				//var lth = response.length;
				var display = '';
				var sz = response[0].length;
				if(sz==0){
						display += '<p>No books in the store.</p>';
				}else{
					var rowsz = sz - 1;
					var divsz = Number(rowsz/4);
					var counter = 0;
					var x=0;
					var y=0;
					var i=0;
					
					for(x=0; x<=divsz; x++){
						
					display += '<div class="row-fluid"><ul class="thumbnails">';

					while(y<sz){
							i++;
							counter++;
						
					display +=	'<li class="span3">'+
	                      '<div class="thumbnail">'+
	                        '<img src="'+response[2][y].path+'" alt="'+response[2][y].alt+'" style="height:150px; width:150px;">'+
	                        '<div class="caption" style="height:175px;">'+
	                              '<h3 style="font-size:13px;">'+response[1][y].book_name+' </h3>'+
	                              '<p>By:<a href="">'+response[1][y].author+'</a> <br /></p>'+
	                              '<p>Fourth Edition</p>'+
	                              '<p>rating ****</p>'+
	                              '<p><a href="">Reviews</a>(123)</p>'+
	                              '<p class="price">Price: '+response[0][y].price+'</p>'+
	                            '</div>'+
	                        '<div class="widget-footer">'+
	                          '<p>'+
	                          '<input type="hidden" id="book_id'+i+'" value="'+response[1][y].book_id+'">'+
							  '<input type="hidden" id="stock_id'+i+'" value="'+response[0][y].stock_id+'">'+
							  '<input type="hidden" id="store_id'+i+'" value="'+response[0][y].store+'">'+
							  '<a href="javascript:void(0)" class="thumb-btn" id="get_details" onClick="get_details('+i+');">Details</a>&nbsp;'+
							  '<a href="javascript:void(0)" class="thumb-btn" id="del_stock" onClick="del_stock('+i+');">Delete</a>&nbsp;'+
							  '<a href="javascript:void(0)" class="thumb-btn" id="update_stock" onClick="update_stock('+i+');">Update</a>'+
	                            
	                          '</p>'+
	                        '</div>'+
	                      '</div>'+
	                    '</li>';
							y++;
							if(counter==4){
								counter=0;
								break;
							}
						}
						display += '</ul></div>';
						
					}
				}
					
				$("#search_list").append(display);
					
				
					
			}
		});
}