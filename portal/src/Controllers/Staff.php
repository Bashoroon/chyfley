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

    public function show()
    {
        global $conn;
        $data = array();
        $selectTeacher = $conn->query("select * from users where status='1' and username != '" . $_SESSION['username'] . "'");
        while ($teacher = mysqli_fetch_array($selectTeacher)) {

            $data[] = $teacher;
        }
        return $data;
    }

    // Edit staff

    public function edit($id)
    {
        global $conn;
        $sqlTeacher  = $conn->query("SELECT * from users where id ='$id' ");
        $teacher = mysqli_fetch_array($sqlTeacher);
        return $teacher;
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

    // update staff data
    public function update()
    {

        global $conn;

        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id = $_POST['id'];
        $sch_attended = $_POST['sch_attended'];
        $year = $_POST['year'];
        $cert = $_POST['cert'];
        $kin = $_POST['kin'];
        $kin_phone = $_POST['kin_phone'];
        $kin_address = $_POST['kin_address'];
        $discipline = $_POST['discipline'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $subjectString = implode(',', $subject);



        // Define random digit
        $random_digit = uniqid(); // Generate a unique identifier

        // Signature file upload
        $file_name = $_FILES['signature']['name'];
        $target_dir = "signature_images/";
        $target_file = $target_dir . $random_digit . '_' . basename($_FILES["signature"]["name"]); // Add random digit to the file name

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
            // Upload file
            move_uploaded_file($_FILES['signature']['tmp_name'], $target_file);
        }



        // Update user record in the database
        $sqlUpdate = $conn->query("UPDATE users SET name='$name', username='$username', email='$email', password='$password', signature='$target_file', phone='$phone', sch_attended='$sch_attended', year='$year', cert='$cert', kin='$kin', kin_address='$kin_address', kin_phone='$kin_phone', discipline='$discipline', subject='$subjectString' WHERE id='$id'");

         return header("location:modifyTeacher.php?id=$id")
         ;
    }

    public function total_number_of_staff()
    {
        global $conn;
        $sqlTeachertNo  = $conn->query("SELECT * from users ");
        $teacherNo = mysqli_num_rows($sqlTeachertNo);
        return $teacherNo;
    }
}
