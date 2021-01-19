<html>
<head>
<style>
body{
	background-image:url("lp.jpg");
	background-repeat: no-repeat;
	background-size: cover;
	color:white;
	font-family: 'Times New Roman', serif;}
.error {
	color:#FF0000;}
#box{
	width:100%;
	background-color:rgba(128, 43, 177,0.5);
	text-align: center;
	font-size:25px;
	padding-top:50px;
	padding-bottom:50px;}
#drop{
	margin-top:-55px;
	margin-left:560px;
	}
#drop select{
	width:200px;
	height:26px;}
#h1{ width:100%;
	height:60px;
	background-color: #333;
	padding-top:3px;
	padding-bottom:15px;
	text-align:center;}
#deet{
	font-size:20px;
	text-align:center;
	width:100%;
}
</style>
</head>
<body><div id="h1">
<h1>DETAILS</h1></div><br><br>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);
$id= $_GET['id'];
$name="";
$sql = "SELECT firstname,lastname,money,email FROM myguests where id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
	while($row=$result->fetch_assoc()){echo"<div id =deet>Name: ".$row["firstname"]." ".$row["lastname"]. "<br><br>Email:".$row["email"]."<br><br>Current Balance:Rs.".$row["money"]."</div>";
	$name=$row["firstname"]." ".$row["lastname"];}
}
$transFromErr = $transToErr = $amtErr= "";
$transFrom = $transTo = $amt = "";
?><br><br>
 <div id="box">
<form action="new.php" method="post" >
Transferred From: <input type="text" name="transFrom" value="<?php echo $name; ?>">
  <span class="error">* <?php echo $transFromErr;?></span>
  <br><br>
    Transferred To: <input type="textbox" name="transTo" id="mytextbox"/>
  <span class="error">* <?php echo $transToErr;?></span>
  <br><br>

<?php
$sql = "SELECT firstname,lastname FROM myguests";
$result = $conn->query($sql);
$names=array();
if ($result->num_rows > 0)
{
while($row=$result->fetch_assoc()){$full_name=$row["firstname"]." ".$row["lastname"];
array_push($names,$full_name);}}
?><div id="drop">
<select id="mydropbox" onchange="copyValue()"><option>Select</option>
   <?php foreach($names as $name){?> <option><?php echo $name;?></option>
<?php }?>
</select>
</div>
<br>
<script>
function copyValue() {
    var dropboxvalue = document.getElementById('mydropbox').value;
    document.getElementById('mytextbox').value = dropboxvalue;
}
</script>
  Amount: <input type="number" name="amt" value="">
  <span class="error"><?php echo $amtErr;?></span>
  <br><br>
    <input type="submit" name="submit" value="Submit">  
</form>
</div>
</body>
</html>