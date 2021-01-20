
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
#foot{
    color:white;
    text-align:center;
    margin-top:300px;
    }
</style>
</head>
<body>

<h1 style="text-align:center;">Money Transferred Succesfully!!<br> Press <a href="index.html">here</a> to go back to home</h1>
<footer id="foot">
  <p>Author: Samiksha Rathore<br>
  GRIP January Internship</p>
</footer>
</body>
</html>



<?php
$servername = "localhost";
$username = "id15941124_root";
$password = "n5fzer%]9LOEbX2}";
$database = "id15941124_mydb";

$conn = new mysqli($servername, $username, $password, $database);
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
while($row=$result->fetch_assoc()){ 
	if ($row["lastname"]==$topieces[1]) {
		if ($row["firstname"]==$topieces[0]){
			$z=$row["money"]+$amt;
	}}
	if ($row["lastname"]==$frompieces[1]){
		if ($row["firstname"]==$frompieces[0]){
			$x=$row["money"]-$amt;}
	}}

$sql="UPDATE myguests SET money=$z WHERE firstname='$topieces[0]'";
if ($conn->query($sql) === TRUE) {} 
else{
  echo "Error updating record: " . $conn->error;
}
$sql="UPDATE myguests SET money=$x WHERE firstname='$frompieces[0]'";
if ($conn->query($sql) === TRUE) {} 
else{
  echo "Error updating record: " . $conn->error;
}
$sql="INSERT INTO Transfers (Transferred_from, Transferred_to, transfer_money)
VALUES ('$transFrom', '$transTo', '$amt');";
if ($conn->multi_query($sql) === TRUE) {} 
else{
  echo "Error updating record: " . $conn->error;
}
?>
