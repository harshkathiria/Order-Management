<?php 
include ("include/makeSession.php"); 
include("include/header.php"); 
include("include/sidebar.php"); ?>          
 <?php
   if(isset($_REQUEST['upid']) && $_REQUEST['upid']!=''){
	  $dovalue="editcustomer";
	  $doid=$_REQUEST['upid'];
	  $upuserresult=mysqli_query($con,"select * from customer where id='".$_REQUEST['upid']."'");
	  $upuserarr=mysqli_fetch_array($upuserresult);
  }else{
 	  $dovalue="addcustomer";
	  $doid='';
	  }
?>     
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>customer</h1>
                    <ol class="breadcrumb">
                       
                       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">customer</li>
                    </ol>
              </section>

                <!-- Main content -->
                <section class="content">
					<div class='row'>
                        <div class='col-md-8'>
                            <div class='box box-info'>
                                <div class='box-header'>
                                    <h3 class='box-title'></h3>
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
                                          <label>Customer Name </label>
                                          <input type="text" class="form-control" name="name" placeholder="Customer Name" required value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['name'];}?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Address</label>
                                          <textarea class="form-control" placeholder="Enter ..." rows="3" name="address"><?php if(isset($_REQUEST['upid'])){ echo $upuserarr['address'];}?></textarea>
                                        </div>
                                        <div class="form-group">
                                          <label>City</label>
                                          <input type="text" class="form-control" name="city" placeholder="City" value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['city'];}?>">
                                        </div>
                                         <div class="form-group">
                                          <label>State</label>
                                          <input type="text" class="form-control" name="state" placeholder="State" value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['state'];}?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Moblie No</label>
                                          <input type="number" class="form-control" name="mobile" placeholder="Mobile No" value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['mobile'];}?>">
                                        </div>
                                      

                                       <div class="form-group">
                                          <label>2nd Mobile No</label>
                                          <input type="number" class="form-control" name="mobile_two" placeholder="2nd Mobile No" value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['mobile_two'];}?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Office No</label>
                                          <input type="number" class="form-control" name="office_no" placeholder="Office No" value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['office_no'];}?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input id="exampleInputEmail1" class="form-control" type="email" name="email" placeholder="Enter email" value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['email'];}?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Website</label>
                                          <input type="text" class="form-control" name="website" placeholder="Website" value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['website'];}?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Remark/Note</label>
                                          <textarea class="form-control" placeholder="Enter ..." rows="3" name="note"><?php if(isset($_REQUEST['upid'])){ echo $upuserarr['note'];}?></textarea>
                                        </div>
                                        
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
