<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Pengelolaan Jadwal</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/bower_components/js/jquery-ui-timepicker-addon.css" rel="stylesheet">

        <!-- Style CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/style.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!--         DataTables CSS 
                <link href="<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">-->

        <!--         DataTables Responsive CSS 
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
                    <!-- /.navbar-top-links -->
                <?php endif; ?>
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
                        <h1 class="page-header">Pengelolaan Jadwal Karyawan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-1">
                        <div class="container">
                            <form class="sidebar-search" action="<?php echo site_url('cari_jadwal'); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-inline">
                                            <div class="btn-group">
                                                <label>Periode Kerja</label>
                                                <input id="datepicker" class="form-control" name="tanggalawal" value= "<?= $tanggalawal ?>">
                                            </div>
                                            <div class="btn-group">
                                                <input id="datepicker2" class="form-control" name="tanggalakhir" value= "<?= $tanggalakhir ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-horizontal" style="padding-top: 10px;">
                                            <label>Departemen</label>
                                            <div class="btn-group" style="padding-left: 10px;">

                                                <select id="departemen" class="form-control" name="nama_departemen">
                                                    <option disabled selected="true">-- Departemen --</option>;
                                                    <?php foreach ($hasil_jadwal as $data) : ?>
                                                        <option value="<?= $data->id_departemen ?>"><?= $data->nama_departemen ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group" style="padding-top: 10px;">
                                                <div class="col-sm-10">
                                                    <input type="hidden" id="list_karyawan" name="list_karyawan">
                                                    <div id="detail_karyawan"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-1">
                                                    <button type="submit" class="btn btn-success">Cari</button>
                                                </div>
                                                <div class="col-md-1" align="right">
                                                    <a class="btn btn-danger glyphicon-plus" href="tambah_jadwal">Tambahkan Jadwal</a>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>              
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                    <form action="<?php echo site_url('cari_jadwal/multidel/'); ?>" method="post">
                        <div class="row">
                            <div class="col-lg-8">
                                <?php
                                $awal = !empty($tanggalawal) ? str_replace('/', '-', $tanggalawal) : $this->input->post('tanggalawal');
                                $akhir = !empty($tanggalakhir) ? str_replace('/', '-', $tanggalakhir) : $this->input->post('tanggalakhir');
                                $id_karyawan = !empty($id_karyawan) ? $id_karyawan : $this->input->post('id_karyawan');
                                if (isset($show)) {
                                    $no = 1;
                                    if ($jumlah > 0) {
                                        ?>
                                        <?php echo "Ditemukan $jumlah hasil pencarian"; ?>
                                        <div class="panel panel-default">
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="dataTable_wrapper">
                                                    <div style="overflow: auto; height:400px;">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr class ="bg-primary">
                                                                    <th>
                                                                        <input type="checkbox" id="checkAll">
                                                                    </th>
                                                                    <th>No</th>
                                                                    <th>Nama</th>
                                                                    <th>Departement</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Shift</th>
                                                                    <th class="col-lg-1">Action</th>
                                                                </tr>
                                                            </thead>
                                                                <input type="hidden" id="list_shift" name="list_shift">
                                                            <tbody>
                                                                <?php foreach ($data_shift as $vals) { ?>
                                                                    <tr class="odd gradeX">
                                                                <td><input type="checkbox" name="id_shift_karyawan" value="<?= $vals->id_shift_karyawan ?>"></td>
                                                                <td><?= $no ?></td>
                                                                <td><?= $vals->nama ?></td>
                                                                <td><?= $vals->nama_departemen ?></td>
                                                                <td><?= $vals->tanggal ?></td>
                                                                <td>Shift <?= $vals->id_shift ?></td>
                                                                <td class="col-lg-1">
                                                                    <?= anchor('jadwal/delete/' . $vals->id_shift_karyawan, ' ', ['class' => 'konfirmasi btn btn-danger glyphicon glyphicon-trash']); ?>
                                                                </td>
                                                                </tr>
                                                                <?php
                                                                $no++;
                                                            }
                                                            ?>
                                                            </tbody>
                                                            <tr>
                                                                <td colspan="7">
                                                                    <button type="submit" class="konfirmasi btn btn-danger" onclick="get_shift()" >Hapus yang di Tandai</button>
                                                                </td></tr>
                                                        </table>
                                                        <?php
                                                    } else {
                                                        echo "Hasil pencarian tidak ditemukan";
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
                    </form>
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

            <!-- Metis Menu Plugin JavaScript -->
            <script src="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

            <!-- DataTables JavaScript -->
            <script src="<?php echo base_url(); ?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>
            <script>

                function get_karyawan()
                {
                    var list_karyawan = $('input[name=id_karyawan]:checked').map(function() {
                        return this.value;
                    }).get().join(',');
//                    alert(list_karyawan);
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
            <script>

                function get_shift()
                {
                    var list_shift = $('input[name=id_shift_karyawan]:checked').map(function() {
                        return this.value;
                    }).get().join(',');
//                    alert(list_shift);
                    $("#list_shift").val(list_shift);
                }

                $(function() {
                    $('#save_value').click(function() {
                        var val = [];
                        $(':checkbox:checked').each(function(i) {
                            val[i] = $(this).val();
                        });
                    });
                });
                $(document).ready(function() {
                    $('.konfirmasi').click(function() {
                        var tujuan = $(this).attr('id');
                        if (confirm("Hapus Data ???")) {
                            window.location.href = tujuan;
                        } else {
                            alert("Hapus di batalkan");
                            return false;
                        }
                    });
                });
                $("#checkAll").click(function() {
                    $('input:checkbox').not(this).prop('checked', this.checked);
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#departemen").change(function() {
                        var departemen = $("#departemen").val();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('index.php/jadwal/cari_karyawan'); ?>",
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
