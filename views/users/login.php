<?php include('header.php')?>
<div class="sidenav">
         <div class="login-main-text">
            <h2><b>Application<br> Login Page</b></h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
    <div class="login-form">
                             <!-- Status message -->
    <?php  
        if(!empty($success_msg)){ 
            echo '<div class="alert alert-dismissible alert-success">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>'.$success_msg.'</strong></div>'; 
        }elseif(!empty($error_msg)){ 
            echo '<div class="alert alert-dismissible alert-danger">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>'.$error_msg.'</strong></div>';
        } 
    ?>
    
    <!-- Login form -->
  
        <form action="" method="post">
            <div class="form-group">
                <label>User Email</label>
                <input type="email" name="email" class="form-control" placeholder="EMAIL" required="">
                <?php echo form_error('email','<p class="help-block">','</p>'); ?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="PASSWORD" required="">
                <?php echo form_error('password','<p class="help-block">','</p>'); ?>
            </div>
                <input type="submit" name="loginSubmit" class="btn btn-primary" value="Login">
        </form>
        <br/>
        <p>Don't have an account? <a href="<?php echo base_url('index.php/users/registration'); ?>">Register</a></p>
    </div>
         </div>
  </div>
  <?php include('footer.php')?>