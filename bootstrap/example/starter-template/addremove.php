
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

// Insert task
if($request_type == 2){
 $task = $_POST['task'];

 mysqli_query($conn,"insert into toDo (task) values ('$task')");

while ($row = mysqli_fetch_array($sel)) {
 $data[] = array("id"=>$row['id'],"task"=>$row['task'],"complete"=>$row['complete']);
}
}

// Delete record
if($request_type == 3){
 $Uid = $_POST['id'];

 mysqli_query($conn,"delete from toDo where id = ('$Uid')");
 echo 1;

 while ($row = mysqli_fetch_array($sel)) {
  $data[] = array("id"=>$row['id'],"task"=>$row['task'],"complete"=>$row['complete']);
 }
}

// Insert into completed
if($request_type == 4){
 $Uid = $_POST['id'];

 mysqli_query($conn,"update toDo set complete = 1 where id = ('$Uid')");

 while ($row = mysqli_fetch_array($sel)) {
  $data[] = array("id"=>$row['id'],"task"=>$row['task'],"complete"=>$row['complete']);
 }
}

// Insert incomplete
if($request_type == 5){
 $Uid = $_POST['id'];

 mysqli_query($conn,"update toDo set complete = 0 where id = ('$Uid') ");

 while ($row = mysqli_fetch_array($sel)) {
  $data[] = array("id"=>$row['id'],"task"=>$row['task'],"complete"=>$row['complete']);
 }
}

// updating
if($request_type == 6){
 $Uid = $_POST['id'];
 $task = $_POST['task'];

 mysqli_query($conn,"update toDo set task = '$task' WHERE id = ('$Uid') ");

 while ($row = mysqli_fetch_array($sel)) {
  $data[] = array("id"=>$row['id'],"task"=>$row['task'],"complete"=>$row['complete']);
 }
}

//sends back data to html for the while row update pulls
 echo json_encode($data);
?>
