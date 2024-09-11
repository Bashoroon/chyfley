<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Check if the uploaded file is a .docx file
        if ($fileExtension === 'docx') {
            // Load the .docx content using PHP's ZipArchive class
            $zip = new ZipArchive;
            if ($zip->open($fileTmpPath) === TRUE) {
                // Extract the document.xml which contains the text content
                $content = $zip->getFromName('word/document.xml');
                $zip->close();

                // Remove XML tags to extract plain text
                $textContent = strip_tags($content);

                // Parse the content into questions, options, and answers
                $questions = parseDocxContent($textContent);

                // Database connection
                $host = 'localhost';
                $dbname = 'tenderst_db';
                $username = 'root';
               

                try {
                    // Connect to the database
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Prepare the insert statement
                    $stmt = $pdo->prepare("INSERT INTO questionbank (question, optionA, optionB, optionC, optionD, optionE, answer) 
                                           VALUES (:question, :optionA, :optionB, :optionC, :optionD, :optionE, :answer)");

                    // Insert each question into the database
                    foreach ($questions as $q) {
                        $stmt->execute([
                            ':question' => $q['question'],
                            ':optionA' => $q['optionA'],
                            ':optionB' => $q['optionB'],
                            ':optionC' => $q['optionC'],
                            ':optionD' => $q['optionD'],
                            ':optionE' => $q['optionE'],
                            ':answer' => $q['answer']
                        ]);
                    }

                    echo "File uploaded and content saved successfully!";
                } catch (PDOException $e) {
                    echo "Database error: " . $e->getMessage();
                }
            } else {
                echo "Failed to open the .docx file.";
            }
        } else {
            echo "Only .docx files are allowed.";
        }
    } else {
        echo "File upload error: " . $_FILES['file']['error'];
    }
}

/**
 * Function to parse the .docx content and extract questions, options, and answers.
 * Adjust this function based on the structure of your document.
 */
function parseDocxContent($textContent) {
    // Initialize an array to store questions
    $questions = [];
    $lines = explode("\n", $textContent);

    $currentQuestion = [];
    foreach ($lines as $line) {
        $line = trim($line);

        // Check if the line is a question
        if (preg_match('/^Q\d+:/i', $line)) {
            // Save the current question if it's not empty
            if (!empty($currentQuestion)) {
                $questions[] = $currentQuestion;
            }
            // Start a new question
            $currentQuestion = ['question' => $line, 'optionA' => '', 'optionB' => '', 'optionC' => '', 'optionD' => '', 'optionE' => '', 'answer' => ''];
        } elseif (preg_match('/^A\./i', $line)) {
            $currentQuestion['optionA'] = $line;
        } elseif (preg_match('/^B\./i', $line)) {
            $currentQuestion['optionB'] = $line;
        } elseif (preg_match('/^C\./i', $line)) {
            $currentQuestion['optionC'] = $line;
        } elseif (preg_match('/^D\./i', $line)) {
            $currentQuestion['optionD'] = $line;
        } elseif (preg_match('/^E\./i', $line)) {
            $currentQuestion['optionE'] = $line;
        } elseif (preg_match('/^Answer:/i', $line)) {
            $currentQuestion['answer'] = str_replace('Answer:', '', $line);
        }
    }

    // Add the last question if present
    if (!empty($currentQuestion)) {
        $questions[] = $currentQuestion;
    }

    return $questions;
}
?>
