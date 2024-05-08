<!DOCTYPE html>
<html lang="en">

<!-- head-->
    <?php include 'header.php';?>
<!-- end head-->


<body>

   <?php include 'navigationMenu.php';?>
    <!-- header-bg -->

    <div class="wrapper">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Lawal Sherif</h4>
                    </div>
                   <!--  <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Email</a></li>
                            <li class="breadcrumb-item active">Email Compose</li>
                        </ol>
                    </div> -->
                </div>
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Left sidebar -->
                    <div class="email-leftbar card">
                        <a href="email-compose.html" class="btn btn-danger rounded btn-custom btn-block waves-effect waves-light">Post Status</a>

                        <h6 class="m-t-30">Menu</h6>

                        <div class="mail-list m-t-10">
                            <a href="#" class="active" id="add_friend"> <span class="float-right">89</span> <i class="ti-archive mr-2"></i> Add Friend </a>
                            <a href="#" id="my_friends"><span class="float-right">24</span><i class="ti-location-arrow mr-2"></i> My friends</a>
                            <a href="#" id="chat"><span class="float-right">48</span><i class="ti-star mr-2"></i>Chat</a>
                           <!--  <a href="#"><span class="float-right">72</span><i class="ti-pencil  mr-2"></i>Unread</a>
                            <a href="#"><span class="float-right">16</span><i class="ti-alert mr-2"></i> Spam</a> -->
                            <a href="#" id="blocked_users"><span class="float-right">02</span><i class="ti-trash mr-2"></i> Blocked User</a>
                        </div>

                        <!-- <h6 class="m-t-20">Filter by Labels</h6>

                        <div class="mail-list m-t-10">
                            <a href="#"><span class="mdi mdi-label-outline text-danger mr-2"></span>Freelance</a>
                            <a href="#"><span class="mdi mdi-label-outline text-info mr-2"></span>Social</a>
                            <a href="#"><span class="mdi mdi-label-outline text-primary mr-2"></span>Friends</a>
                            <a href="#"><span class="mdi mdi-label-outline text-success mr-2"></span>Family</a>
                        </div> -->

                    </div>
                    <!-- End Left sidebar -->

                    <!-- Right Sidebar -->
                    <div class="email-rightbar mb-3" id="divAddFriend">
                        <div id="addFriendMsg"></div>
                        <div class="card"  >
                            <div class="card-body">

                               <form method="GET" action="processBulkSms.php">

                              <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title"></h4>
                    
                                <input type="text" name="api_token" value="ZZrXLnz7G81MGIKRxYO2s47SwC3rroSJAR9Wuk6J1GRUnkB5c9FBlROqaSpn" class="form-control">
                                 <input type="text" name="from" value="BulkSMS.ng" class="form-control">
                                <input type="text" name="to"  class="form-control" placeholder="input reciepient's numbers">
                                <textarea id="" name="body" placeholder="input your message" ></textarea>
                                <button type="submit">Submit</button>
    
                                           
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>
                            <div class="email-rightbar mb-3" id="divChat" style="display: none;">

                        <div class="card"   >
                            <div class="card-body">

                                <form>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="To">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <div class="summernote">
                                            <h6>Hello Chat</h6>
                                            <ul>
                                                <li>
                                                    Select a text to reveal the toolbar.
                                                </li>
                                                <li>
                                                    Edit rich document on-the-fly, so elastic!
                                                </li>
                                            </ul>
                                            <p>
                                                End of air-mode area
                                            </p>

                                        </div>
                                    </div>

                                    <div class="btn-toolbar form-group mb-0">
                                        <div class="">
                                            <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="far fa-save"></i></button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light m-r-5"><i class="far fa-trash-alt"></i></button>
                                            <button id="my_friends" class="btn btn-primary waves-effect waves-light"> <span>Send</span> <i class="fab fa-telegram-plane m-l-10"></i> </button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>


                   <div class="email-rightbar mb-3" id="divMyfriend" style="display: none;">

                        <div class="card"   >
                            <div class="card-body">

                                <form>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="To">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>
                                    <div class="form-group">
                                        <div class="summernote">
                                            <h6>Hello My friends</h6>
                                            <ul>
                                                <li>
                                                    Select a text to reveal the toolbar.
                                                </li>
                                                <li>
                                                    Edit rich document on-the-fly, so elastic!
                                                </li>
                                            </ul>
                                            <p>
                                                End of air-mode area
                                            </p>

                                        </div>
                                    </div>

                                    <div class="btn-toolbar form-group mb-0">
                                        <div class="">
                                            <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="far fa-save"></i></button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light m-r-5"><i class="far fa-trash-alt"></i></button>
                                            <button class="btn btn-primary waves-effect waves-light"> <span>Send</span> <i class="fab fa-telegram-plane m-l-10"></i> </button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                    <!-- end Col-9 -->

                </div>

            </div>
            <!-- End row -->

        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end wrapper -->

    <!-- Footer -->
    
<?php include 'footer.php';?>

</body>
 <?php include 'modal.php';?>
</body>

<script type="text/javascript">
    $("#reset").click(function(){
    $("#divAddFriend").show();
     $("#divMyfriend").hide();
});
</script>
</html>