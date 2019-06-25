<!DOCTYPE HTML>
<html>
<head>
<title>Sign-In</title> 
<link rel="stylesheet" type="text/css" href="style-sign.css"> 
</head> 
<body id="body-color"> 
<div id="Sign-In"> 
	<fieldset style="width:30%"><legend>LOG-IN HERE</legend> 
<form method="POST" action="connectivity.php"> User <br>
<input type="text" name="user" size="40"><br> Password <br>
<input type="password" name="pass" size="40"><br> 
<input id="button" type="submit" name="submit" value="Log-In"> 
</form> 
	</fieldset> 
</div> 
</body> 
</html> 

<?php
	if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     
   $db = parse_url(getenv("DATABASE_URL"));
   $pdo = new PDO("pgsql:" . sprintf(
      "host=ec2-174-129-29-101.compute-1.amazonaws.com;port=5432;user=svxqnlbkrujzrs;password=90aa1cd7cdcbb9f7423e8c92a15aa0b2cb3f038a1db0e775654afada9974c3af;dbname=d6irdmdm3vsp9p",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
   ));
}  
?>