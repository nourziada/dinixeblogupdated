<?php 
	include 'header.php';
	if(isset($_SESSION['username'])) {

	}
	 ?>

<h1 id="title404"> 404 </h1>

<p class="content404">آسف ولكن لم نتمكن من العثور على هذه الصفحة</p>
<p class="content404">	هذه الصفحة التي تبحث عنها غير موجودة </p>

<?php 
include 'footer.php';

}else {
		header("Location :login.php");
	}
 ?>