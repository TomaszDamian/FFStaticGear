<?php
namespace App\Controllers;
use App\Core\App;
class PagesController{
	public function home(){
		redirect('ViewAllSchools');
	}	
	public function about(){
		$company = 'fs';
		return view('about', compact('company'));
	}
	public function contact(){
		return view('contact');
	}
	public function MyMainWall(){
		$blogs = App::get('database')->selectAll('blogs');
		return view("MainWall",compact('blogs'));
	}
	public function Information(){
		return view("Information");
	}
	public function Sources(){
		return view("Sources");
	}

	public function EditSelect(){
		$schools = App::get('database')->selectAll('schools');
		return view('SchoolEditSelect', compact('schools'));
	}
	public function ChooseDelete(){
		$schools = App::get('database')->selectAll('schools');
		return view('SchoolDeleteSelect', compact('schools'));
	}
	public function ViewNewSchoolCreate(){
		return view('CreateNewSchool');
	}
	public function ViewAll(){
		$schools = App::get('database')->selectAll('schools');
		return view('ViewAllSchools', compact('schools'));
	}
}