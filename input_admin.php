<?php
session_start();
error_reporting(0);
if (empty($_SESSION['id'])) {
    header('location:login.php?error_login=1');
}
?>
<?php include 'db/db_config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo_mnm.png">
    <title>Tambah Data Admin</title>
    <!-- This page CSS -->
    <!-- Custom CSS -->
    <link href="dist/css/fix-style.css" rel="stylesheet">
    <!-- This page CSS -->
    <link rel="stylesheet" type="text/css" href="assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php include 'layouts/loader.php' ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include 'layouts/header.php' ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <?php include 'layouts/sidebar.php' ?>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Tambah Data Admin</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Master Data</a></li>
                                <li class="breadcrumb-item active">Data Admin</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form pt-3" method="post" action="insert_admin.php" enctype="multipart/form-data">
                                    <?php if (!empty($_GET['error_msg'])) : ?>
                                        <div class="alert alert-danger">
                                            <?= $_GET['error_msg']; ?>
                                        </div>
                                    <?php endif ?>
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon11"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" aria-label="Nama Lengkap" aria-describedby="basic-addon11" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon22"><i class="ti-location-pin"></i></span>
                                            </div>
                                            <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" aria-label="Alamat" aria-describedby="basic-addon22" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon33"><i class="ti-mobile"></i></span>
                                            </div>
                                            <!-- <input type="text" class="form-control" id="telepon" name="telepon" placeholder="No Telepon" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" aria-label="No Telepon" aria-describedby="basic-addon33"> -->
                                            <div class="controls">
                                                <input type="text" name="telepon" maxlength="13" class="form-control" style="width: 24.2cm;" placeholder="No Telepon" required data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="Tidak boleh huruf, hanya boleh angka!" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon44"><i class="ti-email"></i></span>
                                            </div>
                                            <!-- <input type="text" class="form-control" id="email" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon44"> -->
                                            <div class="controls">
                                                <input type="text" name="email" class="form-control" style="width: 24.2cm;" placeholder="Email" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Masukkan email yang valid!" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon55"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon55" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon66"><i class="ti-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon66" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                                    <a href="javascript:window.history.back()" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <?php include 'layouts/custom_style.php' ?>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <?php include 'layouts/footer.php' ?>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <script src="dist/js/pages/validation.js"></script>
    <!--stickey kit -->
    <script src="assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="assets/node_modules/d3/d3.min.js"></script>
    <script src="assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="dist/js/dashboard1.js"></script>
    <!-- datatable -->
    <script src="assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <!-- Tickers -->
    <script src="dist/js/jquery.webticker.min.js"></script>
    <script src="dist/js/fastclick.js"></script>
    <script src="dist/js/web-ticker.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#cc-table').DataTable({
                "displayLength": 10
            });
            $("#live").perfectScrollbar();
            $("#task1").perfectScrollbar();
            $("#task2").perfectScrollbar();
            $("#task3").perfectScrollbar();
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#sidebarnav >li >a.has-arrow").addClass('active');
        });
    </script>
    <script>
        ! function(window, document, $) {
            "use strict";
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        }(window, document, jQuery);
    </script>
</body>

</html>