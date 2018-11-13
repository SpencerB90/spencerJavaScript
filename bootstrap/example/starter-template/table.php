<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "spencer", "southhills#", "spencer");

$result = $conn->query("SELECT task, complete FROM toDo");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
	$outp .= '{"task":"' . $rs["task"] . '",';
  $outp .= '"complete":"' . $rs["complete"] . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
