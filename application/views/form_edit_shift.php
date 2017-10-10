<?php
    $id_shift = $edit_shift->id_shift;
    $nama_shift = $edit_shift->nama_shift;
    $jam_masuk = $edit_shift->jam_masuk;
    $jam_keluar = $edit_shift->jam_keluar;
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tambah Shift</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- jquery CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui-timepicker-addon.css" rel="stylesheet">

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
                    <a class="navbar-brand" href="#" id="kiri">Halaman Admin</a>
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
                                <a href="#"><i class="fa fa-dashboard fa-fw"></i> Pengelolaan Shift Karyawan</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-list-ul fa-fw"></i> Pengelolaan Jadwal Karyawan</a>
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
                        <h1 class="page-header">Edit Shift</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <?= form_open('shift/update/' . $id_shift, ['class' => 'form-horizontal','id' => 'formContoh']) ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Shift</label>
                            <div class="col-sm-6">
                                <input type="text" id="nama_shift" class="form-control" name="nama_shift" placeholder="Nama Shift" value="<?= $nama_shift ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Masuk</label>
                            <div class="col-sm-6">
                                <input type="text" id="datepicker" class="form-control" name="jam_masuk" placeholder="hh:mm:ss" value="<?= $jam_masuk ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pulang</label>
                            <div class="col-sm-6">
                                <input type="text" id="datepicker2" class="form-control" name="jam_keluar" placeholder="hh:mm:ss" value="<?= $jam_keluar ?>">
                            </div>
                        </div>
                        <div class="form-group" align="right">
                            <div class="col-sm-offset-2 col-sm-7">
                                <button class="btn btn-default" value="Go Back" onclick="history.back(-1);">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?= form_close() ?>
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

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery-1.10.2.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui-timepicker-addon.js"></script>

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui-sliderAccess.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.formvalidation/js/formValidation.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.formvalidation/js/framework/bootstrap.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {

                $('#datepicker').timepicker({
                    onSelect: function() {
                        // We need to revalidate the time field when a date/time is choosen
                        $('#formContoh').formValidation('revalidateField', 'jam_masuk');
                    }
                });
                $('#datepicker2').timepicker({
                    onSelect: function() {
                        // We need to revalidate the time field when a date/time is choosen
                        $('#formContoh').formValidation('revalidateField', 'jam_keluar');
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#formContoh').formValidation({
                    framework: 'bootstrap',
                    excluded: 'disabled',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        nama_shift: {
                            validators: {
                                notEmpty: {
                                    message: 'Nama shift Tidak Boleh Kosong'
                                }
                            }
                        },
                        jam_masuk: {
                            validators: {
                                notEmpty: {
                                    message: 'Jam masuk Tidak Boleh Kosong'
                                }
                            }
                        },
                        jam_keluar: {
                            validators: {
                                notEmpty: {
                                    message: 'Jam pulang Tidak Boleh Kosong'
                                }
                            }
                        }
                    }
                });
            });
        </script>

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

    </body>

</html>
