<?php include 'db.php';
 $session = $_GET['session'];
$term = $_GET['term'];
$class = $_GET['class'];
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
.vertical  {
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
    <?php include 'header.php';?>
</head>
<body>
  <?php include 'navigationMenu.php';?>
  <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">BROAD SHEET FOR <?php print $class;?></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $session;?></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><?php print $term;?></a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>

                            <table id="broad-sheet" class="minimalistBlack" style=" display: block; white-space: nowrap; overflow:auto;  height: 400px; position: relative;">
                                <thead>
                                 
                               <?php if ($term == "First"){; $span = "1"; } if ($term == "Second"){; $span = "2"; }if ($term == "Third"){; $span = "3"; } 


?>
                                 
                                     <tr>
                                              <th>No</th>
                                                 <th>Name</th>
                                                   <?php         
                             $sqlSelectz =  $conn->query("select * from studentscores where session='$session' and class='$class' group by subject");
                             
                   while ($rows = mysqli_fetch_array($sqlSelectz)) {?>    
                               <th colspan="<?php print $span; ?>"><?php echo $rows['subject']; ?> </th>
                                        <?php if ($term !=="First"){?>
                                          <th>Total</th>
                                        <?php } }?>
                                              <th>Total</th>
                                              <th>Average</th>
                                             

                                            </tr>
                                            </thead>
        
                                            <tbody>
                                               
                         <?php
    $sqlSelectStudent =  $conn->query("SELECT * from studentusers where session = '$session' and class = '$class'");
 
                   while ($row = mysqli_fetch_array($sqlSelectStudent)) {
                     $admissionNo = $row['admissionNo'];
          $sqlFindStu =  $conn->query("SELECT * from studentusers where session = '$session' and admissionNo = '$admissionNo'");
 
                   $findStudent = mysqli_fetch_array($sqlFindStu);
                    
                        $admissionNo = $row['admissionNo'];
                                                     
                                                     $sqlTotalTestExamFirst = $conn->query("SELECT  sum(test+exam) as totalTestExamFirst from studentscores where session = '$session' and term = 'First' and class = '$class' and admissionNo='$admissionNo' ");

                                                      $sqlTotalTestExamSecond = $conn->query("SELECT  sum(test+exam) as totalTestExamSecond from studentscores  where session = '$session' and term = 'Second' and class = '$class' and admissionNo='$admissionNo' ");

                                                        $sqlTotalTestExamThird = $conn->query("SELECT  sum(test+exam) as totalTestExamThird from studentscores  where session = '$session' and term = 'Third' and class = '$class' and admissionNo='$admissionNo' ");

                                                       $sqlOffer = $conn->query("SELECT * from studentscores where session = '$session' and term = '$term' and class = '$class' and  admissionNo='$admissionNo'");

                                                        $offer = mysqli_num_rows($sqlOffer);
                                                       $totalFirst = mysqli_fetch_assoc($sqlTotalTestExamFirst);
                                                        $totalSecond = mysqli_fetch_assoc($sqlTotalTestExamSecond);
                                                         $totalThird = mysqli_fetch_assoc($sqlTotalTestExamThird);
                                                          $expectedScore = 200 * $offer;
                                                          $expectedSecondScore = 200 * $offer;
                                                          $expectedThirdScore = 300 * $offer;
                                                          $scored =  $totalFirst['totalTestExamFirst'];
                                                           $scoredSecond =  $totalFirst['totalTestExamFirst'] + $totalSecond['totalTestExamSecond'];
                                                            $scoredThird =  $totalFirst['totalTestExamFirst'] + $totalSecond['totalTestExamSecond'] + $totalThird['totalTestExamThird'];
                                                          ?>
                                               <tr>
                                                    <td> <?php print ++$counter;?></td>
                                                   <td> <?php print $findStudent['surname'];?> <span><?php print $findStudent['firstName'];?></span><span> <?php print $findStudent['lastName'];?> </span></td>
                                                   <?php
                                                    $sqlSelectScore =  $conn->query("SELECT * from studentscores where session = '$session' and class = '$class' group by subject");
                       while($rowz = mysqli_fetch_array($sqlSelectScore)){;
                        $student = $row['admissionNo'];
                        $subject =  $rowz['subject'];

                        $sqlStudentScore =  $conn->query("SELECT * from studentscores where session = '$session' and term='First' and class = '$class' and admissionNo='$admissionNo' and subject = '$subject'");
                        
                        $studentScore = mysqli_fetch_array($sqlStudentScore);

                        $sqlStudentScoreSecond =  $conn->query("SELECT * from studentscores where session = '$session' and term='Second' and class = '$class' and admissionNo='$admissionNo' and subject = '$subject'");
                        
                        
                        $studentScoreSecond = mysqli_fetch_array($sqlStudentScoreSecond);

                        $sqlStudentScoreThird =  $conn->query("SELECT * from studentscores where session = '$session' and term='Third' and class = '$class' and admissionNo='$admissionNo' and subject = '$subject'");
                        
                        
                        $studentScoreThird = mysqli_fetch_array($sqlStudentScoreThird);

                          $firstTermScore = $studentScore['test'] + $studentScore['exam'];
                           $secondTermScore = $studentScoreSecond['test'] + $studentScoreSecond['exam'];
                           $thirdTermScore = $studentScoreThird['test'] + $studentScoreThird['exam'];
                         ?>       
                                    <?php if ($term == "First"){?>
                                  <td class="co-name"><?php if($firstTermScore == ""){ echo "-";}else{ print $studentScore['test'] + $studentScore['exam'];}?></td>
                                <?php }?>
                                            <?php if ($term == "Second"){?>
                                               <td class="co-name"><?php if($firstTermScore == ""){ echo "-";}else{ print $studentScore['test'] + $studentScore['exam'];}?></td>
                                             <td class="co-name"><?php  if($secondTermScore == ""){ echo "-";}else{ print $studentScoreSecond['test'] + $studentScoreSecond['exam'];}?></td>
                                             
                                           <?php }?>

                                            <?php if ($term == "Third"){?>

                                             <td class="co-name"><?php if($firstTermScore == ""){ echo "-";}else{ print $studentScore['test'] + $studentScore['exam'];}?></td>
                                             <td class="co-name"><?php  if($secondTermScore == ""){ echo "-";}else{ print $studentScoreSecond['test'] + $studentScoreSecond['exam'];}?></td>
                                             
                                              <td class="co-name"><?php if($thirdTermScore == ""){ echo "-";}else{ print $studentScoreThird['test'] + $studentScoreThird['exam'];}?></td>
                                              <?php }?>
                                              <?php if ($term !=="First"){?>
                                              <td><?php if($term =="First"){ print $studentScore['test'] + $studentScore['exam'];}elseif($term =="Second"){ print $studentScore['test'] + $studentScore['exam'] + $studentScoreSecond['test'] + $studentScoreSecond['exam'];}elseif ($term =="Third"){ print $studentScore['test'] + $studentScore['exam'] +  $studentScoreSecond['test'] + $studentScoreSecond['exam'] +  $studentScoreThird['test'] + $studentScoreThird['exam'];}?></td>
                                              <?php }  } ?>

                                              <td><?php if($term == "First"){ print $totalFirst['totalTestExamFirst'];} elseif($term == "Second"){ print $totalFirst['totalTestExamFirst'] + $totalSecond['totalTestExamSecond'];} elseif($term == "Third"){ print $totalFirst['totalTestExamFirst'] + $totalSecond['totalTestExamSecond'] + $totalThird['totalTestExamThird']; }?></td>
                                                
                                                  
                                               <td><?php if ($term == "First") {  print round($scored / $expectedScore * 100, 1);}elseif($term == "Second"){ print round($scoredSecond / $expectedScore * 100, 1); }elseif($term == "Third"){ print round($scoredThird /  $expectedThirdScore * 100, 1);}?></td>
                                                 </tr>
                                            
                                                  <?php  } ?>

                                            </tbody>
                                        </table>
                                     
 
</div>
</div>
    <!-- Footer -->
    <?php include 'footer.php';?>
</body>

 <?php include 'modal.php';?>
<script type="text/javascript">
$(document).ready(function() {
   
    //Buttons examples
    var table = $('#broad-sheet').DataTable({
        lengthChange: false,
       dom: 'Bfrtip',
buttons: [  'copy', 'csv', 'excel', 'pdf', 'print'   ]
    });


    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );

    </script>
