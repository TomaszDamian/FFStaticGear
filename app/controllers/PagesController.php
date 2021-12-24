<?php
namespace App\Controllers;
use App\Core\App;
class PagesController{
	public function home(){
		return view('index', compact('users'));
	}
	public function about(){
		$company = 'fs';
		return view('about', compact('company'));
	}
	public function contact(){
		return view('contact');
	}
	public function MainWall(){
		$blogs = App::get('database')->selectAll('blogs');
		return view("MainWall",compact('blogs'));
	}
}