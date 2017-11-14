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


		// Code for delete Category

		public function deleteCategory ($id){
			global $con;
			$sql = "DELETE FROM category WHERE id=?";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$id);
			$stmt->execute();
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


		// get All Posts 
		public function getPosts (){
			global $con;
			$sql = "SELECT * FROM posts ORDER BY id DESC";
			$stmt = $con->prepare($sql);
			$stmt->execute();

			if($stmt->rowCount() > 0){
				return $stmt->fetchAll();
			}else {
				return 0;
			}


		}

		// Function That get Just One Post

		public function getPost ($id){
			global $con;
			$sql = "SELECT * FROM posts WHERE id=?";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$id);
			$stmt->execute();

			if($stmt->rowCount() > 0){
				return $stmt->fetch();
			}else {
				return 0;
			}


		}

		// Function That Edit Post 
		public function editPost ($id,$title,$category,$image,$content,$author){
			global $con;
			$sql = "UPDATE posts SET title=?, category=?, image=?, content=?, author=? WHERE id=?";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$title);
			$stmt->bindParam(2,$category);
			$stmt->bindParam(3,$image);
			$stmt->bindParam(4,$content);
			$stmt->bindParam(5,$author);
			$stmt->bindParam(6,$id);

			$stmt->execute();


		}

		// Delete Posts 
		public function deletePosts ($id){
			global $con;
			$sql = "DELETE FROM posts WHERE id=?";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$id);
			$stmt->execute();



		}

	}

	class CommentFunctions {


		// Active Functions
		public function getActiveCommentsNo ($id){
			global $con;
			$type = 1;
			$sql = "SELECT * FROM comments WHERE status=? AND postid=?";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$type);
			$stmt->bindParam(2,$id);
			$stmt->execute();

			$count = $stmt->rowCount();
			return $count;


		}

		public function getActiveComments (){
			global $con;
			$type=1;
			$sql = "SELECT * FROM comments WHERE status=? ORDER BY id DESC";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$type);
			$stmt->execute();


			if($stmt->rowCount() > 0){
				return $stmt->fetchAll();
			}else {
				return 0;
			}


		}

		public function activeComment($id) {
			global $con;
			$type=1;
			$sql = "UPDATE comments SET status=? WHERE id=?";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$type);
			$stmt->bindParam(2,$id);
			$stmt->execute();

		}

		public function deleteunActiveComment ($id){
			global $con;
			$sql = "DELETE FROM comments WHERE id=?";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$id);
			$stmt->execute();
		}

		// Dis Active Comments 

		public function getDisActiveCommentsNo ($id){
			global $con;
			$type = 0;
			$sql = "SELECT * FROM comments WHERE status= ? AND postid=?";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$type);
			$stmt->bindParam(2,$id);
			$stmt->execute();

			$count = $stmt->rowCount();

			return $count;


		}

		public function getDisActiveCommentsNoHeader (){
			global $con;
			$type = 0;
			$sql = "SELECT * FROM comments WHERE status= ? ";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$type);
			$stmt->execute();

			$count = $stmt->rowCount();

			return $count;


		}

		public function getDisActiveComments (){
			global $con;
			$type = 0;
			$sql = "SELECT * FROM comments WHERE status=? ORDER BY id DESC";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$type);
			$stmt->execute();

			if($stmt->rowCount() > 0){
				return $stmt->fetchAll();
			}else {
				return 0;
			}


		}

		// Function to Dis Active Comment by there ID

		public function DisactiveComment($id) {
			global $con;
			$type=0;
			$sql = "UPDATE comments SET status=? WHERE id=?";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$type);
			$stmt->bindParam(2,$id);
			$stmt->execute();

		}



	}

	class Admins {

		// function of Login
		public function login($username,$password){
			global $con;
				$sql = "SELECT * FROM admins WHERE username=? AND password=?";
				$stmt = $con->prepare($sql);
				$stmt->bindParam(1,$username);
				$stmt->bindParam(2,$password);
				$stmt->execute();

				$count = $stmt->rowCount();
				if($count == 0) {
					return 0;
				}else {
					return $stmt->fetch();
				}
		}


		// function of get Admin Password 
		public function getAdminPassword($username){
			global $con;
				$sql = "SELECT * FROM admins WHERE username=?";
				$stmt = $con->prepare($sql);
				$stmt->bindParam(1,$username);
				$stmt->execute();

				$count = $stmt->rowCount();
				if($count == 0) {
					return 0;
				}else {
					return $stmt->fetch();
				}
		}

		// Function to Change Password
		public function changePassword($username,$newPassword){
			global $con;
				$sql = "UPDATE admins SET password=? WHERE username=?";
				$stmt = $con->prepare($sql);
				$stmt->bindParam(1,$newPassword);
				$stmt->bindParam(2,$username);
				$stmt->execute();
		}

		// function to add new Admin
		public function addAdmin ($date,$username,$password,$addby){
			global $con;
			$sql = "INSERT INTO admins (date,username,password,addby) VALUES (? , ? ,? ,?)";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$date);
			$stmt->bindParam(2,$username);
			$stmt->bindParam(3,$password);
			$stmt->bindParam(4,$addby);
			$stmt->execute();
		}

		// Funtions to get All Admins 
		public function getAdmins (){
			global $con;
			$sql = "SELECT * FROM admins ORDER BY id DESC";
			$stmt = $con->prepare($sql);
			$stmt->execute();

			if($stmt->rowCount() > 0){
				return $stmt->fetchAll();
			}else {
				return 0;
			}


		}

		public function deleteAdmin ($id){
			global $con;
			$sql = "DELETE FROM admins WHERE id=?";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$id);
			$stmt->execute();
		}
	}

	class Counts {

		// Count the No Of Posts
		public function countPosts (){
			global $con;
			$sql = "SELECT * FROM posts";
			$stmt = $con->prepare($sql);
			$stmt->execute();

			$count = $stmt->rowCount();
			return $count;
		}

		// Count the No Of Categories
		public function countCategories (){
			global $con;
			$sql = "SELECT * FROM category";
			$stmt = $con->prepare($sql);
			$stmt->execute();

			$count = $stmt->rowCount();
			return $count;
		}

		// Count the No Of comments
		public function countComments (){
			global $con;
			$type = 1;
			$sql = "SELECT * FROM comments WHERE status= ?";
			$stmt = $con->prepare($sql);
			$stmt->bindParam(1,$type);
			$stmt->execute();

			$count = $stmt->rowCount();
			return $count;
		}

		// Count the No Of Admins
		public function countAdmins (){
			global $con;
			$sql = "SELECT * FROM admins";
			$stmt = $con->prepare($sql);
			$stmt->execute();

			$count = $stmt->rowCount();
			return $count;
		}
	}

?>