<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Eshop</title>

	  <!-- Google Font: Source Sans Pro -->
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="<?php echo THEME; ?>plugins/fontawesome-free/css/all.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="<?php echo THEME; ?>dist/css/adminlte.min.css">
	</head>
	<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
		<div class="wrapper">
		  <?php include('common/head.php'); ?>

		  <!-- Content Wrapper. Contains page content -->
		  <div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			  <div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-2">
				  </div>
				  <div class="col-sm-4">
					<h1>Add Invoice</h1>
				  </div>
				  <div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
					  <li class="breadcrumb-item"><a href="#">Home</a></li>
					  <li class="breadcrumb-item active">Add Invoice</li>
					</ol>
				  </div>
				</div>
			  </div><!-- /.container-fluid -->
			</section>
			<?php
			if($error != ''){
			?>
				<div class="card-body">
					<div class="callout callout-warning">
					<p><?php echo $error;?></p>
					</div>
				</div>
			<?php 
			}
			?>
			
			<?php
			if($success != ''){
			?>
				<div class="card-body">
					<div class="callout callout-success">
					<p><?php echo $success;?></p>
					</div>
				</div>
			<?php 
			}
			?>
			<!-- Main content -->
			<section class="content">
				<form id="invoiceform" action="<?php echo base_url();?>invoice" method="post">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">General</h3>
									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
										  <i class="fas fa-minus"></i>
										</button>
									</div>
								</div>
								<div class="card-body">
									
									<div id="dynamic_field">
										<div class="row1 row">
											<div class="col-md-3 form-group">
												<label for="inputName">Product Name</label>
												<input type="text" id="productname" name="productname[]" class="form-control">
											</div>
											<div class="col-md-3 form-group">
												<label for="inputDescription">Quantity</label>
												<input type="number" id="quantity" name="quantity[]" class="form-control">
											</div>
										  
											<div class="col-md-2 form-group">
												<label for="inputDescription">Unit Price($)</label>
												<input type="number" id="unitprice" name="unitprice[]" class="form-control">
											</div>
								  
											<div class="col-md-3 form-group">
												<label for="inputStatus">Tax</label>
												<select id="inputStatus" name="tax[]" class="form-control custom-select">
													<option value="0">0%</option>
													<option value="1">1%</option>
													<option value="5">5%</option>
													<option value="10">10%</option>
												</select>
											</div>
											<div class="col-md-1"></div>
										</div>
									</div>
									<div class="col-md-3 float-right" style="margin-top:10px;">
									<button type="button" id="add" class="btn btn-block btn-primary">Add More</button>
									</div>
								</div>
							<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<div class="col-md-2"></div>
					</div>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-6">
							<a href="#" class="btn btn-secondary">Cancel</a>
							<input type="submit" name="createinvoice" onclick="return validateForm();"value="Create new Invoice" class="btn btn-success float-right">
						</div>		
						<div class="col-md-3"></div>
					</div>
				</form>
			</section>
			<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<footer class="main-footer">
				<div class="float-right d-none d-sm-block">
					<b>Version</b> 3.1.0
				</div>
				<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
			</footer>

			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
			<!-- /.control-sidebar -->
		</div>
		<!-- ./wrapper -->

		<!-- jQuery -->
		<script src="<?php echo THEME; ?>plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="<?php echo THEME; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- jquery-validation -->
		<script src="<?php echo THEME; ?>plugins/jquery-validation/jquery.validate.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo THEME; ?>dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo THEME; ?>dist/js/demo.js"></script>
		<script>
			$(function () {
			  $.validator.setDefaults({
				submitHandler: function () {
				  alert( "Form successful submitted!" );
				  return true;
				}
			  });
			  $('#invoiceform').validate({
				rules: {
				  'productname[]': {
					required: true,
					minlength: 3
				  },
				  'quantity[]': {
					required: true,
					number: true
				  },
				  'unitprice[]': {
					required: true,
					number: true
				  },
				},
				messages: {
				  productname: {
					required: "Please enter a product name",
					minlength: "Your Product name must be at least 3 characters long"
				  },
				  quantity: {
					required: "Please enter quantity",
					number: "Field quantity must be a number"
				  },
				  unitprice: {
					required: "Please enter unitprice",
					number: "Field unitprice must be a number"
				  },
				},
				errorElement: 'span',
				errorPlacement: function (error, element) {
				  error.addClass('invalid-feedback');
				  element.closest('.form-group').append(error);
				},
				highlight: function (element, errorClass, validClass) {
				  $(element).addClass('is-invalid');
				},
				unhighlight: function (element, errorClass, validClass) {
				  $(element).removeClass('is-invalid');
				}
			  });
			  
			  
			  var i=1;  
		   
			  $('#add').click(function(){  
				   i++;  
				   $('#dynamic_field').append('<div id="row'+i+'" class="row"><div class="col-md-3 form-group"><label for="inputName">Product Name</label><input type="text" id="productname" name="productname[]" class="form-control"></div><div class="col-md-3 form-group"><label for="inputDescription">Quantity</label><input type="number" id="quantity" name="quantity[]" class="form-control"></div><div class="col-md-2 form-group"><label for="inputDescription">Unit Price($)</label><input type="number" id="unitprice" name="unitprice[]" class="form-control"></div><div class="col-md-3 form-group"><label for="inputStatus">Tax</label><select id="inputStatus" name="tax[]" class="form-control custom-select"><option value="0">0%</option><option value="1">1%</option><option value="5">5%</option><option value="10">10%</option></select></div><div class="col-md-1"  ><label for="inputStatus"></label><p class="delete" id="'+i+'" style="color:red"><i class="fa fa-trash"></i></p></div></div>');
			  });
		  
			  $(document).on('click', '.delete', function(){  
				   var button_id = $(this).attr("id");   
				   $('#row'+button_id+'').remove();  
			  });
			});
		</script>
	</body>
</html>
