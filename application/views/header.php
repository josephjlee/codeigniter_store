<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Shop</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
 <script src="<?php echo base_url(); ?>jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
<style>
/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #000;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none; border-bottom: 1px solid;
}

/* On mouse-over */
.sidenav a:hover {
  color: #e1e1e1;
		background:#c46158;
		border:none;border: 1px solid #c46158;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}
/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

#infoMessage p{
	padding: .8em;
	margin-bottom: 1em;
	border: 2px solid #ddd;
	background: #FFF6BF;
	color: #817134;
	border-color: #FFD324;
	text-align: center;
}
</style>
</head>
<body>
<?php
				$user = $this->session->userdata('user');
				extract($user);
				$_SESSION['id'] = $id; 
				$_SESSION['auth'] = $auth;
?><div class="sidenav">
<div align="center"><h2><img src="<?php echo base_url()."images/logo.png"?>" style="width:100%" /></h2>
 <?php echo (($auth==1) ? '<a href="'. base_url(). 'index.php/user/home">All User List</a>' : '<a href="'. base_url(). 'index.php/user/home">My Profile</a>'); ?> 
  <a href="<?php echo base_url(); ?>index.php/manage">Product List</a>
  <a href="<?php echo base_url(); ?>index.php/user/logout">Logout</a>
</div></div>