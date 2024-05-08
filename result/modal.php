 
 <?php include 'db.php';?>
 <form action="processClass.php" method="post">
  <div class="modal fade bs-example-modal-smC" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="mySmallModalLabel">Add Class</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <input id="demo1" type="text" required="required" autocomplete="off" value="" class="form-control"  name="class">
                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                            <button class="btn btn-primary" type="submit" style="float: right;" >Add Class</button>
                        </div>
                    </div>
                    
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                            </form>


<form action="processAddComment.php" method="post" id="processAddComment">
  <div class="modal fade addComment" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="mySmallModalLabel">Add Teacher's Comment</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <h6><center><div id="screen" class="alert alert-success"></div></center></h6>
                                                <div class="modal-body">
                                                    <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Teacher's Comment</label>
                                    <input  type="text" required="required" autocomplete="off" id="teacherscomment"   class="form-control"  name="teacherscomment">
                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                            <button class="btn btn-primary" type="submit" style="float: right;" onclick= "return clickButton()">Add comment</button>
                        </div>
                    </div>
                    
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                            </form>



                            <form action="processSubject.php" method="post" id="processSubject">
  <div class="modal fade addSubject" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="mySmallModalLabel">Add Subject</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <h6><center><div id="showsubject" class="alert alert-success"></div></center></h6>
                                                <div class="modal-body">
                                                    <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Subject</label>
                                    <input id="demo1" type="text" required="required" autocomplete="off" value="" class="form-control"  name="subject">
                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                            <button class="btn btn-primary" type="submit" style="float: right;" >Add Subject</button>
                        </div>
                    </div>
                    
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                            </form>


                            <form action="processSession.php" method="post">
  <div class="modal fade bs-example-modal-smS" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="mySmallModalLabel">Add Session</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                    <input id="demo1" type="text" required="required" autocomplete="off" value="" class="form-control"  name="session">
                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                            <button class="btn btn-primary" type="submit" style="float: right;" >Add</button>
                        </div>
                    </div>
                    
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                            </form>


                                                        <form action="processTerm.php" method="post">
  <div class="modal fade bs-example-modal-smT" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="mySmallModalLabel">Add Term</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <input id="demo1" type="text" required="required" autocomplete="off" value="" class="form-control"  name="term">
                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                            <button class="btn btn-primary" type="submit" style="float: right;" >Add</button>
                        </div>
                    </div>
                    
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                            </form>

                               <form action="processBroadSheet.php" method="post"  name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
  <div class="modal fade uploadbroadsheet" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Upload Broad Sheet</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                    <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                    while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                         <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>



                               <form action="processResultSheet.php" method="post"  method="post"  name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
  
                                          <div class="modal fade uploadresultsheet" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Upload Result Sheet</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                        <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                    <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                    while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                          <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
        
        
                        </div>
                    </div>                 </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                            </form>

                             <form action="checkBroadSheet.php" method="post" >
  <div class="modal fade checkbroadsheet" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Check Result Sheet</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                    <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                    while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                         <button class="btn btn-primary" type="checkBroadSheet.php" style="float: right;" id="submit" name="import"
                    class="btn-submit">Check</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>


                             <form action="checkReportSheet.php" method="post">
  <div class="modal fade checkresultsheet" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Upload Result Sheet</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                      <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                    while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>  <div class="row">
                                <div class="col-12">
                          <button class="btn btn-primary" type="checkReportSheet.php" style="float: right;" id="submit" name="import"
                    class="btn-submit">Check</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>



                              <form action="checkBroadSheet.php" method="post" >
  <div class="modal fade checkbroadsheet" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Check Result Sheet</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                    <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                    while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                         <button class="btn btn-primary" type="checkBroadSheet.php" style="float: right;" id="submit" name="import"
                    class="btn-submit">Check</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>


                             <form action="view-student.php" method="post">
  <div class="modal fade view-student" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">View Student</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                      <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                                                             <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                    while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>  <div class="row">
                                <div class="col-12">
                          <button class="btn btn-primary"  style="float: right;" id="submit" 
                    class="btn-submit">Check</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>




 <form action="view-all-student.php" method="">
  <div class="modal fade view-all-student" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">View All Student</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                      <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                                                 
                             
                              <div class="row">
                                <div class="col-12">
                          <button class="btn btn-primary"  style="float: right;" id="submit" 
                    class="btn-submit">Check</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>




 <form action="inputScore.php" method="">
  <div class="modal fade inputScore" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Input Score</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                      <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                  while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div> 
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Subject</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="subject">
                                     <option value="">Select a subject</option>
                                                                  <?php $sqlsubject = $conn->query ("select * from subject");
                                                                    while ($subject = mysqli_fetch_array($sqlsubject)){;?> 
                                                   
                                                                <option value = "<?php print $subject['subject']; ?>"><?php print $subject['subject']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>  
                              <div class="row">
                                <div class="col-12">
                          <button class="btn btn-primary"   style="float: right;" type="submit" 
                    class="btn-submit">Check</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>







 <form action="broadSheet.php" method="get">
  <div class="modal fade checkbroadsheet2" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Check Brojxdxjxad Sheet2</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                      <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                  while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div> 
                              
                              <div class="row">
                                <div class="col-12">
                          <button class="btn btn-primary"   style="float: right;" type="submit" 
                    class="btn-submit">Check</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>






<form action="ReportSheet.php" method="">
  <div class="modal fade checkresultsheet2" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Check Result Sheet2</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                      <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                  while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div> 
                              
                              <div class="row">
                                <div class="col-12">
                          <button class="btn btn-primary"   style="float: right;" type="submit" 
                    class="btn-submit">Check</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>






<form action="ReportSheet.php" method="">
  <div class="modal fade checkresult" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Check Result</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                      <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>

                                <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlstudentClass = $conn->query ("SELECT * from promotedstudent where admissionNo= '$user' ");
                                                                    while ($class = mysqli_fetch_array($sqlstudentClass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                              
                              <div class="row">
                                <div class="col-12">
                          <button class="btn btn-primary"   style="float: right;" type="submit" 
                    class="btn-submit">Check</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>




                            <form action="score-sheet.php" method="">
  <div class="modal fade checkscoresheet" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Score Sheet</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                      <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                  while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div> 
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Subject</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="subject">
                                     <option value="">Select a subject</option>
                                                                  <?php $sqlsubject = $conn->query ("select * from subject");
                                                                    while ($subject = mysqli_fetch_array($sqlsubject)){;?> 
                                                   
                                                                <option value = "<?php print $subject['subject']; ?>"><?php print $subject['subject']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>  
                              <div class="row">
                                <div class="col-12">
                          <button class="btn btn-primary"   style="float: right;" type="submit" 
                    class="btn-submit">View Score Sheet</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>



                            <form action="promote-student.php" method="">
  <div class="modal fade promote" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Promote Student</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">From Session</label>
                                      <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                                                             <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">From Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                    while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>  <div class="row">
                                <div class="col-12">
                          <button class="btn btn-primary"  style="float: right;" id="submit" 
                    class="btn-submit">Check</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>


                           <div class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete?</p>
                                                    <div style="float: right;">
                                                       <form action="delete.php" method="POST">
                                                    <button style="margin-right: 20px;" class="btn btn-danger">Yes</button>
                                                     <input type="hiddsen" value="<?php print $studentScore['subject'];?>" name="id">
                                                      <button class="btn btn-danger" type="reset">No</button>
                                                    </form>
                                                    </div>
                                                </div>

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>




<form action="comment-attendance.php" method="" >
  <div class="modal fade comment" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Teacher's comment & Attendance</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                    <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                    while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                         <button class="btn btn-primary" type="submit" style="float: right;" id="submit" name="import"
                    class="btn-submit">Show Student</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>





<form action="schoolAttendance.php" method="" >
  <div class="modal fade attendance" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">School Attendance</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                    <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                              
                            <div class="row">
                                <div class="col-12">
                         <button class="btn btn-primary" type="submit" style="float: right;" id="submit" name="import"
                    class="btn-submit">Show Student</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>





<form action="clearance.php" method="" >
  <div class="modal fade clearance" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Clearance</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                    <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                    while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                         <button class="btn btn-primary" type="submit" style="float: right;" id="submit" name="import"
                    class="btn-submit">Show Student</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>




<form action="view-student-report.php" method="" >
  <div class="modal fade student-report" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Student Report</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                    <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                              
                              
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                    while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                         <button class="btn btn-primary" type="submit" style="float: right;" id="submit" name="import"
                    class="btn-submit">Show Student</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>



<form action="processTeacherSignature.php" method="POST" >
  <div class="modal fade teachers_signature" tabindex="-1" role="dialog" id="mySmallModalLabel" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0">Append Teacher's Signature</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                         <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Session</label>
                                    <select id="demo1" type="text" required="required" value="" class="form-control"  name="session">
                                        <option value="">Select a session</option>
                                                                  <?php $sqlsession = $conn->query ("select * from session");
                                                                    while ($session = mysqli_fetch_array($sqlsession)){;?> 
                                                   
                                                                <option value = "<?php print $session['session']; ?>"><?php print $session['session']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Term</label>
                                    <select id="demo1" type="text" required="required"  value="" class="form-control"  name="term">
                                     <option value="">Select a term</option>
                                                                  <?php $sqlterm = $conn->query ("select * from term");
                                                                    while ($term = mysqli_fetch_array($sqlterm)){;?> 
                                                   
                                                                <option value = "<?php print $term['term']; ?>"><?php print $term['term']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                               <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">Class</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="class">
                                     <option value="">Select a class</option>
                                                                  <?php $sqlclass = $conn->query ("select * from class");
                                                                    while ($class = mysqli_fetch_array($sqlclass)){;?> 
                                                   
                                                                <option value = "<?php print $class['class']; ?>"><?php print $class['class']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>


                              <div class="row">
                                         <div class="col-12">
                                     <div class="form-group">
                                    <label class="control-label">User</label>
                                    <select id="demo1" type="text" required="required" a value="" class="form-control"  name="user">
                                     <option value="">Select a User</option>
                                                                  <?php $sqlUser = $conn->query ("select * from users");
                                                                    while ($user = mysqli_fetch_array($sqlUser)){;?> 
                                                   
                                                                <option value = "<?php print $user['signature']; ?>"><?php print $user['name']; ?></option>
                                                                <?php } ?>
                                                            </select>

                                </div>
                            </div>
                              </div>
                            <div class="row">
                                <div class="col-12">
                         <button class="btn btn-primary" type="submit" style="float: right;" id="submit" name="import"
                    class="btn-submit">Append Signature</button>
        
                        </div>
                    </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->

                                </div>
                            </form>





 <script type="text/javascript">
 $(function () {

        $('#processSubject').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'processSubject.php',
            data: $('#processSubject').serialize(),
            success: function () {
             $("#showsubject").text("Subject Added");
            document.getElementById('processSubject').reset();
            }
            
          });

        });

      });


  $(function () {

        $('#processAddComment').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'processAddComment.php',
            data: $('#processAddComment').serialize(),
            success: function () {
             $("#screen").text("Teacher's comment added successfully");
            document.getElementById('processAddComment').reset();
            }
             
          });

        });

      });
    </script>
   
   
 


