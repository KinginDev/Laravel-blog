<?php

namespace App\Http\controllers;

use App\Post;
class PagesController extends Controller
{
	public function getIndex() {
		# proccess variable data or paramters
		# talk to the model
		# recive from the model
		# compile or process data from the model
		# pass that data to the correct view
$posts = Post::orderBy('created_at','desc')->limit(4)->get();
		return view('Pages.welcome')->withPosts($posts);

	}

	public function getAbout() {
	#About method
		$first = "Atobajaiye";
		$last = 'Boluwaji';

		$full = $first . " " . $last;
		$email = "Genmax100.ab@gmail.com";
		$data = array();
		$data['email'] =$email;
		$data['fullname'] = $full;
		// to pass data into a view ====== return view('Pages.about') ->with('fullname' , $full);
	///return view('Pages.about')
	 //->withFullna  me($full)->withEmail($email);
		return view('pages.about')->withData($data);

	}


	public function getContact(){

	return view('Pages.contact');

	}

}

?>