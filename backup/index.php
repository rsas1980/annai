<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mobile_number = $_POST['mobile_number'];
    $selected_option = $_POST['selected_option'];
    $date = date('Y-m-d');

    // Validate mobile number
    if (!preg_match('/^\d{10}$/', $mobile_number)) {
        echo "Invalid mobile number.";
        exit;
    }

    // Get today's last token number
    $query = "SELECT COALESCE(MAX(token_number), 0) + 1 AS token FROM tokens WHERE date = '$date'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $token_number = $row['token'];

    // Insert token into the database
    $query = "INSERT INTO tokens (mobile_number, selected_option, token_number, date) 
              VALUES ('$mobile_number', '$selected_option', $token_number, '$date')";
    if (mysqli_query($conn, $query)) {
        echo "Your token number for today is: " . $token_number;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Token Generation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" action="">
        <label>Mobile Number:</label>
        <input type="text" name="mobile_number" required>
        <label>Select an Option:</label>
        <div class="options">
            <input type="radio" name="selected_option" value="Option 1" required> Option 1
            <input type="radio" name="selected_option" value="Option 2"> Option 2
            <input type="radio" name="selected_option" value="Option 3"> Option 3
            <input type="radio" name="selected_option" value="Option 4"> Option 4
        </div>
        <button type="submit">Generate Token</button>
    </form>
</body>
</html>
