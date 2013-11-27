
<?php
    include("header-dash.php");
?>

    <!-- End: HEADER -->
    <!-- Start: MAIN CONTENT -->
    <div class="content content-dash">
      <!-- Start: container -->
        <div class="container">
          <div class="row-fluid">
            <div class="span3">
            <?php 
              include("sidebar-dash.php");
            ?>
            </div>
                <!-- start:section2 -->
                <div class="section2  span9">
                    <div class="page-header">
                  <h2>Search for: <?php echo $srch_txt;?></h2>
                </div>
                <div class="row-fluid sortby">
                  Sort By:
                  <select id="sort" style="width:150px;">
                              <option value="newest">Newest</option>
                              <option value="featured">Featured</option>
                              <option value="best_selling">Best Selling</option>
                              <option value="trending'">Trending</option>
                          </select>
                    <hr  />
                </div>
               <div id="search_list">
                  <?php
                    
                    $sz = sizeof($result[0]);
                    if($sz==0){
          
                    }else{
                      $sz = $sz-1;
                    }
                    $row = $sz/4;
                    $counter = 0;
                    $i = 0;
                    $j=0;
                    for($x=0;$x<=$row;$x++){
                        
                    ?>
                      <div class="row-fluid">
                        <ul class="thumbnails">
                        <?php 
                          $size = sizeof($result[0]);
                          
                          if($result[0] == array()){
                            echo 'No Books Available.';
                          }else{
                            while($i<$size){
                            $j++;
                            $counter++;
                            $img = $result[2][$i]['path'];
                
                            $alt = $result[2][$i]['alt'];
                          ?>
                      
                          <li class="span3">
                            <div class="thumbnail">
                              <img src="<?php echo $img;?>" alt="<?php echo $alt;?>">
                              <div class="caption">
                                <h3><?php echo $result[1][$i]['book_name'];?><!--<small>Pictures from another time</small>--></h3>
                                <p>By: <a href=""><?php echo $result[1][$i]['author'];?></a> <br /></p>
                                <p>Fourth Edition</p>
                                <!--<span class="rating">
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                    <span class="star"></span>
                                  </span>-->
                                <p><a href="">Reviews</a>(123)</p>
                                <p class="price">Price: <?php echo $result[0][$i]['price'];?></p>
                              </div>
                              <div class="widget-footer">
                                <p>

                                  <input type="hidden" id="book_id<?php echo $j?>" value="<?php echo $result[0][$i]['book_id'];?>">
                                  <input type="hidden" id="stock_id<?php echo $j?>" value="<?php echo $result[0][$i]['stock_id'];?>">
                                  <input type="hidden" id="store_id<?php echo $j?>" value="<?php echo $result[0][$i]['store'];?>">
                                  <a href="javascript:void(0)" class="thumb-btn" id="get_details" onClick="get_details(<?php echo $j?>);">Details</a>
                                  <a href="javascript:void(0)" class="thumb-btn" id="del_stock" onClick="del_stock(<?php echo $j?>);">Delete</a>
                                  <a href="javascript:void(0)" class="thumb-btn" id="update_stock" onClick="update_stock(<?php echo $j?>);">Update</a> 
                                </p>
                              </div>
                            </div>
                          </li>
                          <?php
                            $i++; 
                            if($counter==4){
                              $counter=0;
                              break;
                            }
          
                          }
                        }
                        ?>
                      </ul>
                    </div>
              
                    <?php
                      }
                    ?>

                  </div>
               <div style="clear:both;"></div>
               
                <!--<div class="pagination pagination-centered">
                <ul>
                  <li class="disabled">
                    <a href="#">&laquo;</a>
                  </li>
                  <li class="active">
                    <a href="#">1</a>
                  </li>
                  <li>
                    <a href="#" id="lol">2</a>
                  </li>
                  <li>
                    <a href="#">3</a>
                  </li>
                  <li>
                    <a href="#">4</a>
                  </li>
                  <li>
                    <a href="#">5</a>
                  </li>
                  <li>
                    <a href="#">6</a>
                  </li>
                  <li>
                    <a href="#">&raquo;</a>
                  </li>
                </ul>
          </div>-->
                </div>
                <!-- end:section2 -->
            </div>

        </div>
      <!-- End: container -->

    </div>
                    <!-- End: MAIN CONTENT -->
                    <!-- Start: FOOTER -->
    
    <!-- End: FOOTER -->

<input type="hidden" id="txt" value="<?php echo $srch_txt;?>">
<input type="hidden" id="page_name" value="search">
<input type="hidden" id="jsonarray" />
<a data-toggle="modal" href="#details" id="det" style="display:none;" class="thumb-btn">Details</a>
<a data-toggle="modal" href="#delete" id="del" style="display:none;" class="thumb-btn">Delete</a>
<a data-toggle="modal" href="#update" id="updt" style="display:none;" class="thumb-btn">Update</a>
<a data-toggle="modal" href="#success_event" id="success_display" style="display:none;" class="thumb-btn">Success Event</a>


<!-- moddal for details -->
<!-- <a data-toggle="modal" href="#details" class="btn btn-primary">Launch modal</a> -->
  <div class="modal fade" id="details" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
          <h4 class="modal-title" id="det_title"></h4>
        </div>
        <div class="modal-body" id="all_details">
         <p>this is test</p>
        </div>
        <div class="modal-footer">
         
          <button type="button" id="det_close" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>  <!-- END:moddal for details -->
  <!-- moddal for delete -->
<!-- <a data-toggle="modal" href="#delete" class="btn btn-primary">Launch modal</a> -->
  <div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
          <h4 class="modal-title" id="del_title"></h4>
        </div>
        <div class="modal-body">
        <input type="hidden" id="del_book_id" />
        <input type="hidden" id="del_stock_id" />
        <input type="hidden" id="del_store_id" />
          <p id="delete_msg">Are you sure you want to delete this book?</p>
        </div>
        <div class="modal-footer">
          <button type="button" id="del_item" class="btn btn-default" >Delete</button>
          <button type="button" id="cancel_delete" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>  <!-- END:moddal for delete -->
  <!-- moddal for update -->
<!-- <a data-toggle="modal" href="#update" class="btn btn-primary">Launch modal</a> -->
  <div class="modal fade" id="update" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
          <h4 class="modal-title">Update</h4>
        </div>
        <div id="updt_msg"></div>
        <div class="modal-body" style="display:none;" id="updt_form">
          <form action="" id="update_form" method="post">
              <legend>Kara Walker</legend>
              <label>Price *</label>
              <input type="text" id="price" name="price">
              <div class="confirm-msg" id="price_validate" style="display:none; width:43%; margin-top:0; padding-top:0;">
                          Invalid!
              </div>
              <span class="help-block"></span>
              
              <label>Delivery Cost Within City</label>
              <input type="text" id="delivery_cost_within_city" name="delivery_cost_within_city">
              
              <span class="help-block"></span>
              
              <label>Delivery Cost Outof City</label>
              <input type="text" id="delivery_cost_outof_city" name="delivery_cost_outof_city">
              
              <span class="help-block"></span>
              
              <label>Store Reference no. for book</label>
              <input type="text" id="store_ref" name="store_ref">
              
              <span class="help-block"></span>
              
              <label>Stock Quantity *</label>
              <input type="text" id="qty" name="qty">
              <div class="confirm-msg" id="qty_validate" style="display:none; width:43%; margin-top:0; padding-top:0;">
                         Invalid!
              </div>
              <span class="help-block"></span>
              
                <input type="hidden" name="book_id" id="updt_book_id" />
                <input type="hidden" name="stock_id" id="updt_stock_id" />
                <input type="hidden" name="store_id" id="updt_store_id" />
                  
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="update_details" >Update</button>
          <button type="button" class="btn btn-default" id="cancel_update" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>  <!-- END:moddal for update -->
  
  <!-- moddal for delete/update success -->
<!-- <a data-toggle="modal" href="#details" class="btn btn-primary">Launch modal</a> -->
  <div class="modal fade" id="success_event" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
          <h4 class="modal-title" id="success_title"></h4>
        </div>
        <div class="modal-body" id="success_msg">
         <p>this is test</p>
        </div>
        <div class="modal-footer">
          <button type="button" id="success_button" class="btn btn-default" onClick="success_final('search');" data-dismiss="modal" >OK</button>
          
        </div>
      </div>
    </div>
  </div>  <!-- END:moddal for delete/update success -->
  
<?php
include("footer-dash.php");
?>