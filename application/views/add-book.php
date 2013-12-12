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
                <section id="main" class="column">
    
                    <div class="clear"></div>
                    <article class="module width_full">
                      <header><h3>Publish a Book</h3></header>
                        <div class="module_content">
                            <form action="<?php echo base_url();?>publish" method="post" id="publish" name="publish">
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                          <label>ISBN 10 *<div style="color:green;"><i class="fa fa-check"></i></div><span style="float:right; margin-right:5px;" id="load_isbn10"></span></label>
                          <input type="text" name="isbn10" id="isbn10" placeholder="0123456789" style="width:89%;">
                        </fieldset>
                                    <fieldset style="width:48%; float:left;">
                          <label>ISBN 13 *<span style="float:right; margin-right:5px;" id="load_isbn13"></span></label>
                          <input type="text" name="isbn13" id="isbn13" placeholder="978-1413304541" style="width:89%;">
                        </fieldset><div class="clear"></div>
                          <fieldset style="width:99%;">
                          <label>Book Title *</label>
                          <input type="text" name="book_name" id="book_name" style="width:95%;">
                        </fieldset>
                        <fieldset style="width:48%; float:left; margin-right: 3%;">
                          <label>Author *</label>
                          <input type="text" name="author" id="author" style="width:89%;">
                        </fieldset>
                        <fieldset style="width:48%; float:left;">
                          <label>Publisher *</label>
                          <input type="text" name="publisher" id="publisher" style="width:89%;">
                        </fieldset>
                        <fieldset style="width:48%; float:left; margin-right: 3%;">
                          <label>Year Of Publication (A.D) * </label>
                          <select name="published_date" id="published_date" style="width:89%">
                            <option value="Please Choose..">Please Choose..</option>
                            <?php 
                              for($x=1910;$x<2014;$x++){
                            ?>
                              <option value="<?php echo $x;?>"><?php echo $x;?></option>
                            <?php   
                              }
                            ?>
                          </select>
                        </fieldset>
                        <fieldset style="width:48%; float:left;">
                          <label>Edition *</label>
                          <input type="text" name="edition" id="edition" style="width:89%;">
                        </fieldset>
                        <div class="clear"></div>
                        <fieldset style="width:48%; float:left; margin-right: 3%;">
                          <label>Language *</label>
                          <input type="text" name="language" id="language" style="width:89%;">
                        </fieldset>
                        <fieldset style="width:48%; float:left;"> 
                          <label>Price *</label>
                          <input type="text" name="price" id="price" style="width:89%;">
                        </fieldset>
                        <div class="clear"></div>
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                          <label>Weight</label>
                          <input type="text" name="weight" id="weight" style="width:89%;">
                        </fieldset>      
                        <fieldset style="width:48%; float:left;"> 
                          <label>Category *</label>
                          <div class="category-add">
                            <select name="category_id" id="category_id" style="width:89% !important;" class="multiselect" multiple="multiple">
                            <?php 
                              for($i=0;$i<sizeof($category[0]);$i++){
                            ?>
                                            <option value="<?php echo $category[0][$i]->category_id;?>"><?php echo $category[0][$i]->name;?></option>
                                            <?php   
                              }
                            ?>
                          </select>
                          </div>
                        </fieldset>
                        <div class="clear"></div>
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
                          <label>Delivery Cost Within City</label>
                          <input type="text" name="delivery_cost_within_city" id="delivery_cost_within_city" style="width:89%;">
                        </fieldset>
                        <fieldset style="width:48%; float:left;"> 
                          <label>Delivery Cost Out Of City</label>
                          <input type="text" name="delivery_cost_outof_city" id="delivery_cost_outof_city" style="width:89%;">
                        </fieldset>
                        <div class="clear"></div>
                        <fieldset style="width:48%; float:right;"> 
                          <label>Store Item Reference</label>
                          <input type="text" name="store_ref" id="store_ref" style="width:89%;">
                        </fieldset>
                        <fieldset style="width:48%; float:left;"> 
                          <label>Image</label>&nbsp;
                          <input type="file" name="image" id="image"  onChange="readURL(this);" style="width:89%;">
                          <div id="image_set"><div>
                          <br /><img  style="display:none;" id="img_prev" src="#" alt="Image Preview" />
                                  </fieldset>
                                    <fieldset style="width:48%; float:right;"> 
                          <label>Quantity *</label>
                          <input type="text" name="qty" id="qty" style="width:89%;" />
                        </fieldset>
                                    <div class="clear"></div>
                                    <fieldset>
                          <label>Description *</label>
                          <textarea name="description" id="description" rows="12"></textarea>
                        </fieldset>
                        <input type="hidden" name="book_id" id="book_id" >
                        <input type="hidden" name="all_category" id="all_category" >
                        <input type="hidden" name="isbn_check" id="isbn_check" value="0" />
                       </form>
                        </div>
                      <footer>
                      	<span class="confirm-msg" id="msg" style="display:none; width:43%; margin-top:0; padding-top:0; margin-left:370px; padding:10px;"></span>
                        <div class="submit_link">
                          <span id="publish_load"></span>
                          <input type="button" onClick="form_validate();" id="validate_check" value="Publish" class="alt_btn btn btn-small search-btn" />
                          <input style="display:none;" type="submit" id="submit" value="Publish" class="alt_btn" />
                          <input type="submit" value="Reset" id="reset" class="btn btn-small search-btn" />
                        </div>
                      </footer>
                    </article><!-- end of post new book entry -->
                    
                    <div class="spacer"></div>
                  </section>
                            </div></div>
                <!-- end:section2 -->
            </div>
        </div>
      <!-- End: container -->
    </div>
    
    <!-- End: FOOTER -->
    <?php  
      include("footer-dash.php");
    ?>