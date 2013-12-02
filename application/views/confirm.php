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
                
                    <div class="row-fluid">
                      <div class="span12">
                        <div class="alert alert-success add-success">
                          A new book <span> <?php echo $details[1]['book_name']?> </span> has been added sucessfully.
                        </div>
                      </div>
                    </div>
                    <div class="row-fluid new-book-image">
                      <div class="span4"></div>
                      <div class="span4">
                          <div class="thumbnail" >
                            <img src="<?php echo $details[2]['path'];?>" alt="<?php echo $details[2]['alt']?>">
                            <div class="new-book-caption">
                              <p><a href=""><?php echo $details[1]['book_name']?></a> </p>
                            </div>
                          </div>
                      </div>
                      <div class="span4"></div>
                    </div>
                    <div class="row-fluid new-book-details">
                      <div class="details-head">
                        <p>Details:</p>
                      </div>
                      <div class="details-body">
                        <p>ISBN 10: <?php echo $details[1]['isbn10'];?></p>
                        <p>ISBN 13: <?php echo $details[1]['isbn13'];?></p>
                        <p>Author: <?php echo $details[1]['author'];?></p>
                        <p>Publisher: <?php echo $details[1]['publisher'];?></p>
                        <p>Language: <?php echo $details[1]['language'];?></p>
                        <p>Category: <?php echo $details[3];?></p>
                        <p>Price: <?php echo $details[0]['price'];?></p>
                        <p>Delivery Cost within City: <?php echo $details[0]['delivery_cost_within_city'];?></p>
                        <p>Delivery Cost outof City: <?php echo $details[0]['delivery_cost_outof_city'];?></p>
                        <p>Description:</br>
                        <?php echo $details[1]['description'];?></p>
                      </div>
                    </div>
                    <button id="add_new_book" class="btn">+Add New Book</button>                    
                          
                <!-- end:section2 -->
            </div>
        </div>
      <!-- End: container -->
    </div>
    
    <!-- End: FOOTER -->
    <?php  
      include("footer-dash.php");
    ?>