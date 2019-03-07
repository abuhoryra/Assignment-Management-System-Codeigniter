
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
    .form-control:valid + .form-control-placeholder{
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
          
  <table class="table table-hover" style="background-color: white; margin-top: 15px;">
       <tbody>
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Username</th>
        
        <th>Email</th>
        <th>Phone</th>
        <th>Date Of Birth</th>
        <th>Action</th>
       
      </tr>
    </thead>

   
     <?php
        foreach($tdata->result() as $row){
            ?>
   <tr>
        <td><?php echo $row->firstname;  ?></td>
        <td><?php echo $row->lastname;  ?></td>
        <td><?php echo $row->username;  ?></td>
       
        <td><?php echo $row->email;  ?></td>
        <td><?php echo $row->phone;  ?></td>
        <td><?php echo $row->dob;  ?></td>
        <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Update
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       
       
       <form method="post" action="<?php echo base_url('Teacher/update_teacher'); ?>">
            <div class="form-group">
        <input type="text" id="name" name="firstname" class="form-control" value="<?php echo $row->firstname;  ?>">
        <label class="form-control-placeholder" for="name">Firstname</label>
      </div>
      <div class="form-group">
        <input type="text" id="lname" name="lastname" class="form-control" value=" <?php echo $row->lastname;  ?>">
        <label class="form-control-placeholder"  for="lname">Lastname</label>
      </div>
            <div class="form-group">
        <input type="text" id="uname" name="username" class="form-control" value="<?php echo $row->username;  ?>">
        <label class="form-control-placeholder" for="uname">Username</label>
      </div>
      <div class="form-group">
        <input type="text" id="email" name="email" class="form-control" value="<?php echo $row->email;  ?>">
        <label class="form-control-placeholder" for="email">Email</label>
      </div>
         
      <div class="form-group">
        <input type="number" id="phone" name="phone" class="form-control" value="<?php echo $row->phone;  ?>">
        <label class="form-control-placeholder" for="phone">Phone</label>
      </div>
            <div class="form-group">
        <input type="text" id="dob" name="dob" class="form-control" value="<?php echo $row->dob;  ?>">
        <label class="form-control-placeholder" for="dob">Date of birth</label>
      </div>

      
               <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
             </form>
       
       
       
       
       
       
       
      </div>
    
    </div>
  </div>
</div></td>
            
       
        <?php
            
        }
            ?>
            </tr>
    </tbody>
  </table>
</div>


   







</body>
</html>