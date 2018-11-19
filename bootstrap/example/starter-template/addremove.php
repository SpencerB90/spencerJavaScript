
<?php

include('table.php');
echo "hello";

$data = json_decode(file_get_contents("php://input"));

$request_type = $data->request_type;

// Get all records
if($request_type == 1){
 $sel = mysqli_query($con,"SELECT toDo_id, task, complete FROM toDo");
 $data = array();

 while ($row = mysqli_fetch_array($sel)) {
  $data[] = array("id"=>$row['toDo_id'],"task"=>$row['task'],"complete"=>$row['complete']);
 }
 echo json_encode($data);
}

// Insert task
if($request_type == 2){
 $task = $data->task;

 mysqli_query($con,"insert into toDo(task) values('".$task."')");
 $lastinsert_id = mysqli_insert_id($con);

 $return_arr[] = array("id"=>$lastinsert_id,"task"=>$task);
 echo json_encode($return_arr);
}

// Delete record
if($request_type == 3){
 $toDo_id = $data->toDo_id;

 mysqli_query($con,"delete from toDo where toDo_id=".$toDo_id);
 echo 1;
}


// Insert into completed
if($request_type == 4){
 $completed = $data->completed;

 mysqli_query($con,"update toDo set (complete) = (task), remove (task)");
 $lastinsert_id = mysqli_insert_id($con);

 $return_arr[] = array("id"=>$lastinsert_id,"completed"=>$completed);
 echo json_encode($return_arr);
}

// Insert completed
if($request_type == 5){
 $completed = $data->completed;

 mysqli_query($con,"update toDo (task) = (complete), remove (complete)");
 $lastinsert_id = mysqli_insert_id($con);

 $return_arr[] = array("id"=>$lastinsert_id,"task"=>$task);
 echo json_encode($return_arr);
}


?>
