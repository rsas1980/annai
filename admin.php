<?php
session_start();
include('db.php');

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

$date = isset($_POST['date']) ? $_POST['date'] : date('Y-m-d');

$query = "SELECT * FROM tokens WHERE date = '$date'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Date-based Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Admin Panel - Report for <?php echo $date; ?></h1>
    <form method="post">
        <label for="date">Select Date:</label>
        <input type="date" name="date" value="<?php echo $date; ?>" required>
        <button type="submit">Filter</button>
    </form>
    
    <table>
        <tr>
            <th>Token Number</th>
            <th>Mobile Number</th>
            <th>Selected Option</th>
            <th>Date</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['token_number']; ?></td>
            <td><?php echo $row['mobile_number']; ?></td>
            <td><?php echo $row['selected_option']; ?></td>
            <td><?php echo $row['date']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
