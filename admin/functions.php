<?php

if (!config::INCLUDED){
die('You cannot access this file directly!');
}

//log user in ---------------------------------------------------
function login($user, $pass){
	$db = new dbHandler(config::HOST, config::USERNAME, config::PASSWORD);
    $db->selectDatabase(config::DB_NAME);
   //strip all tags from variable   
   $user = strip_tags(mysql_real_escape_string($user));
   $pass = strip_tags(mysql_real_escape_string($pass));

   $pass = md5($pass);

   // check if the user id and password combination exist in database
   $sql = "SELECT * FROM members WHERE username = '$user' AND password = '$pass'";
   $result = mysql_query($sql) or die('Query failed. ' . mysql_error());
      
   if (mysql_num_rows($result) == 1) {
      // the username and password match,
      // set the session
		$_SESSION['authorized'] = 1;
					  
	  // direct to admin
      header('Location: '.config::DIRADMIN.'settings.php');
	  exit();
   } else {
	// define an error message
	$_SESSION['error'] = 'Sorry, wrong username or password';
   }
}

// Authentication
function logged_in() {
	if(isset($_SESSION['authorized'])){
		if($_SESSION['authorized'] == 1) {
			return true;
		}
	}

    return false;
}

function login_required() {
	if(logged_in()) {	
		return true;
	} else {
		header('Location: '.config::DIRADMIN.'login.php');
		exit();
	}	
}

function logout(){
	unset($_SESSION['authorized']);
	header('Location: '.config::DIRADMIN.'login.php');
	exit();
}

// Render error messages
function messages() {
    $message = '';
	if (isset($_SESSION['success'])){
		if($_SESSION['success'] != '') {
			$message = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>'.$_SESSION['success'].'</div>';
			$_SESSION['success'] = '';
		}
	}
    if (isset($_SESSION['error'])){
		if($_SESSION['error'] != '') {
			$message = '<div class="alert alert-danger"><strong>'.$_SESSION['error'].'</strong></div>';
			$_SESSION['error'] = '';
		}
	}
    
    echo "$message";
}

function errors($error){
	if (!empty($error))
	{
        $showError = "";
        $i = 0;
        while ($i < count($error)){
        $showError.= "<div class=\"msg-error\">".$error[$i]."</div>";
        $i ++;}
        echo $showError;
	}// close if empty errors
} // close function

?>