<?php
	
	include "header.php";

?>

	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
				<a href="index.php">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
			<li><a href="">Add New Post</a></li>
	</ul>


		<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="icon-plus"></i><span class="break"></span>Add New Post</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label">Post Title: </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" >
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Category :</label>
								<div class="controls">
								  <select class="span6" id="selectError3">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
								</div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="fileInput">Post Image:</label>
							  <div class="controls">
								<input class="input-file uniform_on span6" id="fileInput" type="file">
							  </div>
							</div>


							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Post Content:</label>
							  <div class="controls">
								<textarea class="cleditor span6" id="textarea2" rows="3"></textarea>
							  </div>
							</div>


							
							<button type="submit" class="btn btn-primary" style="width: 100%;">Add Post</button>
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