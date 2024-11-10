<?php include 'call_php_function.php';
include 'header.php';
if (isset($_GET['session']) && isset($_GET['class'])) {
$session = $_GET['session'];
$term = $_GET['term']; 
$class = $_GET['class'];
}

$counter = 0;
error_reporting(E_ERROR);
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

<head>

</head>

<body>
  <?php include 'navigationMenu.php'; ?>
  <div class="wrapper">
    <div class="container-fluid">
      <!-- Page-Title -->
       <?php if (isset($_GET['session']) && isset($_GET['class'])) {?>
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
      <?php }?>
      <form  action="broadSheet2.php" method="GET">
               
               <div class="row">
                   <div class="col-4">
                       <div class="form-group">
                           <label class="control-label">From Session</label>
                           <select id="sessionSelect" type="text" required="required" value="" class="form-control" name="session">
                               <option value="">Select a session</option>
                               <?php foreach($sessions as $sessionz){?>
                                   <option value="<?php print $sessionz['session']; ?>"><?php print $sessionz['session']; ?></option>
                               <?php } ?>
                           </select>

                       </div>
                   </div>
               
              
                   <div class="col-4">
                       <div class="form-group">
                           <label class="control-label">From Class</label>
                           <select id="classSelect" type="text" required="required" a value="" class="form-control" name="class">
                               <option value="">Select a class</option>
                               <?php    if ($nameFound['class'] !== "") {
                                           foreach($teacherClasses as $teacherClass) {
                                                $classTeachers = explode(',', $teacherClass['class']);
                                                foreach ($classTeachers  as $classTeacher) {
                                        ?>
                                                 <option value="<?php echo $classTeacher; ?>"><?php echo $classTeacher; ?></option>
                                             <?php
                                                }
                                            }
                                        } else {
                                            foreach($classes as $clazz)  {
                                                ?>
                                             <option value="<?php echo $clazz['class']; ?>"><?php echo $clazz['class']; ?></option>
                                     <?php
                                            }
                                        }
                                        ?>
                           </select>

                       </div>
                   </div>
                        <div class="col-4">
                             <div class="form-group">
                                 <label class="control-label">Term</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                     <option value="">Select a term</option>
                                    
                                         <option value="First">First Term</option>
                                         <option value="Second">Second Term</option>
                                         <option value="Third">Third Term</option>
                                     
                                     
                                 </select>

                             </div>
                        </div>
                        
                </div>
               <div class="row">
                   <div class="col-12">
                       <button class="btn btn-primary" name= "load-student" style="float: right;" id="submit" class="btn-submit">Load Broadsheet</button>

                   </div>
               </div>
          </form>
      <table id="broad-sheet" class="minimalistBlack" style=" display: block; white-space: nowrap; overflow:auto;  height: 400px; position: relative;">
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
            $sqlSelectz =  $conn->query("select subject from studentscores where session='$session' and class='$class' group by subject");

            while ($rows = mysqli_fetch_array($sqlSelectz)) { ?>
              <th colspan="<?php print $span; ?>"><?php echo $rows['subject']; ?> </th>
              <?php if ($term !== "First") { ?>
                <th>Total</th>
            <?php }
            } ?>
            <th>Total</th>
            <th>Average</th>


          </tr>
        </thead>

        <tbody>

          <?php
          // $sqlSelectStudent =  $conn->query("SELECT * from promotedstudent where session = '$session' and class = '$class' and deleteStatus != 1");

          // while ($row = mysqli_fetch_array($sqlSelectStudent)) {
          //   $admissionNo = $row['admissionNo'];
          //   $sqlFindStu =  $conn->query("SELECT * from studentusers where admissionNo = '$admissionNo'");

          //   $studentName = mysqli_fetch_array($sqlFindStu);

          if (isset($_GET['session']) && isset($_GET['class'])) {
            foreach( $students as $student){
              $studentName = $studentController->student_name($student['admissionNo']); 
              $admissionNo = $student['admissionNo'];
            $sqlTotalTestExamFirst = $conn->query("SELECT  sum(test+exam) as totalTestExamFirst from studentscores where session = '".$_GET['session']."' and term = 'First' and class = '$class' and admissionNo='$admissionNo' ");

            $sqlTotalTestExamSecond = $conn->query("SELECT  sum(test+exam) as totalTestExamSecond from studentscores  where session = '$session' and term = 'Second' and class = '$class' and admissionNo='$admissionNo' ");

            $sqlTotalTestExamThird = $conn->query("SELECT  sum(test+exam) as totalTestExamThird from studentscores  where session = '$session' and term = 'Third' and class = '$class' and admissionNo='$admissionNo' ");

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
          ?>
            <tr>
              <td> <?php print ++$counter; ?></td>
              <td> <?php print $studentName['surname']; ?> <span><?php print $studentName['firstName']; ?></span><span> <?php print $studentName['lastName']; ?> </span></td>
              <?php
              $sqlSelectScore =  $conn->query("SELECT subject from studentscores where session = '$session' and class = '$class' group by subject");
              while ($rowz = mysqli_fetch_array($sqlSelectScore)) {

                $subject =  $rowz['subject'];

                $sqlStudentScore =  $conn->query("SELECT * from studentscores where session='$session' and term='First' and class='$class' and admissionNo='$admissionNo' and subject='$subject'");

                $studentScore = mysqli_fetch_array($sqlStudentScore);

                $sqlStudentScoreSecond =  $conn->query("SELECT * from studentscores where session='$session' and term='Second' and class = '$class' and admissionNo='$admissionNo' and subject='$subject'");


                $studentScoreSecond = mysqli_fetch_array($sqlStudentScoreSecond);

                $sqlStudentScoreThird =  $conn->query("SELECT * from studentscores where session = '$session' and term='Third' and class = '$class' and admissionNo='$admissionNo' and subject = '$subject'");


                $studentScoreThird = mysqli_fetch_array($sqlStudentScoreThird);

                $firstTermScore = $studentScore['test'] + $studentScore['exam'];
                $secondTermScore = $studentScoreSecond['test'] + $studentScoreSecond['exam'];
                $thirdTermScore = $studentScoreThird['test'] + $studentScoreThird['exam'];
              ?>
                <?php if ($term == "First") { ?>
                  <td class="co-name"><?php if ($firstTermScore == "") {
                                        echo "-";
                                      } else {
                                        print $firstTermScore;
                                      } ?></td>
                <?php } ?>
                <?php if ($term == "Second") { ?>
                  <td class="co-name"><?php if ($firstTermScore == "") {
                                        echo "-";
                                      } else {
                                        print $firstTermScore;
                                      } ?></td>
                  <td class="co-name"><?php if ($secondTermScore == "") {
                                        echo "-";
                                      } else {
                                        print $secondTermScore;
                                      } ?></td>

                <?php } ?>

                <?php if ($term == "Third") { ?>

                  <td class="co-name"><?php if ($firstTermScore == "") {
                                        echo "-";
                                      } else {
                                        print $firstTermScore;
                                      } ?></td>
                  <td class="co-name"><?php if ($secondTermScore == "") {
                                        echo "-";
                                      } else {
                                        print $secondTermScore;
                                      } ?></td>

                  <td class="co-name"><?php if ($thirdTermScore == "") {
                                        echo "-";
                                      } else {
                                        print $thirdTermScore;
                                      } ?></td>
                <?php } ?>
                <?php if ($term !== "First") { ?>
                  <td><?php if ($term == "First") {
                        print $studentScore['test'] + $studentScore['exam'];
                      } elseif ($term == "Second") {
                        print $studentScore['test'] + $studentScore['exam'] + $studentScoreSecond['test'] + $studentScoreSecond['exam'];
                      } elseif ($term == "Third") {
                        print $studentScore['test'] + $studentScore['exam'] +  $studentScoreSecond['test'] + $studentScoreSecond['exam'] +  $studentScoreThird['test'] + $studentScoreThird['exam'];
                      } ?></td>
              <?php }
              } ?>

              <td><?php if ($term == "First") {
                    print $totalFirst['totalTestExamFirst'];
                  } elseif ($term == "Second") {
                    print $totalFirst['totalTestExamFirst'] + $totalSecond['totalTestExamSecond'];
                  } elseif ($term == "Third") {
                    print $totalFirst['totalTestExamFirst'] + $totalSecond['totalTestExamSecond'] + $totalThird['totalTestExamThird'];
                  } ?></td>


              <td>
                <?php
                if ($term == "First" && $expectedScore != 0) {
                  print round($scored / $expectedScore * 100, 1);
                } elseif ($term == "Second" && $expectedSecondScore != 0) {
                  print round($scoredSecond / $expectedSecondScore * 200, 1);
                } elseif ($term == "Third" && $expectedThirdScore != 0) {
                  print round($scoredThird / $expectedThirdScore * 300, 1);
                } else {
                  echo "N/A"; // Or handle the case where the denominator is zero
                }
                ?>
              </td>

            </tr>

          <?php  } }?>

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
      lengthChange: false,
      dom: 'Bfrtip',
      buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });


    table.buttons().container()
      .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
  });
</script>