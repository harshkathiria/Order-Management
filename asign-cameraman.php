<?php 
include ("include/makeSession.php"); 
include("include/header.php"); 
include("include/sidebar.php"); ?>          
 <?php
   if(isset($_REQUEST['upid']) && $_REQUEST['upid']!=''){
	  $dovalue="editasigncameraman";
	  $doid=$_REQUEST['upid'];
	  $upuserresult=mysqli_query($con,"select * from asign_cameraman where id='".$_REQUEST['upid']."'");
	  $upfetch=mysqli_fetch_array($upuserresult);
  }else{
 	  $dovalue="addasigncameraman";
	  $doid='';
	  }
?>     
<link href="css/datepicker.css" rel="stylesheet">

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Asign CameraMan </h1>
                    <ol class="breadcrumb">
                       
                       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Asign CameraMan </li>
                    </ol>
              </section>

                <!-- Main content -->
                <section class="content">
					<div class='row'>
                        <div class='col-md-8'>
                            <div class='box box-info'>
                                <div class='box-header'>
                                    
                                     <?php if(isset($_GET['error1'])){ echo "<h3 class='box-title'>Cameraman Is Already Asign this date</h3>";}?>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-info btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                </div><!-- /.box-header -->
                               	
                                <div class="box-body pad">
                                     
                                    <form method="post"  class="" enctype="multipart/form-data" action="action.php"  role="form">
                                     
                                       <input type="hidden"  name="do" value="<?php echo $dovalue;?>" />
               						   <input type="hidden"  name="doid" value="<?php echo $doid;?>" />
                                        <!-- text input -->
                                         
                                        <div class="form-group">
                                          <label>Date</label>
                                          <input type="text" class="form-control" name="acm_date" value="<?php if(isset($_GET['upid'])){echo $upfetch['acm_date'];}?>" id="invoiceDate" placeholder="Order Date">
                                        </div>
                                        <div class="form-group">
                                          <label>Select cameraman</label>
                                          <select class="form-control" required name="cm_id">
                                            <option value="" >Select</option>
                                            <?php 
                                              $query = mysqli_query($con,"select * from cameraman");
                                                while($rows = mysqli_fetch_array($query)){
                                                    if(isset($_GET['upid'])){?>
                                            <option value="<?php echo $rows['id'];?>" <?php if($upfetch['cm_id'] == $rows['id']){ echo 'Selected="selected"';}?>><?php echo $rows['name'];?></option>
                                            <?php }
                                                    else{
                                                    echo '<option value="'.$rows['id'].'">'.$rows['name'].'</option>';
                                                    }
                                                }
                                               ?>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label>Select Order</label>
                                          <select class="form-control" required name="o_id">
                                            <option value="" >Select</option>
                                            <?php 
                                              $query = mysqli_query($con,"select * from `order` ");
                                                while($rows = mysqli_fetch_array($query)){
												$query1 = mysqli_query($con,"select * from customer where id = '".$rows['cust_id']."'");
												$rows1 = mysqli_fetch_array($query1);
                                                    if(isset($_GET['upid'])){?>
                                            <option value="<?php echo $rows['id'];?>" <?php if($upfetch['cm_id'] == $rows['id']){ echo 'Selected="selected"';}?>><?php echo $rows['o_date'].'-'.$rows1['name'];?></option>
                                            <?php }
                                                    else{
                                                    echo '<option value="'.$rows['id'].'">'.$rows['o_date'].'-'.$rows1['name'].'</option>';
                                                    }
                                                }
                                               ?>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label>Note</label>
                                          <textarea class="form-control" placeholder="Enter ..." rows="3" name="note"><?php if(isset($_REQUEST['upid'])){ echo $upfetch['note'];}?></textarea>
                                        </div>
                                       <?php /*?>  <?php
										 
										  if(isset($_GET['upid'])){?>
                                        <div class="form-group">
                                          <label>Status</label>
                                          <select class="form-control" required name="status">
                                            
                                            
                                            <option value="0" <?php if($upfetch['status'] == '0'){ echo 'Selected="selected"';}?>>Active</option>
                                            <option value="1" <?php if($upfetch['status'] == '1'){ echo 'Selected="selected"';}?>>Complate</option>
                                            
                                          </select>
										  </div>
                                          <?php }?><?php */?>
                                        
                                        
                                        <div class="box-footer">
                                          <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                                        </div>
                                       
                                      </form>
                                      
                                      
                                </div>
                             
                            </div><!-- /.box -->

                            
                        </div><!-- /.col-->
                    </div><!-- ./row -->
				</section><!-- /.content -->
            </aside><!-- /.right-side -->
             <!-- DATA TABES SCRIPT -->

 <?php include('include/footer.php');?> 
 <script src="js/bootstrap-datepicker.js"></script>
<script>
$(function () {
$('#invoiceDate').datepicker({
format: "dd/mm/yyyy"
});
});
</script>
