<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include '../../controller/contactsController.php';
$contactsObj = new contactsController();
$result = $contactsObj->addContact();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contacts | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="../logout.php" class="nav-link">
                    <i class="nav-icon fa fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
            <img src="../../dist/img/AdminLTELogo.png" alt="ContactsApp Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Contacts App</span>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">

                </div>
                <div class="info">
                    <a href="#" class="d-block">
                        <i class="fa fa-user-circle mr-2"></i>
                        <?php echo $contactsObj->getLoggedInUserName(); ?>
                    </a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="../../index.php" class="nav-link">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            dashboard
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-address-book"></i>
                            <p>Contacts<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="contactsList.php" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Contacts List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="addContact.php" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add contact</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                Groups
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../groups/groupsList.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Groups List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../groups/createGroup.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create group</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">Site Settings</li>
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link">
                            <i class="nav-icon fa fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add Contact</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Add Contact</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="row">
            <div class="col-md-8 mx-auto">
                <?php if($result) : ?>
                    <div class='alert alert-success mx-auto' role='alert'>
                        <h4>Contact added succesfully!</h4>
                    </div>
                <?php endif?>
                <div class="card card-dark shadow">
                    <div class="card-header"></div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        <div class="card-body p-5">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                       placeholder="First name">
                            </div>

                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                       placeholder="Last name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <div class="row">
                                    <input type="email" class="form-control col-md-10 mb-2" id="email" name="email[]"
                                           placeholder="Email address">
                                    <button class="btn btn-primary ml-5" type="button" id="addemail">+</button>
                                </div>
                                <div class="clonedEmail"></div>
                            </div>

                            <div class="form-group">
                                <label for="number">Number</label>
                                <div class="row">
                                    <input type="tel" class="form-control col-md-10 mb-2" id="number" name="number[]"
                                           placeholder="number">
                                    <button class="btn btn-primary ml-5" type="button" id="addnumber">+</button>
                                </div>
                                <div class="clonedNumber"></div>
                            </div>

                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" name="photo" id="photo" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <div class="card-footer bg-dark"></div>
                </div>
            </div>
        </div>
        <!-- Main content -->

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; <?php echo date('y'); ?> <a href="/">www.contacts.lz</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.5
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
    $(document).ready(function () {
        $('#addemail').on('click', function () {
            var clonedEmail = $('#email').clone().val("").appendTo('.clonedEmail');
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#addnumber').click(function () {
            var clonedNum = $('#number').clone().val("").appendTo('.clonedNumber');
        });
    });
</script>

</body>

</html>