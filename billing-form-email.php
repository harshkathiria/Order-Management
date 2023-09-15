<?php 
include ("include/makeSession.php"); 

include("include/header.php");
include("include/sidebar.php"); 

?>
 <?php
   if(isset($_REQUEST['upid']) && $_REQUEST['upid']!=''){
	  $dovalue="editbilling";
	  $doid=$_REQUEST['upid'];
	  
	  $upquery = mysqli_query($con,"select * from `billing` where id = '".$_REQUEST['upid']."'");
	  $upfetch = mysqli_fetch_array($upquery);
  }else{
 	  $dovalue="addbilling";
	  $doid='';
	  }
?>
<link href="css/jquery-ui.min.css" rel="stylesheet">
<link href="css/datepicker.css" rel="stylesheet">
<link href="css/sticky-footer-navbar.css" rel="stylesheet">
<script src="js/ie.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Order Book <small></small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Order Book</li>
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
            <form method="post" action="action.php" enctype="multipart/form-data"  role="form">
                <input type="hidden"  name="do" value="<?php echo $dovalue;?>" />
                <input type="hidden"  name="doid" value="<?php echo $doid;?>" />
              <div class="col-md-8">
                <div class="form-group">
                  <label>Date</label>
                  <input type="text" class="form-control" name="b_date" value="<?php if(isset($_GET['upid'])){echo $upfetch['b_date'];}?>" id="invoiceDate" placeholder="Order Date">
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Select Order</label>
                  <select class="form-control"  name="o_id">
                    <option value="" >Select</option>
                    <?php 
					  $query = mysqli_query($con,"select * from `order` ");
						while($rows = mysqli_fetch_array($query)){
						$query1 = mysqli_query($con,"select * from customer where id = '".$rows['cust_id']."'");$rows1 = mysqli_fetch_array($query1);
							if(isset($_GET['upid'])){
							?>
                    <option value="<?php echo $rows['id'];?>" <?php if($upfetch['o_id'] == $rows['id']){ echo 'Selected="selected"';}?>><?php echo $rows['o_date'].'-'.$rows1['name'];?></option>
                    <?php }
							else{
					  		echo '<option value="'.$rows['id'].'">'.$rows['o_date'].'-'.$rows1['name'].'</option>';
							}
					   	}
					   ?>
                  </select>
                </div>
              </div>
              <h2>&nbsp;</h2>
              <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
                        <th width="15%">Title </th>
                        <th width="15%">QTY</th>
                        <th width="15%">Rate</th>
                        <th width="15%">Amount</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset($_GET['upid'])){
					$uppquery = mysqli_query($con,"select * from billing_details where billing_id = '".$upfetch['id']."'");
					$i = 1;
					while($uppfetch = mysqli_fetch_array($uppquery))
					{
					?>
                      <tr>
                        <td><input class="case" type="checkbox"/></td>
                        <td><input type="text"  name="title[]" id="title_<?php echo $i;?>" value="<?php echo $uppfetch['title'];?>" class="form-control"></td>
                        <td><input type="text" class="form-control ChangNo" id="qty_<?php echo $i;?>" value="<?php echo $uppfetch['qty'];?>" name="qty[]"></td>
                        <td><input type="text"  name="rate[]" id="rate_<?php echo $i;?>" value="<?php echo $uppfetch['rate'];?>"  class="form-control ChangNo"></td>
                        <td><input type="text"  name="amount[]" id="amount_<?php echo $i;?>" value="<?php echo $uppfetch['amount'];?>" class="form-control ChangNo totalbilling"></td>
                       
                      </tr>
                      <?php $i++;}}else{?>
                      <tr>
                        <td><input class="case" type="checkbox"/></td>
                        <td><input type="text"  name="title[]" id="title_1"  class="form-control"></td>
                        <td><input type="text" class="form-control ChangNo" id="qty_1"  name="qty[]"></td>
                        <td><input type="text"  name="rate[]" id="rate_1"   class="form-control ChangNo"></td>
                        <td><input type="text"  name="amount[]" id="amount_1" class="form-control  totalbillings"></td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                  <button class="btn btn-danger delete" type="button"> Delete</button>
                  <button class="btn btn-success addmore" type="button"> Add More</button>
                </div>
              </div>
              <h2>&nbsp;</h2>
             <div class='row'>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Subtotal</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                      <input type="text" class="form-control" name="sub_total" id="subTotal" value="<?php if(isset($_GET['upid'])){echo $upfetch['sub_total'];}?>"  placeholder="Subtotal" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                    </div>
                  </div>
                </div>
                
                <div class="col-md-8">
                  <div class="form-group">
                    <label>PrePending</label>
                    <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                      <input type="text" class="form-control" name="prepending" value="<?php if(isset($_GET['upid'])){echo $upfetch['prepending'];}?>"  id="PrePending" placeholder="PrePending" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                      
                    </div>
                  </div>
                </div>
                <input type="hidden" name="amountAfterpre" id="amountAfterpre" class="amountAfterpre" />
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Advance</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                      <input type="text" class="form-control" name="amount_paid" value="<?php if(isset($_GET['upid'])){echo $upfetch['amount_paid'];}?>"  id="amountPaid" placeholder="Advance" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Remaining</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                      <input type="text" class="form-control amountDue" name="amonunt_due" value="<?php if(isset($_GET['upid'])){echo $upfetch['amonunt_due'];}?>"  id="amountDue" placeholder="Remaining" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                    </div>
                  </div>
                </div>
              </div>
              <h2>&nbsp;</h2>
              <hr />
              <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                  <div class="box-footer">
                    <center>
                      <input class="btn btn-primary" type="submit" value="Submit">
                    </center>
                  </div>
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
<script src="js/auto-billing.js"></script>
