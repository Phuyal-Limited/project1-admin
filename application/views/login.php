<?php 

if(isset($this->session->userdata['user_id']) && isset($this->session->userdata['access_right']) && isset($this->session->userdata['profile_id'])){
	
	redirect('dashboard');
}
?>
<html>
<head>
	<title><?php echo $title;?></title>
	<link href="<?php echo base_url('assets/css/login.css');?>" rel="stylesheet" media="screen">
</head>
<body>
	<div class="login-main">
		<div id="logo">
			<img src="<?php echo base_url('assets/images/logo.png')?>">
			<!-- Nepal reads -->
		</div>
		<div class="login-form">
			<form name="login" id="login_form" method="POST" action="<?php echo base_url();?>login_entry" >
				<div id="username">
					<label>Username: </label></br>
					<input type="text" name="user"  id="user" class="text-box" /></br>
				</div>
				<div id="password">
					<label>Password:</label> </br>
					<input type="password" name="pass"  id="pass" class="text-box" /></br>
				</div><br />
				<div id="msg"></div>

				<div id="button">
					<input type="submit" value="Login" id="submit-button"><span id="load"></span>
				</div>
				<div id="forget">
					<p><a href="#">Forget Password?</a>
						or
						<a href="#">Contact Us.</a>
					</p>
				</div>
			</form>
		</div>
	</div>
	<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
 <script src="<?php echo base_url('assets/js/jq.js');?>"></script>
</body>
</html>