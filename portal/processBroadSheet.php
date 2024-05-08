<!DOCTYPE html>
<?php include 'db.php';
?>
     <body>

        <?php 
$session = $_POST['session'];
$term = $_POST['term'];
$class = $_POST['class'];

    $sqlsearch = $conn->query ("select * from broadsheet where session = '$session' and term = '$term' and class = '$class';");
         $row = mysqli_num_rows($sqlsearch);?> 
<?php
 require_once('spreadsheet-reader-master/php-excel-reader/portal_reader2.php');
require_once('spreadsheet-reader-master/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'portal/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $name = "";
                if(isset($Row[0])) {
                    $name = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $englishCa = "";
                if(isset($Row[1])) {
                    $englishCa = mysqli_real_escape_string($conn,$Row[1]);
                }
                $englishExam = "";
                if(isset($Row[2])) {
                   $englishExam = mysqli_real_escape_string($conn,$Row[2]);
                }
                $englishTotal = "";
                if(isset($Row[3])) {
                    $englishTotal = mysqli_real_escape_string($conn,$Row[3]);
                }
                $mathematicsCa = "";
                if(isset($Row[4])) {
                    $mathematicsCa = mysqli_real_escape_string($conn,$Row[4]);
                }
                $mathematicsExam = "";
                if(isset($Row[5])) {
                  $mathematicsExam = mysqli_real_escape_string($conn,$Row[5]);
                }
                $mathematicsTotal = "";
                if(isset($Row[6])) {
                    $mathematicsTotal = mysqli_real_escape_string($conn,$Row[6]);
                }
                $basicCa = "";
                if(isset($Row[7])) {
                    $basicCa = mysqli_real_escape_string($conn,$Row[7]);
                }
                $basicExam = "";
                if(isset($Row[8])) {
                    $basicExam = mysqli_real_escape_string($conn,$Row[8]);
                }
                $basicTotal = "";
                if(isset($Row[9])) {
                    $basicTotal = mysqli_real_escape_string($conn,$Row[9]);
                }
                $creativeCa = "";
                if(isset($Row[10])) {
                    $creativeCa = mysqli_real_escape_string($conn,$Row[10]);
                }
                $creativeExam = "";
                if(isset($Row[11])) {
                    $creativeExam = mysqli_real_escape_string($conn,$Row[11]);
                }
                $creativeTotal = "";
                if(isset($Row[12])) {
                    $creativeTotal = mysqli_real_escape_string($conn,$Row[12]);
                }
                $vocationalCa = "";
                if(isset($Row[13])) {
                    $vocationalCa = mysqli_real_escape_string($conn,$Row[13]);
                }
                $vocationalExam = "";
                if(isset($Row[14])) {
                    $vocationalExam = mysqli_real_escape_string($conn,$Row[14]);
                }
                $vocationalTotal = "";
                if(isset($Row[15])) {
                    $vocationalTotal= mysqli_real_escape_string($conn,$Row[15]);
                }
                $religionCa = "";
                if(isset($Row[16])) {
                    $religionCa = mysqli_real_escape_string($conn,$Row[16]);
                }
                $religionExam = "";
                if(isset($Row[17])) {
                    $religionExam= mysqli_real_escape_string($conn,$Row[17]);
                }
                $religionTotal = "";
                if(isset($Row[18])) {
                    $religionTotal = mysqli_real_escape_string($conn,$Row[18]);
                }
                $yorubaCa = "";
                if(isset($Row[19])) {
                    $yorubaCa = mysqli_real_escape_string($conn,$Row[19]);
                }
                $yorubaExam = "";
                if(isset($Row[20])) {
                    $yorubaExam = mysqli_real_escape_string($conn,$Row[20]);
                }
                $yorubaTotal = "";
                if(isset($Row[21])) {
                    $yorubaTotal= mysqli_real_escape_string($conn,$Row[21]);
                }
                $frenchCa = "";
                if(isset($Row[22])) {
                    $frenchCa = mysqli_real_escape_string($conn,$Row[22]);
                }
                $frenchExam = "";
                if(isset($Row[23])) {
                    $frenchExam = mysqli_real_escape_string($conn,$Row[23]);
                }
                $frenchTotal = "";
                if(isset($Row[24])) {
                    $frenchTotal = mysqli_real_escape_string($conn,$Row[24]);
                }
                $businessCa = "";
                if(isset($Row[25])) {
                    $businessCa = mysqli_real_escape_string($conn,$Row[25]);
                }
                $businessExam = "";
                if(isset($Row[26])) {
                    $businessExam = mysqli_real_escape_string($conn,$Row[26]);
                }
                $businessTotal = "";
                if(isset($Row[27])) {
                 $businessTotal = mysqli_real_escape_string($conn,$Row[27]);
                }
                $total = "";
                if(isset($Row[28])) {
                    $total = mysqli_real_escape_string($conn,$Row[28]);
                }
                $average = "";
                if(isset($Row[29])) {
                    $average = mysqli_real_escape_string($conn,$Row[29]);
                }
                $timeSchOpen = "";
                if(isset($Row[30])) {
                    $timeSchOpen = mysqli_real_escape_string($conn,$Row[30]);
                }
                $present = "";
                if(isset($Row[31])) {
                    $present = mysqli_real_escape_string($conn,$Row[31]);
                }
                $absent = "";
                if(isset($Row[32])) {
                    $absent = mysqli_real_escape_string($conn,$Row[32]);
                }
                $teachersComment = "";
                if(isset($Row[33])) {
                    $teachersComment = mysqli_real_escape_string($conn,$Row[33]);
                }
                 $principalsComment = "";
                if(isset($Row[34])) {
                    $principalsComment = mysqli_real_escape_string($conn,$Row[34]);
                }
                
                
                if (!empty($session) || !empty($term) ||!empty($class) || !empty($name) || !empty($englishCa) || !empty($englishExam) || !empty($englishTotal) || !empty($mathematicsCa) || !empty($mathematicsExam) || !empty($mathematicsTotal) || !empty($basicCa) || !empty($basicExam) || !empty($basicTotal) || !empty($creativeCa) || !empty($creativeExam) || !empty($creativeTotal) || !empty($vocationalCa) || !empty($vocationalExam) || !empty($vocationalTotal) || !empty($religionCa) || !empty($religionExam) || !empty($religionTotal) || !empty($yorubaCa) || !empty($yorubaExam) || !empty($yorubaTotal) || !empty($frenchCa) || !empty($frenchExam) || !empty($frenchTotal) || !empty($businessCa) || !empty($businessExam) || !empty($businessTotal) || !empty($total) || !empty($average) || !empty($timeSchOpen) || !empty($present) || !empty($absent) || !empty($teachersComment) || !empty($principalsComment)) {
                     if ($row > 0) { 
                        header('location:index.php?couldNotUploadFile');
                     }else{
                        
                    $query = "insert into broadsheet (session, term, class, name, englishCa, englishExam, englishTotal, mathematicsCa, mathematicsExam, mathematicsTotal, basicCa, basicExam, basicTotal, creativeCa, creativeExam, creativeTotal, vocationalCa, vocationalExam, vocationalTotal, religionCa, religionExam, religionTotal, yorubaCa, yorubaExam, yorubaTotal, frenchCa, frenchExam, frenchTotal, businessCa, businessExam, businessTotal, total, average, timeSchOpen, present, absent, teachersComment, principalsComment) values('".$session."','".$term."','".$class."','".$name."','".$englishCa."','".$englishExam."','".$englishTotal."','".$mathematicsCa."','".$mathematicsExam ."','".$mathematicsTotal."','".$basicCa."','".$basicExam."','".$basicTotal."','".$creativeCa."','".$creativeExam."','".$creativeTotal."','".$vocationalCa."','".$vocationalExam."','".$vocationalTotal."','".$religionCa."','".$religionExam."','".$religionTotal."','".$yorubaCa."','".$yorubaExam."','".$yorubaTotal."','".$frenchCa."','".$frenchExam."','".$frenchTotal."','".$businessCa."','".$businessExam."','".$businessTotal."','".$total."','".$average."','".$timeSchOpen."','".$present."','".$absent."','".$teachersComment."','".$principalsComment."')";
                    $result = mysqli_query($conn, $query) or die("wetin hap"); 
                
                    if (! empty($result)) { 
                        header('location:index.php?s');
                    } else {
                       header('location:index.php?e');                    }
            }
                }
            
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}
?>
                            
                         
             
        <!-- END wrapper -->

        <!------- right bar start------->
        
        <!------ right bar end---------->

        
        <!------ modal start-------->
      
        <!------modal end------>

        <!-- Vendor js -->
        
        <!-- Responsive Table js -->
        <script src="assets/libs/rwd-table/rwd-table.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/responsive-table.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <!-- Modal-Effect -->
        <script src="assets/libs/custombox/custombox.min.js"></script>


 <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
 
    </body>
</html>
