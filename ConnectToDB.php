<!DOCTYPE html>
<html>
<body>

<h1>DATABASE CONNECTION</h1>

<?php
//ini_set('display_errors', 1);
//echo "Thong";
?>

<?php


if (empty(getenv("DATABASE_URL"))){
    echo '<p>The DB does not exist</p>';
    $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
}  else {
     echo '<p>The DB exists</p>';
     echo getenv("dbname");
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

$sql = "SELECT * FROM student ORDER BY stuid";
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
echo '<p>Students information:</p>';
echo "<table>";
foreach ($resultSet as $row) {
	echo $row['stuid'];
        echo "    ";
        echo $row['fname'];
        echo "    ";
        echo $row['email'];
        echo "    ";
        echo $row['classname'];
        echo "<br/>";
}
echo "</table>";
?>
</body>
</html>
