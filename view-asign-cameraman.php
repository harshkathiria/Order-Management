<?php
include ("include/makeSession.php"); 

include("include/header.php");
include("include/sidebar.php");
if(isset($_REQUEST['did']) && $_REQUEST['did']!=''){
	mysqli_query($con,"delete from asign_cameraman where id = '".$_REQUEST['did']."'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=view-asign-cameraman.php">';
	exit;
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> Asign CameraMan </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      
      <li class="active">View Asign CameraMan</li>
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
                  <th>Date</th>
                  <th>CameraMan</th>
                 
                  <th>Order</th>
                 
                  <th>Note</th>
                  
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php if(isset($_GET['vid'])){?>
              <?php
				  $result = mysqli_query($con,"select * from asign_cameraman where o_id = '".$_GET['vid']."'");
				 
			 	  while($row= mysqli_fetch_array($result)){
				?>
                <tr>
                  <td><?php echo $row['acm_date']; ?></td>
                  <?php $result1 = mysqli_query($con,"select * from cameraman where id = '".$row['cm_id']."'");$row1= mysqli_fetch_array($result1);?>
                  <td><?php echo $row1['name']; ?></td>
                   <?php $result2 = mysqli_query($con,"select * from `order` where id = '".$row['o_id']."'");$row2= mysqli_fetch_array($result2);
				   		 $result3 = mysqli_query($con,"select * from customer where id = '".$row2['cust_id']."'");$row3= mysqli_fetch_array($result3);
				   ?>
                  <td><?php echo $row2['o_date'].'-'.$row3['name']; ?></td>
                  
                  <td><?php echo $row['note']; ?></td>
                  
                 	
                   
				  <td><a id="viewbutton"  class="btn btn-block btn-info" href="asign-cameraman.php?upid=<?php echo $row['id']; ?>"><i  class="glyphicon glyphicon-edit"></i></a></td>
                  <td><a id="viewbutton" class="btn btn-block btn-danger" href="view-asign-cameraman.php?did=<?php echo $row['id']; ?>"><i  class="glyphicon glyphicon-trash"></i></a></td>
                </tr>
              <?php }}else{?>
              <?php
				  $result = mysqli_query($con,"select * from asign_cameraman");
				 
			 	  while($row= mysqli_fetch_array($result)){
				?>
                <tr>
                  <td><?php echo $row['acm_date']; ?></td>
                  <?php $result1 = mysqli_query($con,"select * from cameraman where id = '".$row['cm_id']."'");$row1= mysqli_fetch_array($result1);?>
                  <td><?php echo $row1['name']; ?></td>
                   <?php $result2 = mysqli_query($con,"select * from `order` where id = '".$row['o_id']."'");$row2= mysqli_fetch_array($result2);
				   		 $result3 = mysqli_query($con,"select * from customer where id = '".$row2['cust_id']."'");$row3= mysqli_fetch_array($result3);
				   ?>
                  <td><?php echo $row2['o_date'].'-'.$row3['name']; ?></td>
                  
                  <td><?php echo $row['note']; ?></td>
                  
                 	
                   
				  <td><a id="viewbutton"  class="btn btn-block btn-info" href="asign-cameraman.php?upid=<?php echo $row['id']; ?>"><i  class="glyphicon glyphicon-edit"></i></a></td>
                  <td><a id="viewbutton" class="btn btn-block btn-danger" href="view-asign-cameraman.php?did=<?php echo $row['id']; ?>"><i  class="glyphicon glyphicon-trash"></i></a></td>
                </tr>
                <?php  }} ?>
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