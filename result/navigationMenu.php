<?php
session_start();
if (!isset($_SESSION['username'])) {
   header("location:login.php");
}
 include 'db.php';
$rolez = $_SESSION['role']; ?>


 <div class="header-bg">
        <!-- Navigation Bar-->
         <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo-->
                    <div>
                        <a href="index.php" class="logo">
                            <span class="logo-light">
                                    CHYFLEY Portal
                            </span>
                        </a>
                    </div>
                    <!-- End Logo-->

                    <div class="menu-extras topbar-custom navbar p-0">
                        
                        <ul class="navbar-right ml-auto list-inline float-right mb-0">
                            <!-- language-->
                            

                            <!-- full screen -->
                            
                            <!-- notification -->
                            <li class="dropdown notification-list list-inline-item">
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
                        
                            
                         <ul class="navigation-menu">
                              
                            <li class="has-submenu">
                                <a href="../index.php"><i class="icon-accelerator"></i>Back to Website</a>
                            </li>
                          
                            <li class="has-submenu">
                                <a href="#"><i class="icon-pencil-ruler"></i>Examination/Test<i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                           <!-- <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".uploadbroadsheet">Broad Sheet </a></li>
                                             <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".uploadresultsheet">Result Sheet </a></li><!-->
                                             <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".inputScore">Input Score </a></li>
                                              <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".checkbroadsheet2"> View Broad Sheet </a></li>
                                              <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".checkscoresheet">Score Sheet </a></li>
                                               <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".comment">Comment/Student Att</a></li>
                                              
                                        </ul>
                                    </li>
                                   
                                </ul>
                            </li>
                       
                          
                            <!--- check result 
                            <li class="has-submenu">
                                <a href="#"><i class="icon-life-buoy"></i> Check Result <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu">
                                    

                                    <li>
                                        <ul>
                                            <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".checkbroadsheet">Broad Sheet </a></li>
                                            <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".checkresultsheet">Result Sheet</a></li>
                                            <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".checkscoresheet">Score Sheet </a></li>
                                             <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".checkbroadsheet2">Broad Sheet 2</a></li>
                                             <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".checkresultsheet2">Result Sheet 2</a></li>
                                           
                                        </ul>
                                    </li>
                                </ul>

                            </li>
                           --->
                            <li class="has-submenu">
                                <a href="#"><i class="icon-paper-sheet"></i> Pages <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">

                                    <li>
                                        <ul>
                                          <li> <a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-smC">Add Class</a></li>
                                            <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-smS">Add Session</a></li>
                                            <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-smT">Add Term</a></li>
                                            <li><a href=""class=" waves-effect waves-light" data-toggle="modal" data-target=".addSubject">Add Subject</a></li>
                                            <li><a href="teachers-detail.php">View All Teachers</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".attendance">School Attendance</a></li>                                            
                                        </ul>
                                    </li>
                               </ul>
                            </li>

                             <li class="has-submenu">
                                <a href="#"><i class="icon-paper-sheet"></i> Student <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">

                                    <li>
                                        <ul>
                                          
                                            <li><a href="assignment.php">Add Assignment</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".view-student">View Student By Class</a></li>
                                             <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".promote">Promote Student</a></li>
                                            <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".clearance">Clearance</a></li>
                                             <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".student-report">View Student Report</a></li>
                                             <li><a href="" class=" waves-effect waves-light" data-toggle="modal" data-target=".teachers_signature">Append Principal's Signature</a></li>
                                           
                                           
                                            
                                            
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
       
      
     