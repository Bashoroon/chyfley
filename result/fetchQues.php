
<?php
include 'db.php';
$recordsPerPage = 1; // Number of records to display per page
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number from the query string
$offset = ($currentpage - 1) * $recordsPerPage; // Calculate the offset for the SQL query

$sqlQuestions = $conn->query("SELECT * FROM questionbank WHERE session='" . $_GET['session'] . "' AND term='" . $_GET['term'] . "' AND class='" . $_GET['class'] . "' AND subject='" . $_GET['subject'] . "' LIMIT $offset, $recordsPerPage");

while ($questions = mysqli_fetch_array($sqlQuestions)) {
    $startDate = $questions['startDate'];
    $endDate = $questions['endDate'];
    $sqlCheck = $conn->query("SELECT * FROM studentanswers WHERE quesid='" . $questions['quesid'] . "' AND admissionNo='".$_SESSION['admissionNo']."'");
    $checked = mysqli_fetch_array($sqlCheck);

    // Output the question HTML
    echo '<form class="question-form">
        <input type="hidden" class="quesid" value="' . $questions['quesid'] . '" name="quesid">
        <input type="hidden" class="answer" value="' . $questions['answer'] . '" name="answer">
        <div class="tab">
            <p>' . $questions['question'] . '</p>
            <div class="form-check">
                <input class="form-check-input studentAns" value="A" type="radio" name="studentAns" id="studentAns1" ' . ($checked['studentAnswer'] == "A" ? 'checked' : '') . '>
                <label class="form-check-label" for="studentAns1">' . $questions['optionA'] . '</label>
            </div>
            <div class="form-check">
                <input class="form-check-input studentAns" value="B" type="radio" name="studentAns" id="studentAns2" ' . ($checked['studentAnswer'] == "B" ? 'checked' : '') . '>
                <label class="form-check-label" for="studentAns2">' . $questions['optionB'] . '</label>
            </div>
            <div class="form-check">
                <input class="form-check-input studentAns" value="C" type="radio" name="studentAns" id="studentAns3" ' . ($checked['studentAnswer'] == "C" ? 'checked' : '') . '>
                <label class="form-check-label" for="studentAns3">' . $questions['optionC'] . '</label>
            </div>
            <div class="form-check">
                <input class="form-check-input studentAns" value="D" type="radio" name="studentAns" id="studentAns4" ' . ($checked['studentAnswer'] == "D" ? 'checked' : '') . '>
                <label class="form-check-label" for="studentAns4">' . $questions['optionD'] . '</label>
            </div>
            <div class="form-check">
                <input class="form-check-input studentAns" value="E" type="radio" name="studentAns" id="studentAns5" ' . ($checked['studentAnswer'] == "E" ? 'checked' : '') . '>
                <label class="form-check-label" for="studentAns5">' . $questions['optionE'] . '</label>
            </div>
        </div>
    </form>';
}
