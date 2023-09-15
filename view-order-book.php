<?php

include ("include/makeSession.php"); 



include("include/header.php");

include("include/sidebar.php");

if(isset($_REQUEST['did']) && $_REQUEST['did']!=''){

	mysqli_query($con,"delete from `order` where id = '".$_GET['did']."'");

	mysqli_query($con,"delete from `order_details` where o_id = '".$_GET['did']."'");

	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=view-order-book.php">';

	exit;

}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1> Order Book  </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      

      <li class="active">View Order Book </li>

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

                  <th>Order Date</th>

                  <th>Customer</th>

                 

                  <th>Details Of Program</th>

                 

                  <th>SubTotal</th>

                

                

                  <th>View/Edit</th>

                  <th>Delete</th>

                </tr>

              </thead>

              <tbody>

              <?php

				  $result = mysqli_query($con,"select * from `order`");

				 

			 	  while($row= mysqli_fetch_array($result)){

				?>

                <tr>

                  <td><?php echo $row['o_date']; ?></td>

                  <td><?php $resultq = mysqli_query($con,"select * from customer where id = '".$row['cust_id']."'");$rowq= mysqli_fetch_array($resultq);echo $rowq['name'];?></td>

                  

                  <td><?php echo $row['dofp']; ?></td>

                  

                  <td><?php echo $row['total']; ?></td>

                 

                 	

                  

				  <td><a id="viewbutton"  class="btn btn-block btn-info" href="order-book.php?upid=<?php echo $row['id']; ?>"><i  class="glyphicon glyphicon-edit"></i></a></td>

                  <td><a id="viewbutton" class="btn btn-block btn-danger" href="view-order-book.php?did=<?php echo $row['id']; ?>"><i  class="glyphicon glyphicon-trash"></i></a></td>

                </tr>

                <?php  } ?>

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