<?php
$servername = "localhost";
$username   = "tenderst_kewe";
$password   = "kewe_123456789";
$database   = "tenderst_db";
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$session = $_POST['session']; 
$class = $_POST['class'];
$term = $_POST['term'];
$admissionNo = $_POST['admissionNo'];

$sqlCurrentClass = $conn->query ("select * from promotedstudent where admissionNo = '$admissionNo' order by id desc limit 1 ");
$currentClass = mysqli_fetch_array($sqlCurrentClass);

 $sqlstudent = $conn->query ("select * from studentbill where admissionNo = '$admissionNo' and class= '$class' and term='$term' and session='$session' limit 1 ");
$foundz = mysqli_num_rows($sqlstudent);
if ($foundz != 1) {
	echo "not exist";

	}else{

   while($found = mysqli_fetch_assoc($sqlstudent))
    {
    	$sqlstudentName = $conn->query ("select * from studentusers where admissionNo = '".$found['admissionNo']."'");
    	$studentName = mysqli_fetch_array($sqlstudentName);
   

     //    echo '<h4 style = "color: green;">'.$found['admissionNo'].'<h4>';

         $sqlTotalAmount = $conn->query("SELECT  sum(amount) as totalAmount from studentbill where session = '".$currentClass['session']."' and term = '$term' and class = '".$currentClass['class']."' and admissionNo='".$found['admissionNo']."' ");
          $totalAmount = mysqli_fetch_assoc($sqlTotalAmount);

          $sqlTotalAmount1 = $conn->query("SELECT  sum(amount) as totalAmount1 from income where session = '".$currentClass['session']."' and term = '$term' and class = '".$currentClass['class']."' and admissionNo='".$found['admissionNo']."' ");
          $totalAmount1 = mysqli_fetch_assoc($sqlTotalAmount1);

          $sqlStudentBill= $conn->query("select * from studentbill where session = '".$currentClass['session']."' and term = '$term' and class = '".$currentClass['class']."' and admissionNo='".$found['admissionNo']."' ");

          $sessionz = $currentClass['session'];
          $clazz =  $currentClass['class'];
          if($_POST['class'] != $currentClass['class']){


           $sqlTotalOutstanding = $conn->query("SELECT * from studentbill  where admissionNo ='$admissionNo' 
           and class != '$clazz'");
           while ($outstanding = mysqli_fetch_array($sqlTotalOutstanding)){;
            $particular = $outstanding['particular'];
            $sqlCheckOutstanding = $conn->query("SELECT  sum(amountPaid) as totalPaidBill from income  where 
            session = '$session' and term = '$term' and class = '$class' and 
            admissionNo='".$outstanding['admissionNo']."' and particular='$particular' ");
            $checkOutstanding= mysqli_fetch_assoc($sqlCheckOutstanding);
            $discount = $outstanding['discount'];
            $paidOutstanding = $checkOutstanding['totalPaidBill'];
            $totalOutstanding = $outstandingLeft - $paidOutstanding;     
            echo '   <form action="paid_by_student.php" method="GET" >
            <label>'.$outstanding['particular'].' </label>(Outstanding) <br> 
            <input type="hidden" name="class" id="class"  class="form-control" value="'.
            ($outstanding['class']).'">
            <input type="hidden" name="term" id="term"   class="form-control" value="'.
            ($outstanding['term']).'">
            <input type="hidden" name="session" id="session" class="form-control" value="'.
            ($outstanding['session']).'">
              <input type="hidden" name="admissionNo" id="admissionNo" class="form-control" value="'.
              ($outstanding['admissionNo']).'">
             <input type="hidden" name="particular[]" id="particular[]"  class="form-control" value="'.
             ($outstanding['particular']).'"><input type="hidden" name="id[]"  class="form-control" value="'.
             ($outstanding['id']).'"><br>
            <input type="" name="amount[]"  class="form-control parameter" value="'.
            ($outstanding['amount'] - $discount).'"><br>';
           }
            echo '
           
             <span id="result" style="color: green; font-weight: bold;"></span>';
              if ($paidOutstanding == '0') {
                echo '<button disabled="" class="danger" type="submit" value="Paysss"></button>';
             }else{

               echo '    <button type="submit" onclick="payWithPaystack()"> Pay </button>
             </form>';
                    }  
                }    else{      
         while($studentBillz = mysqli_fetch_array($sqlStudentBill)){
            $sqlCheckPaidBill = $conn->query("SELECT  sum(amount) as totalPaidBill from income  where session = '".$currentClass['session']."' and term = '".$studentBillz['term']."' and class = '".$currentClass['class']."' and admissionNo='".$studentBillz['admissionNo']."' and particular='".$studentBillz['particular']."'");
            $studentPaidBill= mysqli_fetch_assoc($sqlCheckPaidBill);

            
            $totalStudentBill =  $studentBillz['amount'];
            $totalPaidBill = $studentPaidBill['totalPaidBill'];    
           $discount = $studentBillz['discount'];
           $totalBill = $totalStudentBill -  $totalPaidBill - $discount; 
            echo '
            <form action="paid_by_student.php" method="GET">
            
            <label>'.$studentBillz['particular'].' </label> <br> 
            <input type="hidden" name="class" id="class" class="form-control" value="'.
            ($studentBillz['class']).'">
            <input type="hidden" name="term" id="term"  class="form-control" value="'.
            ($studentBillz['term']).'">
            <input type="hidden" name="session" id="session"  class="form-control" value="'.
            ($studentBillz['session']).'">
            <input type="hidden" name="particular[]" id="particular"  class="form-control" value="'.
            ($studentBillz['particular']).'">
            <input type="hidden" name="admissionNo" id="admissionNo" class="form-control" value="'.
            ($studentBillz['admissionNo']).'">
            <input type="hidden" name="id[]"  class="form-control" value="'.($studentBillz['id']).'">
            <input type="" name="amount[]" id="amt" class="form-control  parameter" value="'.
            ($studentBillz['amount'] - $discount).'">
            <br>';
           
 
  }       
      

       
    echo '
    Total : <input type="text" id="total" class="total"/>
    <span id="result" style="color: green; font-weight: bold;"></span>';


    echo ' <button type="submit" onclick="payWithPaystack()"> Pay </button>
    </form>';
  
    }
  } 
        }
       
           
?> 
<script>
$(document).ready(function(){
  $(".parameter").on("input",function() {
      var total=0;
      $(".parameter").each(function(){
          if(!isNaN(parseInt($(this).val())))
          {
            total+=parseInt($(this).val());  
          }
      });
      $(".total").val(total);
	});
})</script>


 
  
    
 
    
 

 