<?php include 'header.php';?>

<body>

    <?php include 'navigationMenu.php';?>
        <!-- End Navigation Bar-->

    </div>
    <!-- header-bg -->

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"></h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Student Informations</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <?php $sqlStudentInfo = $conn->query("select * from studentusers where id ='".$_GET['id']."'");
                            $studentInfo  = mysqli_fetch_array($sqlStudentInfo);?>
                            <h4 class="mt-0 header-title">Student Information</h4>
                            <p class="sub-title"></p>

                            <form class="" action="updateStudentProfile.php" method="POST" id="updateStudentProfile">
                                <div class="form-group">
                                    <label>Admission Number</label>
                                    <input type="hidden" name="id" id="pass2"  value="<?php print $studentInfo['id'];?>" class="form-control"   placeholder="Surname"/>
                                    <input type="text" name="admissionNo" class="form-control" value="<?php print $studentInfo['admissionNo'];?>" readonly placeholder=""/>
                                     <input type="hidden" name="admissionNo" class="form-control" value="<?php print $studentInfo['admissionNo'];?>"  placeholder=""/>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <div>
                                        <input type="" name="surname" id="pass2" readonly="" value="<?php print $studentInfo['surname'];?>" class="form-control"   placeholder="Surname"/>
                                        <input type="hidden" name="surname" id="pass2"  value="<?php print $studentInfo['surname'];?>" class="form-control"   placeholder="Surname"/>
                                    </div>
                                    <div class="m-t-10">
                                        <input type="" name="firstName" value="<?php print $studentInfo['firstName'];?>" class="form-control" 
                                               data-parsley-equalto=""
                                               placeholder="First Name"/>
                                    </div>
                                    <div class="m-t-10">
                                        <input type="" name="lastName" class="form-control" value="<?php print $studentInfo['lastName'];?>" name="lastname" 
                                               data-parsley-equalto="#pass2"
                                               placeholder="Last Name"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    
                                    <div><label>Date of Birth </label>
                                        <input type="date" name="dob" value="<?php print $studentInfo['dob'];?>" class="form-control" 
                                               parsley-type="" placeholder="Date of birth"/>
                                               <label>Place of Birth</label>
                                               <input type="text" name="pob" value="<?php print $studentInfo['pob'];?>" class="form-control" 
                                               parsley-type="" placeholder="Place of birth"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div>
                                        <select parsley-type="" type="text" name="gender" class="form-control"
                                                placeholder=""/>
                                               <option selected="selected"></option>
                                                   <option selected=""  value="<?php if($studentInfo['gender'] == "M"){ print "M";}else{ print "F";}?>"><?php if($studentInfo['gender'] == "M"){ print "Male";}else{ print "Female";}?></option>
                                                   <option value="F">Female</option>
                                                    <option value="A">Male</option>
                                               </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <div>
                                        <input data-parsley-type="" value="<?php print $studentInfo['nationality'];?>" name="country" type="text"
                                               class="form-control" 
                                               placeholder=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>State of Origin</label>
                                    <div>
                                        <input data-parsley-type="" value="<?php print $studentInfo['state'];?>" name="state" type="text"
                                               class="form-control" 
                                               placeholder=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <div>
                                        <input data-parsley-type="alphanum" name="phone" value="<?php print $studentInfo['phone'];?>" type="tel"
                                               class="form-control" 
                                               placeholder=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Home Address</label>
                                    <div>
                                        <textarea  class="form-control" rows="5" name="address"><?php print $studentInfo['address'];?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="change" onchange="myfunction()" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button><div id="result_screen" class="alert alert-success" style="display: none"></div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Other Info</h4>
                            <p class="sub-title"></p>

                                <form  action="updateProfilePix.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php print $_GET['id'];?>">
                                            <div class="form-group">
                                                <div class="edit-profile-photo">
                                                   <?php if($studentInfo['passport'] == ""){?> <img src="passport/images.jfif"  alt="" class="img-responsive" style="border-radius: 50%; margin-left: 28%;"><?php }else{?>
                                                    <center><img src="passport/<?php print $studentInfo['passport'];?>"  alt="" class="img-responsive" style="border-radius: 50%; width: 30vw; "><?php }?></center>
                                                    <center><div class="change-photo-btn btn btn-primary" >
                                                        <div class="photoUpload" >
                                                            <span>
                                                                <i class="fa fa-upload"></i>
                                                                
                                                            </span>
                                                            <input type="file" name="profile-pix" >
                                                        </div>
                                                    </div></center>

                                                </div>
                                               <center> <button class="listing-btn-large center"  style="background-color:;" >Update profile picture</button></center>
                                            </div>
                                        </form>
                               <!--  <div class="form-group">
                                    <label>Max Length</label>
                                    <div>
                                        <input type="text" class="form-control" 
                                               data-parsley-maxlength="6" placeholder="Max 6 chars."/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Range Length</label>
                                    <div>
                                        <input type="text" class="form-control" 
                                               data-parsley-length="[5,10]"
                                               placeholder="Text between 5 - 10 chars length"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Min Value</label>
                                    <div>
                                        <input type="text" class="form-control" 
                                               data-parsley-min="6" placeholder="Min value is 6"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Max Value</label>
                                    <div>
                                        <input type="text" class="form-control" 
                                               data-parsley-max="6" placeholder="Max value is 6"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Range Value</label>
                                    <div>
                                        <input class="form-control"  type="text range" min="6"
                                               max="100" placeholder="Number between 6 - 100"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Regular Exp</label>
                                    <div>
                                        <input type="text" class="form-control" 
                                               data-parsley-pattern="#[A-Fa-f0-9]{6}"
                                               placeholder="Hex. Color"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Min check</label>
                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" data-parsley-multiple="groups"
                                                   data-parsley-mincheck="2">
                                            <label class="custom-control-label" for="customCheck1">And this</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" data-parsley-multiple="groups"
                                                   data-parsley-mincheck="2">
                                            <label class="custom-control-label" for="customCheck2">Can't check this</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3" data-parsley-multiple="groups"
                                                   data-parsley-mincheck="2">
                                            <label class="custom-control-label" for="customCheck3">This too</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group m-b-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form> -->

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

    <!-- Footer -->
  <?php include 'footer.php';?>

</body>
 <?php include 'modal.php';?>

 <script type="text/javascript">
      $(document).ready(function() {
        $('#updateStudentProfile').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'updateStudentProfile.php',
            data: $('#updateStudentProfile').serialize(),
            success:function(data) {
        $("#result_screen").text(data).show("slow").delay(5000).hide("slow"); //=== Show Success Message==
        // alert("successful");
   
    },
    error:function(data){
        $("#result_screen").text(data).show("slow").delay(5000).hide("slow"); //===Show Error Message====
          // alert("Fail");
        
    }
             
          });

        });

      });   




 </script>
</html>