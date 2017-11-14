<?php

	include "header.php";
	$ObjectPublic = new PublicFunction;


	$ObjectComment = new CommentFunctions;
	$activeCommentsData = $ObjectComment->getActiveComments();
	$disactiveCommentData = $ObjectComment->getDisActiveComments();

	/// Code For Approve Comment
	if(isset($_GET['approve'])) {
		$commentID = intval($_GET['approve']);

		$ObjectComment->activeComment($commentID);
		$success = "Done , Comment Approved Successfuly";

		$ObjectPublic->Redirect_to("comments.php");

	}



	/// Code For Dis Approve Comment
	if(isset($_GET['disapprove'])) {
		$commentID = intval($_GET['disapprove']);

		$ObjectComment->DisactiveComment($commentID);
		$success = "Done , Comment Dis Approved Successfuly";

		$ObjectPublic->Redirect_to("comments.php");

	}


	// Code For Delete Un  Approve Comment 
	if(isset($_GET['delete'])) {
		$commentID = intval($_GET['delete']);

		$ObjectComment->deleteunActiveComment($commentID);
		$success = "Done , Comment Deleted Successfuly";

		$ObjectPublic->Redirect_to("comments.php");

	}




?>

	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
				<a href="index.php">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
			<li><a href="">Comments</a></li>
	</ul>

	<?php

		if(isset($success)) {


	?>
	<div class="container" style="text-align: center;">
		<div class="alert alert-success" role="alert"> 
			<strong><?php echo $success; ?></strong>
		</div>
	</div> 

	<?php
		}// end of isset Success Msg
	?>


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
						  	<?php
						  		// get the Dis Active Comment Data
						  		if($disactiveCommentData == 0) {
						  		// here Code if there is no Data Comment to Show	
						  	?>

						  	<div class="container" style="text-align: center;">
				            	<div class="alert alert-info" role="alert"> 
				              		<strong>There is No Data to Show</strong>
				            	</div>
				          	</div> 

				          	<?php 
				          	// else if there is Data
						  		}else {
						  			$sno = 1;
						  			foreach($disactiveCommentData as $comment){



						  	?>
							<tr>
								<td><?php echo $sno++; ?></td>
								<td class="center"><?php echo $comment['name']; ?></td>
								<td class="center"><?php echo date("Y-m-d", $comment['date']); ?></td>
								<td class="center" style="width: 590px;">
									<?php echo $comment['comment']; ?> </td>
								<td>

									<a class="btn btn-success" href="comments.php?approve=<?php echo $comment['id']; ?>">
										Approve
									</a>

									<a class="btn btn-danger" href="comments.php?delete=<?php echo $comment['id']; ?>">
										Delete
									</a>

									<a class="btn btn-info" target="_blank" href="../post.php?id=<?php echo $comment['postid']; ?>">
										<i class="icon-zoom-in"></i>  
									</a>
									
									

									

								</td>


							</tr>

							<?php
								}// end of Foreach
								}//end of ifelse where is there is Data

							?>



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

						  	<?php
						  		$no = 1;
						  		foreach($activeCommentsData as $Acomment) {

						  		

						  	?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td class="center"><?php echo $Acomment['name']; ?></td>
								<td class="center"><?php echo date("Y-m-d",$Acomment['date']); ?></td>
								<td class="center" style="width:470px;">
								<?php echo $Acomment['comment']; ?> </td>

								<td class="center">Nour Ziada</td>
								<td>

									<a class="btn btn-warning" href="comments.php?disapprove=<?php echo $Acomment['id']; ?>">
										Dis - Approve
									</a>

									<a class="btn btn-danger" href="comments.php?delete=<?php echo $Acomment['id']; ?>">
										Delete
									</a>

									<a class="btn btn-info" target="_blank" href="../post.php?id=<?php echo $Acomment['postid']; ?>">
										<i class="icon-zoom-in"></i>  
									</a>				

								</td>


							</tr>

							<?php

								}// end foreach for Active Comments Data
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
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(2)").removeClass('active');
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(3)").removeClass('active');
			$(".nav.nav-tabs.nav-stacked.main-menu li:nth(4)").addClass('active');
		    $(".nav.nav-tabs.nav-stacked.main-menu li:nth(5)").removeClass('active');



		});

	</script>