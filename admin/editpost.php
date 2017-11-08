<?php
	
	include "header.php";
	$ObjectFunction = new DBFunctions;
	$objectPublic = new PublicFunction;

	// get the if from the URL 
	if(isset($_GET['edit'])) {
		$id = intval($_GET['edit']);
		$post = $ObjectFunction->getPost($id);

		// here check if the id is valid or not 

		if($post == 0){
			$objectPublic->Redirect_to("404.php");
		}else {
			/// here is the Code for Update Data

			if(isset($_POST['btnSubmit'])) {
				$title = $_POST['title'];
				$category = $_POST['category'];
				$content = $_POST['content'];
				$author = "Nour Ziada";

				// Code for add name to the image , and add Location 
				$image = $_FILES['file']['name'];
				$target = "uploads/" ;

				// Validation 
				if(empty($title) || empty($content)) {
					$_SESSION['ErrorMassage'] = "Sorry ! All Filed's Are Required";
					$objectPublic->Redirect_to("editpost.php?edit=" . $id);
				}elseif (strlen($title) < 2) {
					$_SESSION['ErrorMassage'] = "Sorry ! Title must be larger than 2 char";
					$objectPublic->Redirect_to("editpost.php?edit=" . $id);
				}else if (strlen($content) > 1000) {
					$_SESSION['ErrorMassage'] = "Sorry ! Content is too Longer";
					$objectPublic->Redirect_to("editpost.php?edit=" . $id);
				}else {
					// Function to add new Post

						
					
					if(move_uploaded_file($_FILES['file']['tmp_name'], $target.$image)){
						$ObjectFunction->editPost($id,$title,$category,$image,$content,$author);
						$_SESSION['SuccessMassage'] = "Done ! Post Updated Successfuly";
						$objectPublic->Redirect_to("dashboard.php");
						
					}else {
						$_SESSION['ErrorMassage'] = "Error ! Image Didn't Uploaded ";
						$objectPublic->Redirect_to("editpost.php?edit=" . $id);
					}
				}

			}

		}

	}else {

		

		
	}
	

?>
	
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
				<a href="dashboard.php">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
			<li><a href="">Edit Post</a></li>
	</ul>


	<?php
		echo errorMassage(); 
		echo successMassage(); 
	?>




		<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-plus"></i><span class="break"></span>Edit Post</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="editpost.php?edit=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label">Post Title: </label>
							  <div class="controls">
								<input type="text" name="title" class="span6 typeahead" value="<?php echo $post['title']; ?>" >
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Category :</label>
								<div class="controls">
								  <select class="span6" id="selectError3" name="category">

								  <?php
								  		// here code to get the Category's that add 
								  		$categoreis = $ObjectFunction->getCategory();
								  		foreach($categoreis as $category) {
								  			
								  			echo "<option> " . $category['name'] . "</option>";
								  		}
								  	?>
							
									
								  </select>
								</div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="fileInput">Post Image:</label>
							  <span class="controls">
								<input class=" span6input-file uniform_on" name="file" id="fileInput" type="file">
							  </span>

							  <span class="span6" style="float:right; font-weight: bold;">Privew Image</span>
						
							  <div style="border-radius: 1px solid #ccc">
								  <span class="span6"></span>
								  <span class="span6" style="width: 100px;float: left;">
								  	<img src="uploads/<?php echo $post['image']; ?>">
								  </span>
							  </div>
							</div>


							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Post Content:</label>
							  <div class="controls">
								<textarea class="span6" id="textarea2" name="content" rows="3"><?php echo $post['content']; ?></textarea>
							  </div>
							</div>


							
							<button type="submit" name="btnSubmit" class="btn btn-primary" style="width: 100%;">Edit Post</button>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->




<?php

	include "footer.php";

?>