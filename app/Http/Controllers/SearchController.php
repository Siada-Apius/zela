<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SearchController extends Controller {

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return object $articles
     */
    public function search(Request $request)
    {
        $articles = Article::where('full', 'LIKE', '%'.$request->input('query').'%')->paginate(6);

        return view('articles.index', compact('articles'));
    }

}
