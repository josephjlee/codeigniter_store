<?php
				$user = $this->session->userdata('user');
				extract($user);
				$_SESSION['id'] = $id; 
				$_SESSION['auth'] = $auth;
?>
<div class="container">
	<h1 class="page-header text-center"><?php echo 'Welcome '.(($auth==1) ? 'Admin' : $fname).' into Dashboard!'; ?></h1>
	<div class="row">
 <div class="well well-lg">
 <h4>Products (<a href="<?php echo base_url().'index.php/products' ?>">View Store</a>) <input name="New" type="button" class="btn btn-primary" value="Add New" onclick="window.location='product/add'" style="float:right" /></h4>
 </div>
 <div id="infoMessage"><?php echo $message;?></div>
 
<div class="row">
 <div class="col-md-9">  
<h4>All Products</h4>
</div>
<div class="col-md-3">
 <h4>
   <form method='post' action="<?= base_url() ?>index.php/manage" >
     <input type='text' name='search' value='<?=$search;?>' style="border:1px solid #eee;width:79%;float:left;font-size:13px;padding:4px;border-radius:2px;"><input type='submit' name='submit' value='Submit' style="border:1px solid #eee;font-size:14px;padding: 4px;float: right;">
   </form>
   </h4>
 </div>	
</div>
   
<form name="frmproduct" method="post">
 <input type="hidden" name="rid" />
	<input type="hidden" name="command" />
	<table class="table table-bordered table-striped">
 <thead>
					<tr>
      <th>S.no</th>
      <th>Product Name</th>
      <th>Product Owner</th>
						<th>Price</th>
						<th>Status</th>
						<th>Edit</th>
      <th>Delete</th>
					</tr>
				</thead>
				<tbody id="tbody">			
		<?php $sno = $row+1;
		foreach ($result as $product){
			$product_id = $product['id'];
		?>
			<tr>
    <td><?php echo $sno ?></td>
    <td><?php echo $product['name'] ?></td>
    <td><?php echo $product['fname'] ?></td>
				<td><?php echo $product['price'] ?></td>
				<td><?php echo $product['status'] ?></td>
				<td><a href='product/edit/<?php echo $product_id ?>'>Edit</a></td>
				<td>
					<?php 
						echo anchor('product/delete/'.$product_id, 'Delete', array('onClick' => "return confirm('Are you sure you want to delete?')"));
					?>
				</td>
			</tr>
		<?php
$sno++;		}
		?>
  </tbody>
	</table>
</form>

<!-- Paginate -->
   <div style='margin-top: 10px;'>
   <?= $pagination; ?>
   </div>
</div>
</div>
