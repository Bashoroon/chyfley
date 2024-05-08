<?php
include 'db.php'; // Include your database connection code

if (isset($_POST['term']) && isset($_POST['class']) && isset($_POST['subject'])  && isset($_POST['topic'])) {
    $term  = $_POST['term'];
    $class = $_POST['class'];
    $datez = date('Y-m-d H:i:s');
    $subject = $_POST['subject'];
    $note = addslashes($_POST['note']);
    $topic = addslashes($_POST['topic']);
    $noteid = uniqid();

    // Upload the PDF file
    if (isset($_FILES['pdf'])) {
        $pdfName = $_FILES['pdf']['name'];
        $pdfTmpName = $_FILES['pdf']['tmp_name'];

        // Generate random digits
        $randomDigits = mt_rand(100000, 999999);

        // Extract file extension
        $fileExtension = pathinfo($pdfName, PATHINFO_EXTENSION);

        // Construct the new file name with random digits
        $newFileName = $randomDigits . '_' . $pdfName;

        // Specify the upload directory for PDFs
        $uploadDirectory = 'enote/';

        // Move the uploaded PDF to the specified directory with the new name
        $destination = $uploadDirectory . $newFileName;
        if (move_uploaded_file($pdfTmpName, $destination)) {
            // Insert the information about the note, including the PDF path, into the database
            $sqlAddEnote = $conn->query("INSERT INTO enote (term, class, datez, subject, note, topic, noteid, pdf_path) VALUES ('$term', '$class', '$datez', '$subject', '$note', '$topic', '$noteid', '../portal/$destination')") or die(mysqli_error($conn));
            header("location: viewEditEnote.php?noteid=$noteid");
        } else {
             echo "Error uploading PDF. " . $_FILES['pdf']['error'];
        }
    }
}
?>
