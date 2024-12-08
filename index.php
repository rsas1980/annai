<!DOCTYPE html>
<html>
<head>
    <title>Token Generation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" action="">
	<div align=middle> <label>Annai E-Sevai - Token Generation System</label> </div>
	<div align=middle><img src="/token/image/annai.jpeg" width="200" height="75"></img></div>
	
        <div align=middle> <label>Whatsapp Mobile Number:</label> </div>
        <div align=middle> <input type="text" name="mobile_number" required> </div>
		 
        <div align=middle>  <label>Choose your service</label> </div>
		<div class="options"> 
		    <div class="option-tile">
            <input type="radio" name="selected_option" value="1" required><label><br>மின்-சேவை<br> E-Sevai</label> </div> 
		 <div class="option-tile">
			<input type="radio" name="selected_option" value="2"><label><br>வங்கி சேவை / கட்டணம் செலுத்துதல் <br> Bank Service / Bill Payment</Label> </div></div>
		 <div class="options"><div class="option-tile">
            <input type="radio" name="selected_option" value="3"><label><br>பிவிசி அட்டை <br> PVC Card</label></div>
		 <div class="option-tile">
            <input type="radio" name="selected_option" value="4"><label><br>அரசு முத்திரை தாள் <br> E-Stamp Paper</label></div>
		       </div></div>
		<div align=middle>
			<input type="submit" value="Generate Token"> </div>
        
    </form>
</body>
</html>

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
		//header("Location: /token/tokenno.php");
		//echo "<div align=middle><h3>Your Mobile number:" . $mobile_number. "</h2>></div>";
		//echo "<div align=middle><h3>Selected Option   :" . $selected_option. "</h2>></div>";
        echo "<div align=middle><h2>Your token number is :" . $token_number. "</h2></div>";
	
	} else {
        echo "Error: " . mysqli_error($conn);
	}
	
	
}
?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>