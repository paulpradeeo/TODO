<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>TODO LIST MANAGER</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>
<body>


<div class="container">
<?php
if($this->session->flashdata('registered')){
  echo "<p class='alert alert-dismissable alert-success'>".$this->session->flashdata('registered')."</p>";
}
if($this->session->flashdata('Error')){
  echo "<p class='alert alert-dismissable alert-danger'>".$this->session->flashdata('Error')."</p>";
}
if($this->session->flashdata('login_details')){
  echo "<p class='alert alert-dismissable alert-success'>".$this->session->flashdata('login_details')."</p>";
}

if($this->session->userdata('logged_in')){
   redirect("index.php/TODO/index");
}

?>
   <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-login">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              
              <?php $attributes = array('id'=>'login-form','role'=>'form','style'=>'display: block'); ?>
              <?php echo form_open('index.php/user/login',$attributes); ?>
              <h2>LOGIN</h2>
                  <div class="form-group">
                  <?php
                  	$data = array(
                  			'name'	=> 'username',
                  			'placeholder'	=> 'Enter Username',
                  			'id' => 'username', 'tabindex'=>'1',
                  			 'class'=>'form-control',
                  			 'value' => set_value('username')
                  		);
                  	echo form_input($data);

                  ?>
                  </div>
                  <div class="form-group">
                  <?php
                  	$data = array(
                  			'name'	=> 'password',
                  			'placeholder'	=> 'Enter password',
                  			'id' => 'password', 'tabindex'=>'2',
                  			 'class'=>'form-control',
                  			 'value' => set_value('password')
                  		);
                  	echo form_password($data);

                  ?>
                  </div>
                   <div class="col-xs-6 form-group pull-right"> 
                   <?php
                  	$data = array(
                  			'name'	=> 'login-submit',             
                  			'id'=>'login-submit',
                  			'tabindex'=>'4',
                  			 'class'=>'form-control btn btn-login',
                  			 'value' => 'Log In'
                  		);
                  	echo form_submit($data);

                  ?>
                   </div>
                   <?php echo form_close();?>
<!-- REGISTRATION FORM -->
               <?php echo validation_errors('<p class ="alert alert-dismissable alert-danger">');?>

               <?php $attributes = array('id'=>'register-form','role'=>'form','style'=>'display: none'); ?>
              <?php echo form_open('index.php/user/register',$attributes); ?>                  
                <h2>REGISTER</h2>
                   <div class="form-group">
                  <?php
                  	$data = array(
                  			'name'	=> 'username',
                  			'placeholder'	=> 'Enter Username',
                  			'id' => 'username', 'tabindex'=>'1',
                  			 'class'=>'form-control',
                  			 'value' => set_value('username')
                  		);
                  	echo form_input($data);

                  ?>
                  </div>
                  <div class="form-group">
                  <?php
                  	$data = array(
                  			'name'	=> 'password',
                  			'placeholder'	=> 'Enter password',
                  			'id' => 'password', 'tabindex'=>'2',
                  			 'class'=>'form-control',
                  			 'value' => set_value('password')
                  		);
                  	echo form_password($data);

                  ?>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">                      
                        <?php
                  	$data = array(
                  			'name'	=> 'register-submit',             
                  			'id'=>'register-submit',
                  			'tabindex'=>'4',
                  			 'class'=>'form-control btn btn-register',
                  			 'value' => 'Register Now'
                  		);
                  	echo form_submit($data);

                  ?>
                      </div>
                    </div>
                  </div>
             <?php echo form_close();?> 
            </div>
          </div>
        </div>
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6 tabs">
              <a href="#" class="active" id="login-form-link"><div class="login">LOGIN</div></a>
            </div>
            <div class="col-xs-6 tabs">
              <a href="#" id="register-form-link"><div class="register">REGISTER</div></a>
            </div>
          </div>
        </div>
         
      </div>
    </div>
  </div>
</div>
<!-- <footer>
    <div class="container">
        <div class="col-md-10 col-md-offset-1 text-center">
            <h6 style="font-size:14px;font-weight:100;color: #fff;">Coded with <i class="fa fa-heart red" style="color: #BC0213;"></i> by <a style="color: #fff;" target="_blank">Paul</a></h6>
        </div>   
    </div>
</footer> -->
</body>
</html>
