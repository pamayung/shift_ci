<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Pengelolaan Shift</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Style CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/style.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" id="kiri" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="shift" id="kiri">Halaman Admin</a>
                </div>
                <!-- /.navbar-header -->
                <?php if ($this->session->userdata('username')) : ?>
                    <ul class="nav navbar-top-links navbar-right">
                        <li style="top:9px;">
                            <?php echo '' . $this->session->userdata('nama'); ?><br>
                            <div style="font-size:10px;">
                                <?php
                                $namaHari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
                                $sekarang = $namaHari[date("N")] . ", " . date("j") . "-" . date("m") . "-" . date("Y");
                                echo $sekarang;
                                ?></div>
                        </li>
                        <!-- /.dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><?php echo anchor('logout', 'Logout'); ?>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
<?php endif; ?>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="shift"><i class="fa fa-dashboard fa-fw"></i> Pengelolaan Shift Karyawan</a>
                            </li>
                            <li>
                                <a href="jadwal"><i class="fa fa-list-ul fa-fw"></i> Pengelolaan Jadwal Karyawan</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pengelolaan Shift Karyawan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-primary">
                            <form class="sidebar-search" action="<?php echo site_url('cari'); ?>" method="post">
                                <div class="input-group custom-search-form">
                                    <input name="search" type="text" class="form-control" placeholder="Cari Nama Shift">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-success">Cari</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-3" align="right">
<?= anchor('tambah', 'Tambah Shift', ['class' => 'btn btn-danger glyphicon-plus']) ?>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <?php
                                            if (empty($nama_shift)) {
                                                echo "shift tidak ditemukan";
                                            } else {
                                                echo '<?= $jml ?>';
                                                foreach ($nama_shift as $shift) {
                                                    ?>
                                                    <tr class ="bg-primary">
                                                        <th>Nama Shift</th>
                                                        <th>Masuk</th>
                                                        <th>Pulang</th>
                                                        <th class="col-lg-3">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr class="odd gradeX">
                                                        <td><?= $shift->nama_shift ?></td>
                                                        <td><?= $shift->jam_masuk ?></td>
                                                        <td><?= $shift->jam_keluar ?></td>
                                                        <td class="col-lg-3">
                                                        <?=  anchor('shift/update/' . $shift->id_shift,' ', ['class' => 'btn btn-default glyphicon glyphicon-edit']); ?>
                                                        <?=  anchor('shift/delete/' . $shift->id_shift,' ', ['class' => 'btn btn-danger glyphicon glyphicon-trash']); ?>
                                                    </td>
                                                    </tr>
    <?php }
} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="<?php echo base_url(); ?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

    </body>

</html>
