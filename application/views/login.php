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
   <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
 

      
     
      


  </div>  
</nav>
<div class="container">
    <div class="row">
        <div class="c1 col-md-5" style="margin: 10% auto;">
         <div class="im1">
          <img class="img-responsive" src="<?php echo base_url(); ?>imgs/user.png">
           <h4>Login</h4>
            </div>
            <form method="post" action="<?php echo base_url('Welcome/login'); ?>">
            <div class="form-group">
        <input type="text" name="username" id="username" class="form-control" required>
        <label class="form-control-placeholder" for="username">Userame</label>
      </div>
      <div class="form-group">
        <input type="password" name="password" id="password" class="form-control" required>
        <label class="form-control-placeholder" for="password">Password</label>
      </div>
             <div class="bt">
                <button type="submit" class="btn btn-success">Login</button>  
             </div>
             </form>
             <h5 style="float: right; margin-top:15px;">New to our site? <a href="<?php echo base_url('welcome/signup'); ?>">Signup</a></h5>
            
             
        </div>
    </div>
</div>



</body>
</html>