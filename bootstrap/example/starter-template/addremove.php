
<?php

include('table.php');


$_POST = json_decode(file_get_contents('php://input'), true);

$request_type = $_POST['request_type'];


// Get all records
//if($request_type == 1){
 $sel = mysqli_query($conn,"SELECT id, task, complete FROM toDo");
 $data = array();

 while ($row = mysqli_fetch_array($sel)) {
  $data[] = array("id"=>$row['id'],"task"=>$row['task'],"complete"=>$row['complete']);
 }

//}

// Insert task
if($request_type == 2){
 $task = $_POST['task'];

 mysqli_query($conn,"insert into toDo (task) values ('$task')");
 //$lastinsert_id = mysqli_insert_id($conn);

 //$return_arr[] = array("id"=>$lastinsert_id,"task"=>$task);
// echo json_encode($return_arr);

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
 // $lastinsert_id = mysqli_insert_id($conn);
 //
 // $return_arr[] = array("id"=>$lastinsert_id,"completed"=>$completed);
 // echo json_encode($return_arr);

 while ($row = mysqli_fetch_array($sel)) {
  $data[] = array("id"=>$row['id'],"task"=>$row['task'],"complete"=>$row['complete']);
 }
}

// Insert incomplete
if($request_type == 5){
 $Uid = $_POST['id'];

 mysqli_query($conn,"update toDo set complete = 0 where id = ('$Uid') ");
 // $lastinsert_id = mysqli_insert_id($conn);
 //
 // $return_arr[] = array("id"=>$lastinsert_id,"task"=>$task);
 // echo json_encode($return_arr);

 while ($row = mysqli_fetch_array($sel)) {
  $data[] = array("id"=>$row['id'],"task"=>$row['task'],"complete"=>$row['complete']);
 }
}

//not done
// updating
if($request_type == 6){
 $Uid = $_POST['id'];
 $task = $_POST['task'];

 mysqli_query($conn,"update toDo set task = '$task' WHERE id = $Uid ");
 // $lastinsert_id = mysqli_insert_id($conn);
 //
 // $return_arr[] = array("id"=>$lastinsert_id,"task"=>$task);
 // echo json_encode($return_arr);

 while ($row = mysqli_fetch_array($sel)) {
  $data[] = array("id"=>$row['id'],"task"=>$row['task'],"complete"=>$row['complete']);
 }
}



 echo json_encode($data);


?>
