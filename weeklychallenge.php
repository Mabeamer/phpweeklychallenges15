<?php

try{
	$conn = new mysqli("localhost", "root", "root", "r2hchallenge");
	print "connected </br>";
	$sql = "SELECT StateName FROM StateTable";
	$result = $conn->query($sql);
	print_r($result);
	print "<select>";
	while($row = $result->fetch_assoc()) {
        echo "id: " . $row["StateName"]."</br>";
  				print "<option value=$results>".$row["StateName"]."</option>";
    }
    print"</select> ";
}catch(Exception $e){
	if ($conn->connect_error) {
	    "Connection failed: " . $conn->connect_error;
	} 
}
?>
