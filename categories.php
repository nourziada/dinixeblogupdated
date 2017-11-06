<?php

	include "header.php";
	

	$ObjectPublic = new PublicFunction;
	$ObjectDB = new DBFunctions;


	// code for add new Category by FORM 

	if(isset($_POST['btnSubmit'])) {
		$categoryName = $_POST['name'];
		$date = time();
		if(empty($categoryName)){
			$_SESSION['ErrorMassage'] = "Sorry ! Filed Category Name is Empty";
			$ObjectPublic->Redirect_to("categories.php");
			
		}else if (strlen($categoryName) > 99 ) {
			$_SESSION['ErrorMassage'] = "Sorry ! Category Name is Too Long";
			$ObjectPublic->Redirect_to("categories.php");
		}else {

			$ObjectDB->addCategory($date,$categoryName,"Nour Ziada");
			$_SESSION['SuccessMassage'] = "Done ! Category Name is Added Successfully";
		}
	}

?>

	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
				<a href="index.php">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
			<li><a href="">Categories</a></li>
	</ul>


	<?php
		echo errorMassage(); 
		echo successMassage(); 
	?>

	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-plus"></i><span class="break"></span>Add New Catergory</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">

						<form class="form-horizontal" action="Categories.php" method="POST">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label">Category Name: </label>
							  <div class="controls">
								<input type="text" name="name" class="span6 typeahead" id="typeahead" >
							  </div>
							</div>


							
							<button type="submit" name="btnSubmit" class="btn btn-primary" style="width: 100%;">Add Category</button>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->



			<!-- Table -->

			

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-tags"></i><span class="break"></span>Categories</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">


						<?php

							$categoreis = $ObjectDB->getCategory();
							if($categoreis == 0) {
								echo "There is no Category ADDED";

							}else {

							

						?>

						  <thead>
							  <tr>
							  	  <th>No</th>
								  <th>Date</th>
								  <th>Category Name</th>
								  <th>Author</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>


						  <!-- Code of PHP TO GET All Categorys -->

						  
						  <?php

						  	$id=1;
						  	foreach($categoreis as $category) {

						  	?>
						  	<tr>
						  		<td> <?php echo $id++; ?></td>
								<td class="center"> <?php echo date("Y-m-d", $category['date']); ?> </td>
								<td class="center"><?php echo $category['name'] ; ?></td>
								<td class="center"><?php echo $category['author']; ?></td>
								


								<td class="center">
									
									<a class="btn btn-danger" href="#">
										<i class="icon-trash"> </i> <span> Delete</span> 
									</a>
								</td>
							</tr>	

						<?php		
						  	}## end of foreach


							}### end of ifelse that Categories empty
						  ?>
						  

							
								
							

						
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
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(2)").addClass('active');
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(3)").removeClass('active');
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(4)").removeClass('active');
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(5)").removeClass('active');

		    


		});

	</script>	