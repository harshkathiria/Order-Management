   <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/avatar5.png" class="img-circle" alt="User Image" style="">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['username']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="dashbord.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>            <li class="treeview">
              <a href="#"><i class="fa fa-tags"></i>
                <span>Customer</span>
               <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="customer.php"><i class="fa fa-circle-o"></i> Add Customer</a></li>
                <li><a href="viewcustomer.php"><i class="fa fa-circle-o"></i> View Customer</a></li>				</ul>
            </li>
           
            <li class="treeview">
              <a href="order-book.php">
                <i class="fa fa-dashboard"></i> <span>Order Book</span></i>
              </a>
            </li>
            <li class="treeview">
             <a href="view-order-book.php">
                <i class="fa fa-dashboard"></i> <span>View Order Book</span></i>
              </a>
            </li>

             <li class="treeview">
              <a href="#"><i class="fa fa-tags"></i>
                <span>Cameraman</span>
               <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="cameraman.php"><i class="fa fa-circle-o"></i> Add Cameraman</a></li>
                <li><a href="viewcameraman.php"><i class="fa fa-circle-o"></i> View Cameraman</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#"><i class="fa fa-tags"></i>
                <span>Assign Cameraman</span>
               <i class="fa fa-angle-left pull-right"></i>
				</a>
              <ul class="treeview-menu">
                <li><a href="asign-cameraman.php"><i class="fa fa-circle-o"></i>Assign Cameraman</a></li>
                <li><a href="view-asign-cameraman.php"><i class="fa fa-circle-o"></i> View Assigned Cameraman</a></li>
               
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-tags"></i>
                <span>Booking Cameraman</span>
               <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="booking-cameraman.php"><i class="fa fa-circle-o"></i>Booking Cameraman</a></li>
                <li><a href="view-booking-cameraman.php"><i class="fa fa-circle-o"></i> View Booked Cameraman</a></li>
               
              </ul>
            </li>
           
   

            <li class="treeview">
              <a href="billing-form.php">
                <i class="fa fa-dashboard"></i> <span>Billing</span></i>
              </a>
            </li>
            <li class="treeview">
             <a href="view-billing-form.php">
                <i class="fa fa-dashboard"></i> <span>View Billing</span></i>
              </a>
            </li>

			
             <li class="treeview">              <a href="quick_booking.php">                <i class="glyphicon glyphicon-shopping-cart"></i> <span>Quick Book</span></i>              </a>            </li>

			
			 
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>