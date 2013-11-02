// JavaScript Document

$(document).ready(function(){
	done();
	
});

function done(){
		book_table();
}
function book_table(){
	//$("#test").html('');
	
	$.ajax({
			url: 'book_page',
			dataType: 'json',
			success: function(response){

				//var r = response.informations.length;
				//var lth = response.length;
				var sz = response[0].length;
				var rowsz = sz - 1;
				var divsz = Number(rowsz/4);
				var counter = 0;
				var x=0;
				var y=0;
				var i=0;
				for(x=0; x<=divsz; x++){
					$("#display_list").append('<div class="row-fluid"><ul class="thumbnails">');
					while(y<sz){
						i++;
						counter++;
					$("#display_list").append('<li class="span3">'+
                      '<div class="thumbnail">'+
                        '<img src="'+response[2][y].path+'" alt="'+response[2][y].alt+'" style="height:150px; width:150px;">'+
                        '<div class="caption">'+
                              '<h3>'+response[1][y].book_name+' <small>Pictures from another time</small></h3>'+
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
						  '<a href="#" class="thumb-btn" id="get_details" onClick="get_details('+i+');">Details</a>&nbsp;'+
						  '<a href="#" class="thumb-btn" id="del_stock" onClick="del_stock('+i+');">Delete</a>&nbsp;'+
						  '<a href="#" class="thumb-btn" id="update_stock" onClick="update_stock('+i+');">Update</a>'+
                            '<a data-toggle="modal" href="#details" id="det" style="display:none;" class="thumb-btn">Details</a>'+
                            '<a data-toggle="modal" href="#delete" id="del" style="display:none;" class="thumb-btn">Delete</a>'+
                            '<a data-toggle="modal" href="#update" id="updt" style="display:none;" class="thumb-btn">Update</a>'+
							'<a data-toggle="modal" href="#success_event" id="success_display" style="display:none;" class="thumb-btn">Success Event</a>'+
                          '</p>'+
                        '</div>'+
                      '</div>'+
                    '</li>');
						y++;
						if(counter==4){
							counter = 0;
							break;
						}
						$("#display_list").append('</ul></div>');
					}
					
				}
				
                   
			}
		});
}