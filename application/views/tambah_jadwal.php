<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tambah Jadwal</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui-timepicker-addon.css" rel="stylesheet">

        <!-- Style CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/style.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!--         DataTables CSS 
                <link href="<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
        
                 DataTables Responsive CSS 
                <link href="<?php echo base_url(); ?>assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">-->

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
                    <a class="navbar-brand" id="kiri" href="shift">Halaman Admin</a>
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
                        <h1 class="page-header">Tambah Jadwal Karyawan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <?= form_open('tambah_jadwal', ['class' => 'form-inline']) ?>
                <div class="row-fluid">
                    <div class="col-lg-12 col-md-10">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group">
                                    <label>Periode Kerja</label>
                                    <input id="tanggalawal" class="form-control" placeholder="Tanggal Awal" name="tanggalawal" value="<?= set_value('tanggal') ?>">
                                </div>
                                <div class="btn-group">
                                    <input id="tanggalakhir" class="form-control" placeholder="Tanggal Akhir" name="tanggalakhir" value="<?= set_value('tanggal') ?>">
                                </div>
                                <div class="btn-group">
                                    <span style="color:red;"> <?= form_error('tanggalawal', '<div class="error">', '</div>'); ?></span>
                                    <span style="color:red;"> <?= form_error('tanggalakhir', '<div class="error">', '</div>'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div style="padding-top: 20px;">
                                    <label class="control-label">Departemen</label>
                                    <div class="btn-group" style="padding-left: 10px;">
                                        <select id="departemen" class="form-control" name="departemen">
                                            <option disabled selected="true">-- Departemen --</option>
                                            <?php
                                            if (isset($hasil_jadwal)) {
                                                foreach ($hasil_jadwal as $data) {
                                                    ?>
                                                    <option value="<?= $data->id_departemen ?>"><?= $data->nama_departemen ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="btn-group" style="padding-left: 10px;">
                                        <span style="color:red;"> <?= form_error('departemen', '<div class="error">', '</div>'); ?></span></div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group" style="padding-top: 20px; padding-left: 93px;">
                                        <input type="hidden" id="list_karyawan" name="list_karyawan">
                                        <div id="detail_karyawan"></div>
                                        <div class="btn-group" style="padding-top: 10px;">
                                            <span style="color:red;"> <?= form_error('id_karyawan', '<div class="error">', '</div>'); ?></span></div>
                                    </div>
                                </div>
                                <div class="col-md-8" style="padding-top: 20px;">
                                    <label class="control-label">Shift</label>
                                    <div class="btn-group" style="padding-left: 43px;">
                                        <select id="id_shift" class="form-control" name="id_shift">
                                            <option disabled selected="true">-- Pilih Shift --</option>
                                            <?php
                                            if (isset($hasil_shift)) {
                                                foreach ($hasil_shift as $data) {
                                                    ?>
                                                    <option value="<?= $data->id_shift ?>"><?= $data->nama_shift ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="btn-group" style="padding-left: 10px;">
                                        <span style="color:red;"> <?= form_error('id_shift', '<div class="error">', '</div>'); ?></span></div>
                                </div>
                                <div class="col-sm-offset-4 col-sm-6" style="padding-top: 20px;">
                                    <button type="submit" onclick="get_karyawan()" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
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

        <!--         DataTables JavaScript 
                <script src="<?php echo base_url(); ?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>-->

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery-1.10.2.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery.js"></script>

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui-timepicker-addon.js"></script>

        <script src="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui-sliderAccess.js"></script>

        <script type="text/javascript">
                                        $(document).ready(function() {

                                            $('#tanggalawal').datepicker({
                                                dateFormat: 'yy-mm-dd'
                                            });
                                            $('#tanggalakhir').datepicker({
                                                dateFormat: 'yy-mm-dd'
                                            });
                                        });
        </script>

        <script>

            function get_karyawan()
            {
                var list_karyawan = $('input[name=id_karyawan]:checked').map(function() {
                    return this.value;
                }).get().join(',');
//                alert(list_karyawan);
                $("#list_karyawan").val(list_karyawan);
            }

            $(function() {
                $('#save_value').click(function() {
                    var val = [];
                    $(':checkbox:checked').each(function(i) {
                        val[i] = $(this).val();
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#departemen").change(function() {
                    var departemen = $("#departemen").val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('index.php/jadwal/get_karyawan'); ?>",
                        data: "departemen=" + departemen,
                        cache: false,
                        success: function(data) {
                            $('#detail_karyawan').html(data);
                        }
                    });
                });
            });
        </script>
    </body>

</html>
