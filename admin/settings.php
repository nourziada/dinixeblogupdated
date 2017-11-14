<?php
	include 'header.php';

	if(isset($_SESSION['username'])) {


	$ObjectPublic = new PublicFunction;




	if(isset($_POST['btnchange'])) {
		$oldpassword 	= $_POST['oldPassword'];
		$newPassword 	= $_POST['newPassword'];
		$rNewPassword 	= $_POST['rNewPassword'];

		// get the Admin Old Password
		$adminData = new Admins;
		$adminOldPassword = $adminData->getAdminPassword($_SESSION['username']);

		// if there is A problem to get the admin Old Password
		if($adminOldPassword == 0) {
			$ObjectPublic->Redirect_to("404.php");
		}


		if (empty($oldpassword) || empty($newPassword) || empty($rNewPassword)){
			$error = "Error ! All Fileds Required";
		}else if ($newPassword !== $rNewPassword) {
			$error = "Error ! The New Passowrd and Confirm it Must be Matches";
		}else if (strlen($newPassword) < 4) {
			$error = "Error ! The new Password is Too Small";
		}else if (md5($oldpassword) !== $adminOldPassword['password']) {
			$error = "Error ! The Old Password Does not Matchs with the Corect Password on DataBase";
		}else {

			$adminData->changePassword($_SESSION['username'],md5($newPassword));
			$success = "Done :) Password Updated Successfuly";
		}
	}

?>


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="">Dashboard</a></li>
			</ul>

			<?php

            if(isset($error)) {

          ?>
          <div class="container" style="margin-top:10px">
            <div class="alert alert-danger" role="alert"> 
              <strong><?php echo $error; ?></strong>
            </div>
          </div>  

          <?php
            }//end if of isset the error to print
          ?> 


          <?php

            if(isset($success)) {

          ?>
          <div class="container" style="margin-top:10px">
            <div class="alert alert-success" role="alert"> 
              <strong><?php echo $success; ?></strong>
            </div>
          </div>  

          <?php
            }//end if of isset the success to print
          ?> 


			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-plus"></i><span class="break"></span>Change Passowrd</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="settings.php" method="POST">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label">Old Password: </label>
							  <div class="controls">
								<input type="text" name="oldPassword" class="span6 typeahead" id="typeahead" >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">New Password: </label>
							  <div class="controls">
								<input type="text" name="newPassword" class="span6 typeahead" id="typeahead" >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Confirm Password: </label>
							  <div class="controls">
								<input type="text" name="rNewPassword" class="span6 typeahead" id="typeahead" >
							  </div>
							</div>


							
							<button type="submit" name="btnchange"  class="btn btn-primary" style="width: 100%;">Change Password</button>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->		


<?php


	include 'footer.php';

	}else {
		header("Location :login.php");
	}


?>