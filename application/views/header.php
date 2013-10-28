<?php
if(!isset($this->session->userdata['user_id']) && !isset($this->session->userdata['access_right']) && !isset($this->session->userdata['profile_id'])){
	
			redirect('index');
		}
        ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title><?php echo $title;?></title>
	
	<link rel="stylesheet" href="<?php echo base_url('assets/css/layout.css');?>" type="text/css" media="screen" />
	<script src="<?php echo base_url('assets/js/jquery.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/hideshow.js');?>" type="text/javascript"></script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title" id="dashboard-title"><a href="">Dashboard</a></h1>
			<h2 class="section_title"id="logo-back"><a href="dashboard">Nepal <span>Reads</a></span></h2><div class="btn_view_site"><a href="index.php">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Bibek KC (<a href="#">3 Messages</a>)</p>
			<a class="logout_user" href="#" title="Logout">Logout</a>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">Nepal Reads</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section>