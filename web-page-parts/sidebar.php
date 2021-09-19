<?php
	include("filter.php");
    //session_start();
?>	

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		  <!-- Sidebar - Brand -->
		  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./index.php">
			<div class="sidebar-brand-icon">
			  <img src="./assets/img/greatlandlogo.jpg" width="50px"/>
			</div>
			<div class="sidebar-brand-text mx-3">GREATLAND SCHOOL OF SAN PEDRO</div>
		  </a>

		  <!-- Divider -->
		  <hr class="sidebar-divider my-0">

		  <!-- Nav Item - Dashboard -->
		  <li class="nav-item active">
			<a class="nav-link" href="./dash.php">
			  <i class="fas fa-fw fa-tachometer-alt"></i>
			  <span>Home</span></a>
		  </li>

		  <!-- Divider -->
		  <hr class="sidebar-divider">

		  <!-- Heading -->
		  <div class="sidebar-heading">
			Management Modules
		  </div>


		  <!-- Nav Item - Utilities Collapse Menu -->
		  <li class="nav-item">
			<a class="nav-link collapsed" href="./404.php" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			  <i class="fas fa-fw fa-clipboard"></i>
			  <span>Student Files</span>
			</a>
			<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			  <div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Management</h6>
				
				
				<?php
				
				//include ('preenrollment.php');
				// admins -- Pre-enrollment Files
				?>
				
				<?php
				
				include ('studentclearanceserverz.php');
				// admins -- Student Management
				?>
				
				<?php

				include ('clearanceserverz.php');
				// New Student Record
				?>
											
				<?php 
				echo '<a class="collapse-item" href="editmasterlist.php">Delete Student Records</a>'; 
				// delete student records
				?>
				

				<!-- <a class="collapse-item" href="clearanceactivation.php">Clearance Activation</a> -->
				
				<div class="collapse-divider"></div>
				<!--<h6 class="collapse-header">Reports:</h6>-->
				<!--<a class="collapse-item" href="./404.php">Clearance Copy</a>-->
				
				<?php

				include ('studentupload.php');
				//students
				?>
				
				<?php

				include ('folderattachment.php');
				//students
				?>
			
				<?php

				//include ('clearancecopyserver.php');
				//students
				?>

			  </div>
			</div>
		  </li>
		  <!-- Nav Item - Pages Collapse Menu -->
		  <li class="nav-item">
			<a class="nav-link collapsed" href="./404.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			  <i class="fas fa-fw fa-landmark"></i>
			  <span>Library Files</span>
			</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			  <div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Information</h6>
				
				<?php
				//panel 2 (admins) -- Students information
				//include ('grademonitoringserver3.php');
		
				?>
							
				<?php
				//panel 2 (admins) -- Students balance
				include ('studentaccounts2.php');
				?>
				

			  </div>
			</div>
		  </li>

		 

		 

		  <!-- Divider -->
		  <hr class="sidebar-divider d-none d-md-block">

		  <!-- Sidebar Toggler (Sidebar) -->
		  <div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		  </div>

		</ul>
		<!-- End of Sidebar -->