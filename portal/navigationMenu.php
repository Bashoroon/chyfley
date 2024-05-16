<div class="header-bg">
    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main" style="background: linear-gradient(90deg, rgba(18,44,127,1) 9%, rgba(177,236,231,1) 29%, rgba(203,203,203,1) 48%, rgba(145,215,138,1) 76%, rgba(212,54,68,1) 100%);">
            <div class="container-fluid">

                <!-- Logo-->
                <div class="no-print">
                    <a href="index.php" class="logo">
                        CHYFLEY PORTAL

                    </a>
                </div>
                <!-- End Logo-->

                <div class="menu-extras topbar-custom navbar p-0">

                    <ul class="navbar-right ml-auto list-inline float-right mab-0">
                        <!-- language-->


                        <!-- full screen -->

                        <!-- notification -->
                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <?php if ($nameFound['passport'] == "") { ?>
                                        <img src="images/chyf_logo.png" alt="user" class="rounded-circle">
                                    <?php  } else { ?>
                                        <img src="<?php print $nameFound['passport']; ?>" alt="user" class="rounded-circle">
                                    <?php } ?>

                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a class="dropdown-item" href="editMyProfile.php?id=<?php print $nameFound['id']; ?>"><i class="mdi mdi-account-circle"></i> Profile</a>

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
                        <?php if ($role == "Admin") { ?>
                            <li class="has-submenu">
                                <a href="../index.php"><i class="icon-accelerator"></i>Back to School Website</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="icon-pencil-ruler"></i>Examination/Test<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                          
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".inputScore">Input Score </a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".checkbroadsheet2"> View Broad Sheet </a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".checkscoresheet">Score Sheet </a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".addComment">Add Teacher's Comment</a></li>



                                        </ul>
                                    </li>

                                </ul>
                            </li>



                            <li class="has-submenu">
                                <a href="#"><i class="icon-paper-sheet"></i> Pages <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">

                                    <li>
                                        <ul>
                                            <li> <a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-smC">Add Class</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-smS">Add Session</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-smT">Add Term</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".addSubject">Add Subject</a></li>
                                            <li><a href="teachers-detail.php">View All Teachers</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".attendance">School Attendance</a></li>
                                            <li><a href="bulkSms.php">Bulk Sms</a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="icon-paper-sheet"></i> Student <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">

                                    <li>
                                        <ul>


                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".view-student">View Student By Class</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".promote">Promote Student</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".clearance">Clearance</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".student-report">View Student Report</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".cleared-student">View Cleared Student </a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".teachers_signature">Append Principal's Signature</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".comment">Comment/Student Att</a></li>




                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="icon-paper-sheet"></i> E- learning <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">

                                    <li>
                                        <ul>
                                            <li><a href="E-note.php" class=" waves-effect waves-light">Add E-Note </a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".viewEnote">View E-Note </a></li>
                                            <li><a href="assignment.php">Add Assignment</a></li>

                                            <li><a href="" target="_blank" class=" waves-effect waves-light " data-toggle="modal" data-target=".examQuestion">Add CBT Question</a></li>
                                            <li><a href="" class=" waves-effect waves-light " data-toggle="modal" data-target=".examstatus">Change Examination Status</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".cbtscores">CBT Scores</a></li>


                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <span style="float: right; margin-top: 20px;"><?php print $nameFound['name']; ?></span>
                    </ul>

                <?php } elseif ($role == "Teacher") { ?>

                    <li class="has-submenu">
                        <a href="../index.php"><i class="icon-accelerator"></i>Back to School Website</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="icon-pencil-ruler"></i>Examination/Test<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>

                                    <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".inputScore">Input Score </a></li>
                                    <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".checkbroadsheet2"> View Broad Sheet </a></li>
                                    <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".checkscoresheet">Score Sheet </a></li>
                                    <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".comment">Comment/Student Att</a></li>
                                    <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".student-report">View Student Report</a></li>

                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="icon-paper-sheet"></i> E- learning <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu megamenu">

                            <li>
                                <ul>

                                    <li><a href="E-note.php" class=" waves-effect waves-light">Add E-Note </a></li>
                                    <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".viewEnote">Vi1ew E-Note By Class </a></li>
                                    <li><a href="assignment.php">Add Assignment</a></li>

                                    <li><a href="" target="_blank" class=" waves-effect waves-light " data-toggle="modal" data-target=".examQuestion">Add CBT Question</a></li>
                                    <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".cbtscores">CBT Scores</a></li>






                                </ul>
                            </li>

                        </ul>
                    </li>
                    <span style="float: right; margin-top: 20px;"><?php print $nameFound['name']; ?></span>
                <?php } elseif ($role == "Sub") { ?>

                    <li class="has-submenu">
                        <a href="../index.php"><i class="icon-accelerator"></i>Back to School Website</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="icon-pencil-ruler"></i>Student<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu megamenu">
                            
                            <li>
                                <ul>
                                   
                                    <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".view-student">View Student By Class</a></li>
                                           
                                           
                                            
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".cleared-student">View Cleared Student </a></li>
                                          

                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="#"><i class="icon-paper-sheet"></i> E- learning <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                        <ul class="submenu megamenu">

                            <li>
                                <ul>

                                    <li><a href="E-note.php" class=" waves-effect waves-light">Add E-Note </a></li>
                                    <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".viewEnote">View E-Note By Class </a></li>
                                    
                                    <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".cbtscores">CBT Scores</a></li>

                                </ul>
                            </li>

                        </ul>
                    </li>

                  
                    <span style="float: right; margin-top: 20px;"><?php print $nameFound['name']; ?></span>
                <?php } ?>
                <!-- End navigation menu -->
                </div>
                <!-- end #navigation -->
            </div>
            <!-- end container -->
        </div>
        <!-- end navbar-custom -->
    </header>
    <!-- End Navigation Bar-->