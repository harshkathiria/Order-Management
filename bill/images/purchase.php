<?php

include ("include/makeSession.php");

 ?>

<?php include("include/header.php"); ?>

<?php include("include/sidebar.php"); ?>  

<?php  if(isset($_REQUEST['did']) && $_REQUEST['did']!=''){

	$dovalue="delpurchase";

	$doid=$_REQUEST['did'];

	attends_mysql_query("delete from purchase where id='$doid'");

	

	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=purchase.php">';

	exit;

}?>           

      

            <!-- Right side column. Contains the navbar and content of the page -->

            <aside class="right-side">

                <!-- Content Header (Page header) -->

                <section class="content-header">

                    <h1>PURCHASING BILL</h1>

                    <ol class="breadcrumb">

                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

                       

                        <li class="active">purchase</li>

                    </ol>

              </section>



                <!-- Main content -->

                <section class="content">

                    <div class="row">

                        <div class="col-xs-12">

                            <div class="box">

                                <div class="box-header">

                                   

                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>

                                            <tr>

                                            	<th>Bill No</th>

                                                <th>Date</th>

                                               

                                                <th>Party Name</th>

                                             

                                                <th>Vat</th>

                                                <th>Grand Total</th>
<th>Invoice</th>
                                               <th>View</th>

                                                <th>Edit</th>

                                                <th>Delete</th>

                                            </tr>

                                        </thead>
<tbody>
                                        <?php

										  $user = attends_mysql_query("select * from purchase");

										

										  while($user_fetch= attends_fetch_array($user)){

										?>

                                        

                                            <tr>

                                               

	                                            <td><?php echo $user_fetch['bill_no']; ?></td>

                                                   <td><?php echo $user_fetch['p_date']; ?></td>

                                                 <?php

												  $comp = attends_mysql_query("select * from party_entry where id = ". $user_fetch['party_name']);

												  $compny= attends_fetch_array($comp);?>

    	                                     

            	                                <td><?php echo $compny['contact_person'] ; ?></td>

                                               

                                                  <td><?php echo $user_fetch['vat']." %"; ?></td>

        	                                    <td><?php echo $user_fetch['net_total']; ?></td>

                                                <td><a target="_blank" id="viewbutton"  style="width:50px" class="btn btn-block btn-primary" href="bill/buy-invoice.php?vid=<?php echo $user_fetch['id']; ?>"><i  class="glyphicon glyphicon-print"></i></a></td>
												<td><a id="viewbutton"  class="btn btn-block btn-success" href="purchase-details.php?vid=<?php echo $user_fetch['id']; ?>"><i  class="glyphicon glyphicon-eye-open"></i></a></td>

                                                 <td><a id="viewbutton" style="width:80px"   class="btn btn-block btn-info" href="add-purchase.php?upid=<?php  echo $user_fetch['id'];?>"><i  class="glyphicon glyphicon-edit"></i></a></td>

                                                 <td><a id="viewbutton"  style="width:80px" class="btn btn-block btn-danger" href="purchase.php?did=<?php  echo $user_fetch['id'];?>"><i  class="glyphicon glyphicon-trash"></i></a></td>

                                            </tr>

                                        

                                        <?php }?>

                                        </tbody>

                                    </table>

                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                        </div>

                    </div>



                </section><!-- /.content -->

            </aside><!-- /.right-side -->

             <!-- DATA TABES SCRIPT -->



 <?php include('include/footer.php');?>     

 <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>

<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script> 

  <script type="text/javascript">

            $(function() {

                $("#example1").dataTable();

               
            });

        </script>