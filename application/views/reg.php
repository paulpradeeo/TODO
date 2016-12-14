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