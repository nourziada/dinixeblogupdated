<?php
	
	include "header.php";

	$ObjectPublic = new PublicFunction;
	$ObjectDB = new DBFunctions;


	if(isset($_POST['btnSubmit'])) {
		$title = $_POST['title'];
		$category = $_POST['category'];
		$content = $_POST['content'];
		$date = time();
		$author = "Nour Ziada";

		// Code for add name to the image , and add Location 
		$image = $_FILES['file']['name'];
		$target = "uploads/" ;

		// Validation 
		if(empty($title) || empty($content)) {
			$_SESSION['ErrorMassage'] = "Sorry ! All Filed's Are Required";
			$ObjectPublic->Redirect_to("addnewpost.php");
		}elseif (strlen($title) < 2) {
			$_SESSION['ErrorMassage'] = "Sorry ! Title must be larger than 2 char";
			$ObjectPublic->Redirect_to("addnewpost.php");
		}else if (strlen($content) > 1000) {
			$_SESSION['ErrorMassage'] = "Sorry ! Content is too Longer";
			$ObjectPublic->Redirect_to("addnewpost.php");
		}else {
			// Function to add new Post

				
			
			if(move_uploaded_file($_FILES['file']['tmp_name'], $target.$image)){
				$ObjectDB->addPost($date,$title,$category,$image,$content,$author);
				$_SESSION['SuccessMassage'] = "Done ! Post Added Successfuly";
				$ObjectPublic->Redirect_to("addnewpost.php");
				
			}else {
				$_SESSION['ErrorMassage'] = "Error ! Image Didn't Uploaded ";
				$ObjectPublic->Redirect_to("addnewpost.php");
			}
		}

	}


?>

	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
				<a href="index.php">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
			<li><a href="">Add New Post</a></li>
	</ul>


	<?php
		echo errorMassage(); 
		echo successMassage(); 
	?>


		<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-plus"></i><span class="break"></span>Add New Post</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="addnewpost.php" method="POST" enctype="multipart/form-data">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label">Post Title: </label>
							  <div class="controls">
								<input type="text" name="title" class="span6 typeahead" id="typeahead" >
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Category :</label>
								<div class="controls">
								  <select class="span6" id="selectError3" name="category">

								  	<?php
								  		// here code to get the Category's that add 
								  		$categoreis = $ObjectDB->getCategory();
								  		foreach($categoreis as $category) {
								  			
								  			echo "<option> " . $category['name'] . "</option>";
								  		}
								  	?>
									
								  </select>
								</div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="fileInput">Post Image:</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="file" id="fileInput" type="file">
							  </div>
							</div>


							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Post Content:</label>
							  <div class="controls">
								<textarea class="span6" id="textarea2" name="content" rows="3"></textarea>
							  </div>
							</div>


							
							<button type="submit" name="btnSubmit" class="btn btn-primary" style="width: 100%;">Add Post</button>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->




<?php 


	include "footer.php";

?>

	<script>
		$(document).ready(function(){


			$(".nav.nav-tabs.nav-stacked.main-menu li:first").removeClass('active');  
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(1)").addClass('active');  
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(2)").removeClass('active');
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(3)").removeClass('active');
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(4)").removeClass('active');
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(5)").removeClass('active');

		    


		});

	</script>	