<?php include('header.php')?>
	<div class="navbar navbar-dark bg-primary">
		<div class="container">
			<h3 class="navbar-brand">Welcome <?php echo $loggedInUser['first_name'].' '.$loggedInUser['last_name']; ?> !</h3>
			<h3 class="navbar-brand">Login Email: <?php echo $loggedInUser['email']; ?></h3>
		    <a class="navbar-brand" href="<?php echo base_url('index.php/users/logout'); ?>" class="logout">Logout</a>
		</div>
	</div>

<div class="container" style="padding-top: 20px;">
	<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-6"><h3>Product Details</h3></div>
					<div class="col-6 text-right">
							<a href="<?php echo base_url().'index.php/productops/create';?>" class="btn btn-primary">Create</a>
					</div>	
				</div>
				<hr>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">
				<?php
				$success = $this->session->userdata('success');
				if($success!=""){
					?>
					<div class="alert alert-success"><?php echo $success;?></div>
				<?php					
				} 
				?>
				<?php
				$failure = $this->session->userdata('failure');
				if($failure!=""){
					?>
					<div class="alert alert-success"><?php echo $failure;?></div>
				<?php					
				} 
				?>
			</div>
		</div>

<div class="row">
			<div class="col-md-8">
				<table class="table table-striped">
					<tr class="table-primary">
						<th>Code</th>
						<th>Category</th>
						<th>Party</th>
						<th>Type</th>
						<th>Rate</th>						
						<th>In-Stock</th>
						<th>Edit</th>
						<th>Delete</th>						
					</tr>
					<?php if(!empty($products)){ 
						foreach($products as $product) {?>					
					<tr>
						<td><?php echo $product['p_code']?></td>
						<td><?php echo $product['p_category']?></td>
						<td><?php echo $product['p_party']?></td>
						<td><?php echo $product['p_type']?></td>
						<td><?php echo $product['p_rate']?></td>						
						<td><?php echo $product['in_stock']?></td>
						<td><a href="<?php echo base_url().'index.php/productops/edit/'.$product['p_code']?>" class="btn btn-primary">Edit</a></td>
						<td><a href="<?php echo base_url().'index.php/productops/delete/'.$product['p_code']?>" class="btn btn-danger">Delete</a></td>
					</tr>
							<?php } 
						} else {?>
					
					<tr>
						<td colspan="5">No records found.</td>
					</tr>
					
						<?php }?>
				</table>
			</div>			
		</div>

</div>
  <?php include('footer.php')?>