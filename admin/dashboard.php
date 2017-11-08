<?php

	include "header.php";

	$ObjectFunctions = new DBFunctions;
	$postsData = $ObjectFunctions->getPosts(); 

	$ObjectPublic = new PublicFunction;

	// Code For Delete post
	if(isset($_GET['delete'])) {
		$id = intval($_GET['delete']);
		$postData = $ObjectFunctions->getPost($id);

		// Check if the id is FOUNDED OR NOT
		if($postData == 0) {
			$ObjectPublic->Redirect_to("404.php");
		}else {
			// Here the id IS FOUNDED
			$ObjectFunctions->deletePosts($id);
			$_SESSION['SuccessMassage'] = "Done ! Post Deleted Successfuly";
			$ObjectPublic->Redirect_to("dashboard.php");
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
		echo errorMassage(); 
		echo successMassage(); 
	?>


			<div class="alert alert-success" role="alert">
			  <strong>Welcome</strong> Nour Ziada
			</div>

			<div class="row-fluid">
				
				<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
					<i class="icon-list-larg"></i>
					<div class="number">854<i class="icon-arrow-up"></i></div>
					<div class="title">Posts</div>
					<div class="footer">
						<a href=""> Show All Posts</a>
					</div>	
				</div>

				<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
					<i class="icon-cat-larg"></i>
					<div class="number">123<i class="icon-arrow-up"></i></div>
					<div class="title">Categories</div>
					<div class="footer">
						<a href="categories.php"> Show all Categories</a>
					</div>
				</div>

				<div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
					<i class="icon-comments-larg"></i>
					<div class="number">982<i class="icon-arrow-up"></i></div>
					<div class="title">Comments</div>
					<div class="footer">
						<a href="comments.php"> Show All Comments</a>
					</div>
				</div>

				<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
					<i class="icon-admins-larg"></i>
					<div class="number">678<i class="icon-arrow-up"></i></div>
					<div class="title">Admins</div>
					<div class="footer">
						<a href="admins.php"> Show All Admins</a>
					</div>
				</div>	
				
			</div>	


			<!-- Table of Posts -->

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-list"></i><span class="break"></span>Posts</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th>No</th>
								  <th>Post Title</th>
								  <th>Date</th>
								  <th>Author</th>
								  <th>Category</th>
								  <th>Comments</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>

						  	<?php
						  		$no = 1;
						  		foreach($postsData as $post) {
						  			$title = $post['title'];
						  			if(strlen($title) > 60) {
						  				$title = substr($title, 0,60) . "...";
						  			}
						  	?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td class="center"><?php echo $title; ?></td>
								<td class="center"><?php echo date("Y-m-d",$post['date']); ?></td>
								<td class="center"><?php echo $post['author']; ?></td>
								<td class="center"><?php echo $post['category']; ?></td>
								<td>
									
									<span class="label label-danger">5</span>
									<span class="label label-success" style="float:right;">3</span>

								</td>


								<td class="center">
									<a class="btn btn-success" target="_blank" href="../post.php?id=<?php echo $post['id']; ?>">
										<i class="icon-zoom-in"></i>  
									</a>

									<a class="btn btn-info" href="editpost.php?edit=<?php echo $post['id']; ?>">
										<i class="icon-edit"></i>  
									</a>
									<a class="btn btn-danger" href="dashboard.php?delete=<?php echo $post['id']; ?>">
										<i class="icon-trash"></i> 
									</a>
								</td>
							</tr>

							<?php

								}// end of foreach 
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


			$(".nav.nav-tabs.nav-stacked.main-menu li:first").addClass('active'); // This is the change.
		    /*$(".nav-item:nth(1)").removeClass('active'); // This is the change.
		    $(".nav-item:nth(2)").addClass('active'); // This is the change.*/


		});

	</script>