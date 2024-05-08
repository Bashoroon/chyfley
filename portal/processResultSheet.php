
<?php include 'db.php';


 
  
?>
     <body>

        <?php 
$session = $_POST['session'];
$term = $_POST['term'];
$class = $_POST['class'];?>
           
        
         

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
                
                $subject = "";
                if(isset($Row[1])) {
                    $subject = mysqli_real_escape_string($conn,$Row[1]);
                }
                
                $ca = "";
                if(isset($Row[2])) {
                    $ca = mysqli_real_escape_string($conn,$Row[2]);
                }
                $exam = "";
                if(isset($Row[3])) {
                   $exam = mysqli_real_escape_string($conn,$Row[3]);
                }
                $total = "";
                if(isset($Row[4])) {
                    $total = mysqli_real_escape_string($conn,$Row[4]);
                }
                $grade = "";
                if(isset($Row[5])) {
                    $grade = mysqli_real_escape_string($conn,$Row[5]);
                }
                
                if (!empty($session) || !empty($term) ||!empty($class) ||!empty($name) ||!empty($subject) || !empty($ca) || !empty($exam) || !empty($total) || !empty($grade)) {
                      
                           if ($row > 0) { 
                        header('location:index.php?couldNotUploadFile');
                     }else{
  
                          $queryreport = "insert into report (session, term, class,name, subject, ca, exam, total, grade) values('".$session."','".$term."','".$class."','".$name."','".$subject."','".$ca."','".$exam."','".$total."','".$grade."')";
                    $report = mysqli_query($conn, $queryreport) or die("wetin hap"); 
                
                    if (! empty($report)) { 
                        header('location: index.php?s');
                    } else {
                       header('location:index.phpe?e');
                    }
                
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

                            
                         
             
       