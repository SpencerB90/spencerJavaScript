<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "spencer", "southhills#", "spencer");

$result = $conn->query("SELECT first_name, last_name, city FROM angular_people");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
	$outp .= '{"FirstName":"' . $rs["first_name"] . '",';
	$outp .= '"LastName":"'. $rs["last_name"] 	. '"';
  $outp .= '"City":"'. $rs["city"] 	. '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
