<?php include 'header.php';?>
<style type="text/css">
  table.minimalistBlack {
    border: 3px solid #000000;
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

  .vertical {
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

  table thead.minimalistBlack {}

  @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}

  <?php $session=$_GET['session'];
  $term=$_GET['term'];
  $class=$_GET['class'];
  $admissionNo=$_GET['admissionNo'];
  $sqlFindSessionTermClass=$conn->query ("select * from studentscores where admissionNo ='$admissionNo' and session= '$session' and term = '$term' and class='$class'");
  $sqlStudentInfo=$conn->query ("select * from studentusers where admissionNo ='$admissionNo' ");
  $studentInfo=mysqli_fetch_array($sqlStudentInfo);
  $founded=mysqli_fetch_array($sqlFindSessionTermClass);
  $sqlSchAtt=$conn->query("select * from schatt where session='$session' and term='$term'");
  $schoolAtt=mysqli_fetch_array($sqlSchAtt);
  $sqlStudentAtt=$conn->query("select * from studentatt where admissionNo='$admissionNo' and session='$session' and term='$term' and class='$class'");
  $studentAtt=mysqli_fetch_array($sqlStudentAtt);
  $sqlNoStudent= $conn->query("select * from promotedstudent where class='$class' and session='$session' ");
  $noStudent= mysqli_num_rows($sqlNoStudent);
  $schOpen=$schoolAtt['schOpen'];
  $present=$studentAtt['present'];
  $absent = $schOpen - $present;
  
  if ($class == "JSS 1"){
      $jss2= "JSS 2";
      print $jss2;
  }elseif($class == "JSS 2"){
        $jss3= "JSS 3";
      print $jss3;
  }
  ?>
</style>

<body>

  <!-- Navigation Menu-->



  <div class="wrapper">
    <div class="container">
      <!-- Page-Title -->
  
            <?php 
$sqlSelectz = $conn->query ("select * from studentscores where admissionNo ='$admissionNo' and session= '$session' and term = '$term' and class='$class'");

        $chartSubject = "";
        $chartScore = "";

  while($results = mysqli_fetch_array($sqlSelectz)){
       $chartSubject  .= "'".substr($results["subject"], 0, 6)."', ";
       $chartScore  .=  $results["test"] + $results["exam"].", ";
      
  }?>
        
      <div class="row">
        <div class="col-12">

          <!-- Left sidebar -->
          <div class="email-leftbar card">

            <center>
              <div class="edit-profile-photo">
                <?php if($studentInfo['passport'] == ""){?><img src="passport/images.jfif" alt="" width="160px" height="180px" class="img-responsive" style=""><?php }else{?><img src="passport/<?php print $studentInfo['passport'];?>" alt="" width="160px" height="180px" class="img-responsive" style=""><?php } ?>

              </div>
            </center>

            <button class="m-t-30" style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">Student Info</button>

            <div class="mail-list m-t-10">
              <a href="#" class="active"> <span class="float-right"><?php print $founded['class'];?></span> <i class="ti-archive mr-2"></i> Class</a>
              <a href="#" class=""> <span class="float-right"><?php print $studentInfo['gender'];?></span> <i class="ti-archive mr-2"></i> Gender</a>
              <a href="#"><span class="float-right"><?php print $studentInfo['dob'];?></span><i class="ti-location-arrow mr-2"></i> DOB</a>
              <a href="#"><span class="float-right"><?php print $studentInfo['nationality'];?></span><i class="ti-location-arrow mr-2"></i> Nationality</a>
              <a href="#"><span class="float-right"><?php print $studentInfo['state'];?></span><i class="ti-location-arrow mr-2"></i> State of Origin</a>
              <a href="#"><span class="float-right"><?php print $studentInfo['email'];?></span><i class="ti-location-arrow mr-2"></i> Email</a>

            </div>

            <button class="m-t-30" style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">Session Info</button>

            <div class="mail-list m-t-10">
              <a href="#" class="active"> <span class="float-right"><?php print $founded['session'];?></span> <i class="ti-location-arrow mr-2"></i> Session</a>
              <a href="#" class=""> <span class="float-right"><?php print $founded['term'];?></span> <i class="ti-location-arrow mr-2"></i> Term</a>
              <a href="#"><span class="float-right"><?php print $studentAtt['present'];?></span><i class="ti-location-arrow mr-2"></i> No of Time Present</a>
              <a href="#"><span class="float-right"><?php if ($present == "") {echo "";}elseif($absent == "-126"){ print "0";}else{ print $absent;}?></span><i class="ti-location-arrow mr-2"></i> No of Time Absent</a>
              <a href="#"><span class="float-right"><?php print $schoolAtt['termBegins'];?></span> <i class="ti-location-arrow mr-2"></i> Term begins</a><?php print $schoolAtt['termEnds'];?>
              <a href="#"><span class="float-right"><?php print $schoolAtt['nxtTermBegins'];?></span> <i class="ti-location-arrow mr-2"></i> Term begins</a>
            </div>

            <button class="m-t-30" style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">Psychomotor Domain</button>
                
            <div class="mail-list m-t-10">
              <a href="#" class="actiwve"> <span class="float-right"><?php print $studentAtt['verbal'];?></span> <i class="ti-location-arrow mr-2"></i> Verbal Fluency</a>
              <a href="#" class=""> <span class="float-right"><?php print $studentAtt['game'];?></span> <i class="ti-location-arrow mr-2"></i>Game</a>
              <a href="#"><span class="float-right"><?php print $studentAtt['handling'];?></span><i class="ti-location-arrow mr-2"></i>Handling Tools</a>
              <a href="#"><span class="float-right"><?php print $studentAtt['drawing'];?></span><i class="ti-location-arrow mr-2"></i>Drawing and Painting</a>

            </div>

            <button class="m-t-30" style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">Affective Domain</button>

            <div class="mail-list m-t-10">
              <a href="#" class="actsive"> <span class="float-right"><?php print $studentAtt['punctuality'];?></span> <i class="ti-location-arrow mr-2"></i> Punctuality</a>
              <a href="#" class=""> <span class="float-right"><?php print $studentAtt['neatness'];?></span> <i class="ti-location-arrow mr-2"></i>Neatness</a>
              <a href="#"><span class="float-right"><?php print $studentAtt['honesty'];?></span><i class="ti-location-arrow mr-2"></i> Honesty</a>
              <a href="#"><span class="float-right"><?php print $studentAtt['inter'];?></span><i class="ti-location-arrow mr-2"></i> Interpersonal Relationship</a>
              <a href="#"><span class="float-right"><?php print $studentAtt['leadership'];?></span><i class="ti-location-arrow mr-2"></i> Leadership</a>
              <a href="#"><span class="float-right"><?php print $studentAtt['emotion'];?></span><i class="ti-location-arrow mr-2"></i> Emotional Stability</a>
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
                       <img src="images/report_logo.png" style="width: 80%; height: auto; margin-left: 10%;" alt="CHYFLEY LOGO"> 
                      
                       
                    </div>
                    
                  </div>

                  <div class="col-xl-12 col-12 ">
                    <div class="card m-b-30">
                      <div class="card-body">
                        <table id="report" class="minimalistBlack">
                          <thead>

                            <?php

    $sqlStudentName =  $conn->query("SELECT * from studentusers where admissionNo = '$admissionNo'");
 
                   $student = mysqli_fetch_array($sqlStudentName);
 $sqlTotalTest = $conn->query("SELECT  sum(test) as totalTest from studentscores where session = '$session' and term = '$term' and admissionNo='$admissionNo' ");

                                                      $sqlTotalExam = $conn->query("SELECT  sum(exam) as totalExam from studentscores  where session = '$session' and term = '$term' and class='$class'  and admissionNo='$admissionNo' ");

                                                       $sqlOffer = $conn->query("SELECT * from studentscores where session = '$session' and term = '$term' and class='$class' and admissionNo='$admissionNo'");

                                                        $offer = mysqli_num_rows($sqlOffer);
                                                       $totalTest = mysqli_fetch_assoc($sqlTotalTest);
                                                        $totalExam = mysqli_fetch_assoc($sqlTotalExam);
                                                          $expectedScore = 100 * $offer;
                                                          $scored =  $totalTest['totalTest'] + $totalExam['totalExam'] ;

                                                            $percentage = $scored /  $expectedScore * 100
                                                          ?>

                            <tr style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">
                              <th colspan="6" class="mt-0 header-title">
                                <center>
                                  <h5 class="text-light"><?php print $student['surname'];?> <?php print $student['firstName'];?> <?php print $student['lastName'];?><h5>
                                      <h6 class="text-light"><?php print $student['admissionNo'];?></h6>
                                </center>
                              </th>

                            </tr>
                          </thead>

                          <tbody>

                            <tr>
                              <th colspan="2">Total Score: <span style="font-size: 17px;"> <?php print $totalTest['totalTest'] + $totalExam['totalExam'];?></span></th>
                              <th colspan="3"> Percentage: <span style="font-size: 17px;"><?php print round($scored /  $expectedScore * 100, 1);?>%</span></th>
                              <?php if ($percentage >= 70): ?>
                              <th colspan="2"><span style="font-size: 17px;">Grade: A</span></th>
                              <?php elseif ($percentage >= 60):  ?>
                              <th colspan="2"><span style="font-size: 17px;">Grade: B</span></th>
                              <?php elseif ($percentage >= 50):  ?>
                              <th colspan="2"><span style="font-size: 17px;">Grade: C</span></th>
                              <?php elseif ($percentage >= 40):  ?>
                              <th colspan="2"><span style="font-size: 17px;">Grade: D</span></th>
                              <?php elseif ($percentage >= 30):  ?>
                              <th colspan="2"><span style="font-size: 17px;">Grade: E</span></th>
                              <?php elseif ($percentage >= 20):  ?>
                              <th colspan="2"><span style="font-size: 17px;">Grade: F</span></th>
                              <?php elseif ($percentage <= 20):  ?>
                              <th colspan="2"><span style="font-size: 17px;">Grade: F</span></th>
                              <?php endif ?>

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

$sqlSelect = $conn->query ("select * from studentscores where admissionNo ='$admissionNo' and session= '$session' and term = '$term' and class='$class'");

$sqlSignature = $conn->query ("select * from teachersignature where session= '$session' and term = '$term' and class='$class'");
$signature = mysqli_fetch_array($sqlSignature);
$sqlPrincipalSignature = $conn->query ("SELECT * from users where username= 'mary' and password='semilore' ");
$principalSignature = mysqli_fetch_array($sqlPrincipalSignature);


?>

                        <table id="" class="minimalistBlack">
                          <thead>
                            <tr style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">

                              <th class="text-light">SUBJECT</th>
                              <th class="text-light">CA</th>
                              <th class="text-light">EXAM</th>
                              <th class="text-light">TOTAL</th>
                              <th class="text-light">GRADE</th>
                              <th class="text-light">REMARK</th>

                            </tr>
                          </thead>

                          <tbody>
                            <?php
                                   while($result = mysqli_fetch_array($sqlSelect)){;

                                   $grade = $result['test'] + $result['exam'];
                                    
                                    ?>
                            <tr>

                              <td style="width: 15%;"><?php print $result['subject'];?></td>
                              <td style="width: 1%;"><?php print $result['test'];?></td>
                              <td style="width: 1%;"><?php print $result['exam'];?></td>
                              <td style="width: 1%;"><?php print $result['test'] + $result['exam'] ;?></td>

                              <?php if ($grade >= 70): ?>
                              <td style="width: 1%;">A</td>
                              <?php elseif ($grade >= 60):  ?>
                              <td style="width: 1%;">B</td>
                              <?php elseif ($grade >= 50):  ?>
                              <td style="width: 1%;">C</td>
                              <?php elseif ($grade >= 40):  ?>
                              <td style="width: 1%;">D</td>
                              <?php elseif ($grade >= 30):  ?>
                              <td style="width: 1%;">E</td>
                              <?php elseif ($grade >= 20):  ?>
                              <td style="width: 1%;">F</td>
                              <?php elseif ($grade <= 20):  ?>
                              <td style="width: 1%;">F</td>
                              <?php endif ?>

                              <?php if ($grade >= 70): ?>
                              <td style="width: 1%;">Excellent</td>
                              <?php elseif ($grade >= 60):  ?>
                              <td style="width: 1%;">Very Good</td>
                              <?php elseif ($grade >= 50):  ?>
                              <td style="width: 1%;">Good</td>
                              <?php elseif ($grade >= 40):  ?>
                              <td style="width: 1%;">Pass</td>
                              <?php elseif ($grade >= 30):  ?>
                              <td style="width: 1%;">Fair</td>
                              <?php elseif ($grade >= 20):  ?>
                              <td style="width: 1%;">Fail</td>
                              <?php elseif ($grade <= 20):  ?>
                              <td style="width: 1%;">Fail</td>
                              <?php endif ?>

                              <?php }?>

                            </tr>
                            <?php

                                                      $sqlTotalTest = $conn->query("SELECT  sum(test) as totaltest from studentscores  where session = '$session' and term = '$term' and class='$class'  and admissionNo='$admissionNo' ");
                                                       $sqlTotalExam = $conn->query("SELECT  sum(exam) as totalexam from studentscores  where session = '$session' and term = '$term' and class='$class'  and admissionNo='$admissionNo' ");
                                                       $totalTest = mysqli_fetch_assoc($sqlTotalTest);
                                                         $totalExam = mysqli_fetch_assoc($sqlTotalExam);



                                                      ?>

                            <tr>
                              <td>TOTAL</td>
                              <td><?php print $totalTest['totaltest'];?></td>
                              <td><?php print $totalExam['totalexam'];?></td>
                              <td><?php print $totalTest['totaltest'] + $totalExam['totalexam'];?></td>
                              <td></td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>

                        <hr>
                        <div class="row">
                          <div class="col-xl-12 col-sm-6" >
                            <div class="card m-b-30">
                              <div class="card-body">

                                <h4 class="mt-0 header-title">Performance Chart</h4>

                                <canvas id="myChart" width="700" height="300"></canvas>

                              </div>
                            </div>
                          </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row">
                          <div class="col-8"> <b>Teacher's Comment:</b> <i style="font-size:1vw;"><?php print $studentAtt['comment'];?></i></div>
                          <div class=" col-4"><b> Teacher's Signature:</b> <?php echo "<img src='signature_images/".$signature['signature']."' style='width: 30px;' >";?></div>

                        </div>
                        <hr>
                        <div class="row">
                          <?php $excellent = "An excellent performance. Keep it up.";
                                                $very_good ="A very good performance. Do not relent.";
                                                $average = "An average performance. Work harder next term. ";
                                                $fair = "A fair performance. Improve in your weak area.";
                                                $poor = "A poor performance";
                                          ?>
                                          <?php if($term !== "Third"){?>
                          <div class="col-8"> <b>Principal's Comment:</b> <i style=""><?php if ($percentage >= 70){ print $excellent;}elseif($percentage >= 60  ){ print $very_good;}elseif ($percentage >= 50 ) { print $average;}elseif ($percentage >= 40 ) {print $fair;}elseif ($percentage >= 30 ) { print $poor;}?></i></div><?php }else{?>   <div class="col-8"> <b>Principal's Comment:</b> <i style=""><?php if ($percentage >= 70){ print $excellent. " ". "Promoted to next class";}elseif($percentage >= 60){ print $very_good. " ". "Promoted to next class $jss2";}elseif ($percentage >= 50) { print $average. " ". "Promoted to next class";}elseif ($percentage >= 40) {print $fair. " ". "Promoted to next class";}elseif ($percentage >= 30) { print $poor;}?></i></div> <?php }?>
                          <div class=" col-4"><b> Principal's Signature:</b> <?php echo "<img src='signature_images/".$principalSignature['signature']."' style='width: 30px;' >";?></div>
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
            <!--   <div class="row">
             <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Performance Chart</h4>
                            
                        

                            <div id="overlapping-bars" class="ct-chart ct-golden-section"></div>

                        </div>
                    </div>
                </div>
            </div>  -->

          </div>
        </div>
      </div>

      <!-- end container-fluid -->

      <!-- Footer -->
    
</body>


</html>

<!-- chartjs js -->
<script src="plugins/chartjs/chart.min.js"></script>
<script src="assets/pages/chartjs.init.js"></script>
<!--Chartjs Chart-->


<script>
  // var data = {
  //    labels: [<?php print $chartSubject; ?> ''],
  //   series: [
  //     [<?php print $chartScore; ?> 0],
  //   ]
  // };
  //  options: {
  //         scales: {
  //             xAxes: [{
  //                 ticks: {
  //                     autoSkip: false,
  //                     maxRotation: 11190,
  //                     minRotation: 11190
  //                 }
  //             }]
  //         }
  //     };
  // var responsiveOptions = [
  //   ['screen and (max-width: 640px)', {
  //     seriesBarDistance: 5,
  //     axisX: {
  //       labelInterpolationFnc: function (value) {
  //         return value[0];
  //       }
  //     }
  //   }]
  // ];
  // new Chartist.Bar('#overlapping-bars', data, options, responsiveOptions);
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [ <?php print $chartSubject;?> ''],
      datasets: [{
        label: 'Performance Chart',
        data: [ <?php print $chartScore;?> 0],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(300, 559, 196, 0.2)',
          'rgba(55, 59, 96, 0.2)',
          'rgba(15, 19, 296, 0.2)',
          'rgba(425, 335, 316, 0.2)',
          'rgba(50, 511, 29, 0.2)',
          'rgba(50, 511, 29, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(189, 183,107, 1)',
          'rgba(209, 119,137, 1)',
          'rgba(20, 79,17, 1)',
          'rgba(144,38,44, 1)',
          'rgba(144,38,44, 1)'
        ],
        borderWidth: 1
      }]
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