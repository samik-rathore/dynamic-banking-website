<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO myguests (firstname, lastname, email)
VALUES ('Anjali', 'Singh', 'anjalisingh@gmail.com');";
$sql .= "INSERT INTO myguests (firstname, lastname, email)
VALUES ('Rida', 'Mumtaz', 'ridamumtaz@gmail.com');";
$sql .= "INSERT INTO myguests (firstname, lastname, email)
VALUES ('Hema', 'Singh', 'hemasingh@gmail.com')";
//you can add as much rows into the database similarly

if ($conn->multi_query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

?>