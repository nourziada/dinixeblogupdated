<?php
	
	include "header.php";

?>

	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
				<a href="index.php">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
			<li><a href="">Manage Admins</a></li>
	</ul>


	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-plus"></i><span class="break"></span>Add New Admin</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label">Username: </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Password: </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Confirm Password: </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" >
							  </div>
							</div>


							
							<button type="submit" class="btn btn-primary" style="width: 100%;">Add Admin</button>
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
							<tr>
								<td>1</td>
								<td class="center">22/07/2017</td>
								<td class="center">Nour Ziada</td>
								<td class="center">Nour Ziada</td>



								<td class="center">
									
									<a class="btn btn-danger" href="#">
										<i class="icon-trash"> </i> <span> Delete</span> 
									</a>
								</td>
							</tr>

							<tr>
								<td>1</td>
								<td class="center">22/07/2017</td>
								<td class="center">Nour Ziada</td>
								<td class="center">Nour Ziada</td>



								<td class="center">
									
									<a class="btn btn-danger" href="#">
										<i class="icon-trash"> </i> <span> Delete</span> 
									</a>
								</td>
							</tr>


							<tr>
								<td>1</td>
								<td class="center">22/07/2017</td>
								<td class="center">Nour Ziada</td>
								<td class="center">Nour Ziada</td>



								<td class="center">
									
									<a class="btn btn-danger" href="#">
										<i class="icon-trash"> </i> <span> Delete</span> 
									</a>
								</td>
							</tr>

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

<?php 


	include "footer.php";

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