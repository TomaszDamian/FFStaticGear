<?php
namespace App\Controllers;
use App\Core\App;
class PostController{
	public function PostCreate(){
		view("PostCreate");
	}
	public function PostEdit(){
		$blogs = App::get('database')->selectAll('blogs');
		view("PostEdit",compact('blogs'));
	}
	public function PostBlog(){

		
		if($_POST['title'] == ""){
			$_POST['title'] = "-----";
		};
		if($_POST['owner'] == ""){
			$_POST['owner'] = "Anonymous";
		};
		if($_POST['body'] == ""){
			$_POST['body'] = "Empty Post";
		}

		App::get('database')->insert('blogs',[
			'title' => $_POST['title'],
			'body' => $_POST['body'],
			'owner' => $_POST['owner']
		]);
		redirect('/MyBlogWall');
	}

	public function EditThisPost(){
		$postId = $_GET['id'];
		$blogs = App::get('database')->selectAll('blogs');
		view("EditThisPost",compact('postId','blogs'));
	}
	public function SaveChanges(){
		
		$id = ['id' => $_POST['id']];
		$values = [
			'title' => $_POST['title'],
			'body' => $_POST['body'],
			'owner' => $_POST['owner']
		];
		App::get('database')->update("blogs",$values,$id);
		redirect('/MyBlogWall');
	}

	public function EditSchool(){
		$schoolID = $_GET['id'];
		$schools = App::get('database')->selectAll('schools');
		view("EditSchool", compact('schoolID','schoolKeys', 'schoolValues', 'schools'));
	}

	
	public function DeleteSchool(){
		$schoolID = $_POST['id'];
		App::get('database')->DeleteProcedure($schoolID);
		redirect('/SchoolDeleteSelect');
	}

	public function SaveSchoolChanges(){
		$schoolID = $_POST['id'];
		$schoolName = $_POST['schoolName'];
		$schoolKey = $_POST['key'];
		$schoolValue = $_POST['value'];
		
		$completedArray = array_combine($schoolKey, $schoolValue);
		$jsonArray = json_encode($completedArray);

		App::get('database')->SaveProcedure($schoolID, $schoolName, $jsonArray);
		redirect("/SchoolEditSelect");
	}
	public function SubmitNewSchool(){
		$schoolKey = $_POST['key'];
		$schoolValue = $_POST['value'];
		$schoolName = $_POST['schoolName'];
		$index = 0;

		foreach ($schoolValue as $value){
			if($value == "" or $value == " "){
				$value = "N/A";
				$schoolValue[$index] = $value;
			}
			$index++;
		}
		
		$completedArray = array_combine($schoolKey, $schoolValue);
		$jsonArray = json_encode($completedArray);

		App::get('database')->PostProcedure($schoolName, $jsonArray);
		redirect("/ViewAllSchools");
	}
}