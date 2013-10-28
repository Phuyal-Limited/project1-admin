<?php  
	include("header.php");
	include("sidebar.php");
?>

 
	<section id="main" class="column">
		
		<div class="clear"></div>
		<article class="module width_full">
			<header><h3>All Books</h3></header>
				<div class="books">
					<ul class="thumbnails">
                        <li class="">
                          <div class="thumbnail">
                            <img src="<?php echo base_url('assets/images/book_image/2.jpg');?>" alt="Wara Walker">
                            <div class="caption">
                              <h3>Kara Walker <small>Pictures from another time</small></h3>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p>Fourth Edition</p>
                              <span class="rating">
                                  <span class="star"></span>
                                  <span class="star"></span>
                                  <span class="star"></span>
                                  <span class="star"></span>
                                  <span class="star"></span>
                                </span>
                              <p><a href="">Reviews</a>(123)</p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="product.php" class="btn">Read more</a>
                          </p>
                        </div>
                      </div>
                    </li>
                    <li class="">
                          <div class="thumbnail">
                            <img src="<?php echo base_url('assets/images/book_image/2.jpg');?>" alt="Wara Walker">
                            <div class="caption">
                              <h3>Kara Walker <small>Pictures from another time</small></h3>
                              <p>By:<a href="">Bidur Subedi</a> <br /></p>
                              <p>Fourth Edition</p>
                              <span class="rating">
                                  <span class="star"></span>
                                  <span class="star"></span>
                                  <span class="star"></span>
                                  <span class="star"></span>
                                  <span class="star"></span>
                                </span>
                              <p><a href="">Reviews</a>(123)</p>
                              <p class="price">$10.23</p>
                            </div>
                            <div class="widget-footer">
                          <p>
                            <a href="product.php" class="btn">Read more</a>
                          </p>
                        </div>
                      </div>
                    </li>
                </ul>
				</div>
			
		</article><!-- end of post new book entry -->
		
		<div class="spacer"></div>
	</section>


<?php  
	include("footer.php");
?>