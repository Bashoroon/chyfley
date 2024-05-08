<?php include 'db.php';?>
<!DOCTYPE html>
<html lang="en">

    <!--Chartist Chart CSS -->
    <link rel="stylesheet" href="../portal/plugins/chartist/css/chartist.min.css"><head>
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

$session = $_GET['session'];
$term = $_GET['term'];
$class = $_GET['class'];

$sqlFindSessionTermClass = $conn->query ("select * from studentscores where admissionNo='$user' and session= '$session' and term = '$term' and class='$class'");
$sqlStudentInfo = $conn->query ("select * from studentusers where admissionNo='$user' ");
$studentInfo= mysqli_fetch_array($sqlStudentInfo);

$founded= mysqli_fetch_array($sqlFindSessionTermClass);

$sqlSchAtt = $conn->query("select * from schatt where session='$session' and term='$term'");
$schoolAtt = mysqli_fetch_array($sqlSchAtt);
$sqlStudentAtt = $conn->query("select * from studentatt where admissionNo='$user' and session='$session' and term='$term' and class='$class'");
$studentAtt = mysqli_fetch_array($sqlStudentAtt);
$sqlNoStudent = $conn->query("select * from promotedstudent where class='$class' and session='$session' ");
$noStudent = mysqli_num_rows($sqlNoStudent);
$schOpen = $schoolAtt['schOpen'];
$present =  $studentAtt['present'];
$absent = $schOpen - $present;

$sqlClearance = $conn->query ("select * from clearance where admissionNo='$user' and session= '$session' and term = '$term' and class='$class'");
$clearance= mysqli_num_rows($sqlClearance);

?>

</style>

<body>

<?php 
if ($clearance < 1) {
  die("<h4>Sorry, you have not been cleared for $session session, $term term and $class class. Kindly Visit the School Administrator
  </h4>");
}
?>   
                        <!-- Navigation Menu-->
                   
                       <header id="topnav" >
            <div class="topbar-main" style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">
                <div class="container-fluid">

                    <!-- Logo-->
                    <div id="non-printable">
                        <a href="index.php" class="logo">
                            <span class="logo-light" >
                                 CHYFLEY PORTAL
                            </span>
                        </a>
                    </div>
                    <!-- End Logo-->

                    <div class="menu-extras topbar-custom navbar p-0" >
                        
                        <ul class="navbar-right ml-auto list-inline float-right mb-0" >
                            <!-- language-->
                            

                            <!-- full screen -->
                            
                            <!-- notification -->
                            <li class="dropdown notification-list list-inline-item" >
                                <div class="dropdown notification-list nav-pro-img">
                                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
                                       
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="logout.php"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                    </div>
                                </div>
                            </li>

                           
                            <li class="menu-item dropdown notification-list list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                        </ul>

                    </div>
                    <!-- end menu-extras -->
                    <div class="clearfix"></div>
                </div>
                <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <!-- MENU Start -->
            
            <div class="navbar-custom">
                <div class="container-fluid">

                    <div id="navigation">

                        <!-- Navigation Menu-->
                        
                            
                         <ul class="navigation-menu" id="non-printable">
                             

                            <li class="has-submenu">
                                <a href="../index.php"><i class="icon-accelerator"></i>Back to School Website</a>
                            </li>
                          
                            <li class="has-submenu">
                                <a href="#"><i class="icon-pencil-ruler"></i>Examination/Test<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                           <!-- <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".uploadbroadsheet">Broad Sheet </a></li>
                                             <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".uploadresultsheet">Result Sheet </a></li><!-->
                                             <li><a href="" class=" waves-effect waves-light " data-toggle="modal" data-target=".checkresult">Check Result</a></li>
                                              <li><a href="assignment.php" class=" waves-effect waves-light ">Check Assignment</a></li>
                                              <li><a href="" class=" waves-effect waves-light " data-toggle="modal" data-target=".checkQuestion">View Exam Questions</a></li>
                                              <li><a href="" class=" waves-effect waves-light " data-toggle="modal" data-target=".lesson">Take a Lesson</a></li>
                                               <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".comment">My bills</a></li>
                                              
                                              
                                        </ul>
                                    </li>
                                   
                                </ul>
                            </li>       
                        </ul>

                   

                       
                     
                             
                   
                        <!-- End navigation menu -->
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
       <div class="wrapper">
        <div class="container">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6" id="non-printable">
                        <h4 class="page-title"><?php 
$sqlSelectz = $conn->query ("select * from studentscores where admissionNo='$user' and session= '$session' and term = '$term' and class='$class'");

        $chartSubject = "";
        $chartScore = "";

  while($results = mysqli_fetch_array($sqlSelectz)){
      $chartSubject  .= "'".substr($results["subject"], 0, 6)."', ";
       $chartScore  .=  $results["test"] + $results["exam"].", ";
      
  }?>Report Sheet</h4>
                    </div>
                    <div class="col-sm-6" id="non-printable">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">CHS Portal</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Report Sheet</a></li>
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
                <?php if($studentInfo['passport'] == ""){?><img src="../portal/passport/images.jfif" alt="" width="160px" height="180px" class="img-responsive" style=""><?php }else{?><img src="../portal/passport/<?php print $studentInfo['passport'];?>" alt="" width="160px" height="180px" class="img-responsive" style=""><?php } ?>

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
                  <img src="assets/images/report_logo.png" style="width: 80%; height: auto; margin-left: 10%;" alt="Chyfley logo">
                </div>
              </div>

                <div class="col-xl-12 col-12 col-sm-12 col-md-12" >
                    <div class="card m-b-30">
                        <div class="card-body">
                            <table id="report"  class="minimalistBlack">
                                <thead>

                                   <?php

    $sqlStudentName =  $conn->query("SELECT * from studentusers where admissionNo='$user'");
 
                   $student = mysqli_fetch_array($sqlStudentName);
 $sqlTotalTest = $conn->query("SELECT  sum(test) as totalTest from studentscores where session = '$session' and term = '$term' and admissionNo='$user' ");

                                                      $sqlTotalExam = $conn->query("SELECT  sum(exam) as totalExam from studentscores  where session = '$session' and term = '$term' and class='$class'  and admissionNo='$user' ");

                                                       $sqlOffer = $conn->query("SELECT * from studentscores where session = '$session' and term = '$term' and class='$class' and admissionNo='$user'");

                                                        $offer = mysqli_num_rows($sqlOffer);
                                                       $totalTest = mysqli_fetch_assoc($sqlTotalTest);
                                                        $totalExam = mysqli_fetch_assoc($sqlTotalExam);
                                                          $expectedScore = 100 * $offer;
                                                          $scored =  $totalTest['totalTest'] + $totalExam['totalExam'] ;

                                                            $percentage = $scored /  $expectedScore * 100
                                                          ?>
                  
                                <tr style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">
                                    <th colspan="6" class="mt-0 header-title" ><center><h5 class="text-light"><?php print $student['surname'];?> <?php print $student['firstName'];?> <?php print $student['lastName'];?><h5> <h6 class="text-light"><?php print $student['admissionNo'];?></h6></center></th>
                              
                                      
                                   
                                </tr>
                                </thead>

                                <tbody >
                                     
                                          <tr>
                                             <th colspan="2">Total Score: <span style="font-size: 17px;"> <?php print $totalTest['totalTest'] + $totalExam['totalExam'];?></span></th>
                                    <th colspan="3"> Percentage: <span style="font-size: 17px;"><?php print round($scored /  $expectedScore * 100, 1);?>%</span></th>
                                      <?php if ($percentage >= 85): ?>
                              <td <th colspan="2"> >GRADE:<span style="font-size: 17px;">A1</span></td>
                              <?php elseif ($percentage > 80 || $percentage == '84'):  ?>
                              <td <th colspan="2">>GRADE:<span style="font-size: 17px;">B2</span></td>
                              <?php elseif ($percentage > 75 || $percentage == '79'):  ?>
                              <td <th colspan="2">>GRADE:<span style="font-size: 17px;">B3</span></td>
                              <?php elseif ($percentage > 70 || $percentage== '74'):  ?>
                              <td <th colspan="2">>GRADE:<span style="font-size: 17px;">C4</span></td>
                              <?php elseif ($percentage > 65 || $percentage == '69'):  ?>
                              <td <th colspan="2">>GRADE:<span style="font-size: 17px;">C5</span></td>
                              <?php elseif ($percentage > 60 || $pepercentage  == '64'):  ?>
                              <td <th colspan="2">>GRADE:<span style="font-size: 17px;">C6</span></td>
                              <?php elseif ($percentage  > 55 || $percentage  == '59'):  ?>
                              <td <th colspan="2">>GRADE:<span style="font-size: 17px;">D7</span></td>
                                <?php elseif ($percentage  > 50 ||  $percentage  == '54'):  ?>
                              <td <th colspan="2">>GRADE:<span style="font-size: 17px;">E8</span></td>
                                <?php elseif ($percentage > 0 || $percentage  == '49'):  ?>
                              <td <th colspan="2">>GRADE:<span style="font-size: 17px;">F9</span></td>
                              <?php endif ?>
                                     
                                       
                                          </tr>
                                           
                                       
                                   
                                            </tbody>
                                        </table>
                                   
                            <div class="row">
                              <div class="col-12">
                           <br> <h4 class="mt-0 header-title" style="margin-left: 50px;"> CONGNITIVE DOMAIN </h4>
                            <p class="sub-title../plugins">
                            </p>
                          </div>
                        </div>
                                  
    
         
<?php

$sqlSelect = $conn->query ("select * from studentscores where admissionNo='$user' and session= '$session' and term = '$term' and class='$class'");

$sqlSignature = $conn->query ("select * from teachersignature where session= '$session' and term = '$term' and class='$class'");
$signature = mysqli_fetch_array($sqlSignature);
$sqlPrincipalSignature = $conn->query ("SELECT * from users where username= 'mary' and password='4888' ");
$principalSignature = mysqli_fetch_array($sqlPrincipalSignature);


?>   

                            <table id="" class="minimalistBlack" >
                                <thead >
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
            <td  style="width: 1%;"><?php print $result['test'];?></td>
            <td  style="width: 1%;"><?php print $result['exam'];?></td>
            <td  style="width: 1%;"><?php print $result['test'] + $result['exam'] ;?></td>

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

                                                      $sqlTotalTest = $conn->query("SELECT  sum(test) as totaltest from studentscores  where session = '$session' and term = '$term' and class='$class'  and admissionNo='$user' ");
                                                       $sqlTotalExam = $conn->query("SELECT  sum(exam) as totalexam from studentscores  where session = '$session' and term = '$term' and class='$class'  and admissionNo='$user' ");
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

                                        <hr >
                                                     <div class="row">
             <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Performance Chart</h4>
                            
                        

                            <canvas id="myChart"  width="700" height="300"></canvas>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> 
                                        <div class="row">
                                          <div class="col-8"> <b>Teacher's Comment:</b> <i style="font-size:1vw;"><?php print $studentAtt['comment'];?></i></div>
                                           <div class=" col-4" ><b> Teacher's Signature:</b> <?php echo "<img src='../excel/signature_images/".$signature['signature']."' style='width: 30px;' >";?></div>


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
                                           <div class=" col-4"><b> Principal's Signature:</b> <?php echo "<img src='../excel/signature_images/".$signature['signature']."' style='width: 30px;' >";?></div>


                                         <!--  <div class="col-8" style="font-size:1vw;"> <strong>Principal's Comment:</strong>  <i style="font-size:1vw;"> <?php if ($percentage >= 70){ echo "<b>An excellent performance. Keep it up.<b>";}elseif ($percentage >= 60) {echo "A very good performance. Do not relent.";}elseif ($percentage >= 50) {echo "An average performance. Work harder next term.  ";}elseif ($percentage >= 40) {echo "A fair performance. Improve in your weak area.";}elseif ($percentage >= 30) {echo "A poor performance";}elseif ($percentage <= 30 ) {echo "A very poor performance";} ?> </i></div>
                                       <div class=" col-4" style="font-size:;"> Principal's Signature: <?php echo "<img src='signature_images/".$principalSignature['signature']."' style='width: 50px;' >";?></div> -->

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


        <!-- end container-fluid -->

  
</body>
</html>

  

<script src="../portal/plugins/chartjs/chart.min.js"></script>
<script src="../portal/assets/pages/chartjs.init.js"></script>

<script>

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php print $chartSubject; ?> ''],
        datasets: [{
            label: 'Chart',
            data: [<?php print $chartScore; ?> 0],
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