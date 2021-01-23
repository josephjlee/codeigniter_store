<?php	$user = $this->session->userdata('user');extract($user);	$_SESSION['id'] = $id; ?>

<div class="container">
	<h1 class="page-header text-center"><?php echo 'Welcome to '.(($auth==1) ? 'Admin' : $fname).' Dashboard!'; ?></h1>
	<div class="row">
 <div class="well well-lg">
<h2 align="center">Add Product</h2>
 </div>
<div id="infoMessage"><?php echo $message;?></div>

<div class="col-md-8 col-md-offset-2">
<?php echo form_open_multipart("product/add");?>
	<table class="table table-bordered">
		<tr>
			<td align="right">Product Name: </td>
			<td><?php echo form_input($name);?></td>
		</tr>
		<tr>
			<td align="right">Price:</td>
			<td><?php echo form_input($price); ?></td>
		</tr>
  <tr>
			<td align="right">Color:</td>
			<td><?php echo form_input($color); ?></td>
		</tr>
		<tr>
			<td align="right">Picture (182x100):</td>
			<td><?php ///echo form_input($picture); ?><input type="file" id="profile_img" name="profile_img" size="33" /></td>
		</tr>
  <tr>
			<td align="right">Publish:</td>
			<td><?php 
			$publish = array('publish' => 'publish', 'inactive' => 'inactive');
			$batch = 'publish';
			echo form_dropdown('status', $publish, $batch); ?></td>
		</tr>
		<tr>
			<td align="right">&nbsp;</td>
			<td><?php echo form_submit('submit', 'Save',"class='btn btn-success'");?>
    <input type="button" name="btnBack" id="btnBack" value="Reset" class="btn btn-primary" onclick="this.form.reset();" />
				<input type="button" name="btnBack" id="btnBack" value="Back" class="btn btn-info" onclick="window.location.href='<?php echo base_url() ?>index.php/manage'" />   
   </td>
		</tr>
	</table>
<?php echo form_close(); ?>
</div>
</div>
</div>