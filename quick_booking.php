<?php 
include ("include/makeSession.php"); 

include("include/header.php");
include("include/sidebar.php"); 

?>
 <?php
   if(isset($_REQUEST['upid']) && $_REQUEST['upid']!=''){
	  $dovalue="editquickorder";
	  $doid=$_REQUEST['upid'];
	  
	  $upquery = mysqli_query($con,"select * from `order` where id = '".$_REQUEST['upid']."'");
	  $upfetch = mysqli_fetch_array($upquery);
  }else{
 	  $dovalue="addquickorder";
	  $doid='';
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
                  <label>Order Date</label>
                  <input type="text" class="form-control" name="o_date" value="<?php if(isset($_GET['upid'])){echo $upfetch['o_date'];}?>" id="invoiceDate" placeholder="Order Date">
                </div>
              </div>				<div class="col-md-8">
              <div class="form-group">			  <label>Customer Name </label>			  <input type="text" class="form-control" name="cus_name" placeholder="Customer Name" required value="">			</div>			</div>			<div class="col-md-8">			<div class="form-group">			  <label>Address</label>			  <textarea class="form-control" placeholder="Enter ..." rows="3" name="cus_address"></textarea>			</div>			</div>			<div class="col-md-8">			<div class="form-group">			  <label>City</label>			  <input type="text" class="form-control" name="cus_city" placeholder="City" value="">			</div>			</div>			<div class="col-md-8">			 <div class="form-group">			  <label>State</label>			  <input type="text" class="form-control" name="cus_state" placeholder="State" value="">			</div>			</div>			<div class="col-md-8">			<div class="form-group">			  <label>Moblie No</label>			  <input type="number" class="form-control" name="cus_mobile" placeholder="Mobile No" value="">			</div>			</div>			<div class="col-md-8">		   <div class="form-group">			  <label>2nd Mobile No</label>			  <input type="number" class="form-control" name="cus_mobile_two" placeholder="2nd Mobile No" value="">			</div>			</div>			<div class="col-md-8">			<div class="form-group">			  <label>Office No</label>			  <input type="number" class="form-control" name="cus_office_no" placeholder="Office No" value="">			</div>			</div>			<div class="col-md-8">			<div class="form-group">				<label for="exampleInputEmail1">Email address</label>				<input id="exampleInputEmail1" class="form-control" type="email" name="cus_email" placeholder="Enter email" value="">			</div>			</div>			<div class="col-md-8">			<div class="form-group">			  <label>Website</label>			  <input type="text" class="form-control" name="cus_website" placeholder="Website" value="">			</div>			</div>			<div class="col-md-8">			<div class="form-group">			  <label>Remark/Note</label>			  <textarea class="form-control" placeholder="Enter ..." rows="3" name="cus_note"></textarea>			</div>			</div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Detail of Program</label>
                  <textarea class="form-control" name="dofp"><?php if(isset($_GET['upid'])){echo $upfetch['dofp'];}?>
</textarea>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label>Instrument Alloted for Photos & Videos </label>
                  <textarea class="form-control" name="iafpv"><?php if(isset($_GET['upid'])){echo $upfetch['iafpv'];}?>
</textarea>
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
                        <th width="15%">Date</th>
                        <th width="15%">Start Time</th>
                        <th width="15%">End Time</th>
                        <th width="15%">Note</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset($_GET['upid'])){
					$uppquery = mysqli_query($con,"select * from order_details where o_id = '".$upfetch['id']."'");
					$i = 1;
					while($uppfetch = mysqli_fetch_array($uppquery))
					{
					?>
                      <tr>
                        <td><input class="case" type="checkbox"/></td>
                        <td><input type="text"  name="pv_title[]" id="title_<?php echo $i;?>" value="<?php echo $uppfetch['pv_title'];?>" class="form-control"></td>
                        <td><input type="text" class="form-control pv_date" id="pvdate_<?php echo $i;?>" value="<?php echo $uppfetch['pv_date'];?>" name="pv_date[]"></td>
                        <td><input type="text"  name="start_time[]" id="start_time_<?php echo $i;?>" value="<?php echo $uppfetch['start_time'];?>"  class="form-control"></td>
                        <td><input type="text"  name="end_time[]" id="end_time_<?php echo $i;?>" value="<?php echo $uppfetch['end_time'];?>" class="form-control"></td>
                        <td><textarea class="form-control" rows="1" name="pv_note[]" id="pv_note_<?php echo $i;?>"> <?php echo $uppfetch['pv_note'];?></textarea></td>
                      </tr>
                      <?php $i++;}}else{?>
                      <tr>
                        <td><input class="case" type="checkbox"/></td>
                        <td><input type="text"  name="pv_title[]" id="title_1" class="form-control"></td>
                        <td><input type="text" class="form-control pv_date" id="pvdate_1"  name="pv_date[]"></td>
                        <td><input type="text"  name="start_time[]" id="start_time_1" class="form-control"></td>
                     
                        <td><input type="text"  name="end_time[]" id="end_time_1" class="form-control"></td>
                        <td><textarea class="form-control" rows="1" name="pv_note[]" id="pv_note_1"> </textarea></td>
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
              <hr />
              <h4>
                <label>Videography</label>
              </h4>
              <hr />
              <div class='row'>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Videography Charge </label>
                    <input type="text" class="form-control" name="video_charge" value="<?php if(isset($_GET['upid'])){echo $upfetch['video_charge'];}?>">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>No. of hours</label>
                    <input type="text" class="form-control" name="casate_nang" value="<?php if(isset($_GET['upid'])){echo $upfetch['casate_nung'];}?>">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Editing Charge </label>
                    <input type="text" class="form-control" name="mixing_charge" value="<?php if(isset($_GET['upid'])){echo $upfetch['mixing_charge'];}?>">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Live Setup Charge </label>
                    <input type="text" class="form-control" name="l_shoot_c" value="<?php if(isset($_GET['upid'])){echo $upfetch['l_shoot_c'];}?>">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Note </label>
                    <textarea class="form-control" name="vs_note" ><?php if(isset($_GET['upid'])){echo $upfetch['vs_note'];}?>
</textarea>
                  </div>
                </div>
              </div>
              <hr />
              <h4>
                <label>Photography</label>
              </h4>
              <hr />
              <div class='row'>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Type Of Album </label>
                    <input type="text" class="form-control" name="photographer" value="<?php if(isset($_GET['upid'])){echo $upfetch['photographer'];}?>">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Size </label>
                      <input type="text" class="form-control" name="p_size" value="<?php if(isset($_GET['upid'])){echo $upfetch['p_size'];}?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rate </label>
                      <input type="text" class="form-control" name="p_size_rate" value="<?php if(isset($_GET['upid'])){echo $upfetch['p_size_rate'];}?>">
                    </div>
                  </div>
                </div>
                <!--<div class="col-md-8">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Digital </label>
                      <input type="text" class="form-control" name="p_digital" value="<?php if(isset($_GET['upid'])){echo $upfetch['p_digital'];}?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rate </label>
                      <input type="text" class="form-control" name="p_digital_rate" value="<?php if(isset($_GET['upid'])){echo $upfetch['p_digital_rate'];}?>">
                    </div>
                  </div>
                </div>-->
              </div>
              <!--<hr />
              <h4>
                <label>Karizma</label>
              </h4>
              <hr />-->
              <div class='row'>
               <!-- <div class="col-md-8">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Size </label>
                      <input type="text" class="form-control" name="k_size" value="<?php if(isset($_GET['upid'])){echo $upfetch['k_size'];}?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rate </label>
                      <input type="text" class="form-control" name="k_size_rate" value="<?php if(isset($_GET['upid'])){echo $upfetch['k_size_rate'];}?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Type Of Cover </label>
                    <input type="text" class="form-control" name="type_of_cover" value="<?php if(isset($_GET['upid'])){echo $upfetch['type_of_cover'];}?>">
                  </div>
                </div>-->
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Note </label>
                    <textarea class="form-control" name="k_note" ><?php if(isset($_GET['upid'])){echo $upfetch['k_note'];}?>
</textarea>
                  </div>
                </div>
              </div>
              <h2>&nbsp;</h2>
              <hr />
              <div class='row'>
                <div class="col-md-8">
                  <div class="form-group">
                    <label><b>Photography charge</b></label>
                    <input type="text" class="form-control changesNo" id="total_of_photography" name="t_of_p" value="<?php if(isset($_GET['upid'])){echo $upfetch['t_of_p'];}?>">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label><b>Photo editing charge</b></label>
                    <input type="text" class="form-control changesNo" id="total_of_photography_editing" name="t_of_p_ed" value="<?php if(isset($_GET['upid'])){echo $upfetch['t_of_p_ed'];}?>">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label><b>Videography charge</b></label>
                    <input type="text" class="form-control changesNo" id="total_of_videography" name="t_of_v" value="<?php if(isset($_GET['upid'])){echo $upfetch['t_of_v'];}?>">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label><b>Video editing charge</b></label>
                    <input type="text" class="form-control changesNo" id="total_of_videography_editing" name="t_of_v_ed" value="<?php if(isset($_GET['upid'])){echo $upfetch['t_of_v_ed'];}?>">
                  </div>
                </div>
              </div>
              <h2>&nbsp;</h2>
              <hr />
              <div class='row'>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Subtotal: &nbsp;</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                      <input type="text" class="form-control" name="sub_total" id="subTotal" value="<?php if(isset($_GET['upid'])){echo $upfetch['sub_total'];}?>"  placeholder="Subtotal" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Tax: &nbsp;</label>
                    <div class="input-group">
                      <div class="input-group-addon">%</div>
                      <input type="text" class="form-control" name="tax" id="tax" value="<?php if(isset($_GET['upid'])){echo $upfetch['tax'];}?>"  placeholder="Tax" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Tax Amount: &nbsp;</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="tax_amount" value="<?php if(isset($_GET['upid'])){echo $upfetch['tax_amount'];}?>"  id="taxAmount" placeholder="Tax" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                      <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Total: &nbsp;</label>
                    <div class="input-group">
                      <div class="input-group-addon"><i class="fa fa-inr"></i></div>
                      <input type="text" class="form-control" name="total" value="<?php if(isset($_GET['upid'])){echo $upfetch['total'];}?>"  id="totalAftertax" placeholder="Total" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                    </div>
                  </div>
                </div>
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
                      <input type="text" class="form-control amountDue" name="amonunt_due" value="<?php if(isset($_GET['upid'])){echo $upfetch['amount_due'];}?>"  id="amountDue" placeholder="Remaining" onKeyPress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
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
<script src="js/auto.js"></script>
