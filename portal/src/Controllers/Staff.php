<?php

namespace Controllers\Staff;


class Staff
{

    public function create()
    {
        global $conn;

        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        $classString = implode(',', $class);
        $subjectString = implode(',', $subject);

        $sqlAddTeacher = $conn->query("INSERT INTO users (name, username, email, password, role, class, subject, status) VALUES ('$name', '$username', '$email', '$password', '$role', '$classString', '$subjectString', '1')") or die('Unable to add teacher');
        return "<span class='alert alert-success float-right'>Teacher added successfully</span>";
    }

    public function show(){
        global $conn;
        $data = array();
        $selectTeacher = $conn->query("select * from users where status='1' and username != '".$_SESSION['username']."'");
        while ($teacher = mysqli_fetch_array($selectTeacher)){

            $data[] = $teacher;
        }
        return $data;
    }

    public function delete($id)
    {
        global $conn;
       
        // sql to delete a record
        $sql = "UPDATE users SET status = '0' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            return "<span class='alert alert-danger float-right'>Teacher deleted successfully</span>";
        } else {
            return "Error deleting record: " . $conn->error;
        }

        $conn->close();
    }
}
