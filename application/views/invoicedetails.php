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
				  <div class="col-sm-6">
					<h1>Invoice Details</h1>
				  </div>
				  <div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
					  <li class="breadcrumb-item"><a href="#">Home</a></li>
					  <li class="breadcrumb-item active">Invoice Details</li>
					</ol>
				  </div>
				</div>
			  </div><!-- /.container-fluid -->
			</section>
			<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> EShop
                    <small class="float-right">Date: <?php echo date('d-m-Y');?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo $invoice->username; ?></strong><br>
                    <?php echo $invoice->address; ?><br>
                    Phone: <?php echo $invoice->phonenumber; ?><br>
                    Email: <?php echo $invoice->email; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <h3>INVOICE NO : <?php echo $invoice->invoiceid; ?></h3><br>
                  <br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
						<th>ID</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Line Total</th>
					  <th>Tax</th>
					  <th>Tax Amount</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					if(!empty($invoiceitems)){
						$i = 1;
						$subtotal = 0;
						$subtaxamount = 0;
						foreach($invoiceitems as $itemdata){
							$linetotal = $itemdata->quantity*$itemdata->unitprice;
							$taxamount = ($linetotal*$itemdata->tax)/100;
							?>
							<tr>
							  <td><?php echo $i;?></td>
							  <td><?php echo $itemdata->productname;?></td>
							  <td><?php echo $itemdata->quantity;?></td>
							  <td><?php echo $itemdata->unitprice;?></td>
							 <td><?php echo $linetotal;?></td>
							  <td><?php echo $itemdata->tax;?></td>
							 <td><?php echo $taxamount;?></td>
							</tr>
							<?php
							$i++;
							$subtotal = $subtotal+$linetotal;
							$subtaxamount = $subtaxamount+$taxamount;
						}
					}
					?>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-4">
                  <p class="lead">Payment Methods:</p>
                  <img src="<?php echo THEME; ?>dist/img/credit/visa.png" alt="Visa">
                  <img src="<?php echo THEME; ?>dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="<?php echo THEME; ?>dist/img/credit/american-express.png" alt="American Express">
                  <img src="<?php echo THEME; ?>dist/img/credit/paypal2.png" alt="Paypal">

                  
                </div>
                <!-- /.col -->
                <div class="col-8">
                  <p class="lead">Amount Due 
				  <?php
				  echo date('d-m-Y', strtotime($invoice->createdon. ' + 15 days')); 
				  ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?php echo '$ '.$subtotal;?></td>
                      </tr>
					  
                      <tr>
                        <th>Tax </th>
						<td>$<?php echo $subtaxamount;?></td>
                      </tr>
					  
					  <tr>
						
						<td>Discount in %<input type="number" id="discountper" name="discountper" class="form-control"></td>
                        <td>or</td>
						<td>Amount($)<input type="number" id="discountinamount" name="discountinamount" class="form-control"></td>
						<td><button class="btn btn-primary float-right" onclick="applydiscount();">Apply Discount</button></td>
						
						</tr>
					  <tr>
                        <th>Subtotal with tax</th>
                        <td>
						<?php 
							$subtotalwithtax = $subtotal+$taxamount;
							echo '$ '.$subtotalwithtax; ?>
							<input hidden id="subtotalwithtax" value="<?php echo $subtotalwithtax;?>">
						</td>
                      </tr>
					  <tr>
                        <th>Discount</th>
                        <td id="discountamount">0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td id="totalamount"><?php echo '$ '.$subtotalwithtax;?></td>
                      </tr>
					  
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button type="button" class="btn btn-success float-right" onclick="window.print();return false;"><i class="fas fa-print"></i> Generate Invoice
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
			<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<?php include('common/footer.php');?>

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
<!-- AdminLTE App -->
<script src="<?php echo THEME; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo THEME; ?>dist/js/demo.js"></script>
<script>
function applydiscount(){
	
	if($("#discountinamount").val() == '' && $("#discountper").val() == ''){
		alert('please enter dicount in % or $');
	} else{
		var subtotal = $("#subtotalwithtax").val();
		if($("#discountper").val() != ''){
		 var discountper = $("#discountper").val();
		 var discount = (subtotal*discountper)/100;
		}else if($("#discountinamount").val() != ''){
		 var discount = $("#discountinamount").val();
		}
		$("#discountamount").html('$ '+discount);
		$("#totalamount").html('$ '.subtotal-discount);
	}
}
</script>
	</body>
</html>
