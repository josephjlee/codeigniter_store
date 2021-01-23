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
		<?php
			foreach ($products as $product){
				$id = $product['id'];
				$name = $product['name'];
				$price = $product['price'];
		?>
    <div class="col-md-3" >
        	<a href="<?php echo base_url().'index.php/product/detail/edit/'.$id; ?>"><div class="col-md-12" style="text-align:center;border:1px solid #eee;margin:5px;"><img src="<?php echo base_url()."images/products/".$product['picture']?>" style="width:100%" /></div></a>
          <div class="col-md-12">
										<b><?php echo $price; ?>.00 BDT</b><br />
          <b><?php echo $name; ?></b><br /><br />
   <?php
					echo form_open('cart/add');
					echo form_hidden('id', $id);
					echo form_hidden('name', $name);
					echo form_hidden('price', $price);
					echo form_submit('action', 'Add to Cart');
					echo form_close();
					?>
			<br /></div>
		</div>
  <?php } ?>
    
</div>    
</div>
</body>
</html>
