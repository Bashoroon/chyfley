<?php include 'db.php';
error_reporting(E_ALL);

?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php require 'header.php';?>
</head>

<body>

<div class="header-bg">
        <!-- Navigation Bar-->
      <?php include 'nav.php';?>
        <!-- End Navigation Bar-->
        
         <div class="wrapper">
        <div class="container-fluid">
  <div class="col-xl-6 col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Add Student</h4>
                    <?php if (isset($_GET['student-exist'])) {
                        echo "<h6>Admission ";
                        print $_GET['student-exist'];
                        echo " already exist. Please try again</h6>";
                    }
                    if (isset($_GET['student-added'])) {
                        echo "<h6>Admission ";
                        print $_GET['student-added'];
                        echo " added successfully</h6>";
                    }
                    ?>

                    <!-- Nav tabs -->
 <form action="allSubForExam.php" method="GET" >
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                            <div class="row">
                                
                                   
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="control-label">Session</label>
                                     <select id="demo1" readonly type="text" required="required" value="" class="form-control" name="session">
                                     <option value="">Select a session</option>
                                     <?php $sqlsession = $conn->query("select * from session order by id desc limit 1");
                                        while ($session = mysqli_fetch_array($sqlsession)) {; ?>

                                         <option selected value="<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                     <?php } ?>
                                 </select>


                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="control-label">Class</label>
                                        <select id="demo1" type="text" readonly required="required" value="" class="form-control" name="class">
                                     <option value="">Select your current class</option>
                                     <?php $sqlstudentClass = $conn->query("SELECT * from promotedstudent where admissionNo='" . $_SESSION['admissionNo'] . "' order by id desc limit 1");
                                        while ($class = mysqli_fetch_array($sqlstudentClass)) {; ?>

                                         <option selected="selected" value="<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                     <?php } ?>
                                 </select>

                                    </div>
                                </div>

                                
                         <div class="col-4">
                             <div class="form-group">
                                 <label class="control-label">Term</label>
                                 <select id="demo1" type="text" required="required" value="" class="form-control" name="term">
                                     <option value="">Select a term</option>
                                     <?php $sqlterm = $conn->query("select * from term");
                                        while ($term = mysqli_fetch_array($sqlterm)) {; ?>

                                         <option value="<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                     <?php } ?>
                                 </select>

                          
                         </div>
                     </div>

                            </div>
                            <button type="submit" class="btn btn-primary" style="float: right;">Go to Exam Room</button>
                            <div id="result_screen" style="font-size: 20px; font-weight: bold; display: none;" class="alert alert-success"></div>
                        </div>
                    </div>
                    </form>
                    
                    </div>
                    </div>
                    </div>
                    </body>
