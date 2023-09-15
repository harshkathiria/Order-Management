<?php
include ("include/makeSession.php"); 

include("include/header.php");
include("include/sidebar.php");
if(isset($_REQUEST['did']) && $_REQUEST['did']!=''){
	mysqli_query($con,"delete from cameraman where id = '".$_REQUEST['did']."'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=viewcameraman.php">';
	exit;
}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1> CameraMan  </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      
      <li class="active">View CameraMan </li>
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
                  <th>cameraman Name</th>
                  <th>Address</th>
                 
                  <th>Mobile</th>
                 
                  <th>Office No</th>
                  <th>Email</th>
                
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php
				  $result = mysqli_query($con,"select * from cameraman");
				 
			 	  while($row= mysqli_fetch_array($result)){
				?>
                <tr>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['address'].' ,<br> '.$row['city'].' ,<br> '.$row['state']; ?></td>
                  
                  <td><?php echo $row['mobile']; ?></td>
                  
                  <td><?php echo $row['office_no']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                 	
                   
				  <td><a id="viewbutton"  class="btn btn-block btn-info" href="cameraman.php?upid=<?php echo $row['id']; ?>"><i  class="glyphicon glyphicon-edit"></i></a></td>
                  <td><a id="viewbutton" class="btn btn-block btn-danger" href="viewcameraman.php?did=<?php echo $row['id']; ?>"><i  class="glyphicon glyphicon-trash"></i></a></td>
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