
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
 $id = $_POST['id'];

 mysqli_query($conn,"delete from toDo where id = ('$id')");
 //echo 1;
}


// Insert into completed
if($request_type == 4){
 $id = $_POST['id'];

 mysqli_query($conn,"update toDo where id = ('$id') set (complete) = (task), remove (task)");
 // $lastinsert_id = mysqli_insert_id($conn);
 //
 // $return_arr[] = array("id"=>$lastinsert_id,"completed"=>$completed);
 // echo json_encode($return_arr);
}

// Insert completed
if($request_type == 5){
 $id = $_POST['id'];
 $task = $_POST['task'];

 mysqli_query($conn,"update toDo where id = ('$id') set (task) = ('$task') ");
 // $lastinsert_id = mysqli_insert_id($conn);
 //
 // $return_arr[] = array("id"=>$lastinsert_id,"task"=>$task);
 // echo json_encode($return_arr);
}

// Insert completed
if($request_type == 6){
 $id = $_POST['id'];
 $complete = $_POST['complete'];

 mysqli_query($conn,"update toDo where id = ('$id') set (complete) = ('$complete') ");
 // $lastinsert_id = mysqli_insert_id($conn);
 //
 // $return_arr[] = array("id"=>$lastinsert_id,"task"=>$task);
 // echo json_encode($return_arr);
}

 echo json_encode($data);


?>
