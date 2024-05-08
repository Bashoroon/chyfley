<?php include 'header.php';
$session = $_GET['session'];
$term = $_GET['term'];
$class = $_GET['class'];
$counter = 0;
?>

<style type="text/css">
    table.minimalistBlack {
        border: 1px solid #000000;
        width: 100%;
        text-align: left;
        border-collapse: collapse;

    }

    table.minimalistBlack td,
    table.minimalistBlack th {
        border: 1px solid #000000;
    }

    table.minimalistBlack tbody td {
        font-size: 13px;
    }

    table.minimalistBlack thead {
        background: #CFCFCF;
        background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
        background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
        background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
        border-bottom: 0px solid #000000;
    }

    table.minimalistBlack thead th {
        font-size: 13px;
        font-weight: bold;
        color: #000000;
        text-align: left;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;


    }

    .vertical {
        transform: rotate(-90deg);
        height: 150px;

    }

    table.minimalistBlack tfoot {
        font-size: 14px;
        font-weight: bold;
        color: #000000;
        border-top: 0px solid #000000;
    }

    table.minimalistBlack tfoot td {
        font-size: 14px;

    }
</style>




<body>
    <?php include 'navigationMenu.php'; ?>
    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">BROAD SHEET FOR <?php print $class; ?></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $session; ?></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $term; ?></a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>

            <table id="broad-sheet" class="minimalistBlack" style="overflow:auto; height: 100px; position: relative;">
                <thead>

                    <?php if ($term == "First") {;
                        $span = "1";
                    }
                    if ($term == "Second") {;
                        $span = "2";
                    }
                    if ($term == "Third") {;
                        $span = "3";
                    }


                    ?>

                    <tr>
                        <th>No</th>
                        <th>Name</th>
                       <?php
$sqlSelectz = $conn->query("SELECT subject FROM studentscores WHERE session='$session' AND term='$term' AND class='$class' GROUP BY subject");

while ($rows = mysqli_fetch_array($sqlSelectz)) {
    $subject = $rows['subject'];
    // Now you can use $subject to retrieve other details if needed
?>
    <th><?php echo $subject; ?></th>
<?php } ?>

                        <th>Total</th>
                        <th>Average</th>


                    </tr>
                </thead>

                <tbody>

                <?php
$sqlSelectStudent =  $conn->query("SELECT * from promotedstudent where session = '$session' and class = '$class' and deleteStatus != 1");

while ($row = mysqli_fetch_array($sqlSelectStudent)) {
    $admissionNo = $row['admissionNo'];
    $sqlFindStu =  $conn->query("SELECT * from studentusers where admissionNo = '$admissionNo'");

    $findStudent = mysqli_fetch_array($sqlFindStu);

    $admissionNo = $row['admissionNo'];

    $sqlTotal = $conn->query("SELECT  sum(test+exam) as totalTestExam from studentscores where session = '$session' and term = '$term' and class = '$class' and admissionNo='$admissionNo' ");
    
    $sqlOffer = $conn->query("SELECT * from studentscores where session = '$session' and term = '$term' and class = '$class' and  admissionNo='$admissionNo'");
      $offer = mysqli_num_rows($sqlOffer);

    $total = mysqli_fetch_assoc($sqlTotal);
    $expectedScore = 100 * $offer;
    $scored =  $total['totalTestExam'];
?>
    <tr>
        <td> <?php print ++$counter; ?></td>
        <td> <?php print $findStudent['surname']; ?> <span><?php print $findStudent['firstName']; ?></span><span> <?php print $findStudent['lastName']; ?> </span></td>
        <?php
        $sqlSelectScore =  $conn->query("SELECT * from studentscores where session = '$session' and term= '$term' and class = '$class' group by subject");
        while ($rowz = mysqli_fetch_array($sqlSelectScore)) {
            $subject =  $rowz['subject'];

            $sqlStudentScore =  $conn->query("SELECT * from studentscores where session = '$session' and term='$term' and class = '$class' and admissionNo='$admissionNo' and subject = '$subject'");

            $studentScore = mysqli_fetch_array($sqlStudentScore);
            $subjectScoresMi = $studentScore['test'] + $studentScore['exam'];
        ?>
            <td class="co-name"><?php if (!empty($subjectScoresMi)) {
                                    echo $subjectScoresMi;
                                } else {
                                    echo "-";
                                } ?></td>

        <?php } ?>
        <td><?php echo $scored; ?></td>
        <td>
    <?php 
    if ($expectedScore != 0) {
        $average = round($scored / $expectedScore * 100, 1);
        echo $average;
    } else {
        echo '-';
    }
    ?>
</td>
    </tr>
<?php } ?>

                </tbody>
            </table>


        </div>
    </div>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>

<?php include 'modal.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {

        //Buttons examples
        var table = $('#broad-sheet').DataTable({
            "scrollX": true,
            lengthChange: false,
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });


        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });
</script>