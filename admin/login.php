<?php 

	session_start();
	$pageTitle="Dinixe - Login";
	include 'inc/headerlogin.php'; 
	include 'inc/functions.php';

	$objectAdmin = new Admins;


	if(isset($_SERVER['REQUEST_METHOD']) == 'POST') {
		if(isset($_POST['btnsubmit'])) {
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			##### check if the values is empty or not 
			if(empty($username) || empty($password)) {
				$error = "عذراً ! كافة الحقول مطلوبة";
			}else {
				
				$loginData = $objectAdmin->login($username,$password);
				### that mean there is a user with that values 
				if($loginData !== 0) {
					$_SESSION['username'] = $loginData['username'];
					header("Location: dashboard.php");
				}else  #### that means there is no user with that values 
				 {
					$error = "عذراً ! اسم المستخدم أو كلمة المرور خطأ" ;
				}
			}
		}
	}
?>

<body id="body-loign">
<div class="container-all">
	<div class="container container-login">
		<img class="img-header" src="../img/logo.png">
		
		<p class="login-title">:::تسجيل الدخول الى لوحة التحكم:::</p>
		<?php 



		if(isset($error)) {
			
			echo "<div class=\"container\" style=\"margin-top:10px\">
		    	<div class=\"alert alert-danger\" role=\"alert\"> <strong>";
		
		    				echo $error;		

		    	echo "</div>
		    </div>	";	
		    
		}

		?>
		<form class="text-right container contact-us" action="login.php" method="POST" dir="rtl">
	        
	        <div class="row">
	        	<div class="col-md-4 offset-md-4"></div>
	            <div class="col-md-4">
	                <div class="form-group">
					   <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="اسم المستخدم">
					</div>
	            </div>
	            <div class="col-md-4 offset-md-4"></div>

	            <div class="col-md-4 offset-md-4"></div>
	            <div class="col-md-4">
	                <div class="form-group">
					   <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="كلمة المرور">
					</div>
	            </div>
	            <div class="col-md-4 offset-md-4"></div>

	            <div align="center" class="button-sub">
	                <button name="btnsubmit" type="submit">تسجيل الدخول</button>
	            </div>
	        </div>
	    </form>

    </div>

</div>