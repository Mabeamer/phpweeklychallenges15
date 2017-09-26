<?php

try{
	$conn = new mysqli("localhost", "r2hstudent", "SbFaGzNgGIE8kfP", "mbeamer_Challenges");
	print "connected </br>";
	$sql = "SELECT distinct ProductColor FROM ProductTable";
	$result = $conn->query($sql);
	print_r($result);

	print "<form action='weeklychallenge2.php'><select id='selectedUserColor' name='selectedUserColor'>";
	while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ProductColor"]."</br>";
  				print "<option value=".$row["ProductColor"].">".$row["ProductColor"]."</option>";


    }
    $userColor = $_GET['selectedUserColor'];
    print"</select> </br>";
    print "<input type='submit' value='go'></submit></form>";
    	$sql = "SELECT distinct ProductPrice, ProductName FROM ProductTable WHERE ProductColor='$userColor'";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
        		print $row["ProductName"]." ";
  				print $row["ProductPrice"]." </br>";

    }
}catch(Exception $e){
	if ($conn->connect_error) {
	    "Connection failed: " . $conn->connect_error;
	} 
}
?>
