<?php 
include ("include/makeSession.php"); 

include("include/header.php");
include("include/sidebar.php"); 
if(isset($_GET['upid'])){
$upquery = mysqli_query($con,"select * from invoice where id = '".$_GET['upid']."'");
$upfetch = mysqli_fetch_array($upquery);
} 
?>
<!--<style>
input[type="number"] {
	-moz-appearance: textfield;
}
</style>-->
<link href="css/jquery-ui.min.css" rel="stylesheet">
 <link href="css/datepicker.css" rel="stylesheet">
 <link href="css/sticky-footer-navbar.css" rel="stylesheet">
 <script src="js/ie.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Invoice <small></small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Invoice</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header">
          	
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">
            <form method="post" action="action.php" name="addcategory" id="addcategory" enctype="multipart/form-data"  role="form">
            	<?php if(isset($_GET['upid'])){ ?>
                   <input type="hidden" name="invoice-edit" value="invoice-edit" />
               	 	<?php }else{?>
                   <input type="hidden"  name="invoice" value="invoice" />
                 	<?php }?>
                 	
              <!-- text input -->
              <div class="col-md-12">
                <div class="col-md-8">
                  <div class="col-md-6">
                    <label>Invoice Deiails</label>
                    <div class="form-group">
                      <input type="text" class="form-control" name="invoice_no" value="<?php if(isset($_GET['upid'])){echo $upfetch['invoice_no'];}else{echo '#SR'.hexdec(time(substr(uniqid(),0,8)));}?>" id="invoiceNo" placeholder="Invoice No">
                    </div>
                    
                    <div class="form-group">
                      <input type="date" class="form-control" name="invoice_date" value="<?php if(isset($_GET['upid'])){echo $upfetch['invoice_date'];}?>" id="invoiceDate" placeholder="Invoice Date">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control amountDue" name="" id="amountDueTop" placeholder="Amount Due" value="<?php if(isset($_GET['upid'])){echo $upfetch['amount_due'];}?>" >
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Client Information</label>
                  <?php 
				  
				  if(isset($_GET['upid'])){
						$upcquery = mysqli_query($con,"select * from company where id = '".$upfetch['comp_id']."'");
						$upcfetch = mysqli_fetch_array($upcquery);
					} 
				  ?>
                  <div class="form-group">
                    <input type="text" name="comp_name"  required class="form-control" id="companyName" value="<?php if(isset($_GET['upid'])){echo $upcfetch['name'];}?>"  placeholder="Client Name">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" required name="comp_address" rows='3' id="companyAddress"   placeholder="Your Address"><?php if(isset($_GET['upid'])){echo $upcfetch['address'];}?></textarea>
                  </div>
                  <div class="form-group">
                    <input type="text" name="client_mobile" required class="form-control" id="companyName" value="<?php if(isset($_GET['upid'])){echo $upcfetch['client_mobile'];}?>"  placeholder="Mobile Number">
                  </div>
                  <div class="form-group">
                    <input type="email" name="client_email" required class="form-control" id="companyName" value="<?php if(isset($_GET['upid'])){echo $upcfetch['client_email'];}?>"  placeholder="Email Id">
                  </div>
                </div>
              </div>
              <h2>&nbsp;</h2>
              <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="2%"><input id="check_all" value="<?php if(isset($_GET['upid'])){echo $upfetch['invoice_date'];}?>"  class="formcontrol" type="checkbox"/></th>
                        <th width="15%">Item No</th>
                        <th width="38%">Item Name</th>
                        <th width="15%">Price</th>
                       <!-- <th width="9%">Stock</th>-->
                        <th width="9%">Quantity</th>
                        <th width="15%">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($_GET['upid'])){
					$uppquery = mysqli_query($con,"select * from invoice_product where invoice_id = '".$upfetch['id']."'");
					$i = 1;
					while($uppfetch = mysqli_fetch_array($uppquery))
					{
					?>
                      <tr>
                        <td><input class="case" type="checkbox"/></td>
                        <input type="hidden"  name="proid[]" id="proid_<?php echo $i;?>" value="<?php echo $uppfetch['pro_id'];?>">
                        <td><input type="text" data-type="productCode" name="itemNo[]" id="itemNo_<?php echo $i;?>" value="<?php echo $uppfetch['pro_sku'];?>" class="form-control autocomplete_txt" autocomplete="off"></td>
                        <td><input type="text" data-type="productName" name="itemName[]" id="itemName_<?php echo $i;?>" value="<?php echo $uppfetch['pro_name'];?>" class="form-control autocomplete_txt" autocomplete="off"></td>
                        <td><input type="text" name="price[]" id="price_<?php echo $i;?>" class="form-control changesNo" value="<?php echo $uppfetch['pro_price'];?>" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                        <!-- <td><input type="text" data-type="id" name="proid[]" id="proid_1" disabled="disabled"  class="form-control"></td>-->
                       
                        <td><input type="text" name="quantity[]" id="quantity_<?php echo $i;?>" class="form-control changesNo" value="<?php echo $uppfetch['qty'];?>" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                        <td><input type="text" name="totalpro[]" id="total_<?php echo $i;?>" class="form-control totalLinePrice" value="<?php echo $uppfetch['total_price'];?>" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                      </tr>
                    
                    <?php $i++;}}else{?>
                     <tr>
                        <td><input class="case" type="checkbox"/></td>
                        <input type="hidden"  name="proid[]" id="proid_1">
                        <td><input type="text" data-type="productCode" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off"></td>
                        <td><input type="text" data-type="productName" name="itemName[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"></td>
                        <td><input type="text" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                        <!-- <td><input type="text" data-type="id" name="proid[]" id="proid_1" disabled="disabled"  class="form-control"></td>-->
                       
                        <td><input type="text" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                        <td><input type="text" name="totalpro[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
                      </tr>
                    <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class='row'>
                <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                  <button class="btn btn-danger delete" type="button"> Delete</button>
                  <button class="btn btn-success addmore" type="button"> Add More</button>
                </div>
                <div class='col-xs-12 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-sm-5 col-md-5 col-lg-5'>
                  <div class="form-group">
                    <label>Subtotal: &nbsp;</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                      <input type="text" class="form-control" name="sub_total" id="subTotal" value="<?php if(isset($_GET['upid'])){echo $upfetch['sub_total'];}?>"  placeholder="Subtotal" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tax: &nbsp;</label>
                    <div class="input-group">
                      <div class="input-group-addon">%</div>
                      <input type="text" class="form-control" name="tax" id="tax" value="<?php if(isset($_GET['upid'])){echo $upfetch['tax'];}?>"  placeholder="Tax" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tax Amount: &nbsp;</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="tax_amount" value="<?php if(isset($_GET['upid'])){echo $upfetch['tax_amount'];}?>"  id="taxAmount" placeholder="Tax" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                      <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Total: &nbsp;</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                      <input type="text" class="form-control" name="total" value="<?php if(isset($_GET['upid'])){echo $upfetch['total'];}?>"  id="totalAftertax" placeholder="Total" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Amount Paid: &nbsp;</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                      <input type="text" class="form-control" name="amount_paid" value="<?php if(isset($_GET['upid'])){echo $upfetch['amount_paid'];}?>"  id="amountPaid" placeholder="Amount Paid" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Amount Due: &nbsp;</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                      <input type="text" class="form-control amountDue" name="amonunt_due" value="<?php if(isset($_GET['upid'])){echo $upfetch['amount_due'];}?>"  id="amountDue" placeholder="Amount Due" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                    </div>
                  </div>
                </div>
              </div>
              <h2>Notes: </h2>
                <div class='row'>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                        <div class="form-group">
                        
                            <textarea class="form-control" rows='5'  id="notes" name="notes" placeholder="Your Notes"><?php if(isset($_GET['upid'])){echo $upfetch['note'];}?></textarea>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                        <div class="box-footer"><center>
                            <input class="btn btn-primary" type="submit" value="Save Invoice">
                        </center></div>
                    </div>
                </div>
            </form>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- footer start -->
<?php
include_once('include/footer.php');
?>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
    <script src="js/auto.js"></script>