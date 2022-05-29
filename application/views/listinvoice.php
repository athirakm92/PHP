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
		<!-- DataTables -->
		<link rel="stylesheet" href="<?php echo THEME; ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="<?php echo THEME; ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="<?php echo THEME; ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
				  <div class="col-sm-6">
					<h1>List Invoice</h1>
				  </div>
				  <div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
					  <li class="breadcrumb-item"><a href="#">Home</a></li>
					  <li class="breadcrumb-item active">List Invoice</li>
					</ol>
				  </div>
				</div>
			  </div><!-- /.container-fluid -->
			</section>
			<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Invoice Number</th>
                    <th>Createdon</th>
					<th>View</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php
				  if(!empty($resultinvoice)){
					  $i = 1;
						foreach($resultinvoice as $invoicedata){
						?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $invoicedata->invoiceid;?></td>
								<td><?php echo $invoicedata->createdon;?></td>
								<td><a href="<?php echo base_url();?>invoicedetails/<?php echo $invoicedata->id;?>" class="btn btn-block btn-outline-info">View</a>
								</td>
							</tr>
						<?php
						$i++;
						}
				  } else{
					  ?>
						<tr>
						<td colspan=6 >No Invoices found</td>
						</tr>
					  <?php
				  }
				  ?>
                 
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
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
		<!-- DataTables  & Plugins -->
		<script src="<?php echo THEME; ?>plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo THEME; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?php echo THEME; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="<?php echo THEME; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
		<script src="<?php echo THEME; ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo THEME; ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
		<script src="<?php echo THEME; ?>plugins/jszip/jszip.min.js"></script>
		<script src="<?php echo THEME; ?>plugins/pdfmake/pdfmake.min.js"></script>
		<script src="<?php echo THEME; ?>plugins/pdfmake/vfs_fonts.js"></script>
		<script src="<?php echo THEME; ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
		<script src="<?php echo THEME; ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
		<script src="<?php echo THEME; ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo THEME; ?>dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo THEME; ?>dist/js/demo.js"></script>
		<!-- Page specific script -->
		<script>
		  $(function () {
			$('#example2').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": true,
			  "info": true,
			  "autoWidth": false,
			  "responsive": true,
			});
		  });
		</script>
	</body>
</html>
