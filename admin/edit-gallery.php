<?php
include('head.php');
include('classes/function.php');
include('classes/class.php');
$chyfleyObj = new Chyfley();
$id = $_GET['id'];
$editGallery = $chyfleyObj->edit_gallery($id);
$title = $editGallery['title'];
$description = $editGallery['description'];
$category = $editGallery['category'];

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
                        <h5 class="page-title fs-21 mb-1">Gallery</h5>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
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
                                    Gallery
                                </div>
                                <div class="prism-toggle">
                                    <button class="btn btn-sm btn-primary-light">Add Gallery<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                </div>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" value="<?php echo $editGallery['title']; ?>" class="form-control" required name="title" id="floatingInput" placeholder="Example: Valecdictory Sercice">
                                        <label for="floatingInput">Title</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" value="<?php echo $editGallery['description']; ?>" required name="description" id="floatingInput" placeholder="Example: It was great">
                                        <label for="floatingInput">Description</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="file" class="form-control" name="images[]" id="floatingInput" multiple accept="image/*" required placeholder="upload image">
                                        <label for="floatingInput">Image</label>
                                    </div>

                                    <div class="card-body mb-3">
                                        <select class="form-select" required name="category" size="4" aria-label="size 3 select example">
                                            <option <?php echo ($editGallery['category'] === '' ? 'selected' : ''); ?>>Choose a category</option>
                                            <option value="sport" <?php echo ($editGallery['category'] === 'sport' ? 'selected' : ''); ?>>Sport</option>
                                            <option value="party" <?php echo ($editGallery['category'] === 'party' ? 'selected' : ''); ?>>Party</option>
                                            <option value="resumption" <?php echo ($editGallery['category'] === 'resumption' ? 'selected' : ''); ?>>Resumption</option>
                                            <option value="seminar" <?php echo ($editGallery['category'] === 'seminar' ? 'selected' : ''); ?>>Seminar</option>
                                        </select>
                                    </div>

                                    <div class="card-bosdy mb-3">
                                        <button type="submit" name="update-gallery-btn" class="btn btn-primary">Add Gallery</button>
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