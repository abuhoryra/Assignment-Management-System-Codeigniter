
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Assignment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

	<style type="text/css">
    .div1{
      border: 1px solid #00cc44;
      margin-top: 15px;
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px #00cc44;
      padding: 20px 20px;
    }
	</style>
</head>
<body>
	<?php

    $use = ($this->session->userdata('username') && $this->session->userdata('level')==2);

    if($use){

    }

else{
  redirect('Welcome/index');
}







?>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
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
  <div class="row">
    <div class="col-lg-6" style="margin: 0 auto">
    
      <?php

foreach ($adata->result() as $row) {
 ?>
   <div class="div1" style="margin-bottom: 5% !important;">
  
 <h5><?php echo $row->assignment; ?></h5>
 <div class="div2">
 
 

<!-- Button trigger modal -->

<button style="margin-left: 87%; padding: 0px 0px;" class="btn" data-toggle="modal" data-target="#exampleModalCenter<?php echo $row->id;?>"><i class='far fa-edit' style='font-size:25px; color: green;'></i></button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url('Teacher/assignmentEdit/'.$row->id); ?>">
      <div class="modal-body">
       <div class="form-group">
  <label for="comment">Assignment:</label>
  <textarea class="form-control" name="assignedit" rows="3" id="comment"><?php echo $row->assignment?></textarea>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>






 

 <a href="<?php echo base_url('Teacher/assignmentDelete/'.$row->id); ?>"><i class='fas fa-trash-alt' style='font-size:25px;color:red;float: right;'></i></a>
 </div>
 
         
     
 </div>

<?php

}





?>

    </div>
  </div>
  </div>




 














</body>
</html>