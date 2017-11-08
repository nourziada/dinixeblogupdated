<?php

	session_start();

	function errorMassage(){

		if(isset($_SESSION['ErrorMassage'])){

			$output = "<div class=\"alert alert-danger\" role=\"alert\">";
			$output .= "<strong>" . $_SESSION['ErrorMassage'] . " </strong>";
			$output .= "</div>";
			$_SESSION['ErrorMassage'] = null;
			return $output;

		}

	}

	function successMassage(){

		if(isset($_SESSION['SuccessMassage'])){
			$output = "<div class=\"alert alert-success\" role=\"alert\">";
			$output .= "<strong>" . $_SESSION['SuccessMassage'] . " </strong>";
			$output .= "</div>";
			$_SESSION['SuccessMassage'] = null;
			return $output;
		}

	}

?>