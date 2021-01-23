<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Shop</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<h1 class="page-header text-center">Store (<a href="<?php echo base_url().'index.php/manage' ?>">Manage</a>)</h1>
	<div id="infoMessage"><?php echo $message;?></div>
 <div class="row">
 
 <?php $product_id = $product['id']; ?>
<?php echo form_open("product/detail/$product_id");?>

		<?php
				$id = $product['id'];
				$name = $product['name'];
				$price = $product['price'];
				$color = $product['color'];
				$fname = $product['fname'];
		?>
    <div class="col-md-12 well well-lg" >
        	<div class="col-md-3"><img src="<?php echo base_url()."images/products/".$product['picture']?>" style="width:100%"/></div>
          <div class="col-md-8" style="margin-top:20px;">
										<h3><?php echo $price; ?>.00 BDT</h3>
          <p><?php echo $name; ?></p>
          <p><?php echo $color; ?></p>
          <p>Product Owner : <?php echo $fname; ?></p><br />
			
   <input type="button" name="btnBack" id="btnBack" value="Back to Store" class="btn btn-info" onclick="window.location.href='<?php echo base_url() ?>index.php/products'" />
			<br /></div>
		</div>
    
</div>    
</div>
</body>
</html>
