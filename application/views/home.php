<?php
				$user = $this->session->userdata('user');
				extract($user);
				$_SESSION['id'] = $id; 
				$_SESSION['auth'] = $auth;
?>
<div class="container">
	<h1 class="page-header text-center"><?php echo 'Welcome '.(($auth==1) ? 'Admin' : $fname).' into Dashboard!'; ?></h1>
	<div class="row">
		<div class="jumbotron col-md-4 col-md-offset-0">
			<h2>Profile Info:</h2>
			<div class="well well-lg"><strong>Fullname</strong>: <?php echo $fname; ?><br>
			<strong>Email</strong>: <?php echo $email; ?><br>
			<strong>Password</strong>: <?php echo $password; ?></div><br>
			<a href="<?php echo base_url(); ?>index.php/user/logout" class="btn btn-danger">Logout</a>
		</div>
  
  <?php if($auth==1){ ?>
  <div class="col-md-8">
   
    <div class="jumbotron col-md-12">
    <div class="col-md-6 text-center">
      <h1><?php echo $total_users; ?></h1>
      <p>Total Registered Users <span class="badge"><?php echo $total_users; ?></span></p>
    </div>
     <div class="col-md-6 text-center">
      <h1><?php echo $total_products; ?></h1>
      <p>Total Products <span class="badge"><?php echo $total_products; ?></span></p>
   </div>
   </div> 

<div class="row">
 <div class="col-md-8">  
<h4>All Registered Users</h4>
</div>
<div class="col-md-4">
 <h4><!-- Search form (start) -->
   <form method='post' action="<?= base_url() ?>index.php/user/home" >
     <input type='text' name='search' value='<?=$search;?>' style="border:1px solid #eee;width:72%;float:left;font-size:13px;padding:4px;border-radius:2px;"><input type='submit' name='submit' value='Submit' style="border:1px solid #eee;font-size:14px;padding: 4px;">
   </form>
   </h4>
 </div>	
</div>	

  <!-- Users List -->
   <table class="table table-bordered table-striped">
    <tr>
      <th>S.no</th>
      <th>FullName</th>
      <th>Email</th>
      <th>Product Count</th>
    </tr>
    <?php 
    $sno = $row+1;
    foreach($result as $data){
						$query = $this->users_model->c_count($data['id']);
						$data['count'] = $query->count_id;	
						if($data['auth']=='1'){  $badge = "<span class='badge'> admin </span>"; } else { $badge='';}
      echo "<tr>";
      echo "<td>".$sno."</td>";
      echo "<td>".$data['fname'] .' '.$badge ."</td>";
      echo "<td>".$data['email']."</td>";
						echo "<td>".$data['count']."</td>";
      echo "</tr>";
      $sno++;

    }
    if(count($result) == 0){
      echo "<tr>";
      echo "<td colspan='3'>No record found.</td>";
      echo "</tr>";
    }
    ?>
   </table>
     
    <!-- Paginate -->
   <div style='margin-top: 10px;'>
   <?= $pagination; ?>
   </div>
   
		</div>
  <?php } ?>
  
	</div>
</div>