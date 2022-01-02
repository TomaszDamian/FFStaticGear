<?php
namespace App\Controllers;
use App\Core\App;
class PagesController{
	public function home(){
		redirect('UserHome');
	}	
	
	public function UserHome(){
		$Characters = App::get('database')->selectAll('users');
		$currentGear = App::get('database')->selectAll('currentGear');
		$neededGear = App::get('database')->selectAll('neededGear');
		$CharacterClassID = App::get('database')->selectAll('CharacterClasses');
		$CharacterClassName = App::get('database')->selectAll('ClassNames');
	return view('UserHome', compact('Characters', 'currentGear', 'neededGear', 'CharacterClassID', 'CharacterClassName'));
	}
	public function EditUserGear(){
		$Characters = App::get('database')->selectAll('users');
		$currentGear = App::get('database')->selectAll('currentGear');
		$neededGear = App::get('database')->selectAll('neededGear');
		$CharacterClassID = App::get('database')->selectAll('CharacterClasses');
		$CharacterClassName = App::get('database')->selectAll('ClassNames');
		return view('UserGearEdit', compact('Characters', 'currentGear', 'neededGear', 'CharacterClassID', 'CharacterClassName'));
	}
	/*public function about(){
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
	}*/
}