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
			<h2 class="section_title"id="logo-back"><a href="index.php">Nepal <span>Reads</a></span></h2><div class="btn_view_site"><a href="index.php">View Site</a></div>
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
	</section><!-- end of secondary bar -->

	<aside id="sidebar" class="column">
		<form class="quick_search" name="search">
			<input type="text"  placeholder="Quick Search">
		</form>
		<hr/>
		<h3>lorem</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_edit_article"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_categories"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_tags"><a href="#">Lorem Ipsum</a></li>
		</ul>
		<h3>lorem</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_view_users"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_profile"><a href="#">Lorem Ipsum</a></li>
		</ul>
		<h3>lorem</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_photo"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_audio"><a href="#">Lorem Ipsum</a></li>
			<li class="icn_video"><a href="#">Lorem Ipsum</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="#">Options</a></li>
			<li class="icn_security"><a href="#">Security</a></li>
			<li class="icn_jump_back"><a href="logout">Logout</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2013 Nepal Reads</strong></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<div class="clear"></div>
		<article class="module width_full">
			<header><h3>Publish a Book</h3></header>
				<div class="module_content">
						<form action="<?php echo base_url();?>publish" method="post" id="publish" name="publish">
                        <fieldset style="width:48%; float:left; margin-right: 3%;"> 
							<label>ISBN 10 *</label>
							<input type="text" name="isbn10" id="isbn10" style="width:92%;">
						</fieldset>
                        <fieldset style="width:48%; float:left;">
							<label>ISBN 13 *</label>
							<input type="text" name="isbn13" id="isbn13" tyle="width:92%;">
						</fieldset><div class="clear"></div>
                        <fieldset>
							<label>Book Title *</label>
							<input type="text" name="book_name" id="book_name">
						</fieldset>
						
						
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Author *</label>
							<input type="text" name="author" id="author" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Publisher *</label>
							<input type="text" name="publisher" id="publisher" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Year Of Publication *</label>
							<input type="text" name="published_date" id="published_date" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Language *</label>
							<input type="text" name="language" id="language" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;"> 
							<label>Price *</label>
							<input type="text" name="price" id="price" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left;"> 
							<label>Weight</label>
							<input type="text" name="weight" id="weight" style="width:92%;">
						</fieldset><div class="clear"></div>
                        
                        
						<fieldset style="width:48%; float:left; margin-right: 3%;"> 
							<label>Category *</label>
							<select name="category_id" id="category_id" style="width:92%;">
								<option value="Please Choose...">Please Choose...</option>
								<?php 
									for($i=0;$i<sizeof($category);$i++){
								?>
                                <option value="<?php echo $category[$i]->category_id;?>"><?php echo $category[$i]->name;?></option>
                                <?php		
									}
								?>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;"> 
							<label>Delivery Cost Within City</label>
							<input type="text" name="delivery_cost_within_city" id="delivery_cost_within_city" style="width:92%;">
						</fieldset><div class="clear"></div>
                        <div id="popup" style="background-color:green; display:none; width:48%; margin-left:25%; height:90px; color:white; z-index:100; text-align:center; vertical-align:middle; font-size:36px;"></div>
                        <div class="clear"></div>
                        <fieldset style="width:48%; float:left;"> 
							<label>Delivery Cost Out Of City</label>
							<input type="text" name="delivery_cost_outof_city" id="delivery_cost_outof_city" style="width:92%;">
						</fieldset>
                        <fieldset style="width:48%; float:right;"> 
							<label>Store Item Reference</label>
							<input type="text" name="store_ref" id="store_ref" style="width:92%;">
						</fieldset><div class="clear"></div>
						<fieldset style="width:48%; float:left;"> 
							<label>Image</label>&nbsp;
							<input type="file" name="image" id="image" onChange="readURL(this);" style="width:92%;">
							<br /><img  style="display:none;" id="img_prev" src="#" alt="Image Preview" />
                   		</fieldset>
                        <fieldset style="width:48%; float:right;"> 
							<label>Quantity *</label>
							<input type="text" name="qty" id="qty" style="width:92%;">
						</fieldset>
                        <div class="clear"></div>
                        <fieldset>
							<label>Description *</label>
							<textarea name="description" id="description" rows="12"></textarea>
						</fieldset>
						<input type="hidden" name="book_id" id="book_id" >
                       </form>
				</div>
			<footer>
				<div class="submit_link">
					
					<input type="submit" id="submit" value="Publish" class="alt_btn">
					<input type="submit" value="Reset" id="reset">
				</div>
			</footer>
		</article><!-- end of post new book entry -->
		
		<div class="spacer"></div>
	</section>

<script src="<?php echo base_url('assets/js/jq.js');?>" type="text/javascript"></script>
</body>

</html>