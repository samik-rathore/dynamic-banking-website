<?php session_start(); ?>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 70%;
    margin-left: auto;
  margin-right: auto;
}

#customers td, #customers th {
  border: 1px solid #564f6f;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #802bb1;color:white}
#customers tr:nth-child(odd){background-color:#4c495d;color:white}

#customers tr:hover {background-color: #d1d7e0;color:black;}

#customers th {
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
#customers a{
text-decoration:none;color:white;}
#customers a:hover {
  text-decoration: underline;color:black;
}

.menubar a.active {
  background-color: #802bb1;
  color: white;
}
#foot{
    color:white;
    text-align:center;
    margin-top:155px;
    }
</style>
</head>
<body>
<div class="menubar">
  <a href="tranfertable.php">Transfers</a>
  <a class="active">Customers</a>
  <a href="index.html">Home</a>
</div><br><br><br>
<?php


$servername = "localhost";
$username = "id15941124_root";
$password = "n5fzer%]9LOEbX2}";
$database = "id15941124_mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT id, firstname, lastname,money FROM myguests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table id=customers><tr><th>ID</th><th>Name</th><th>Balance</th></tr>";
    // output data of each row
    while($row=$result->fetch_assoc()){
        echo "<tr><td>" . $row["id"]. "</td><td><a href=specific.php?id=$row[id]>". $row["firstname"]. " " . $row["lastname"]. "</a></td><td>".$row["money"]."</td></tr>";
		
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
<footer id="foot">
  <p>Author: Samiksha Rathore<br>
  GRIP January Internship</p>
</footer>
</body>
</html>
