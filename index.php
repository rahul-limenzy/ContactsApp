<?php
include 'controller/dashboardController.php';
$dashboard = new dashboardController();
$data = $dashboard->indexAction();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contacts | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="view/logout.php" class="nav-link">
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
            <img src="dist/img/AdminLTELogo.png" alt="ContactsApp Logo" class="brand-image img-circle elevation-3"
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
                        <?php echo $dashboard->getLoggedInUserName(); ?>
                    </a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            dashboard
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-address-book"></i>
                            <p>Contacts<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="view/contacts/contactsList.php" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Contacts List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="view/contacts/addContact.php" class="nav-link">
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
                                <a href="view/groups/groupsList.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Groups List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="view/groups/createGroup.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create group</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">Site Settings</li>
                    <li class="nav-item">
                        <a href="view/logout.php" class="nav-link">
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
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-4 mx-auto">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo  $data['contacts'];?></h3>
                                <p>Contacts</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-address-book"></i>
<!--                                <ion-icon name="people-circle-outline"></ion-icon>-->
                            </div>
                            <a href="view/contacts/contactsList.php" class="small-box-footer">View all contacts<i class="fas fa-arrow-circle-right p-3"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class=" col-4 mx-auto">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo  $data['groups'];?></h3>
                                <p>Groups</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="view/groups/groupsList.php" class="small-box-footer">View all groups<i class="fas fa-arrow-circle-right p-3"></i></a>
                        </div>
                    </div>
                </div>
<!--                chart starts here-->
                <div class="row">
                    <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                Bar Chart
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body w-100">
                            <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;">
                                <canvas class="flot-base" style="direction: ltr; position: absolute;
                                left: 0px; top: 0px; width: max-width; height: 300px;" width="max-width" height="300">
                                </canvas>
                                <canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px;
                                top: 0px; width: 401px; height: 300px;" width="401" height="300">
                                </canvas>
                                <div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%;
                                width: 100%; pointer-events: none;">
                                    <svg style="width: 100%; height: 100%;">
                                        <g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
                                            <text style="position: absolute; text-align: center;" x="149.72272803566673" y="293.75" class="flot-tick-label tickLabel">March</text>
                                            <text style="position: absolute; text-align: center;" x="216.15227291800758" y="293.75" class="flot-tick-label tickLabel">April</text>
                                            <text style="position: absolute; text-align: center;" x="279.33181780034846" y="293.75" class="flot-tick-label tickLabel">May</text>
                                            <text style="position: absolute; text-align: center;" x="19.755302775989875" y="293.75" class="flot-tick-label tickLabel">January</text>
                                            <text style="position: absolute; text-align: center;" x="338.06969607960093" y="293.75" class="flot-tick-label tickLabel">June</text></g><g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
                                            <text style="position: absolute; text-align: right;" x="8.949999809265137" y="268.25" class="flot-tick-label tickLabel">0</text><text style="position: absolute; text-align: right;" x="8.949999809265137" y="205.25" class="flot-tick-label tickLabel">5</text>
                                            <text style="position: absolute; text-align: right;" x="1" y="16.25" class="flot-tick-label tickLabel">20</text><text style="position: absolute; text-align: right;" x="1" y="142.25" class="flot-tick-label tickLabel">10</text>
                                            <text style="position: absolute; text-align: right;" x="1" y="79.25" class="flot-tick-label tickLabel">15</text>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body-->
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; <?php echo date('y'); ?> <a href="/">www.phone.lz</a>.</strong>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="../../plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="../../plugins/flot-old/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="../../plugins/flot-old/jquery.flot.pie.min.js"></script>
<script>
    var bar_data = {
        data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9]],
        bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
        grid  : {
            borderWidth: 1,
            borderColor: '#f3f3f3',
            tickColor  : '#f3f3f3'
        },
        series: {
            bars: {
                show: true, barWidth: 0.5, align: 'center',
            },
        },
        colors: ['#3c8dbc'],
        xaxis : {
            ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June']]
        }
    })
</script>
</body>
</html>
