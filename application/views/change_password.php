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
                <section id="main" style="width:95%;" class="column">
    
                    <div class="clear"></div>
                    <article class="module custom-width">
                      <header style="text-align:center;"><h3>Change Password</h3></header>
                        <div class="module_content">
                        <form method="post" id="publish" name="publish">
                        <fieldset style="width:75%; display: block; margin-left:auto; margin-right: auto;"> 
                          <label>Old Password<div style="color:green;"><i class="fa fa-check"></i></div><span style="float:right; margin-right:5px;"></span></label>
                          <input type="text"  placeholder="Old Password" style="width:93%;">
                        </fieldset><div class="clear"></div>
                        <fieldset style="width:75%; display: block; margin-left:auto; margin-right: auto;">
                          <label>New Password<span style="float:right; margin-right:5px;" ></span></label>
                          <input type="text" placeholder="New Password" style="width:93%;">
                        </fieldset><div class="clear"></div>
                        <fieldset style="width:75%; display: block; margin-left:auto; margin-right: auto;">
                          <label>Rewrite Password<span style="float:right; margin-right:5px;" ></span></label>
                          <input type="text"  placeholder="Rewrite Password" style="width:93%;">
                        </fieldset><div class="clear"></div>
                       </form>
                        </div>
                      <footer>
                      <span class="confirm-msg" id="msg" style="display:none; width:43%; margin-top:0; padding-top:0; margin-left:370px; padding:10px;"></span>
                        <div class="submit_link">
                          <input type="submit"  value="Change" id="change-password" name="change" class="btn btn-default" />
                          <input type="button" value="Reset" id="reset-password" class="btn btn-default" />
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