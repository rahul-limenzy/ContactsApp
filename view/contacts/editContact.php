<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include '../../controller/contactsController.php';

$contactsObj = new contactsController();
$result = $contactsObj->viewContact();
echo $result['details']['id'];
$contactsObj->editContact($result['details']['id']);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contacts</title>
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
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

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
                        <a href="../../index.php" class="nav-link ">
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
                                <a href="contactsList.php" class="nav-link active ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Contacts List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="addContact.php" class="nav-link">
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
                        <h1 class="m-0 text-dark">Contact details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                            <li class="breadcrumb-item "><a href="contactsList.php">Contacts list</a></li>
                            <li class="breadcrumb-item active">View contact</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- main content -->
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card card-dark shadow">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <?php if (true == $result['details']) : ?>
                            <form role="form" method="POST" action="editContact.php?id=<?= $result['details']['id'] ?>"
                                  enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                           value="<?= $result['details']['first_name'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                           value="<?= $result['details']['last_name'] ?>">

                                </div>

                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <div class="row mt-3">
                                        <?php foreach ($result['emails'] as $item) : ?>
                                            <input type="email" class="form-control col-md-10 mb-2" id="email"
                                                   name="email[]" value="<?= $item['email'] ?>">
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                   <label for="number">Number</label>

                                    <div class="row mt-3">
                                        <?php foreach ($result['numbers'] as $item) : ?>
                                            <input type="tel" class="form-control col-md-10 mb-2" id="number"
                                                   name="number[]" value="<?= $item['number'] ?>">
                                        <?php endforeach; ?>

                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        <?php else : ?>
                            <div class="alert alert-danger col-5 mx-auto text-center"> Contact not found!</div>
                        <?php endif; ?>
                    </div>


                    <div class="card-footer bg-dark"></div>
                </div>
            </div>
        </div>
        <!-- /.Main content -->

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
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../plugins/chart.js/Chart.min.js"></script>
<script src="../../plugins/sparklines/sparkline.js"></script>
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../../dist/js/adminlte.js"></script>
<script src="../../dist/js/pages/dashboard.js"></script>
<script src="../../dist/js/demo.js"></script>

</body>
</html>
