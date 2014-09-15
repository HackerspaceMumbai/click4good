<?php 
    require("config.php");
	
    if(!empty($_POST)) { 
        // Ensure that the user fills out fields
		
        if(empty($_POST['username'])) {
		die("Please enter a username.");
		} 
		
        if(empty($_POST['password'])) {
		die("Please enter a password.");
		} 
		
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		die("Invalid E-Mail Address");
		}
        //@$inputlength=contactno.value.length;
		 
		//if($inputlength<=maxlength) {
		//die("Please enter 10 digit mobile number.");
		//} 
        // Check if the username is already taken
        $query = " 
            SELECT 
                1 
            FROM users
            WHERE
                username = :username 
        "; 
        $query_params = array( ':username' => $_POST['username'] ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
		
        catch(PDOException $ex){
		die("Failed to run query: " . $ex->getMessage());
		} 
		
        $row = $stmt->fetch(); 
        if($row){
		die("This username is already in use");
		} 
		
        $query = " 
            SELECT 
                1 
            FROM users
            WHERE 
                email = :email 
        "; 
        $query_params = array( ':email' => $_POST['email'] ); 
        
		try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
		
        catch(PDOException $ex){
		die("Failed to run query: " . $ex->getMessage());
		}
		
        $row = $stmt->fetch(); 
        if($row){
		die("This email address is already registered");
		} 
         
        // Add row to database 
        $query = " 
            INSERT INTO users ( 
                username, 
                password, 
                salt, 
                email,
				contactno
            ) VALUES ( 
                :username, 
                :password, 
                :salt, 
                :email,
				:contactno
            ) 
        "; 
         
        // Security measures
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
        $password = hash('sha256', $_POST['password'] . $salt); 
        for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
        $query_params = array( 
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'],
			':contactno' => $_POST['contactno']
        ); 
        try {  
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        header("Location: index.php"); 
        die("Redirecting to index.php"); 
    } 
?>
<!-- Author: Michael Milstead / Mode87.com
     for Untame.net
     Bootstrap Tutorial, 2013
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Akshay_Poonam_D17B</title>
    <meta name="description" content="Bootstrap Tab + Fixed Sidebar Tutorial with HTML5 / CSS3 / JavaScript">
    <meta name="author" content="Untame.net">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <link href="assets/bootstrap.min.css" rel="stylesheet" media="screen">
    <style type="text/css">
        body { background: url(assets/bglight.png); }
        .hero-unit { background-color: #fff; }
        .center { display: block; margin: 0 auto; }
    </style>
</head>

<body>

<div class="navbar navbar-fixed-top navbar-inverse">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand"></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li><a href="index.php">Return Home</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="container hero-unit">
    <h2>Form Details</h2> <br />
    <form action="register.php" method="post"> 
        <label>Username:</label> 
        <input type="text" name="username" value="" /> 
        <label>Email:</label> 
        <input type="text" name="email" value="" /> 
        <label>Password:</label> 
        <input type="password" name="password" value="" /> 
        <label>Contact no:</label> 
        <input type="text" name="contactno" maxlength="10" value="" /> <br /><br />
	   
        <input type="submit" class="btn btn-info" value="Register" /> 
    </form>
</div>

</body>
</html>