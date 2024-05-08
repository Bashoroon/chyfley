<style>
    .ellipsis {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        word-wrap: break-word;
    }

    .break-words {
        word-wrap: break-word;
    }
</style>
<?php
include('head.php');
include('classes/function.php');
include('classes/class.php');
$chyfleyObj = new Chyfley();

$eventCats = $chyfleyObj->event_category();
$recentEvents = $chyfleyObj->recent_event();
if (isset($_POST['add-event-cat-btn'])) {
    $chyfleyObj->add_event_cat();
}
if (isset($_POST['add-event-btn'])) {
    $chyfleyObj->add_event();
}
?>

<body>
    <!-- Start Switcher -->
    <?php switcher(); ?>
    <!-- End Switcher -->
    <!-- Loader -->
    <div id="loader">
        <img src="../assets/images/media/loader.svg" alt="">
    </div>
    <!-- Loader -->
    <div class="page">
        <!-- header -->
        <?php heada(); ?>
        <!-- End header -->

        <!-- Start::Off-canvas sidebar-->
        <?php offcanvas_sidebar(); ?>
        <!-- End::Off-canvas sidebar-->

        <!-- Start::app-sidebar -->
        <?php include('sidebar.php'); ?>
        <!-- Start::app-sidebar -->

        <!-- Start:: main content -->

        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                    <div class="my-auto">
                        <h5 class="page-title fs-21 mb-1">Event</h5>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Event</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="d-flex my-xl-auto right-content align-items-center">
                        <div class="pe-1 mb-xl-0">
                            <button type="button" class="btn btn-info btn-icon me-2 btn-b"><i class="mdi mdi-filter-variant"></i></button>
                        </div>
                        <div class="pe-1 mb-xl-0">
                            <button type="button" class="btn btn-danger btn-icon me-2"><i class="mdi mdi-star"></i></button>
                        </div>
                        <div class="pe-1 mb-xl-0">
                            <button type="button" class="btn btn-warning  btn-icon me-2"><i class="mdi mdi-refresh"></i></button>
                        </div>
                        <div class="mb-xl-0">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuDate" data-bs-toggle="dropdown" aria-expanded="false">
                                    14 Aug 2019
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuDate">
                                    <li><a class="dropdown-item" href="javascript:void(0);">2015</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">2016</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">2017</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">2018</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Event
                                </div>
                                <div class="prism-toggle">
                                    <button class="btn btn-sm btn-primary-light">Recently Added Event<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Event Date</th>
                                                    <th>Event Time</th>
                                                    <th>Location</th>
                                                    <th>Category</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($recentEvents as $event) {

                                                ?>
                                                    <tr>
                                                        <td><?php
                                                            print $no++; ?></td>
                                                        <td class="">
                                                            <p><?php print substr($event['title'], 0, 25); ?>
                                                        </td>
                                                        <td><?php echo substr($event['description'], 0, 100); ?></td>
                                                        <td><?php print $event['event_date']; ?></td>
                                                        <td><?php print $event['event_time']; ?></td>
                                                        <td><?php print $event['location']; ?></td>
                                                        <td><?php print $event['category']; ?></td>
                                                        <!-- <td>
                                                        <div class="testimonial-pic radius">
                                                            <?php
                                                            $imagePaths = explode(',', $event['image_path']);
                                                            foreach ($imagePaths as $imagePath) : ?>
                                                                <img src="<?php echo $imagePath; ?>" width="100" height="100" alt="">
                                                            <?php endforeach; ?>
                                                        </div>

                                                    </td> -->


                                                    </tr>
                                                <?php  } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="card-footer d-none border-top-0">


                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Event
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Add Event<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" required name="title" id="floatingInput" placeholder="Example: Valecdictory Sercice">
                                            <label for="floatingInput">Title</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                        <div >
                                            <textarea name="description" id="summernote" ></textarea>
                                           
                                        </div>
                                            <label for="floatingInput">Description</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" required name="location" id="floatingInput" placeholder="">
                                            <label for="floatingInput">Location</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="time" class="form-control" required name="time" id="floatingInput" placeholder="Example: It was great">
                                            <label for="floatingInput">Time</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" required name="date" id="floatingInput" placeholder="Example: It was great">
                                            <label for="floatingInput">Date</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="file" class="form-control" name="images[]" id="floatingInput" multiple accept="image/*" required placeholder="upload image">
                                            <label for="floatingInput">Image</label>
                                        </div>

                                        <?php foreach ($eventCats as $eventCat) { ?>
                                            <div class="card-bodsy mbs-3">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="category" value="<?php print $eventCat['category_name']; ?>" id="primaryChecked" checked="">
                                                    <label class="form-check-label" for="primaryChecked">
                                                        <?php print $eventCat['category_name']; ?>
                                                    </label>

                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="card-bosdy mb-3">
                                        <button type="submit" name="add-event-btn" class="btn btn-primary">Add Event</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer d-none border-top-0">

                            </div>
                        </div>


                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Event CATEGORY
                                    </div>
                                    <div class="prism-toggle">
                                        <button class="btn btn-sm btn-primary-light">Add Event Category<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                    </div>
                                </div>
                                <form action="" method="post">
                                    <div class="card-body">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" required name="category" id="floatingInput" placeholder="Example: Valecdictory Sercice">
                                            <label for="floatingInput">Category</label>
                                        </div>
                                        <div class="card-bosdy mb-3">
                                            <button type="submit" name="add-event-cat-btn" class="btn btn-primary">Add Ctegory</button>
                                        </div>
                                </form>
                            </div>
                            <div class="card-footer d-none border-top-0">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End:: main content -->

        <!-- Start:: Footer -->
        <?php include('footer.php'); ?>
    </div>
    <?php include('footerjs.php'); ?>
    <!-- Start:: Footer -->
</body>