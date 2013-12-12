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
                        <?php
                          if(isset($success)){
                            echo "<div id='success-msg' class='message-show'>";
                            if($success){
                              echo "<div class='alert alert-success'>$message</div>";
                            }else{
                              echo "<div class='alert alert-danger'>$message</div>";
                            }
                            echo "</div>";
                          }
                        ?>
                        <div class="alert alert-danger" id="validate-msg" style="display:none;"></div>
                        <form method="post" action="" name="password-form" id="password-form" onsubmit="return validate_password();">
                        <fieldset style="width:75%; display: block; margin-left:auto; margin-right: auto;"> 
                          <label>Old Password<div style="color:green;"><i class="fa fa-check"></i></div><span style="float:right; margin-right:5px;"></span></label>
                          <input type="password" name="old_password" id="old" placeholder="Old Password" style="width:93%; margin-left: 13px;">
                        </fieldset><div class="clear"></div>
                        <fieldset style="width:75%; display: block; margin-left:auto; margin-right: auto;">
                          <label>New Password<span style="float:right; margin-right:5px;" ></span></label>
                          <input type="password" name="new_password" id="new" placeholder="New Password" style="width:93%; margin-left: 13px;">
                        </fieldset><div class="clear"></div>
                        <fieldset style="width:75%; display: block; margin-left:auto; margin-right: auto;">
                          <label>Confirm Password<span style="float:right; margin-right:5px;" ></span></label>
                          <input type="password" name="confirm" id="repass"  placeholder="Confirm Password" style="width:93%; margin-left: 13px;">
                        </fieldset><div class="clear"></div>
                       
                        </div>
                      <footer>
                      
                        <span class="confirm-msg" id="validate-msg" style="display:none; width:43%; margin-top:0; padding-top:0; margin-left: 110px; font-size: 14px; padding:10px;"></span>

                      
                        <div class="submit_link">
                          <input type="submit"  value="Change" id="change-password" name="change" class="btn btn-default" />
                          <input type="button" value="Reset" id="reset-password" onclick="reset_form();" class="btn btn-default" />
                        </div>
                      </footer>
                      </form>
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