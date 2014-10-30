<?php

/*-------------------------------------------------------+
| Content Management System 
| http://www.phphelptutorials.com/
+--------------------------------------------------------+
| Author: David Carr  Email: dave@daveismyname.co.uk
+--------------------------------------------------------+*/

require('config.php'); 
if(logged_in()) {
	header('Location: '.config::DIRADMIN.'settings.php');
}

if(isset($_POST['submit'])) {
	login($_POST['username'], $_POST['password']);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>WeboCMS </title>
<link rel="stylesheet" href="../css/boots.css" type="text/css" />
<link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>
<body>
<div class='wrapper'>
    <!-- the  container for the whole body content starts-->
        <p>
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand"><strong>WeboCMS</strong></a>
                <div class="collapse navbar-collapse"/>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">About</a></li>
                        <li><a href="../index.php">Go to Site</a></li>
                    </ul>
                </div>
            </div>
          </div>
          <div class="container">

	            	<div class='col-md-6' style='margin:0 auto; float:none;'>
	            		<div class='panel panel-default'>
	            			<div class='panel-heading'><h2>Login</h2></div>
	            			<div class='panel-body'>
					                <p><?php echo messages();?></p>
	            				<form role='form'method="post" action="">
	            					<div class='form-group'>
	            						<label for='username'>Username:</label>
	            						<input class='form-control' type="text" name="username" />
	            					</div>
	            					<div class='form-group'>
	            						<label for='password'>Password:</label>
	            						<input class='form-control' type="password" name="password" />
	            					</div>
	            					<div class="form-group">
	            						<button class='btn btn-default' id='submit' name='submit'>Login</button>
	            					</div>                      
								</form>	 	
	            			</div>
	            		</div>
	            	</div>
    
          </div>
        </p>
        <div class='push'></div>
    </div>
    <div class="footer" style='background-color:#3d288e;'>
      <div class="container">
        <p class="text-muted">Webo CMS &copy; 2014</p>
      </div>
    </div>
</body>
</html>