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
                        <div class="confirm-msg">
                          <p>  A new book <span> Kara Walker </span> has been added sucessfully. </p>
                        </div>
                      </div>
                    </div>
                    <div class="row-fluid new-book-image">
                      <div class="span4"></div>
                      <div class="span4">
                          <div class="thumbnail" >
                            <img src="<?php echo base_url('assets/images/placeholder-260x150.jpg');?>" alt="Wara Walker">
                            <div class="new-book-caption">
                              <p><a href="">Kara Walker</a> </p>
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
                        <p>ISBN 10:</p>
                        <p>ISBN 13:</p>
                        <p>Book Title</p>
                        <p>Authur:</p>
                      </div>
                    </div>
                    <button class="btn">Add New Book</button>                    
                          
                <!-- end:section2 -->
            </div>
        </div>
      <!-- End: container -->
    </div>
    
    <!-- End: FOOTER -->
    <?php  
      include("footer-dash.php");
    ?>