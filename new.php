
<!DOCTYPE html>
<html>
<head>
<style>
body{
background-image:url("lp.jpg");
  height: 200%;
  background-size: cover;
  color:white;}
.menubar {
  overflow: hidden;
  background-color: #333;
  color:white;
}


</style>
</head>
<body>

<h1 style="text-align:center;">Money Transferred Succesfully!!<br> Press <a href="homeyhome.html">here</a> to go back to home</h1>

</body>
</html>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$transFromErr = $transToErr = $amtErr= "";
$transFrom = $transTo = $amt = "";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["transFrom"])){
	$transFromErr="The field is required";
	}
	else{
	$transFrom=test_input($_POST["transFrom"]);
	}
	if(empty($_POST["transTo"])){
	$transToErr="The field is required";
	}
	else{
	$transTo=test_input($_POST["transTo"]);
	}
	if(empty($_POST["amt"])){
	$amtErr="this field is required";
	}
	else{
	$amt=test_input($_POST["amt"]);
}}
function test_input($data){
  $data=trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$frompieces=explode(" ",$transFrom);
$topieces=explode(" ",$transTo);
$z=NULL;
$x=NULL;
$sql="SELECT firstname,lastname,money FROM myguests";
$result=$conn->query($sql);
while($row=$result->fetch_assoc())
{ 
if ($row["lastname"]==$topieces[1]) 
{if ($row["firstname"]==$topieces[0]){
$z=$row["money"]+$amt;
}}
if ($row["lastname"]==$frompieces[1]){if ($row["firstname"]==$frompieces[0]){
$x=$row["money"]-$amt;}
}}

$sql="UPDATE myguests SET money=$z WHERE lastname='$topieces[1]';";
$sql.="UPDATE myguests SET money=$x WHERE lastname='$frompieces[1]'";
if ($conn->multi_query($sql) === TRUE) {

} else{
  echo "Error updating record: " . $conn->error;
}



?>