<?php namespace App\Http\Controllers;

use App\Article;
use App\Comment;

class IndexController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return view with params
	 */
	public function index()
	{
        $articles = Article::latest()->take(6)->get();
        $articles_top = Article::orderBy('rate', 'DESC')->take(6)->get();
        $comments = Comment::with('user', 'article')->latest()->take(6)->get();

		return view('index.index', compact('articles', 'articles_top', 'comments'));
	}

}
