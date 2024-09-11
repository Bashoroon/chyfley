<?php

namespace Controllers\Session;

class Session
{


public function create(){
    global $conn;
    $session = $_POST['session'];
 
$sqlsession  = $conn->query ("select * from session where session='$session'");
   $row = mysqli_num_rows($sqlsession);
 if ($row > 0) { 
    return "<span class='alert alert-danger float-right'> Session Updated</span>";
}

else{$sql = "INSERT INTO session (session)
VALUES ('$session' )";
  ($conn->query($sql) === TRUE)  or die('unable to add session');

  return "<span class='alert alert-success float-right'> Session Added</span>";
   // header('location:index.php?s');
}
}

// My session for a particular student
public function my_session($admissionNo) {
    
    global $conn;
    $data = array();
    $sqlsession = $conn->query("select * from promotedstudent where admissionNo = '$admissionNo'");
    while ($session = mysqli_fetch_array($sqlsession)) {
        $data[] = $session;
    }
    return $data;
}


public function show(){
    global $conn;
    $data = array();
    $sqlsession = $conn->query("select * from session");
    while ($session = mysqli_fetch_array($sqlsession)) {

        $data[] = $session;
    }
    return $data;
}

public function index(){
    global $conn;
    $sqlsession = $conn->query("SELECT * from session order by id DESC limit 1");
    $session = mysqli_fetch_array($sqlsession);
    return $session;
}
}