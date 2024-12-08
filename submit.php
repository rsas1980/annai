<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "user_responses";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$mobile = $_POST['mobile'];
$option = $_POST['option'];
$current_date = date('Y-m-d');

// Get the token number for the current day
$sql = "SELECT COUNT(*) as token_count FROM responses WHERE created_at = '$current_date'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$token_number = $row['token_count'] + 1;

$sql = "INSERT INTO responses (mobile, option_selected, token_number, created_at) VALUES ('$mobile', '$option', '$token_number', '$current_date')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. Your token number is: $token_number";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
