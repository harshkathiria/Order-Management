<?php include ("include/makeSession.php"); 
include("include/header.php");
include("include/sidebar.php");
if(isset($_REQUEST['did']) && $_REQUEST['did']!=''){
	mysqli_query($con,"delete from `billing` where id = '".$_GET['did']."'");
	mysqli_query($con,"delete from `billing_details` where o_id = '".$_GET['did']."'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=view-billing-form.php">';
	exit;
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Order Book  </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View Billing Form </li>



    </ol>



  </section>



  <!-- Main content -->



  <section class="content">



    <div class="row">



      <div class="col-xs-12">



        <div class="box">



          <div class="box-header">



            



          </div><!-- /.box-header -->



          <div class="box-body">



            <table id="example1" class="table table-bordered table-striped">



              <thead>



                <tr>

				<th>No</th>

                  <th>Date</th>

                  <th>Order</th>

                  <th>SubTotal</th>

				  <th>PrePending</th>

				  <th>Advance</th>

				  <th>Remaining</th>

                 

                  <th>Invoice</th>

                  <th>Edit</th>

                  <th>Delete</th>

                </tr>

              </thead>

              <tbody>

              <?php

$i = 1;

				  $result = mysqli_query($con,"select * from `billing`");

   		 	  while($row= mysqli_fetch_array($result)){

				?>



                <tr>



                  <td><?php echo $i; ?></td>

				  <td><?php echo $row['b_date']; ?></td>



                  <td><?php $resultq = mysqli_query($con,"select * from `order` where id = '".$row['o_id']."'");$rowq= mysqli_fetch_array($resultq);



				  $resultc = mysqli_query($con,"select * from `customer` where id = '".$rowq['cust_id']."'");$rowc= mysqli_fetch_array($resultc);



				  echo $rowq['o_date'].'-'.$rowc['name'];?></td>



                  



                  <td><?php echo $row['sub_total']; ?></td>

				  <td><?php echo $row['prepending']; ?></td>

				  <td><?php echo $row['amount_paid']; ?></td>

				  <td><?php echo $row['amonunt_due']; ?></td>

            

				  <td><a id="viewbutton"  class="btn btn-block btn-success" href="bill/buy-invoice.php?upid=<?php echo $row['id']; ?>" target="_blank"><i  class="glyphicon glyphicon-eye-open"></i></a></td>

                  <td><a id="viewbutton"  class="btn btn-block btn-info" href="billing-form.php?upid=<?php echo $row['id']; ?>"><i  class="glyphicon glyphicon-edit"></i></a></td>



                  <td><a id="viewbutton" class="btn btn-block btn-danger" href="view-billing-form.php?did=<?php echo $row['id']; ?>"><i  class="glyphicon glyphicon-trash"></i></a></td>



                </tr>



                <?php $i++; } ?>



              </tbody>



            </table>



          </div><!-- /.box-body -->



        </div><!-- /.box -->



      </div><!-- /.col -->



    </div><!-- /.row -->



  </section><!-- /.content -->



</div><!-- /.content-wrapper -->



<!-- footer start -->



<?php



include('include/footer.php');



?>



<!-- footer end -->



<!-- DataTables -->



<script src="plugins/datatables/jquery.dataTables.min.js"  type="text/javascript"></script>



<script src="plugins/datatables/dataTables.bootstrap.min.js"  type="text/javascript"></script>



<script  type="text/javascript">



	$(function () {



	$("#example1").DataTable();



	$('#example2').DataTable({



		"paging": true,



		"lengthChange": false,



		"searching": false,



		"ordering": true,



		"info": true,



		"autoWidth": false



	});



	});



</script>