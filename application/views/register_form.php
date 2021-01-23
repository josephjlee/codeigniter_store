<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shop</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
 <style>
	.container-contact2 {
	width: 100%;
	min-height: 100vh;
	display: -webkit-box;
	display: -webkit-flex;
	display: -moz-box;
	display: -ms-flexbox;
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
	padding: 15px;
}
</style>

</head>
<body>
<div class="container-contact2">
<div class="container">
	
	<div class="row">
		<div class="col-sm-4">
  <div style="margin-top:30px;"></div>
   <!--Login Form Start--> 
  <div class="row">
		<div class="col-sm-12 col-sm-offset-0">
			<div class="login-panel panel panel-primary">
		        <div class="panel-heading">
		            <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Login
		            </h3>
		        </div>
		    	<div class="panel-body">
		        	<form id="logForm">
		            	<fieldset>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Email" type="text" name="email">
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Password" type="password" name="password">
		                	</div>
		                	<button type="submit" class="btn btn-lg btn-primary btn-block"><span id="logText"></span></button>
		            	</fieldset>
		        	</form>
		    	</div>
		    </div>
			<div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
				<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
				<span id="message"></span>
			</div>	
		</div>
	</div>
 <!--Login Form Start--> 
 
 <div style="margin-top:30px;"></div>
 
 <!--Registration Form Start--> 
			<div class="login-panel panel panel-primary">
		        <div class="panel-heading">
		            <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Register
		            </h3>
		        </div>
		    	<div class="panel-body">
		        	<form id="regForm">
		            	<fieldset>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Email" type="text" name="email">
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Password" type="password" name="password">
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Full Name" type="text" name="fname">
		                	</div>
		                	<button type="submit" class="btn btn-lg btn-primary btn-block">Sign Up</button>
		            	</fieldset>
		        	</form>
		    	</div>
		    </div>
		    <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
				<button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>
				<span id="message"></span>
			</div>
  <!--Registration Form End-->
 
		</div>
		<div class="col-sm-8">
			<div class="col-sm-12 col-sm-offset-0"><h2><img src="<?php echo base_url()."images/intro2.jpg"?>" style="width:100%" /></h2></div>
		</div>
	</div>
</div>
</div>

 <!-- Script --> 
<script type="text/javascript">
	$(document).ready(function(){
		getTable();
 
		$('#regForm').submit(function(e){
			e.preventDefault();
			var url = '<?php echo base_url(); ?>';
			var reg = $('#regForm').serialize();
			$.ajax({
				type: 'POST',
				data: reg,
				dataType: 'json',
				url: url + 'index.php/user/register',
				success:function(response){
					$('#message').html(response.message);
					if(response.error){
						$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
					}
					else{
						$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
						$('#regForm')[0].reset();
						getTable();
					}
				}
			});
		});
 
		$(document).on('click', '#clearMsg', function(){
			$('#responseDiv').hide();
		});
 
	});
	function getTable(){
		var url = '<?php echo base_url(); ?>';
		$.ajax({
			type: 'POST',
			url: url + 'index.php/user/fetch',
			success:function(response){
				$('#tbody').html(response);
			}
		});
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#logText').html('Login');
		$('#logForm').submit(function(e){
			e.preventDefault();
			$('#logText').html('Checking...');
			var url = '<?php echo base_url(); ?>';
			var user = $('#logForm').serialize();
			var login = function(){
				$.ajax({
					type: 'POST',
					url: url + 'index.php/user/login',
					dataType: 'json',
					data: user,
					success:function(response){
						$('#message').html(response.message);
						$('#logText').html('Login');
						if(response.error){
							$('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
						}
						else{
							$('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
							$('#logForm')[0].reset();
							setTimeout(function(){
								location.reload();
							}, 1000);
						}
					}
				});
			};
			setTimeout(login, 1000);
		});
 
		$(document).on('click', '#clearMsg', function(){
			$('#responseDiv').hide();
		});
	});
</script>

</body>
</html>