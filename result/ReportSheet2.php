<?php include 'db.php';?>
<!DOCTYPE html>
<html lang="en">

    <!--Chartist Chart CSS -->
    <link rel="stylesheet" href="https://portal.chyfleyschools.com.ng/plugins/chartist/css/chartist.min.css"><head>
   <?php include 'header.php';
   ?>
</head>
<style type="text/css">
    table.minimalistBlack {
  border: 3px solid #000000;
  width: 100%;
  text-align: left;
  border-collapse: collapse;

}
table.minimalistBlack td, table.minimalistBlack th {
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
  border-bottom: 3px solid #000000;
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
.vertical  {
transform: rotate(-90deg);
height: 150px;

}
table.minimalistBlack tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #000000;
  border-top: 3px solid #000000;
}
table.minimalistBlack tfoot td {
  font-size: 14px;

}
table thead.minimalistBlack{
  
}
#printable { display: none; }

    @media print
    {
        #non-printable { display: none; }
        #printable { display: block; }
    }

    <?php
    $admissionNo = $_GET['admissionNo'];
    $session = $_GET['session'];
    $term = $_GET['term'];
    $class = $_GET['class'];

    $sqlFindSessionTermClass = $conn->query("select * from studentscores where admissionNo='$admissionNo' and session= '$session' and term = '$term' and class='$class'");
    $sqlStudentInfo = $conn->query("select * from studentusers where admissionNo='$admissionNo' ");
    $studentInfo = mysqli_fetch_array($sqlStudentInfo);

    $founded = mysqli_fetch_array($sqlFindSessionTermClass);

    $sqlSchAtt = $conn->query("select * from schatt where session='$session' and term='$term'");
    $schoolAtt = mysqli_fetch_array($sqlSchAtt);
    $sqlStudentAtt = $conn->query("select * from studentatt where admissionNo='$admissionNo' and session='$session' and term='$term' and class='$class'");
    $studentAtt = mysqli_fetch_array($sqlStudentAtt);
    $sqlNoStudent = $conn->query("select * from promotedstudent where class='$class' and session='$session' ");
    $noStudent = mysqli_num_rows($sqlNoStudent);
    $schOpen = $schoolAtt['schOpen'];
    $present =  $studentAtt['present'];
    $absent = $schOpen - $present;

    $sqlClearance = $conn->query("select * from clearance where admissionNo='$admissionNo' and session= '$session' and term = '$term' and class='$class'");
    $clearance = mysqli_num_rows($sqlClearance);
    
  

    ?>
</style>

<body>
    <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6" id="non-printable">
                        <h4 class="page-title"><?php
                                                $sqlSelectz = $conn->query("select * from studentscores where admissionNo='$admissionNo' and session= '$session' group by subject ");


                                                $chartSubject = "";
                                                $chartScore = "";
                                                $chartScore2 = "";
                                                $chartScore3 = "";

                                                while ($results = mysqli_fetch_array($sqlSelectz)) {

                                                    $sqlSelect1 = $conn->query("select * from studentscores where admissionNo='$admissionNo' and session= '$session' and term = 'First'  and class='$class' and subject= '" . $results['subject'] . "'  ");

                                                    $sqlSelect2 = $conn->query("select * from studentscores where admissionNo='$admissionNo' and session= '$session' and term = 'Second'  and class='$class' and subject= '" . $results['subject'] . "' ");

                                                    $sqlSelect3 = $conn->query("select * from studentscores where admissionNo='$admissionNo' and session= '$session' and term = 'Third'  and class='$class' and subject= '" . $results['subject'] . "' ");
                                                    $select1 = mysqli_fetch_array($sqlSelect1);
                                                    $select2 = mysqli_fetch_array($sqlSelect2);
                                                    $select3 = mysqli_fetch_array($sqlSelect3);
                                                    $chartSubject  .= "'" . substr($results["subject"], 0, 6) . "', ";
                                                    $chartScore  .=  $select1["test"] + $select1["test_two"] + $select1["exam"] . ", ";
                                                    $chartScore2  .=  $select2["test"] + $select2['test_two'] + $select2["exam"] . ", ";
                                                    $chartScore3  .=  $select3["test"] + $select3['test_two'] + $select3["exam"] . ", ";
                                                } ?>Report Sheet</h4>
                    </div>
                    <div class="col-sm-6" id="non-printable">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">CHS Portal</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Report</a></li>
                            <li class="breadcrumb-item active">Report Sheet</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-12">

                    <!-- Left sidebar -->
                    <div class="email-leftbar card">

                        <center>
                            <div class="edit-profile-photo">
                                <?php if ($studentInfo['passport'] == "") { ?><img src="https://portal.chyfleyschools.com.ng/passport/images.jfif" alt="" width="160px" height="180px" class="img-responsive" style=""><?php } else { ?><img src="https://portal.chyfleyschools.com.ng/passport/<?php print $studentInfo['passport']; ?>" alt="" width="160px" height="180px" class="img-responsive" style=""><?php } ?>

                            </div>
                        </center>

                        <button class="m-t-30" style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">Student Info</button>

                        <div class="mail-list m-t-10">
                            <a href="#" class="active"> <span class="float-right"><?php print $founded['class']; ?></span> <i class="ti-archive mr-2"></i> Class</a>
                            <a href="#" class=""> <span class="float-right"><?php print $studentInfo['gender']; ?></span> <i class="ti-archive mr-2"></i> Gender</a>
                            <a href="#"><span class="float-right"><?php print $studentInfo['dob']; ?></span><i class="ti-location-arrow mr-2"></i> DOB</a>
                            <a href="#"><span class="float-right"><?php print $studentInfo['nationality']; ?></span><i class="ti-location-arrow mr-2"></i> Nationality</a>
                            <a href="#"><span class="float-right"><?php print $studentInfo['state']; ?></span><i class="ti-location-arrow mr-2"></i> State of Origin</a>
                            <a href="#"><span class="float-right"><?php print $studentInfo['email']; ?></span><i class="ti-location-arrow mr-2"></i> Email</a>

                        </div>

                        <button class="m-t-30" style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">Session Info</button>

                        <div class="mail-list m-t-10">
                            <a href="#" class="active"> <span class="float-right"><?php print $founded['session']; ?></span> <i class="ti-location-arrow mr-2"></i> Session</a>
                            <a href="#" class=""> <span class="float-right"><?php print $founded['term']; ?></span> <i class="ti-location-arrow mr-2"></i> Term</a>
                            <a href="#"><span class="float-right"><?php print $studentAtt['present']; ?></span><i class="ti-location-arrow mr-2"></i> No of Time Present</a>
                            <a href="#"><span class="float-right"><?php if ($present == "") {
                                                                        echo "";
                                                                    } else {
                                                                        print $absent;
                                                                    } ?></span><i class="ti-location-arrow mr-2"></i> No of Time Absent</a>
                            <a href="#"><span class="float-right"><?php print $schoolAtt['termBegins']; ?></span><i class="ti-location-arrow mr-2"></i> Term begins</a><?php print $schoolAtt['termBegins']; ?>
                            <a href="#"><span class="float-right"><?php print $schoolAtt['termBegins']; ?></span><i class="ti-location-arrow mr-2"></i> Term begins</a><?php print $schoolAtt['termEnds']; ?>
                        </div>

                        <button class="m-t-30" style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">Psychomotor Domain</button>

                        <div class="mail-list m-t-10">
                            <a href="#" class="active"> <span class="float-right"></span> <i class="ti-location-arrow mr-2"></i> Verbal Fluency</a>
                            <a href="#" class=""> <span class="float-right"></span> <i class="ti-location-arrow mr-2"></i>Game</a>
                            <a href="#"><span class="float-right"></span><i class="ti-location-arrow mr-2"></i>Handling Tools</a>
                            <a href="#"><span class="float-right"></span><i class="ti-location-arrow mr-2"></i> Drawing and Painting</a>

                        </div>

                        <button class="m-t-30" style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">Affective Domain</button>

                        <div class="mail-list m-t-10">
                            <a href="#" class="active"> <span class="float-right"></span> <i class="ti-location-arrow mr-2"></i> Punctuality</a>
                            <a href="#" class=""> <span class="float-right"></span> <i class="ti-location-arrow mr-2"></i>Neatness</a>
                            <a href="#"><span class="float-right"></span><i class="ti-location-arrow mr-2"></i> Honesty</a>
                            <a href="#"><span class="float-right"></span><i class="ti-location-arrow mr-2"></i> Interpersonal Relationship</a>
                            <a href="#"><span class="float-right"></span><i class="ti-location-arrow mr-2"></i> Leadership</a>
                            <a href="#"><span class="float-right"></span><i class="ti-location-arrow mr-2"></i> Emotional Stability</a>
                        </div>

                    </div>
                    <!-- End Left sidebar -->

                    <!-- Right Sidebar -->
                    <div class="email-rightbar mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-12">
                                        <img src="assets/images/report_logo.png" style="width: 80%; height: auto; margin-left: 10%;" alt="Chyfley logo">

                                        </div>
                                        
                                    </div>

                                    <div class="col-xl-12 col-12 col-sm-12 col-md-12">
                                        <div class="card m-b-30">
                                            <div class="card-body">
                                                <table id="report" class="minimalistBlack">
                                                    <thead>

                                                        <?php

                                                        $sqlStudentName =  $conn->query("SELECT * from studentusers where admissionNo='$admissionNo'");

                                                        $student = mysqli_fetch_array($sqlStudentName);
                                                        $sqlTotalTest = $conn->query("SELECT  sum(test+test_two) as totalTest from studentscores where session = '$session' and term = '$term' and admissionNo='$admissionNo' ");
                                                        $sqlTotalTestExamFirst = $conn->query("SELECT  sum(test+test_two+exam) as totalTestExamFirst from studentscores where session = '$session' and term = 'First' and class = '$class' and admissionNo='$admissionNo' ");

                                                        $sqlTotalTestExamSecond = $conn->query("SELECT  sum(test+test_two+exam) as totalTestExamSecond from studentscores  where session = '$session' and term = 'Second' and class = '$class' and admissionNo='$admissionNo' ");

                                        $sqlTotalTestExamThird = $conn->query("SELECT  sum(test+test_two+exam) as totalTestExamThird from studentscores  where session = '$session' and term = 'Third' and class = '$class' and admissionNo='$admissionNo' ");

                                        $sqlOfferFirst = $conn->query("SELECT * from studentscores where session = '$session' and term = 'First' and class = '$class' and  admissionNo='$admissionNo'");
                                        $sqlOfferSecond = $conn->query("SELECT * from studentscores where session = '$session' and term = 'Second' and class = '$class' and  admissionNo='$admissionNo'");
                                                        $sqlOfferThird = $conn->query("SELECT * from studentscores where session = '$session' and term = 'Third' and class = '$class' and  admissionNo='$admissionNo'");


                                                        $offer = mysqli_num_rows($sqlOfferFirst);
                                                        $offerSecond = mysqli_num_rows($sqlOfferSecond);
                                                        $offerThird = mysqli_num_rows($sqlOfferThird);

                                                        $numberOfSubjectOfferedSecond = $offer + $offerSecond;
                                                        $numberOfSubjectOfferedThird = $offer + $offerSecond + $offerThird;

                                                        $totalFirst = mysqli_fetch_assoc($sqlTotalTestExamFirst);
                                                        $totalSecond = mysqli_fetch_assoc($sqlTotalTestExamSecond);
                                                        $totalThird = mysqli_fetch_assoc($sqlTotalTestExamThird);
                                                        $expectedScore = 100 * $offer;
                                                        $expectedSecondScore = 200 * $numberOfSubjectOfferedSecond;
                                                        $expectedThirdScore = 300 * $numberOfSubjectOfferedThird;
                                                        $scored =  $totalFirst['totalTestExamFirst'];
                                                        $scoredSecond =  $totalFirst['totalTestExamFirst'] + $totalSecond['totalTestExamSecond'];
                                                        $scoredThird =  $totalFirst['totalTestExamFirst'] + $totalSecond['totalTestExamSecond'] + $totalThird['totalTestExamThird'];
                                                        $percentage = $scored /  $expectedScore * 100;
                                                        $percentageSecond = $scoredSecond /  $expectedSecondScore * 200;
                                                        $percentageThird = $scoredThird /  $expectedThirdScore * 300;

                                                        ?>

                                                        <tr style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">
                                                            <th colspan="6" class="mt-0 header-title">
                                                                <center>
                                                                    <h5 class="text-light"><?php print $student['surname']; ?><?php print $student['firstName']; ?> <?php print $student['lastName']; ?><h5>
                                                                            <h6 class="text-light"><?php print $student['admissionNo']; ?></h6>
                                                                </center>
                                                            </th>



                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        <tr>
                                                            <?php if ($term == 'First') { ?>


                                                                <th colspan="2">Total Score: <span style="font-size: 17px;"> <?php print $totalFirst['totalTestExamFirst']; ?></span></th>
                                                                <th colspan="3"> Percentage: <span style="font-size: 17px;"><?php print round($scored /  $expectedScore * 100, 1); ?>%</span></th>

                                                                <th colspan="2"><span style="font-size: 17px;">Grade:<?php if ($percentage >= 70) {
                                                                                                                            print "A";
                                                                                                                        } elseif ($percentage >= 60) {
                                                                                                                            print "B";
                                                                                                                        } elseif ($percentage >= 50) {
                                                                                                                            print "C";
                                                                                                                        } elseif ($percentage >= 40) {
                                                                                                                            print "D";
                                                                                                                        } elseif ($percentage >= 30) {
                                                                                                                            print "E";
                                                                                                                        } elseif ($percentage >= 20) {
                                                                                                                            print "F";
                                                                                                                        } elseif ($percentage <= 20) {
                                                                                                                            print "F";
                                                                                                                        } ?></span></th>

                                                            <?php } elseif ($term == 'Second') { ?>
                                                                <th colspan="2">Total Score: <span style="font-size: 17px;"> <?php print $scoredSecond; ?></span></th>
                                                                <th colspan="3"> Percentage: <span style="font-size: 17px;"><?php print round($scoredSecond /  $expectedSecondScore * 200, 1); ?>%</span></th>

                                                                <th colspan="2"><span style="font-size: 17px;">Gradse:<?php if ($percentageSecond >= 70) {
                                                                                                                            print "A";
                                                                                                                        } elseif ($percentageSecond >= 60) {
                                                                                                                            print "B";
                                                                                                                        } elseif ($percentageSecond >= 50) {
                                                                                                                            print "C";
                                                                                                                        } elseif ($percentageSecond >= 40) {
                                                                                                                            print "D";
                                                                                                                        } elseif ($percentageSecond >= 30) {
                                                                                                                            print "E";
                                                                                                                        } elseif ($percentageSecond >= 20) {
                                                                                                                            print "F";
                                                                                                                        } elseif ($percentageSecond <= 20) {
                                                                                                                            print "F";
                                                                                                                        } ?></span></th>
                                                            <?php } elseif ($term == 'Third') { ?>
                                                                <th colspan="2">Total Score: <span style="font-size: 17px;"> <?php print $scoredThird; ?></span></th>
                                                                <th colspan="3"> Percentage: <span style="font-size: 17px;"><?php print round($scoredThird /  $expectedThirdScore * 300, 1); ?>%</span></th>

                                                                <th colspan="2"><span style="font-size: 17px;">Gradse:<?php if ($percentageThird >= 70) {
                                                                                                                            print "A";
                                                                                                                        } elseif ($percentageThird >= 60) {
                                                                                                                            print "B";
                                                                                                                        } elseif ($percentageThird >= 50) {
                                                                                                                            print "C";
                                                                                                                        } elseif ($percentageThird >= 40) {
                                                                                                                            print "D";
                                                                                                                        } elseif ($percentageThird >= 30) {
                                                                                                                            print "E";
                                                                                                                        } elseif ($percentageThird >= 20) {
                                                                                                                            print "F";
                                                                                                                        } elseif ($percentageThird <= 20) {
                                                                                                                            print "F";
                                                                                                                        } ?></span></th>
                                                            <?php }  ?>

                                                        </tr>



                                                    </tbody>
                                                </table>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <br>
                                                        <h4 class="mt-0 header-title" style="margin-left: 50px;"> CONGNITIVE DOMAIN </h4>
                                                        <p class="sub-title../plugins">
                                                        </p>
                                                    </div>
                                                </div>



                                                <?php









                                                $sqlSignature = $conn->query("select * from teachersignature where session= '$session' and term = '$term' and class='$class'");
                                                $signature = mysqli_fetch_array($sqlSignature);
                                                $sqlPrincipalSignature = $conn->query("SELECT * from users where username= 'mary' and role='Admin' ");
                                                $principalSignature = mysqli_fetch_array($sqlPrincipalSignature);


                                                ?>

                                                <table id="" class="minimalistBlack">
                                                    <thead>
                                                        <tr style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">

                                                            <th class="text-light">SUBJECT</th>
                                                            <?php if ($term == 'First') { ?>
                                                                <th class="text-light">CA</th>
                                                                <th class="text-light">EXAM</th>

                                                            <?php } elseif ($term == 'Second') { ?>
                                                                <th class="text-light">1st Term</th>
                                                                <th class="text-light">2nd Term</th>
                                                            <?php } elseif ($term == 'Third') { ?>
                                                                <th class="text-light">1st Term</th>
                                                                <th class="text-light">2nd Term</th>
                                                                <th class="text-light">3rd Term</th>
                                                            <?php } ?>
                                                            <th class="text-light">TOTAL</th>
                                                            <th class="text-light">GRADE</th>
                                                            <th class="text-light">REMARK</th>

                                                        </tr>
                                                    </thead>


                                                    <tbody>
                                                        <?php
                                                        $sqlSelectScore =  $conn->query("SELECT subject from studentscores where session = '$session' and class = '$class' group by subject");
                                                        while ($rowz = mysqli_fetch_array($sqlSelectScore)) {;

                                        $subject =  $rowz['subject'];
                                        $sqlStudentScore =  $conn->query("SELECT * from studentscores where session = '$session' and term='First' and class = '$class' and admissionNo='$admissionNo' and subject='$subject'");
                                        $result = mysqli_fetch_array($sqlStudentScore);
                                                            $sqlStudentScoreSecond =  $conn->query("SELECT * from studentscores where session = '$session' and term='Second' and class = '" . $result['class'] . "' and admissionNo='$admissionNo' and subject='$subject' ");
                                        $studentScoreSecond = mysqli_fetch_array($sqlStudentScoreSecond);

                                                            $sqlStudentScoreThird =  $conn->query("SELECT * from studentscores where session = '$session' and term='Third' and class = '$class' and admissionNo= '$admissionNo' and subject='$subject'");
                                                            $studentScoreThird = mysqli_fetch_array($sqlStudentScoreThird);

                                                            $firstTermScore = $result['test'] + $result['test_two'] + $result['exam'];
                                                            $secondTermScore = $studentScoreSecond['test'] + $studentScoreSecond['test_two'] + $studentScoreSecond['exam'];
                                                            $thirdTermScore = $studentScoreThird['test'] + $studentScoreThird['test_two'] + $studentScoreThird['exam'];
                                                            $grade = $result['test'] + $result['test_two'] + $result['exam'] + $secondTermScore + $thirdTermScore;

                                                        ?>
                                                            <tr>

                                                                <td style="width: 15%;"><?php print $result['subject']; ?></td>
                                                                <?php if ($term == 'First') { ?>
                                                                    <td style="width: 1%;"><?php print $result['test'] + $result['test_two']; ?></td>
                                                                    <td style="width: 1%;"><?php print $result['exam']; ?></td>

                                                                <?php } elseif ($term == 'Second') { ?>
                                                                  <td style="width: 1%;"><?php if(!empty($firstTermScore)){print $firstTermScore;}else{ print '-';} ?></td>
<td style="width: 1%;"><?php if(!empty($secondTermScore)){print $secondTermScore;}else{ print '-';} ?></td>
<?php } elseif ($term == 'Third') { ?>
    <td style="width: 1%;"><?php if(!empty($firstTermScore)){print $firstTermScore;}else{ print '-';} ?></td>
    <td style="width: 1%;"><?php if(!empty($secondTermScore)){print $secondTermScore;}else{ print '-';} ?></td>

                                                                   <td style="width: 1%;"><?php if(!empty($thirdTermScore)){print $thirdTermScore;}else{ print '-';} ?></td>
                                                                <?php } ?>
                                                                <td style="width: 1%;"><?php if ($term == 'First') {
                                                                                            print $firstTermScore;
                                                                                        } elseif ($term == 'Second') {
                                                                                            print $firstTermScore + $secondTermScore;
                                                                                        } elseif ($term == 'Third') {
                                                                                            print $firstTermScore + $secondTermScore + $thirdTermScore;
                                                                                        } ?></td>


                                                                <td style="width: 1%;"><?php if ($grade >= 70) {
                                                                                            print "A";
                                                                                        } elseif ($grade >= 60) {
                                                                                            print "B";
                                                                                        } elseif ($grade >= 50) {
                                                                                            print "C";
                                                                                        } elseif ($grade >= 40) {
                                                                                            print "D";
                                                                                        } elseif ($grade >= 30) {
                                                                                            print "E";
                                                                                        } elseif ($grade >= 20) {
                                                                                            print "F";
                                                                                        } elseif ($grade <= 20) {
                                                                                            print "E";
                                                                                        } ?> </td>

                                                                <td style="width: 1%;"><?php if ($grade >= 70) {
                                                                                            print "Excellent";
                                                                                        } elseif ($grade >= 60) {
                                                                                            print "Very Good";
                                                                                        } elseif ($grade >= 50) {
                                                                                            print "Good";
                                                                                        } elseif ($grade >= 40) {
                                                                                            print "Fair";
                                                                                        } elseif ($grade >= 30) {
                                                                                            print "Poor";
                                                                                        } elseif ($grade >= 20) {
                                                                                            print "Very Poor";
                                                                                        } elseif ($grade <= 20) {
                                                                                            print "Very Poor";
                                                                                        } ?> </td>

                                                            <?php } ?>


                                                            </tr>
                                                            <?php

                                                            $sqlTotalTest = $conn->query("SELECT  sum(test+test_two) as totaltest from studentscores  where session = '$session' and term = 'First' and class='$class'  and admissionNo='$admissionNo' ");
                                                            $sqlTotalExam = $conn->query("SELECT  sum(exam) as totalexam from studentscores  where session = '$session' and term = 'First' and class='$class'  and admissionNo='$admissionNo' ");
                                                            $totalTest = mysqli_fetch_assoc($sqlTotalTest);
                                                            $totalExam = mysqli_fetch_assoc($sqlTotalExam);


                                                            $sqlTotalTestExamSecondz = $conn->query("SELECT  sum(test+test_two+exam) as totalTestExamSecond from studentscores  where session = '$session' and term = 'Second' and class='$class'  and admissionNo='$admissionNo' ");
                                                            $totalTestExamSecondz = mysqli_fetch_assoc($sqlTotalTestExamSecondz);

                                                            $sqlTotalTestExamThirdz = $conn->query("SELECT  sum(test+test_two+exam) as totalTestExamThird from studentscores  where session = '$session' and term = 'Third' and class='$class'  and admissionNo='$admissionNo' ");
                                                            $totalTestExamThirdz = mysqli_fetch_assoc($sqlTotalTestExamThirdz);




                                                            ?>

                                                            <tr>
                                                                <td>TOTAL</td>
                                                                <?php if ($term ==  'First') { ?>
                                                                    <td><?php print $totalTest['totaltest']; ?></td>
                                                                    <td><?php print $totalExam['totalexam']; ?></td>
                                                                    <td><?php print $totalTest['totaltest'] + $totalExam['totalexam']; ?></td>

                                                                    <td></td>
                                                                    <td></td>
                                                                <?php } elseif ($term == 'Second') { ?>
                                                                    <td><?php print $totalTest['totaltest'] + $totalExam['totalexam']; ?></td>
                                                                    <td><?php print $totalTestExamSecondz['totalTestExamSecond']; ?></td>
                                                                    <td><?php print $totalTest['totaltest'] + $totalExam['totalexam'] + $totalTestExamSecondz['totalTestExamSecond']; ?></td>

                                                                    <td></td>
                                                                    <td></td>
                                                                <?php } elseif ($term == 'Third') { ?>
                                                                    <td><?php print $totalTest['totaltest'] + $totalExam['totalexam']; ?></td>
                                                                    <td><?php print $totalTestExamSecondz['totalTestExamSecond']; ?></td>
                                                                    <td><?php print $totalTestExamThirdz['totalTestExamThird']; ?></td>
                                                                    <td><?php print $totalTest['totaltest'] + $totalExam['totalexam'] + $totalTestExamSecondz['totalTestExamSecond'] + $totalTestExamThirdz['totalTestExamThird']; ?></td>

                                                                    <td></td>
                                                                    <td></td><?php } ?>
                                                            </tr>
                                                    </tbody>
                                                </table>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="card m-b-30">
                                                            <div class="card-body">

                                                                <h4 class="mt-0 header-title">Performance Chart</h4>


                                                                <canvas id="myChart<?php print $admissionNo; ?>" class="..js-chartjs-bars" style="width: 100%;"></canvas>

                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-8"> <b>Teacher's Comment:</b> <i style="font-size:1vw;"><?php print $studentAtt['comment']; ?></i></div>
                                                    <div class=" col-4"><b> Teacher's Signature:</b> <?php echo "<img src='signature_images/" . $signature['signature'] . "' style='width: 30px;' >"; ?></div>


                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <?php $excellent = "An excellent performance. Keep it up.";
                                                    $very_good = "A very good performance. Do not relent.";
                                                    $average = "An average performance. Work harder next term. ";
                                                    $fair = "A fair performance. Improve in your weak area.";
                                                    $poor = "A poor performance";
                                                    ?>
                                                    <div class="col-8"> <b>Principal's Comment:</b> <i style=""><?php if ($percentage >= 70) {
                                                                                                                    print $excellent;
                                                                                                                } elseif ($percentage >= 60) {
                                                                                                                    print $very_good;
                                                                                                                } elseif ($percentage >= 50) {
                                                                                                                    print $average;
                                                                                                                } elseif ($percentage >= 40) {
                                                                                                                    print $fair;
                                                                                                                } elseif ($percentage >= 30) {
                                                                                                                    print $poor;
                                                                                                                } ?></i></div>
                                                    <div class=" col-4"><b> Principal's Signature:</b> <?php echo "<img src='signature_images/" . $principalSignature['signature'] . "' style='width: 30px;' >"; ?></div>




                                                </div>

                                            </div>


                                            <?php  ?>

                                        </div>

                                    </div>

                                </div>
                                <!-- end Col-9 -->

                            </div>

                        </div>
                        <!-- End row -->


                    </div> <!-- end row -->


                </div> <!-- end col -->
            </div> <!-- end row -->
      
</body>


</html>

<script src="https://portal.chyfleyschools.com.ng/plugins/chartjs/chart.min.js"></script>
<script src="https://portal.chyfleyschools.com.ng/assets/pages/chartjs.init.js"></script>

<script>
   
    var ctx = document.getElementById('myChart<?php print $admissionNo; ?>').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php print $chartSubject; ?>],
            datasets: [{
                    label: "First Term",
                    fill: !0,
                    backgroundColor: "rgba(66,165,245,.75)",
                    borderColor: "rgba(66,165,245,1)",
                    pointBackgroundColor: "rgba(66,165,245,1)",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(66,165,245,1)",
                    data: [<?php print $chartScore; ?>],

                    borderWidth: 1
                }, <?php if ($_GET['term'] == "Second") {; ?> {
                        label: "Second Term",
                        fill: !0,
                        backgroundColor: "rgba(66,165,245,.25)",
                        borderColor: "rgba(66,165,245,1)",
                        pointBackgroundColor: "rgba(66,165,245,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(66,165,245,1)",
                        data: [<?php print $chartScore2; ?>],

                        borderWidth: 1
                    },
                <?php }?>
                <?php if ($_GET['term'] == "Third") {; ?> 
                {
                        label: "Second Term",
                        fill: !0,
                        backgroundColor: "rgba(66,165,245,.25)",
                        borderColor: "rgba(66,165,245,1)",
                        pointBackgroundColor: "rgba(66,165,245,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(66,165,245,1)",
                        data: [<?php print $chartScore2; ?>],

                        borderWidth: 1
                    },
                {
                        label: "Third Term",
                        fill: !0,
                        backgroundColor: "rgba(77,264,345,.65)",
                        borderColor: "rgba(66,165,25,1)",
                        pointBackgroundColor: "rgba(66,165,245,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(66,165,245,1)",
                        data: [<?php print $chartScore3; ?>],

                        borderWidth: 1
                    }
                <?php }?>
            ],

        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>