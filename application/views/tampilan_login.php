<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <title>Halaman Login</title>
    <meta name="description" content="slick Login">
    <meta name="author" content="Webdesigntuts+">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/style.css" />
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Style CSS -->
    <link href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/style.css" rel="stylesheet">

    <!-- login CSS -->
    <link href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/login.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
 
<body>
<div><?=validation_errors()?></div>
    <?=form_open('login', ['id'=>'slick-login'])?>
        <div class="form-group">
        <h1 class="text-logo">Pengelolaan Shift Karyawan</h1>
        </div>
        <?php if($this->session->flashdata('error')) {?>
        <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismis="alert">x</button>
        <?php echo $this->session->flashdata('error'); ?>
        </div>
        <?php }else if($this->session->flashdata('isi')) {?>
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismis="alert">x</button>
        <?php echo $this->session->flashdata('isi'); ?>
        </div>
        <?php };?>

        <div class="form-group">
        <label for="username">username</label><input type="text" name="username" class="placeholder" placeholder="Username">
        </div>
        <div class="form-group">
        <label for="password">password</label><input type="password" name="password" class="placeholder" placeholder="password">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-lg btn-danger btn-block">Login</button>
        </div>
    </form>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>
</body>
 
</html>