<?php
include('head.php');
include('classes/function.php');
include('classes/class.php');
$chyfleyObj = new Chyfley();
$allBlogs = $chyfleyObj->all_news();

if (isset($_POST['delete-blog-btn'])) {
    $chyfleyObj->delete_news();
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
                        <h5 class="page-title fs-21 mb-1">All Blog</h5>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Blogs</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View all</li>
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

                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                Gallery
                            </div>
                            <div class="prism-toggle">
                                <button class="btn btn-sm btn-primary-light">All Blogs<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
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
                                                
                                                <th>Category</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($allBlogs as $blog) {

                                            ?>
                                                <tr>
                                                    <td><?php
                                                        print $no++; ?></td>
                                                    <td class="">
                                                        <p><?php print substr($blog['title'], 0, 25); ?>
                                                    </td>
                                                    <td><?php echo substr($blog['description'], 0, 100); ?></td>
                                                    <td><?php print $blog['published_date']; ?></td>
                                                    
                                                    <td><?php print $blog['category']; ?></td>
                                                    <!-- <td>
                                                        <div class="testimonial-pic radius">
                                                            <?php
                                                            $imagePaths = explode(',', $blog['image_path']);
                                                            foreach ($imagePaths as $imagePath) : ?>
                                                                <img src="<?php echo $imagePath; ?>" width="100" height="100" alt="">
                                                            <?php endforeach; ?>
                                                        </div>

                                                    </td> -->
                                                    <td>
                                                        <!-- Form for deleting with confirmation prompt -->
                                                        <form action="" method="post" style="display: inline;" onsubmit="return    confirm('Are you sure you want to delete this blog post?');">
                                                            <input type="hidden" name="action" value="delete">
                                                            <input type="hidden" name="id" value="<?php echo $blog['blog_id']; ?>">
                                                            <button type="submit" class="btn btn-danger" name="delete-blog-btn">Delete</button>
                                                        </form>

                                                        <!-- Add links for Edit and Update as needed -->
                                                        <a href="edit-blog?id=<?php echo $blog['blog_id']; ?>">Edit</a>

                                                    </td>

                                                </tr>
                                            <?php  } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
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