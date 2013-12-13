
<?php 
if(!isset($this->session->userdata['user_id']) && !isset($this->session->userdata['access_right']) && !isset($this->session->userdata['profile_id'])){
  
      redirect('login');
    }

    $bread = explode(' | ', $title);
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootbusiness | Short description about company">
    <meta name="author" content="Your name">
    <title><?php echo $title;?></title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-multiselect.css');?>" rel="stylesheet">
    <!-- Bootstrap responsive -->
    <link href="<?php echo base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet">
    <!-- Bootbusiness theme -->
    <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/layout.css');?>" rel="stylesheet">
    	
  </head>
  <body>
    <!-- Start: HEADER -->

    <div class="header" style="background-color:#3c757d;">
      <div class="container">
        <div class="row-fluid" >
            <div class="span3 dash-head" >
              <h3><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></h3>
            </div>
            <div class="span7 logo" >
              <a href="<?php echo base_url(); ?>dashboard"><img src="<?php echo base_url('assets/images/logo.png');?>"></a>
            </div>
            
        </div>
       </div>
    </div>
    <div class="second-header" style="border-bottom:1px solid #b8b9b9;">
       <div class="container">
        <div class="row-fluid">
            <div class="span3" >
                <div class="user">
                  <p><?php echo $category[1][0]->name;?> (<a href="#">3 Messages</a>)</p>
                </div>
            </div>
            <div class="span9" >
              <div class="breadcrumbs_container">
                <article class="breadcrumbs"><a href="<?php echo base_url(); ?>dashboard">Nepal Reads</a> <div class="breadcrumb_divider"></div> <a class="current"><?php echo $bread[0]; ?></a></article>
              </div>
            </div>
        </div>

      </div>

    </div>