<?php

	include "connection.php";

	

	class PublicFunction {
		public function Redirect_to($redirectURL) {
			header("Location:" . $redirectURL);
			exit;
		}
	}

	class DBFunctions {
		// function to add new Category
		public function addCategory ($CategoryDate,$CategoryName,$author){
			global $con;
			$sql = "INSERT INTO category (date,name,author) VALUES (? , ? ,?)";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$CategoryDate);
			$stmt->bindParam(2,$CategoryName);
			$stmt->bindParam(3,$author);
			$stmt->execute();
		}

		// Funtions to get All Categories 
		public function getCategory (){
			global $con;
			$sql = "SELECT * FROM category ORDER BY id DESC";
			$stmt = $con->prepare($sql);
			$stmt->execute();

			if($stmt->rowCount() > 0){
				return $stmt->fetchAll();
			}else {
				return 0;
			}


		}

		// Function to add new Post
		public function addPost ($date,$title,$category,$image,$content,$author){
			global $con;
			$sql = "INSERT INTO posts (date,title,category,image,content,author) VALUES (? , ? ,? , ? ,? ,?)";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$date);
			$stmt->bindParam(2,$title);
			$stmt->bindParam(3,$category);
			$stmt->bindParam(4,$image);
			$stmt->bindParam(5,$content);
			$stmt->bindParam(6,$author);
			$stmt->execute();
		}

	}

?>