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
