<?php include ("include/makeSession.php"); ?><?php include("include/header.php"); ?><?php include("include/sidebar.php"); ?>   	<!-- Content Wrapper. Contains page content -->      <div class="content-wrapper">        <!-- Content Header (Page header) -->        <section class="content-header">          <h1>            Dashboard            <small>Control Panel</small>          </h1>          <ol class="breadcrumb">            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>            <li class="active">Dashboard</li>          </ol>        </section>		<!-- Main content -->        <section class="content">          <!-- Small boxes (Stat box) -->          <div class="row">            <div class="col-lg-3 col-xs-6">              <!-- small box -->              <div class="small-box bg-aqua">                <div class="inner">                  <h3>Customers</h3>                  <p>View Customers</p>                </div>                <div class="icon">                  <i class="ion ion-bag"></i>                </div>                <a href="viewcustomer.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>              </div>            </div><!-- ./col -->            <div class="col-lg-3 col-xs-6">              <!-- small box -->              <div class="small-box bg-green">                <div class="inner">                  <h3>Orders</h3>                  <p>View Orders</p>                </div>                <div class="icon">                  <i class="ion ion-stats-bars"></i>                </div>                <a href="view-order-book.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>              </div>            </div><!-- ./col -->            <div class="col-lg-3 col-xs-6">              <!-- small box -->              <div class="small-box bg-yellow">                <div class="inner">                  <h3>Cameramans</h3>                  <p>View Cameramans</p>                </div>                <div class="icon">                  <i class="ion ion-person-add"></i>                </div>                <a href="viewcameraman.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>              </div>            </div><!-- ./col -->            <div class="col-lg-3 col-xs-6">              <!-- small box -->              <div class="small-box bg-red">                <div class="inner">                  <h3>Bills</h3>                  <p>View Billing</p>                </div>                <div class="icon">                  <i class="ion ion-pie-graph"></i>                </div>                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>              </div>            </div><!-- ./col -->          </div><!-- /.row -->         </section><!-- /.content -->      </div><!-- /.content-wrapper -->     <?php include('include/footer.php');?>