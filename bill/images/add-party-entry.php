
<?php 
include ("include/makeSession.php"); 
include("include/header.php"); 
include("include/sidebar.php"); ?>          
 <?php
   if(isset($_REQUEST['upid']) && $_REQUEST['upid']!=''){
	  $dovalue="editparty";
	  $doid=$_REQUEST['upid'];
	  $upuserresult=attends_mysql_query("select * from party_entry where id='".$_REQUEST['upid']."'");
	  $upuserarr=attends_fetch_array($upuserresult);
  }else{
 	  $dovalue="addparty";
	  $doid='';
	  }
?>     
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Party Entry Form</h1>
                    <ol class="breadcrumb">
                       
                       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Party Entry Form</li>
                    </ol>
              </section>

                <!-- Main content -->
                <section class="content">
					<div class='row'>
                        <div class='col-md-8'>
                            <div class='box box-info'>
                                <div class='box-header'>
                                  
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
                                          <label>Company Name</label>
                                          <input type="text" class="form-control" name="company_name" placeholder="Company Name" required value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['company_name'];}?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Contact Person</label>
                                          <input type="text" class="form-control" name="contact_person" placeholder="Contact Person" required value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['contact_person'];}?>">
                                        </div>
                                         <div class="form-group">
                                          <label>Address</label>
                                          <textarea class="form-control" placeholder="Enter ..." rows="3" name="address"><?php if(isset($_REQUEST['upid'])){ echo $upuserarr['address'];}?></textarea>
                                        </div>
                                         <div class="form-group">
                                          <label>City</label>
                                          <input type="text" class="form-control" name="city" placeholder="City" required value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['city'];}?>">
                                        </div>
                                         <div class="form-group">
                                          <label>State</label>
                                          <input type="text" class="form-control" name="state" placeholder="State" required value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['state'];}?>">
                                        </div>
                                        
                                        <div class="form-group">
                                          <label>Mobile No.</label>
                                          <input type="number" class="form-control" name="mobile_num" placeholder="Mobile No" required value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['mobile_num'];}?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Office No.</label>
                                          <input type="number" class="form-control" name="office_no" placeholder="Office No" required value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['office_no'];}?>">
                                        </div>
                                         <div class="form-group">
                                         <label for="exampleInputEmail1">Email Id</label>
                                          <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email Id" required value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['email'];}?>">
                                        </div>
                                        <div class="form-group">
                                          <label>Website</label>
                                          <input type="text" class="form-control" name="website" placeholder="Website" required value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['website'];}?>">
                                        </div>
                                      
                                       

                                       <div class="form-group">
                                          <label>Remark</label>
                                          <input type="text" class="form-control" name="remark" placeholder="Remark" required value="<?php if(isset($_REQUEST['upid'])){ echo $upuserarr['remark'];}?>">
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
  <!-- InputMask -->
<script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>    
<script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
               
            });
        </script>
        