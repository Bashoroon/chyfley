<?php

namespace Controllers\Clazz;

class Clazz
{


public function create(){
    global $conn;
    $class = $_POST['class'];
 
    $sqlclaz = $conn->query ("select * from class where class='$class'");
       $row = mysqli_num_rows($sqlclaz);
     if ($row > 0) { 
        return "<span class='alert alert-danger float-right'> Class exists</span>";
    
    
    }
    
    else{$sql = "INSERT INTO class (class)
    VALUES ('$class' )";
      ($conn->query($sql) === TRUE)  or die('unable to add class');
      return "<span class='alert alert-success float-right'> Class added</span>";
    }
}

public function show(){
    global $conn;
    $data = array();
    $sqlclass = $conn->query("select * from class");
    while ($class = mysqli_fetch_array($sqlclass)) {
        $data[] = $class;
    }
    return $data;
}

public function my_class($admissionNo) {
    
    global $conn;
    $data = array();
    $sqlclass = $conn->query("select * from promotedstudent where admissionNo = '$admissionNo'");
    while ($class = mysqli_fetch_array($sqlclass)) {
        $data[] = $class;
    }
    return $data;
}


public function index(){
    global $conn;
    $sqlclass = $conn->query("SELECT * from class order by id ASC limit 1");
    $class = mysqli_fetch_array($sqlclass);

    return $class;
}

public function teacher_class($username){
    global $conn;
    $data = array();
    $sqlclass = $conn->query("select class from users where username='$username'");
    while ($nameFound = mysqli_fetch_array($sqlclass)) {

    $data[] = $nameFound;
        }

        return $data;
    }
}