<html>
<head>
<style>
#transfers {
	font-family: Arial, Helvetica, sans-serif;
	border-collapse: collapse;
	width: 70%;
    margin-left: auto;
	margin-right: auto;
}

#transfers td, #transfers th {
	border: 1px solid #564f6f;
	padding: 8px;
}

#transfers tr:nth-child(even){
	background-color: #802bb1;color:white}
#transfers tr:nth-child(odd){
	background-color:#4c495d;color:white}

#transfers tr:hover{
	background-color: #d1d7e0;color:black;}

#transfers th {
	padding-top: 12px;
	padding-bottom: 12px;
	text-align: left;
	background-color: #2d283e;
	color: white;
}
body{
	background-image:url("lp.jpg");
	background-size: cover;}
.menubar {
	overflow: hidden;
	background-color: #333;
	color:white;
}

.menubar a {
	float: right;
	color: white;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
	font-size: 17px;
}

.menubar a:hover {
	background-color: #ddd;
	color: black;
}
#transfers a{
	text-decoration:none;color:white;}
#transfers a:hover {
	text-decoration: underline;color:black;
}

.menubar a.active {
	background-color: #802bb1;
	color: white;
}
</style>
</head>
<body>
<div class="menubar">
  <a class="active">Transfers</a>
  <a href="customers.php">Customers</a>
  <a href="index.html">Home</a>
</div><br><br><br>
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE Transfers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Transferred_from VARCHAR(30) NOT NULL,
Transferred_to VARCHAR(30) NOT NULL,
email VARCHAR(50),
transfer_money INT(100)
)";

$s=$conn->query($sql) ;
$sql = "SELECT id, Transferred_from, Transferred_to,transfer_money FROM transfers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table id=transfers><tr><th>ID</th><th>Transferred From</th><th>Transferred To</th><th>Amount</th></tr>";
    // output data of each row
    while($row=$result->fetch_assoc()){
        echo "<tr><td>" . $row["id"]. "</td><td>". $row["Transferred_from"]. " </td><td>" . $row["Transferred_to"]. "</td><td>".$row["transfer_money"]."</td></tr>";
		
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>