
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<style type="text/css">
    .c1{
      border: 1px solid white;
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 1.3), 0 0 18px white;
      background-color: white;
      padding:50px 0px 50px 0px;
      margin: 10% auto;

    }
	</style>
</head>
<body style="background-image: url('../imgs/background_11.wide.jpeg');">
	<?php

    $use = ($this->session->userdata('username') && $this->session->userdata('level')==2);

    if($use){

    }

else{
  redirect('Welcome/index');
}







?>
<nav class="navbar navbar-expand-md bg-dark navbar-dark" style="background-color: #db5757 !important;">
  <a class="navbar-brand" href="<?php echo base_url('Teacher/dashboard'); ?>">Teacher</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Teacher/getAssignment'); ?>">Assignment</a>
      </li>
      
       
     
         </ul>
         <ul class="navbar-nav ml-auto">
       <li class="d1 nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?php echo $this->session->userdata('username'); ?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url('Teacher/load_teacher_profile'); ?>"> Profile</a>
        <a class="dropdown-item" href="<?php echo base_url('Welcome/logout'); ?>">Logout</a>
        
      </div>
    </li>
</ul>


  </div>  
</nav>



    <div class="container">
      <div class="c1">
 
    				<form method="post" action="<?php echo base_url('Teacher/addassign'); ?>">
    		<div class="col-md-6" style="margin: 10px auto;">
    			<p>Add Assignment</p>
    	
      <div class="form-group">
  
  <textarea class="form-control" rows="3" id="comment" name="assignment" required></textarea>
  <br>
  <button type="submit" class="btn btn-primary" style="float: right;">Post</button>
</div>

    		</div>
        <br>
        <br>
    		<div class="col-md-6" style="margin: 0 auto;">
             <div class="alert alert-warning" role="alert">
  You must select at least one student for post assignment
</div>
    			<p>Select Student</p>
    		
  	<?php

   foreach ($data->result() as $row ) {

   	?>
   		<div class="form-check">
  <label class="form-check-label">
   	 <input type="checkbox" class="form-check-input" name="student[]" value="<?php echo $row->studentusername; ?>"><?php echo $row->firstname.' '.$row->lastname; ?>
   	 </label>
</div>
  
 <?php

 }
  	?>
   
  
    		</div>
    		</form>
    	</div>
    </div>


 













</body>
</html>