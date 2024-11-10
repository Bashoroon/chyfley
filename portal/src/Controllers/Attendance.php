<?php

namespace Controllers\Attendance;

class Attendance
{
    public function create() {}

    // Add comment and attendance for student
    public function add_student_comment_and_attendance()
    {
        global $conn;
        $session = $_POST['session'];
        $class = $_POST['class'];
        $term = $_POST['term'];
        foreach ($_POST['admissionNo'] as $key => $value) {
            $admissionNo = $_POST['admissionNo'][$key];
            $present = $_POST['present'][$key];
            $comment = $_POST['comment'][$key];
            if ($present != "" and $comment != "") {

                $sqlAddStudent = $conn->query("INSERT INTO studentatt (admissionNo, present, comment, session, term, class) VALUES ('$admissionNo', '$present', '$comment', '$session', '$term', '$class')") or die('unable to add attendance or comment');
            }
        }
        return "<span class='alert alert-success float-right'> Successful</span>";
    }

    public function show($admissionNo)
    {
        global $conn;
        $sqlCheckAtt = $conn->query("SELECT * from studentatt where admissionNo='$admissionNo' and session='" . $_GET['session'] . "' and term='" . $_GET['term'] . "' and class = '" . $_GET['class'] . "' ");
        $attendance = mysqli_fetch_array($sqlCheckAtt);

        return $attendance;
    }

    public function add_comment()
    {
        global $conn;
        $teacherscomment = $_POST['comment'];

        $sqlterm = $conn->query("select * from teacherscomment where comment='$teacherscomment'");
        $row = mysqli_num_rows($sqlterm);
        if ($row > 0) {
            return "<span class='alert alert-danger float-right'> Oops! Something went wrong</span>";
        } else {
            $sql = "INSERT INTO teacherscomment (comment)
            VALUES ('$teacherscomment' )";
            ($conn->query($sql) === TRUE)  or die('unable to add a comment');
            return "<span class='alert alert-success float-right'> Comment added</span>";
        }
    }

    public function show_all(){
        global $conn;
        $data = array();
        $sqlComment = $conn->query("select * from teacherscomment");
        while ($comment = mysqli_fetch_array($sqlComment)){

            $data[] = $comment;
        }
        return $data;
    }
}
