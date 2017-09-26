<?php
try{
	if($_GET['color'] != ""){
		$conn = new mysqli("localhost", "r2hstudent", "SbFaGzNgGIE8kfP", "mbeamer_Challenges");
		$userInsert = "INSERT INTO `ProductTable` (`ProductId`, `ProductPrice`, `ProductName`, `ProductColor`, `ProductDesc`) VALUES (NULL, '".$_GET['price']."'
		, '".$_GET['MName']."'
		, '".$_GET['color']."'
		, '".$_GET['Desc']."'
		)";
		$result = $conn->query($userInsert);
	}
}catch(Exception $e){
	if ($conn->connect_error) {
	    "Connection failed: " . $conn->connect_error;
	}
} 
print($userInsert."</br> Saved");

?>
<html>
	<head></head>
	<body>
		<form action="weeklychallenge3.php">
		  <label for="productInfo">Insert a color</label>
		  <input type="text" name="color" id="color" value=""><br>
		  <label for="productInfo">Insert a price</label>
		  <input type="text" name="price" id="price" value=""><br>

			<label for="productInfo">Insert a Marker Name</label>
		  <input type="text" name="MName" id="MName" value=""><br>

			<label for="productInfo">Insert a Description</label>
		  <input type="text" name="Desc" id="Desc" value=""><br>

		  <input type="submit" value="Submit">
		</form>
	</body>
</html>