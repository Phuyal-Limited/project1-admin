
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
                <div class="row-fluid content-border">
                  <h3>Order</h3>
                        <hr class="footer-divider" />
                        <!-- <div class="row-fluid">
                          <div class="widget-footer">
                              <p>
                                <a class="thumb-btn">Compose</a>
                                <a class="thumb-btn">Delete</a>
                              </p>
                          </div>
                      
                        </div> -->
                  
                        <?php
                        	$size = sizeof($order[0]);
                        	$x=0;
                        	if($size==0){
                        		echo 'No Orders.';
                        	}else{
			                   	for($i=0;$i<$size;$i++){
                        ?>
                        <div class="message">
                          <div class="row-fluid">
                            <div class="span2">
                                <p class="date"><a href=""><?php echo $order[1][$i]['name'];?> </a></p>
                            </div>
                            <div class="span9">
                                <p>Order No: <span>1</span></p>
                                <p>Order No: <span>1</span></p>
                                <p>Order No: <span>1</span></p>
                                <p>Order No: <span>1</span></p>
                                <h5>Books Order </h5>
                                <div class="row-fluid">
                                	<div class="span1 kale">
                                		S.N.
                                	</div>
                                	<div class="span2 kale">
                                		Name
                                	</div>
                                	<div class="span2 kale">
                                		ISBN
                                	</div>
                                	<div class="span1 kale">
                                		Qty
                                	</div>
                                	<div class="span2 kale">
                                		Price
                                	</div>
                                	<div class="span2 kale">
                                		Total
                                	</div>
                                </div>

                                <?php
                                	for($j=0;$j<sizeof($order[2][$i];$i++;)){
                                		$total = $order[3][$i][$j]['price'] * $order[5][$x];
                                ?>
                                <div class="row-fluid">
                                	<div class="span1 kale">
                                		<?php echo $j;?>
                                	</div>
                                	<div class="span2 kale">
                                		<?php echo $order[2][$i][$j]['book_name'];?>
                                	</div>
                                	<div class="span2 kale">
                                		<?php echo $order[2][$i][$j]['isbn10'];?>
                                	</div>
                                	<div class="span1 kale">
                                		<?php echo $order[5][$x];?>
                                	</div>
                                	<div class="span2 kale">
                                		<?php echo $order[3][$i][$j]['price'];?>
                                	</div>
                                	<div class="span2 kale">
                                		<?php echo $total;?>
                                	</div>
                                </div>
                                <?php
									$x++;
									}
                                ?>

                            </div>
                            <div class="span1">
                              <p><?php echo $order[4][$i];?></p>
                            </div>
                          </div>
                        </div> 
                     <?php
                     	}
                     }

                     ?>
                      
                    </div>
                </div>
                
            </div>
                <!-- end:section2 -->
            </div>
        </div>
      <!-- End: container -->
    </div>
    
    <!-- End: FOOTER -->
    <?php  
      include("footer-dash.php");
    ?>