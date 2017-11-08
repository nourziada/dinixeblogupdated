<?php

	include "header.php";

?>

	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
				<a href="index.php">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
			<li><a href="">Comments</a></li>
	</ul>


			<!-- Table of Un Approved Posts -->

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-list"></i><span class="break"></span>Un - Approved Comments</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th>No</th>
								  <th>Name</th>
								  <th>Date</th>
								  <th>Comment</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td>1</td>
								<td class="center">Nour Ziada</td>
								<td class="center">22/07/2017</td>
								<td class="center" style="width: 590px;">here is the first comment of the website blog </td>
								<td>

									<a class="btn btn-success" href="#">
										Approve
									</a>

									<a class="btn btn-danger" href="#">
										Delete
									</a>

									<a class="btn btn-info" href="#">
										<i class="icon-zoom-in"></i>  
									</a>
									
									

									

								</td>


							</tr>

							<tr>
								<td>1</td>
								<td class="center">Nour Ziada</td>
								<td class="center">22/07/2017</td>
								<td class="center" style="width: 590px;">here is the first comment of the website blog </td>
								<td>

									<a class="btn btn-success" href="#">
										Approve
									</a>

									<a class="btn btn-danger" href="#">
										Delete
									</a>

									<a class="btn btn-info" href="#">
										<i class="icon-zoom-in"></i>  
									</a>
									
									

									

								</td>


							</tr>


							<tr>
								<td>1</td>
								<td class="center">Nour Ziada</td>
								<td class="center">22/07/2017</td>
								<td class="center" style="width: 590px;">here is the first comment of the website blog </td>
								<td>

									<a class="btn btn-success" href="#">
										Approve
									</a>

									<a class="btn btn-danger" href="#">
										Delete
									</a>

									<a class="btn btn-info" href="#">
										<i class="icon-zoom-in"></i>  
									</a>
									
									

									

								</td>


							</tr>

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->	


			<!-- Table of Approved Posts -->

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-list"></i><span class="break"></span>Approved Comments</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th>No</th>
								  <th>Name</th>
								  <th>Date</th>
								  <th>Comment</th>
								  <th>Approved By</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td>1</td>
								<td class="center">Nour Ziada</td>
								<td class="center">22/07/2017</td>
								<td class="center" style="width:470px;">here is the first comment of the website blog </td>
								<td class="center">Nour Ziada</td>
								<td>

									<a class="btn btn-warning" href="#">
										Dis - Approve
									</a>

									<a class="btn btn-danger" href="#">
										Delete
									</a>

									<a class="btn btn-info" href="#">
										<i class="icon-zoom-in"></i>  
									</a>				

								</td>


							</tr>

							<tr>
								<td>1</td>
								<td class="center">Nour Ziada</td>
								<td class="center">22/07/2017</td>
								<td class="center" style="width:470px;">here is the first comment of the website blog </td>
								<td class="center">Nour Ziada</td>
								<td>

									<a class="btn btn-warning" href="#">
										Dis - Approve
									</a>

									<a class="btn btn-danger" href="#">
										Delete
									</a>

									<a class="btn btn-info" href="#">
										<i class="icon-zoom-in"></i>  
									</a>				

								</td>


							</tr>

							<tr>
								<td>1</td>
								<td class="center">Nour Ziada</td>
								<td class="center">22/07/2017</td>
								<td class="center" style="width:470px;">here is the first comment of the website blog </td>
								<td class="center">Nour Ziada</td>
								<td>

									<a class="btn btn-warning" href="#">
										Dis - Approve
									</a>

									<a class="btn btn-danger" href="#">
										Delete
									</a>

									<a class="btn btn-info" href="#">
										<i class="icon-zoom-in"></i>  
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
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(3)").removeClass('active');
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(4)").addClass('active');
		    $(".nav.nav-tabs.nav-stacked.main-menu li:nth(5)").removeClass('active');



		});

	</script>