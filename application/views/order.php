<?php 
    include("header-dash.php");//exit();
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
                            <div class="span8">
                                <p>Order No: <span><?php echo $order[0][$i]['order_id']?></span></p>
                                <p>Phone: <span><?php echo $order[1][$i]['phone'];?></span></p>
                                <p>E-mail: <span><?php echo $order[1][$i]['email'];?></span></p>
                                <p>Delivery Address: <span><?php echo $order[0][$i]['delivery_address'];?></span></p>
                                <h5>Books Order </h5>
                                <div class="row-fluid">
                                	<div class="span1 ">
                                		S.N.
                                	</div>
                                	<div class="span4 ">
                                		Name
                                	</div>
                                	<div class="span2 ">
                                		ISBN
                                	</div>
                                	<div class="span1 ">
                                		Qty
                                	</div>
                                	<div class="span2 ">
                                		Price
                                	</div>
                                	<div class="span2 ">
                                		Total
                                	</div>
                                </div>

                                <?php
                                	$rowsize = $order[2][$i];
                                	for($j=0;$j<sizeof($order[2][$i]);$j++){
                                		$total = $order[3][$i][$j]['price'] * $order[5][$x];
                                ?>
                                <div class="row-fluid">
                                	<div class="span1 ">
                                		<?php echo $j+1;?>
                                	</div>
                                	<div class="span4 ">
                                		<?php echo $order[2][$i][$j]['book_name'];?>
                                	</div>
                                	<div class="span2 ">
                                		<?php echo $order[2][$i][$j]['isbn10'];?>
                                	</div>
                                	<div class="span1 ">
                                		<?php echo $order[5][$x];?>
                                	</div>
                                	<div class="span2 ">
                                		<?php echo $order[3][$i][$j]['price'];?>
                                	</div>
                                	<div class="span2 ">
                                		<?php echo $total;?>
                                	</div>
                                </div>
                                <?php
									$x++;
									}
                                ?>

                            </div>
                            <div class="span2">
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