<?php
error_reporting(0);
if($this->session->userdata('logged_in') == false){
   redirect("index.php");
}
?>
<head>
	<title>TODO LIST MANAGER</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	  <style>
        #past{
            background-color: salmon;
        }
        #today{
            background-color:#4cae4c;
        }
        #fut{
            background-color: lightyellow;
        }
    </style>

</head>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TODO LIST MANAGER</a>
    </div>
    <ul class="nav navbar-nav" style="float: right;">
      <li class="active"><a href="#">Hi <b><?php echo $this->session->userdata('username');  ?></b></a></li>
      <li ><a href="<?php echo base_url();?>index.php/User/logout">Logout</a></li>
    </ul>
  </div>
</nav>
  
<body>
<div class="container">
    <div class="row">


        <div class="col-md-12">
            <p data-placement="top" data-toggle="tooltip" ><button class="btn btn-primary btn-ys" data-title="add" data-toggle="modal" data-target="#add" >Create Todo &nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></button></p>
            <div class="table-responsive">

                <table id="mytable" class="table table-bordred table-striped">

                    <thead>
                    <th>Title</th>
                    <th>Date And Time</th>
                    <th>Description</th>                   
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>

<?php
foreach ($lists as $list) {
  

  ?>
                    <tr style="text-transform: capitalize">
	                    <td><?php  echo $list->title ?></td>
	                    <td><?php  echo $list->time_limit ?></td>
	                    <td><?php  echo $list->description ?></td>
	                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button onclick="onUpdate('<?php  echo $list->task_id ?>')" class="btn btn-primary btn-ys" data-title="Edit" data-toggle="modal" data-target="#update"><i class="fa fa-pencil" aria-hidden="true"></i></button></p></td>

	                    <td>
                       <a href="<?php  echo base_url().'index.php/TODO/delTask/'.$list->task_id ?>"> <p data-placement="top" data-toggle="tooltip" title="Delete"><button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-ys" data-title="Delete" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true"></i></button></p></td>
                       </a>
                    </tr>

<?php
}

?>
                    </tbody>

                </table>

            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
                <h4 class="modal-title custom_align" id="Heading">Add Your Details</h4>
            </div>
<!-- Start form -->
<?php $attributes = array('id'=>'login-form','role'=>'form','style'=>'display: block'); ?>
<?php echo form_open('index.php/TODO/CreateTask',$attributes); ?>
            <div class="modal-body">
                <div class="form-group">
                    <h5 class="modal-title custom_align" id="Heading">To-Do Title</h5>

                     <?php
                  	$data = array(
                  			'name'	=> 'task_title',
                  			'placeholder'	=> 'Enter Title',
                  			'id' => 'title', 'tabindex'=>'1',
                  			 'class'=>'form-control',
                  			 'value' => set_value('task_title')
                  		);
                  	echo form_input($data);

                  ?>
                    
                </div>
                <div class="form-group">
                    <h5 class="modal-title custom_align" id="Heading">To-Do Description</h5>

                    <?php
                  	$data = array(
                  			'name'	=> 'task_description',
                  			'placeholder'	=> 'Enter Description',
                  			'id' => 'des', 'tabindex'=>'1',
                  			 'class'=>'form-control',
                  			 'rows' => '5',
                  			 'value' => set_value('task_description')
                  		);
                  	echo form_textarea($data);

                  ?>                 
                </div>
                <div class="form-group">
                    <h5 class="modal-title custom_align" id="Heading">Enter Date And Time</h5>

                     <?php
                  	$data = array(
                  			'name'	=> 'task_date',
                  			'type' => 'datetime-local',
                  			'placeholder'	=> 'Enter Date And Time',
                  			'id' => 'date', 'tabindex'=>'1',
                  			 'class'=>'form-control',
                  			 'data-format'=>'MM/dd/yyyy HH:mm:ss PP',
                  			 'value' => set_value('task_date')
                  		);
                  	echo form_input($data);

                  ?>                  
                </div>
            </div>
            <div class="modal-footer ">

            <?php
                  	$data = array(
                  			'name'	=> 'task_submit',             
                  			'id'=>'submit',
                  			'tabindex'=>'4',
                  			 'class'=>'btn btn-warning btn-lg',
                  			 'style'=>'width: 100%;',
                  			 'value' => 'Add task'
                  		);
                  	echo form_submit($data);

                  ?>
                <!-- <button type="button" id="submit" class="btn btn-warning btn-lg" style="width: 100%;"><i class="fa fa-plus" aria-hidden="true"></i> Add List</button> -->
            </div>

<?php echo form_close();?>
<!-- END FORM -->

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
                <h4 class="modal-title custom_align" id="Heading">Edit Your Details</h4>
            </div>

<?php $attributes = array('id'=>'login-form','role'=>'form','style'=>'display: block'); ?>
<?php echo form_open('index.php/TODO/updateTask',$attributes); ?>
            <div class="modal-body">
                <div class="form-group">
                <?php
                    $data = array(
                        'name'  => 'task_id',
                        'type' => 'hidden',                      
                        'id' => 'task_id', 'tabindex'=>'1'                        
                      );
                    echo form_input($data);

                  ?>
                    <h5 class="modal-title custom_align" id="Heading">To-Do Title</h5>
                    <!-- <input class="form-control " disabled id="title_u" type="text" placeholder="Enter Title"> -->
                    <?php
                    $data = array(
                        'name'  => 'task_title',
                        'placeholder' => 'Enter Title',
                        'id' => 'title_u', 'tabindex'=>'1',
                         'class'=>'form-control',
                         'value' => set_value('title_u')
                      );
                    echo form_input($data);

                  ?>
                </div>
                <div class="form-group">
                    <h5 class="modal-title custom_align" id="Heading">To-Do Description</h5>
                    <!-- <textarea rows="2" class="form-control" id="des_edit" placeholder="Enter Description"></textarea> -->
                    <?php
                    $data = array(
                        'name'  => 'task_description',
                        'placeholder' => 'Enter Description',
                        'id' => 'des_edit', 'tabindex'=>'1',
                         'class'=>'form-control',
                         'rows' => '5',
                         'value' => set_value('task_description')
                      );
                    echo form_textarea($data);

                  ?> 
                </div>
                <div class="form-group">
                    <h5 class="modal-title custom_align" id="Heading">Enter Date And Time</h5>
                    <!-- <input data-format="MM/dd/yyyy HH:mm:ss PP" id="date_edit" type="datetime-local" placeholder="Enter Date And Time"> -->
                    <?php
                    $data = array(
                        'name'  => 'task_date',
                        'type' => 'datetime-local',
                        'placeholder' => 'Enter Date And Time',
                        'id' => 'date_edit', 'tabindex'=>'1',
                         'class'=>'form-control',
                         'data-format'=>'MM/dd/yyyy HH:mm:ss PP',
                         'value' => set_value('task_date')
                      );
                    echo form_input($data);

                  ?>            
                </div>
            </div>
            <div class="modal-footer ">
             <?php
                    $data = array(
                        'name'  => 'task_submit',             
                        'id'=>'submit_edit',
                        'tabindex'=>'4',
                         'class'=>'btn btn-warning btn-lg',
                         'style'=>'width: 100%;',
                         'value' => 'Add task'
                      );
                    echo form_submit($data);

                  ?>
                <!-- <button type="button" id="submit_edit" class="btn btn-warning btn-lg" style="width: 100%;"><i class="fa fa-pencil" aria-hidden="true"></i> Save List</button> -->
            </div>
<?php echo form_close();?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign" ></span> Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</body>
</html>
