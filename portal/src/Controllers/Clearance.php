<?php 

namespace Controllers\Clearance;

class Clearance 
{
    public function clear_student() {
        global $conn;
        $session = $_POST['session'];
        $class = $_POST['class'];
        $term = $_POST['term'];
        $admissionNo = $_POST['admissionNo']; // Get single admission number

        $sqlclear = $conn->query("INSERT INTO clearance (session, term, class, admissionNo) VALUES ('$session', '$term', '$class', '$admissionNo')");

        if ($sqlclear) {
            return $response = "Student with admission number $admissionNo cleared successfully.";
        } else {
            return $response = "Unable to clear student with admission number $admissionNo.";
        }
    }

    public function delete_clearance() {
        global $conn;
        $session = $_POST['session'];
        $class = $_POST['class'];
        $term = $_POST['term'];
        $admissionNo = $_POST['admissionNo'];

        $sqldelete = $conn->query("DELETE FROM clearance WHERE session = '$session' AND term = '$term' AND class = '$class' AND admissionNo = '$admissionNo'");

        if ($sqldelete) {
            return $response = "Student with admission number $admissionNo clearance deleted successfully.";
        } else {
            return $response = "Unable to delete clearance for student with admission number $admissionNo.";
        }
}


}