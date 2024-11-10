<?php

namespace Controllers\Record;


class Record
{

    public function create()
    {
        global $conn;
        $session = $_POST['session'];
        $term  = $_POST['term'];
        $class = $_POST['class'];
        $subject = $_POST['subject'];

        foreach ($_POST['admissionNo'] as $key => $value) {
            $admissionNo = $_POST['admissionNo'][$key];
            $test = $_POST['test'][$key];
            $test_two = $_POST['testTwo'][$key];
            $exam = $_POST['exam'][$key];
            if ($test != "" and $exam != "") {
               
                $sqlinputScore = $conn->query("INSERT INTO studentscores (session, term, class, admissionNo, subject, test, test_two, exam ) VALUES ('$session', '$term', '$class', '$admissionNo', '$subject', '$test', '$test_two', '$exam')") or die(mysqli_error($conn));
               
               
            }
           
        }
        return "<span class='alert alert-success float-right'>Student Score Added</span>";

    }
    public function show($session, $term = null, $class, $subject = null)
    {
        global $conn;
        $data = array();
        $sqlStudentScore =  $conn->query("SELECT * from studentscores where session = '$session' and term = '$term' and class = '$class' and subject='$subject'");
        while ($studentScore = mysqli_fetch_array($sqlStudentScore)) {

            $data[] = $studentScore;
        }

        return $data;
    }


    public function broadsheet($session, $term, $class)
    {
        global $conn;
        $data = array();
        $sqlStudentScore =  $conn->query("SELECT * from studentscores where session = '$session' and term = '$term' and class = '$class'");
        while ($studentScore = mysqli_fetch_array($sqlStudentScore)) {

            $data[] = $studentScore;
        }

        return $data;
    }
    // query cbt scores
    public function cbt_scores($admissionNo)
    {
        global $conn;
        $sqlCbtScores = $conn->query("SELECT * FROM cbtscores WHERE session='" . $_GET['session'] . "' AND class='" . $_GET['class'] . "' and term= '" . $_GET['term'] . "' and admissionNo = '$admissionNo' AND subject='" . $_GET['subject'] . "'");
        $cbtScores = mysqli_fetch_array($sqlCbtScores);
        return $cbtScores;
    }

    // find student test and exam score exist
    public function student_score_exist($admissionNo)
    {
        global $conn;
        $sqlfindScore = $conn->query("SELECT * FROM studentscores WHERE admissionNo='$admissionNo' AND session ='" . $_GET['session'] . "' AND class ='" . $_GET['class'] . "' AND term = '" . $_GET['term'] . "' AND subject= '" . $_GET['subject'] . "' ");
        $found = mysqli_num_rows($sqlfindScore);

        return $found;
    }

    public function delete()
    {
        global $conn;

        $id = $_POST['id'];

        // sql to delete a record
        $sql = "DELETE FROM studentscores WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {

            return "<span class='alert alert-danger float-right'> Student scores deleted</span>";
        } else {
            return "<span class='alert alert-danger float-right'> Oops! Something went wrong</span>";
            
        }

        $conn->close();
    }

    public function edit($id)
    {
        global $conn;
        $sqlStudentScore =  $conn->query("SELECT * from studentscores where id='$id' ");
        $studentScore = mysqli_fetch_array($sqlStudentScore);

        return $studentScore;
    }

    public function update()
    {
        global $conn;
        $test = $_POST['test'];
        $test_two = $_POST['testTwo'];
        $exam = $_POST['exam'];
        $id = $_POST['id'];


        $sqlUpdateScore = $conn->query("update studentscores set test='$test', test_two='$test_two', exam='$exam' where id='$id'") or die(mysqli_error($conn));

        return "<span class='alert alert-success float-right'> Student scores Updated</span>";
    }

    // cbt scores
}
