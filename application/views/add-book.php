<?php  
	include("header.php");
	include("sidebar.php");
?>

 
	<section id="main" class="column">
		
		<div class="clear"></div>
		<article class="module width_full">
			<header><h3>Publish a Book</h3></header>
				<div class="module_content">
						<fieldset>
							<label>Book Title</label>
							<input type="text">
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;"> 
							<label>ISBN Number</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Authur</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Publisher</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Year Of Publication</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>language</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left;">
							<label>Marked Price</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left; margin-right: 3%;"> 
							<label>Discounts</label>
							<input type="text" style="width:92%;">
						</fieldset>
						<fieldset style="width:48%; float:left;"> 
							<label>Tags</label>
							<input type="text" style="width:92%;">
						</fieldset><div class="clear"></div>
						<fieldset style="width:48%; float:left; margin-right: 3%;"> 
							<label>Category</label>
							<select style="width:92%;">
								<option>Computers</option>
								<option>Business</option>
								<option>History</option>
								<option>Religion</option>
								<option>History</option>
								<option>Health & fitness</option>
								<option>Science</option>
								<option>Fiction</option>
								<option>Non-fiction</option>
							</select>
						</fieldset>
						<fieldset style="width:48%; float:left;"> 
							<label>Tags</label>
							<input type="text" style="width:92%;">
						</fieldset><div class="clear"></div>
						<fieldset>
							<label>Description</label>
							<textarea rows="12"></textarea>
						</fieldset>
				</div>
			<footer>
				<div class="submit_link">
					<select>
						<option>Draft</option>
						<option>Published</option>
					</select>
					<input type="submit" value="Publish" class="alt_btn">
					<input type="submit" value="Reset">
				</div>
			</footer>
		</article><!-- end of post new book entry -->
		
		<div class="spacer"></div>
	</section>


<?php  
	include("footer.php");
?>