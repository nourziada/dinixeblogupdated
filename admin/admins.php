<?php
	
	include "header.php";

	if(isset($_SESSION['username'])) {

		// Identify the Class 
		$ObjectPublic = new PublicFunction;
		$ObjectAdmins = new Admins;


		// Code for Add new Admin
		if(isset($_POST['btnSubmit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$rpassword = $_POST['rpassword'];

			if(empty($username) || empty($password) || empty($rpassword)) {
				$_SESSION['ErrorMassage'] = "Error ! All Fileds is Requireds";
				$ObjectPublic->Redirect_to("admins.php");
			}else if (strlen($username) < 4 || strlen($username) > 100) {
				$_SESSION['ErrorMassage'] = "Error ! username is Too Short OR Too Long";
				$ObjectPublic->Redirect_to("admins.php");
			}else if ($password !== $rpassword) {
				$_SESSION['ErrorMassage'] = "Error ! password and return password does not Matches";
				$ObjectPublic->Redirect_to("admins.php");
			}else if (strlen($password) < 4) {
				$_SESSION['ErrorMassage'] = "Error ! password is Too Short";
				$ObjectPublic->Redirect_to("admins.php");
			}else {
				$ObjectAdmins->addAdmin(time() , $username,md5($password) , $_SESSION['username']);
				$_SESSION['SuccessMassage'] = "Done ! Admin Add Successfuly";
				$ObjectPublic->Redirect_to("admins.php");
			}

		}

		// code for delete Admins

		/* Code for Delete Post */
  		if(isset($_GET['delete'])) {
		$adminID = intval($_GET['delete']);

		$ObjectAdmins->deleteAdmin($adminID);
		$_SESSION['SuccessMassage'] = "Done ! Admin Deleted Successfuly";
		$ObjectPublic->Redirect_to("admins.php");

	}



?>

	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
				<a href="index.php">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
			<li><a href="">Manage Admins</a></li>
	</ul>

	<?php
		echo errorMassage(); 
		echo successMassage(); 
	?>


	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-plus"></i><span class="break"></span>Add New Admin</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="admins.php" method="POST">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label">Username: </label>
							  <div class="controls">
								<input type="text" name="username" class="span6 typeahead" id="typeahead" >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Password: </label>
							  <div class="controls">
								<input type="text" name="password" class="span6 typeahead" id="typeahead" >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Confirm Password: </label>
							  <div class="controls">
								<input type="text" name="rpassword" class="span6 typeahead" id="typeahead" >
							  </div>
							</div>


							
							<button type="submit" name="btnSubmit" class="btn btn-primary" style="width: 100%;">Add Admin</button>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



			<!-- Table -->

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-user"></i><span class="break"></span>Admins</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th>No</th>
								  <th>Date</th>
								  <th>Admin Name</th>
								  <th>Add By</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>

						  	<?php 
						  		// Code for get Admin Data
						  		$adminData = $ObjectAdmins->getAdmins();
						  		if($adminData == 0) {
						  			echo "No Data Avalibale :(";
						  		}else {
						  			$no = 1;
						  			foreach($adminData as $data){




						  	?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td class="center"><?php echo date("Y-m-d" , $data['date']); ?></td>
								<td class="center"><?php echo $data['username']; ?></td>
								<td class="center"><?php echo $data['addby']; ?></td>



								<td class="center">
									
									<a class="btn btn-danger" href="admins.php?delete=<?php echo $data['id']; ?>">
										<i class="icon-trash"> </i> <span> Delete</span> 
									</a>
								</td>
							</tr>

							<?php

								}// end of foreach
								}//end of ifelse

							?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

<?php 


	include "footer.php";

	}else {
		header("Location :login.php");
	}

?>

	<script>
		$(document).ready(function(){


			$(".nav.nav-tabs.nav-stacked.main-menu li:first").removeClass('active');  
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(1)").removeClass('active');  
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(2)").removeClass('active');
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(3)").addClass('active');
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(4)").removeClass('active');
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(5)").removeClass('active');

		    


		});

	</script>	