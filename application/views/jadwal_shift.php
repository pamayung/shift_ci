<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Jadwal shift</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Style CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/style.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui-timepicker-addon.css" rel="stylesheet">

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
                    <a class="navbar-brand" id="kiri" href="daftar">Halaman User</a>
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
                                <a href="daftar"><i class="fa fa-dashboard fa-fw"> </i> Jadwal shift</a>
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
                        <h1 class="page-header">Jadwal Shift</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-12 col-md-1">
                    <div class="container">
                        <form class="sidebar-search" action="<?php echo site_url('daftar'); ?>" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Periode Kerja</label><br>
                                    <div class="form-inline">
                                        <div class="btn-group">
                                            <input id="datepicker" class="form-control" name="tanggalawal" value="<?= $tanggalawal ?>">
                                        </div>
                                        <div class="btn-group">
                                            <input id="datepicker2" class="form-control" name="tanggalakhir" value="<?= $tanggalakhir ?>">
                                        </div>
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-success">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-horizontal" style="padding-top: 10px;">
                                    </div>
                                </div>              
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10">
                        <?php
                        $awal = !empty($tanggalawal) ? str_replace('/', '-', $tanggalawal) : $this->input->post('tanggalawal');
                        $akhir = !empty($tanggalakhir) ? str_replace('/', '-', $tanggalakhir) : $this->input->post('tanggalakhir');
//                        echo ''. $awal;
                        if (isset($show)) {
                            $no = 1;
                            if ($jumlah > 0) {
                                ?>
                                <?php echo "Ditemukan $jumlah hasil pencarian"; ?>
                                <div class="panel panel-default">
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="dataTable_wrapper">
                                            <div style="overflow: auto; height:300px;">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr class ="bg-primary">
                                                            <th style="width: 5px;">No</th>
                                                            <th>Nama</th>
                                                            <th>Departement</th>
                                                            <th style="width: 95px;">Tanggal</th>
                                                            <th style="width: 65px;">Shift</th>
                                                            <th style="width: 150px; text-align: center;">Jam Kerja</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $this->session->userdata('id_karyawan') ?>
                                                        <?php foreach ($data_shift as $keys => $vals) { ?>
                                                            <tr class="odd gradeX">
                                                                <td style="text-align: center"><?= $no ?></td>
                                                                <td><?= $vals->nama ?></td>
                                                                <td><?= $vals->nama_departemen ?></td>
                                                                <td><?= $vals->tanggal ?></td>
                                                                <td>Shift <?= $vals->id_shift ?></td>
                                                                <td><?= $vals->jam_masuk ?> - <?= $vals->jam_keluar ?></td>
                                                            </tr>
                                                            <?php
                                                            $no++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <?php
                                            } else {
                                                echo "Tidak ada jadwal shift";
                                            }
                                        } else {
                                            
                                            ?>
                                        <?php } ?>
                                    </div>
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

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery-1.10.2.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui-timepicker-addon.js"></script>

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui-sliderAccess.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script type="text/javascript">
            $(document).ready(function() {

                $('#datepicker').datepicker({
                    dateFormat: 'yy-mm-dd'
                });
                $('#datepicker2').datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
        </script>

    </body>

</html>
