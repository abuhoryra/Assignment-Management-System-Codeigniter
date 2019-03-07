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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<style type="text/css">
    .form-control{
        border:none;
        border-bottom: 2px solid green;
        border-radius: 0px;
    }
    .form-control:focus {
  border-color: deepskyblue;
  box-shadow: none;
}
      .form-control{
        border:none;
        border-bottom: 2px solid green;
        border-radius: 0px;
    }
    .form-control:focus {
  border-color: deepskyblue;
  box-shadow: none;
}
    .form-control:focus + .form-control-placeholder,
.form-control:valid + .form-control-placeholder {
  font-size: 75%;
  transform: translate3d(0, -100%, 0);
  opacity: 1;
}
 .form-group {
  position: relative;
  margin-bottom: 1.5rem;
}

.form-control-placeholder {
  position: absolute;
  top: 0;
  padding: 7px 0 0 13px;
  transition: all 200ms;
  opacity: 0.5;
}  
       
	</style>
</head>
<?php

    $use = ($this->session->userdata('username') && $this->session->userdata('level')==1);

    if($use){

    }

else{
  redirect('Welcome/index');
}







?>
<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="<?php echo base_url('Teacher/dashboard'); ?>">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Teacher/viewassign'); ?>">Assignment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Show/readpost'); ?>">My Posts</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Teacher/myteacher'); ?>">My Teacher</a>
      </li>
     
         </ul>
         <ul class="navbar-nav ml-auto">
       <li class="d1 nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        <?php echo $this->session->userdata('username'); ?>
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo base_url('Show/read'); ?>"> Profile</a>
        <a class="dropdown-item" href="<?php echo base_url('Welcome/logout'); ?>">Logout</a>
        
      </div>
    </li>
</ul>


  </div>  
</nav>


<div class="container">
  <div class="row">
    <div class="col-md-5">
     
      <form method="post" action="<?php echo base_url('Teacher/techinsert'); ?>">
        <label>Add Teacher</label>
        <div class="form-group">
 
  <select class="form-control" id="sel1" name="teacherusername">
  
        <?php
            
            foreach($data->result() as $row) {
              ?>
               
    <option value="<?php echo $row->username; ?>"><?php echo $row->firstname.' '.$row->lastname; ?></option>
    
  
           <?php
            }
        

        ?>

  </select>
</div>
<button type="submit" class="btn btn-primary">Add</button>
      </form>
    </div>
  </div>
  </div>



    
 














</body>
</html>