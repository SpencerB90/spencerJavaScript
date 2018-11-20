<?php

//includes the database connection
include('table.php');

//grabs the post data
$_POST = json_decode(file_get_contents('php://input'), true);

//grabs the post data for button selection
$request_type = $_POST['request_type'];

// Get all records
 $sel = mysqli_query($conn,"SELECT id, task, complete FROM toDo");
 $data = array();

 while ($row = mysqli_fetch_array($sel)) {
  $data[] = array("id"=>$row['id'],"task"=>$row['task'],"complete"=>$row['complete']);
 }

 //sends back data to html for the while row update pulls
  echo json_encode($data);
 ?>
