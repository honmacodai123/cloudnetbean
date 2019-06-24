<!DOCTYPE html>
<html>
<body>

<h1>INSERT DATA TO DATABASE</h1>

<?php
ini_set('display_errors', 1);
echo "Insert database!";
?>

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

$sql = "DELETE student SET fname = '$_POST[fname]' WHERE stuid = '$_POST[stuid]'";
$stmt = $pdo->prepare($sql);
if($stmt->execute() == TRUE){
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: ";
}

?>
</body>
</html>
