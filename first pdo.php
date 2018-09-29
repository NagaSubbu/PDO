<?php
function DbConnect()
{
$host="localhost";
$username="root";
$password="";
$dbname="test";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname;$username,$password");
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	return $conn;
}
catch(PDOException $e)
{
  echo $e->getMessage();	
}
}
function selectdata()
{
	$conn = Dbconnect();
	$stmt = $conn->prepare("select * from users");
	$stmt->execute();
 $result = $stmt-> setFetchMode(PDO::FETCH_ASSOC); 
	while($row = $stmt->fetch())
	{echo $row['Username'] . "<br>";
	 echo $row['Password'] . "</br>";
}
}
selectdata();
?>