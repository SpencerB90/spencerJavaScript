
<?php

include('table.php');


$_POST = json_decode(file_get_contents('php://input'), true);

$request_type = $_POST['request_type'];


// Get all records
if($request_type == 1){
 $sel = mysqli_query($conn,"SELECT toDo_id, task, complete FROM toDo");
 $data = array();

 while ($row = mysqli_fetch_array($sel)) {
  $data[] = array("toDo_id"=>$row['toDo_id'],"task"=>$row['task'],"complete"=>$row['complete']);
 }
 echo json_encode($data);
}

// Insert task
if($request_type == 2){
 $task = $_POST['task'];

 mysqli_query($conn,"insert into toDo (task) values ('$task')");
 //$lastinsert_id = mysqli_insert_id($conn);

 //$return_arr[] = array("id"=>$lastinsert_id,"task"=>$task);
// echo json_encode($return_arr);
}

// Delete record
if($request_type == 3){
 $toDo_id = $_POST['toDo_id'];

 mysqli_query($conn,"delete from toDo where toDo_id = ('$toDo_id')");
 echo 1;
}


// Insert into completed
if($request_type == 4){
 $toDo_id = $_POST['toDo_id'];

 mysqli_query($conn,"update toDo where toDo_id = ('$toDo_id') set (complete) = (task), remove (task)");
 // $lastinsert_id = mysqli_insert_id($conn);
 //
 // $return_arr[] = array("id"=>$lastinsert_id,"completed"=>$completed);
 // echo json_encode($return_arr);
}

// Insert completed
if($request_type == 5){
 $toDo_id = $_POST['toDo_id'];
 $task = $_POST['task'];

 mysqli_query($conn,"update toDo where toDo_id = ('$toDo_id') set (task) = ('$task') ");
 // $lastinsert_id = mysqli_insert_id($conn);
 //
 // $return_arr[] = array("id"=>$lastinsert_id,"task"=>$task);
 // echo json_encode($return_arr);
}

// Insert completed
if($request_type == 6){
 $toDo_id = $_POST['toDo_id'];
 $complete = $_POST['complete'];

 mysqli_query($conn,"update toDo where toDo_id = ('$toDo_id') set (complete) = ('$complete') ");
 // $lastinsert_id = mysqli_insert_id($conn);
 //
 // $return_arr[] = array("id"=>$lastinsert_id,"task"=>$task);
 // echo json_encode($return_arr);
}


?>
