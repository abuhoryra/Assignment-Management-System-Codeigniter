<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Signup</title>
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
        
        
        
        
        .img-responsive{
            height: 150px;
            width: 150px;
        }
        .im1{
            text-align: center;
        }
        .c1{
            border: 1px solid deepskyblue;
            padding: 15px 10px 30px 10px;
             box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px deepskyblue;
            
        }
        .bt{
            text-align: center;
        }
       
	</style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="c1 col-md-5" style="margin: 5% auto;">
         <div class="im1">
          <img class="img-responsive" src="<?php echo base_url(); ?>imgs/user.png">
           <h4>Sign Up</h4>
            </div>

            <form method="post" action="<?php echo base_url('Welcome/savedata'); ?>">


              <?php

             echo form_error('firstname','<div id="al" class="alert alert-danger">     <button type="button" class="close" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>',

      

              '</div>'); 
      
        

            ?>
            <div class="form-group">
        <input type="text" id="name" name="firstname" class="form-control"  required>
        <label class="form-control-placeholder" for="name">Firstname</label>
      </div>
      <?php

             echo form_error('lastname','<div id="al" class="alert alert-danger">     <button type="button" class="close" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>',

      

              '</div>'); 
      
        

            ?>
      <div class="form-group">
        <input type="text" id="lname" name="lastname" class="form-control" required>
        <label class="form-control-placeholder"  for="lname">Lastname</label>
      </div>
      <?php

             echo form_error('username','<div id="al" class="alert alert-danger">     <button type="button" class="close" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>',

      

              '</div>'); 
      
        

            ?>
            <div class="form-group">
        <input type="text" id="uname" name="username" class="form-control" required >
        <label class="form-control-placeholder" for="uname">Username</label>
      </div>
      <?php

             echo form_error('email','<div id="al" class="alert alert-danger">     <button type="button" class="close" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>',

      

              '</div>'); 
      
        

            ?>
      <div class="form-group">
        <input type="text" id="email" name="email" class="form-control" required >
        <label class="form-control-placeholder" for="email">Email</label>
      </div>
      <?php

             echo form_error('password','<div id="al" class="alert alert-danger">     <button type="button" class="close" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>',

      

              '</div>'); 
      
        

            ?>
            <div class="form-group">
        <input type="password" id="password" name="password" class="form-control" required >
        <label class="form-control-placeholder" for="password">Password</label>
      </div>
      <?php

             echo form_error('phone','<div id="al" class="alert alert-danger">     <button type="button" class="close" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>',

      

              '</div>'); 
      
        

            ?>
      <div class="form-group">
        <input type="number" id="phone" name="phone" class="form-control" required >
        <label class="form-control-placeholder" for="phone">Phone</label>
      </div>
      <?php

             echo form_error('dob','<div id="al" class="alert alert-danger">     <button type="button" class="close" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>',

      

              '</div>'); 
      
        

            ?>
            <div class="form-group">
        <input type="text" id="dob" name="dob" class="form-control" required >
        <label class="form-control-placeholder" for="dob">Date of birth</label>
      </div>
      <?php

             echo form_error('level','<div id="al" class="alert alert-danger">     <button type="button" class="close" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>',

      

              '</div>'); 
      
        

            ?>
      <div class="form-group">
  <label for="sel1">Select Type:</label>
  <select class="form-control" id="sel1" name="level">
    <option value="1">Student</option>
    <option value="2">Teacher</option>
    
  </select>
</div>
      
             <div class="bt">
                <button type="submit" class="btn btn-success">Signup</button>  
             </div>
             </form>
       <h5 style="float: right; margin-top:15px;">Already registered? <a href="<?php echo base_url(); ?>">Login</a></h5>
            
             
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
  $("button").click(function(){
    $("#al").remove();
  });
});

</script>


</body>
</html>