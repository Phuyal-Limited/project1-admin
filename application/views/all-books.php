
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
                  <h2>All Books</h2>
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
               <div id="display_list"></div>
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




<!-- moddal for details -->
<!-- <a data-toggle="modal" href="#details" class="btn btn-primary">Launch modal</a> -->
  <div class="modal fade" id="details" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
          <h4 class="modal-title" id="det_title">Kara Walker</h4>
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
          <h4 class="modal-title" id="del_title">Kara Walker</h4>
        </div>
        <div class="modal-body">
        <input type="hidden" id="del_book_id" />
        <input type="hidden" id="del_stock_id" />
        <input type="hidden" id="del_store_id" />
          Are you sure you want to delete this book.
        </div>
        <div class="modal-footer">
          <button type="button" id="del_item" class="btn btn-default" data-dismiss="modal">Delete</button>
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
        <div class="modal-body">
          <form action="" id="update_form" method="post">
              <legend>Kara Walker</legend>
              <label>Price</label>
              <input type="text" id="price" name="price">
              
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
              
              <label>Stock Quantity</label>
              <input type="text" id="qty" name="qty">
              
              <span class="help-block"></span>
              
                <input type="hidden" name="book_id" id="updt_book_id" />
                <input type="hidden" name="stock_id" id="updt_stock_id" />
                <input type="hidden" name="store_id" id="updt_store_id" />
                  
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="update_details" data-dismiss="modal">Update</button>
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
          <h4 class="modal-title" id="success_title">Kara Walker</h4>
        </div>
        <div class="modal-body" id="success_msg">
         <p>this is test</p>
        </div>
        <div class="modal-footer">
          <button type="button" id="success_button" class="btn btn-default" onClick="success_final();" data-dismiss="modal" >OK</button>
          
        </div>
      </div>
    </div>
  </div>  <!-- END:moddal for delete/update success -->
    
