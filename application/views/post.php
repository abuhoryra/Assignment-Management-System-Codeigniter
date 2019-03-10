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
    .div1{
      border: solid 1px deepskyblue;
      padding: 20px 20px;
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px deepskyblue;
      margin-top: 15px;
    }
       
	</style>
</head>
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
    <div class="col-md-5" style="margin: 5px auto;">
      <form method="post" action="<?php echo base_url('Welcome/post'); ?>">
      <div class="form-group">
  <label for="comment">Add Post:</label>
  <textarea class="form-control" rows="3" id="comment" name="addpost" required></textarea>
  <br>
  <button type="submit" class="btn btn-primary" style="float: right;">Post</button>
</div>
</form>
    </div>
  </div>
</div>
<hr>

<div class="container">
  <div class="row">
    <div class="col-md-6" style="margin: 0 auto;">
      <?php

        foreach($data->result() as $row) {
          ?>

          <div class="div1">
             <h5></h5>
            <h4><?php echo $row->username; ?></h4>
            <p><?php echo $row->post; ?></p>
          </div>
         
       
         <?php
 }
      ?>
       <div class="page1" style="margin-top: 15px; margin-left: 25%;">
            <?php echo $this->pagination->create_links(); ?>
          </div>

      </div>
    </div>
  </div>



    
 














</body>
</html>