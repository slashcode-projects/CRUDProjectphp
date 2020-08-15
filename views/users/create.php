<?php include('header.php')?>
	<div class="navbar navbar-dark bg-primary">
		<div class="container">
			<h3 class="navbar-brand">Welcome <?php echo $loggedInUser['first_name'].' '.$loggedInUser['last_name']; ?> !</h3>
			<h3 class="navbar-brand">Login Email: <?php echo $loggedInUser['email']; ?></h3>
		    <a class="navbar-brand" href="<?php echo base_url('index.php/users/logout'); ?>" class="logout">Logout</a>
		</div>
	</div>

	<div class="container" style="padding-top: 20px;">
		<h3>Add Product</h3>
		<hr>
		<form method="post" name="createProduct" action="<?php echo base_url().'index.php/productOps/create';?>">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Product Code</label>
					<input type="number" name="p_code" value="<?php echo set_value('p_code');?>" class="form-control">
					<?php echo form_error('p_code');?>
				</div>
			
				<div class="form-group">
					<label>Category</label>
					<input type="text" name="p_category" value="<?php echo set_value('p_category');?>" class="form-control">
					<?php echo form_error('p_category');?>
				</div>

				<div class="form-group">
					<label>Party</label>
					<input type="text" name="p_party" value="<?php echo set_value('p_party');?>" class="form-control">
					<?php echo form_error('p_party');?>
				</div>

				<div class="form-group">
					<label>Type</label>
					<input type="number" name="p_type" value="<?php echo set_value('p_type');?>" class="form-control">
					<?php echo form_error('p_type');?>
				</div>

				<div class="form-group">
					<label>Rate</label>
					<input type="number" name="p_rate" value="<?php echo set_value('p_rate');?>" class="form-control">
					<?php echo form_error('p_rate');?>
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Add Product</button>
					<a href="<?php echo base_url().'index.php/users/account';?>" class="btn btn-danger">Cancel</a>
				</div>
			</div>
		</div>
	</form>
	</div>

  <?php include('footer.php')?>