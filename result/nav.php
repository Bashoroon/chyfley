 <?php 
 $sqlstudentClass = $conn->query ("SELECT * from promotedstudent where admissionNo='".$_SESSION['admissionNo']."' order by id desc limit 1 ");
 $studentClass = mysqli_fetch_array($sqlstudentClass);
        $sqlStudent  = $conn->query ("SELECT * from studentusers where admissionNo ='$user'");
        $student = mysqli_fetch_array($sqlStudent);
        ?>
<header id="topnav" >
            <div class="topbar-main" style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">
                <div class="container-fluid">

                    <!-- Logo-->
                    <div>
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
                                           <input type="hidden" name="id" value="<?php print $_SESSION['admissionNo'];?>">
                                        <?php if($student['passport'] == ""){?><img src="../portal/passport/images.jfif"  alt="" class="rounded-circle"><?php }else{?><img srcset="../portal/passport/<?php print $student['passport'];?>"  alt=""  class="rounded-circle"><?php } ?>
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
                        
                            
                         <ul class="navigation-menu">
                             

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
                                              <li><a href="" class=" waves-effect waves-light " data-toggle="modal" data-target=".checkQuestion">Examination/CBT</a></li>
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