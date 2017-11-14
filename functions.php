<?php

require 'connection.php';
	
	class Post {
		### Function to get All Posts form Data Base
		public function get_allposts(){

			global $connect;
			$sql = "SELECT * FROM posts ORDER BY id DESC";
			$stmt = $connect->prepare($sql);
			$stmt->execute();

			return $stmt->fetchAll();
		}

		#### Function to get Post by Id Details
		public function get_post($id){
			global $connect;
			$sql = "SELECT * FROM posts WHERE id=?";
			$stmt = $connect->prepare($sql);
			$stmt->bindParam(1,$id,PDO::PARAM_INT);
			$stmt->execute();

			$rowCount = $stmt->rowCount();

			if($rowCount == 0) {
				return 0;
			}else {
				return $stmt->fetch(PDO::FETCH_ASSOC);

			}

		}



		##### Function to get all commencts By id #####

		public function get_comments($postid){
			global $connect;
			$type = 1;
			$sql = "SELECT * FROM comments WHERE postid=? AND status=? ORDER BY id DESC";
			$stmt = $connect->prepare($sql);
			$stmt -> bindParam(1,$postid,PDO::PARAM_INT);
			$stmt -> bindParam(2,$type);
			$stmt->execute();

			$rowCount = $stmt->rowCount();
			if($rowCount == 0) {
				return 0;
			}else {
				return $stmt->fetchAll();
			}
		}

		public function get_commentsNo($postid){
			global $connect;
			$type = 1;
			$sql = "SELECT * FROM comments WHERE postid=? AND status=? ORDER BY id DESC";
			$stmt = $connect->prepare($sql);
			$stmt -> bindParam(1,$postid,PDO::PARAM_INT);
			$stmt -> bindParam(2,$type);
			$stmt->execute();

			$rowCount = $stmt->rowCount();
			return $rowCount;
		}



		###### Funtion to add comment 

		public function add_comment ($date,$name,$comment,$postid,$status){
			global $connect;
			$sql = "INSERT INTO comments (date,name,comment,postid,status) VALUES (?,?,?,?,?)";
			$stmt = $connect->prepare($sql);
			$stmt->bindParam(1,$date);
			$stmt->bindParam(2,$name);
			$stmt->bindParam(3,$comment);
			$stmt->bindParam(4,$postid);
			$stmt->bindParam(5,$status);
			$stmt->execute();
		}


		###### Funtion to add Post 

		public function add_post ($title,$content,$date,$image){
			global $connect;
			$sql = "INSERT INTO posts (title, content, date, image) VALUES (?, ? , ? , ?)";
			$stmt = $connect->prepare($sql);
			$stmt->bindParam(1,$title);
			$stmt->bindParam(2,$content);
			$stmt->bindParam(3,$date);
			$stmt->bindParam(4,$image);
			$stmt->execute();
		}

		public function edit_post ($id,$title,$content,$image){
			global $connect;
			$sql = "UPDATE posts SET title=?, content=?, image=? WHERE id=?";
			$stmt = $connect->prepare($sql);
			$stmt->bindParam(1,$title);
			$stmt->bindParam(2,$content);
			$stmt->bindParam(3,$image);
			$stmt->bindParam(4,$id);
			$stmt->execute();
		}

		public function delete_post ($id){
			global $connect;
			$sql = "DELETE FROM posts WHERE id=?";
			$stmt = $connect->prepare($sql);
			$stmt->bindParam(1,$id);
			$stmt->execute();
		}

		// Search Function on Index page
		public function search ($search){
			global $connect;
			$sql = "SELECT * FROM posts WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
			$stmt = $connect->prepare($sql);
			$stmt->execute();

			return $stmt->fetchAll();
		}

	}

	class Side {

		##### Function to get the Last 3 Projects 
		public function get_projects () {
			global $connect;
			$sql = "SELECT * FROM projects ORDER BY id DESC LIMIT 3";
			$stmt = $connect->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
	}


	
