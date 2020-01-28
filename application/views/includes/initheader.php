<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Auto-Paint Jobs :: </title>
	
	<link rel="shortcut icon" href="<?php echo base_url();?>img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url();?>img/favicon.ico" type="image/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>vendor/sb-admin/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<?php if(isset($dataTableEnabled)){?>	
	<!-- DataTables CSS -->
    <link href="<?php echo base_url();?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	
	<?php } ?>
	
	 <!-- Custom CSS -->
    <link href="<?php echo base_url();?>vendor/sb-admin/css/sb-admin-2.css" rel="stylesheet">
	
	<!-- jQuery -->

   <script src="<?php echo base_url();?>vendor/jquery/jquery.min.js"></script>
   <script src="<?php echo base_url();?>vendor/jquery/jquery-2.1.1.min.js"></script>
   
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>

    
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>vendor/sb-admin/js/sb-admin-2.js"></script>
	
	
	<?php if(isset($dataTableEnabled)){?>
	 <!-- DataTables JavaScript -->
    <?php /*<script src="<?php echo base_url();?>vendor/datatables/js/jquery.dataTables15.min.js"></script>*/ ?>
	<script src="<?php echo base_url();?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>vendor/datatables-responsive/dataTables.responsive.js"></script>
	 <script src="<?php echo base_url();?>vendor/datatables-plugins/full_numbers_no_ellipses.js"></script>
	 <script src="<?php echo base_url();?>vendor/datatables-plugins/formatted-numbers.js"></script>
	<?php } ?>
	
	
	<link  href="<?php echo base_url();?>vendor/datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
	<script src="<?php echo base_url();?>vendor/datepicker/bootstrap-datepicker.min.js"></script>
	
	 
	 
	<script src="<?php echo base_url();?>vendor/datetimepicker/moment-with-locales.js"></script> 
	<link  href="<?php echo base_url();?>vendor/datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet">
	<script src="<?php echo base_url();?>vendor/datetimepicker/datetimepicker.js"></script>
	 
	<link href="<?php echo base_url();?>vendor/sb-admin/css/custom.css" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>

<body>
